<?php

require_once 'includes/db.php';
require_once 'includes/users.php';
require_once 'includes/requests.php';
require_once 'includes/functions.php';

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}


$user_id = $_SESSION['user-id'];
$user_name = get_username ($db, $user_id);
$event_array = check_schedule($db,$user_id);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Calendar &middot I Have Plans</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>
	<?php if (user_is_signed_in()) : ?>
	<a href="sign-out.php">Sign Out</a>
	<?php endif; ?>
	<div class="container">	
		
		<div class="header-container">
			<header class="mainHead">
				<figure>
					<img src="images/clips/myface.png" alt="">
					<figcaption>Welcome, <?php echo $user_name;?></figcation>
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

				</header>
				<div class="contentBody">
					<div class="calendarBody clearfix">
						<table>
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

				    		$notifications = check_notification($db, $user_id);
							$notified = array();

							foreach ($notifications as $notify) {

				    			if($notify['confirmed'] == 0 ){

									$_SESSION['confirm_event_id'] = $notify['event_id'];

				    				echo '<li><a href="event.php">You have an event to confirm</a></li>';

									$notified[] = $notify;
											
				    			}

				    		} if(empty($notified) && (isset($_SESSION['event_added']))) {

				    			echo '<li>No events to confirm</li>';

				    		} ?>
				    		
				    	<ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<body>
</html>