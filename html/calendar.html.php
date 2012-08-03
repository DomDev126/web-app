<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Calendar &middot; I Have Plans</title>
	<link href="css/general.css" rel="stylesheet">
	<link href="css/jquery.zweatherfeed.css" rel="stylesheet">
</head>
<body>
	<div class="container clearfix">	
		<p class="sign-out"><?php if (user_is_signed_in()) : ?>
		<a href="sign-out.php">Sign Out</a></p>
		<?php endif; ?>
		<div class="header-container">
			<header class="mainHead">
				<figure>
					<div id="imgWrap"><img src="<?php echo (USER_IMAGE_PATH.$user_info['photo']);?>" alt="User Photo"></div>
					<figcaption>Welcome, <?php echo $user_info['username'];?></figcaption>
				</figure>	
				<nav>
					<ul>
						<li id="friends"><a href="friends.php">Friends</a></li>
						<li id="plans"><a href="add-event.php">Plans</a></li>
					</ul>
				</nav>
			</header>
		</div>
		<div class="content-container">
			<div class="eventAdd">

				<header class="contentHead">
					<h1><?php echo date('F d');?> - <?php echo date("F d", mktime(0, 0, 0, date("m"), date("d")+4));?></h1>
					<div id="weather"></div>
				</header>
				
				<div class="contentBody">
					<form action="calendar.php" method="post">
						<input type="hidden" name="calendar-post">
						<button id="calendarViewBtn" type="submit">Calendar View</button>
					</form>
					<form action="calendar.php" method="post">
						<input type="hidden" name="list-post">
						<button id="listViewBtn" type="submit">List View</button>
					</form>
					<div class="calendarBody clearfix">
						<table>
					       <?php if(isset($_SESSION['list-view'])) :?>
					       		<?php foreach ($list_view_events as $events) : ?>

					       		
						       		<p class="dateTitle"><?php $d = new DateTime($events['event_date']); echo $d->format(' l, F j, Y  '); ?></p>
						       		<div class="list-item-holder">
						       		<p class="listInfo"><span>Title:</span> <?php echo (ucFirst($events['event_title'])); ?></p>
									<p class="listInfo"><span>Time:</span> <?php echo($events['event_from'].' - '.$events['event_to'] ); ?></p>
									<p class="listInfo"><span>Address:</span> <?php echo (ucFirst($events['address'])); ?></p>

								</div>

					       	<?php endforeach;?>


					       <?php else :?>

					        <thead>
					          <tr>
					            <th>Time:</th>
					            <th class="dates">Today</th>
					            <th class="dates"><?php echo date("m/d", mktime(0, 0, 0, date("m"), date("d")+1));?></th>
					            <th class="dates"><?php echo date("m/d", mktime(0, 0, 0, date("m"), date("d")+2));?></th>
					            <th class="dates"><?php echo date("m/d", mktime(0, 0, 0, date("m"), date("d")+3));?></th>
					            <th class="dates"><?php echo date("m/d", mktime(0, 0, 0, date("m"), date("d")+4));?></th>
					          </tr>
					        </thead>
					        <tbody>
					        	 <?php create_table (6, 30, $event_array);?> 
					        </tbody>

					          <?php endif;?>

					    </table>  
					</div>
					 <div class="notifications">
					    <h3>Notifications</h3>	
				    	<ul class="notificationsList">
				    		<?php 

				    		if(isset($_SESSION['event_added'])) {

				    			echo '<li>Your event was added.</li>';
				    		}

				    		if(isset($_SESSION['confirmed'])) {

				    			echo '<li>Your event was confirmed.</li>';
				    		}

							unset($_SESSION['event_added']);  
							unset($_SESSION['confirmed']);

							//check to see if there are any events to confirm
				    		$notifications = check_notification($db, $user_id);
							

							foreach ($notifications as $notify) {
							
				    			if($notify['confirmed'] == 0 ){

				    				echo '<li><a href="event.php?id='.$notify[1].'">You have an event to confirm.</a></li>';		
				    			}
				    		}  

				    		$new_friends = new_friend_check($db, $user_id);

				    		foreach($new_friends as $friend){


				    			$friend_info = get_username ($db, $friend[0]);
				    			$friend_email = get_friend_email ($db, $friend[0]);

				    		echo '<li>'.ucfirst($friend_info['username']).' : '.$friend_email['email'].' has indicated that you are a friend. <a id="confirm" href="confirm-friend.php?id='.$friend['user_id'].'">Confirm </a></li>';

				    		}
							
				    		?>
				    	</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/jquery.zweatherfeed.min.js" type="text/javascript"></script>
<script src="js/calendar.js"></script>
<script type="text/javascript">
	$(document).ready(function () { $('#weather').weatherfeed(['CAXX0343']);});
</script>
</body>
</html>

