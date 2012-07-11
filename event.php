<?php

require_once 'includes/db.php';
require_once 'includes/users.php';
require_once 'includes/requests.php';

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}

$user_id = $_SESSION['user-id'];
$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);


$event_info = get_event_loc_title ($db, $event_id);

$location_id = $event_info['location_id'];

$location = get_location($db, $location_id);

$confirmed_user_ids = get_event_user ($db, $event_id);

$event_date = get_event_date ($db, $event_id ) ;

$date = $event_date[0][2];
$day = date("l", strtotime($date));
$day_month = substr($date, 0, 5);
$date_string = $day.' '.$day_month.' at '. $event_date[0][0];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);


	$ok = update_user_confirmation($db, $user_id, $event_id);

	$_SESSION['confirmed'] = true;


	header('Location: calendar.php');
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>I Have Plans &middot; Login Page</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="login-box">
			<form id="login" method="post" action="<?php echo('event.php?id='.$event_id.'');?> ">
				<h2>Plan</h2>
				<div class="panel">
					<div class="panel-info">
						<p id="panel-time"><?php echo $date_string ;?></p>	
					</div>
				</div>
				<div class="panel">
					<div class="panel-info second">
						<p id="panel-location"><?php echo ucfirst($event_info['event_title']);?> </p>
						<div><?php echo ucfirst($location['address']);?></div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-info">
						<p id="panel-friends">
						<?php 
							$counter = 0;
							foreach ($confirmed_user_ids as $users) {
								
								$displayed_user = get_username($db, $users['user_id'] );

								if($counter>0) {
									echo ', '.$displayed_user;
								}else {
									echo $displayed_user;
									$counter+=1;
								}
							}
						?>
					</p>
					</div>	
				</div>
				<?php 

					$notifications = check_notification_confirmation($db, $event_id, $user_id);


						
					if($notifications){
						
		    			if($notifications[0][0] == 0){

		    				echo ('<div class="go-button event-go"><button type="submit">Confirm</button></div>');
									
		    			} else {
		    				echo ('<div class="go-button event-go"><a href="calendar.php">Go Back</a></div>');

		    			}  
		    		}else {

		    			echo ('<div class="go-button event-go"><a href="calendar.php">Go Back</a></div>');
		    		}

				 ?>
				
			</form>
			<p><a href="delete.php?id=<?php $_SESSION['delete-event'] = true; echo $event_id;?>">Delete</a></p>
		</div>

	<div>
</body>
</html>