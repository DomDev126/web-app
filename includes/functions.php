<?php 

function check_schedule($db, $user_id) {

	$current_date =  date("m/d/Y");
	$day1  = date("m/d/Y", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
	$day2  = date("m/d/Y", mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
	$day3  = date("m/d/Y", mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
	$day4  = date("m/d/Y", mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));

	
	$sql = $db->prepare(' SELECT event_id FROM user_events WHERE user_id = :user_id ');
	$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetchAll();

	$final_results;

	$counter = 0;

	foreach($results as $event_ids) {

		$event_id = $event_ids[0];

		$sql = $db->prepare('SELECT event_date, event_from, event_to, event_title FROM events WHERE id = :event_id AND event_date IN (:current_date, :day1, :day2, :day3, :day4) ');
		$sql->bindValue(':event_id', $event_id, PDO::PARAM_INT);
		$sql->bindValue(':current_date', $current_date, PDO::PARAM_STR);
		$sql->bindValue(':day1', $day1, PDO::PARAM_STR);
		$sql->bindValue(':day2', $day2, PDO::PARAM_STR);
		$sql->bindValue(':day3', $day3, PDO::PARAM_STR);
		$sql->bindValue(':day4', $day4, PDO::PARAM_STR);
		$sql->execute();
		
		$result = $sql->fetchAll();
		
		if ($result == true) {
			$final_results[$counter] = $result[0];

			$counter++;
		}

	}

	$todays_events = array();
	$week_array = array();

	foreach ($final_results as $user_events){
		
		if ($user_events['event_date'] == $current_date) {
			$inner_array_current = array();
			array_push($inner_array_current, $user_events['event_title'], $user_events['event_from'],$user_events['event_to'],$user_events['event_date']);
			$todays_events[0] =  $inner_array_current;
			$week_array[0] = $todays_events[0];
			
		}
		if ($user_events['event_date'] == $day1) {
			$day1_array = array();
			array_push($day1_array, $user_events['event_title'], $user_events['event_from'],$user_events['event_to'],$user_events['event_date']);
			$todays_events[1] =  $day1_array;
			$week_array[1] = $todays_events[1];
		}
		if ($user_events['event_date'] == $day2) {
			$day2_array = array();
			array_push($day2_array, $user_events['event_title'], $user_events['event_from'],$user_events['event_to'],$user_events['event_date']);
			$todays_events[2] =  $day2_array;
			$week_array[2] = $todays_events[2];
			
		}
		if ($user_events['event_date'] == $day3) {
			$day3_array = array();
			array_push($day3_array, $user_events['event_title'], $user_events['event_from'],$user_events['event_to'],$user_events['event_date']);
			$todays_events[3] =  $day3_array;
			$week_array[3] = $todays_events[3];
			
		}
		if ($user_events['event_date'] == $day4) {
			$day4_array = array();
			array_push($day4_array, $user_events['event_title'], $user_events['event_from'],$user_events['event_to'],$user_events['event_date']);
			$todays_events[4] =  $day4_array;
			$week_array[4] = $todays_events[4];
			
		}
	

	}

	return($week_array);

	

}


function create_table ($start, $interval, $event_array) {

	$range = (24 - $start) * (60 / $interval);
	$change_time = (12.5 - $start) * (60 / $interval);


	$counter = 0;


	for ($i = $start; $i <24; $i++){
  	
	    for ($j = 0; $j <=$interval ; $j+=$interval) {

			$change_to_pm = ($counter > $change_time - (60 / $interval)) ? true : false;
			$pm_or_am = $change_to_pm ? 'pm' : 'am';
	    	$hour = ($counter > $change_time) ? $i - 12 : $i;
	    	$compared_time = $hour.':'.str_pad($j, 2, '0', STR_PAD_LEFT);
	    	$full_time = $compared_time. $pm_or_am;
	    	$time_seconds = strtotime($full_time);


    		echo ('<tr>'); 
      		echo ('<td class="tableTime">'.$full_time.'</td>');

      		$event_array_object = new ArrayObject($event_array);


      		for ($k = 0; $k < 5; $k++) {
      			
      			if($event_array_object->offsetExists($k)) {

	      			$day_event_start = strtotime($event_array[$k][1]);
	      			$day_event_end = strtotime($event_array[$k][2]);
	      			
	      			if ($time_seconds >= $day_event_start && $time_seconds < $day_event_end) {





      					echo('<td class="eventTable eventTime"><a href="#">'.$event_array[$k][0].'</a></td>'); 






      				
      				} else {

      				echo('<td class="eventTable"></td>'); 
      				}

	      		} else {

      				echo('<td class="eventTable"></td>'); 
      			}

      		}

       		echo ('</tr>');	
	      
	       $counter++;

	    }

	}

}


