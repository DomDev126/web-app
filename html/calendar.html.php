<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Calendar &middot; I Have Plans</title>
	<link href="css/general.css" rel="stylesheet">
	<link href="css/jquery.zweatherfeed.css" rel="stylesheet">
</head>
<body>
	<div class="container">	
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

							//check to see if there are any events to confirm
				    		$notifications = check_notification($db, $user_id);
							$notified = array();

							foreach ($notifications as $notify) {
							
				    			if($notify['confirmed'] == 0 ){

				    				echo '<li><a href="event.php?id='.$notify[1].'">You have an event to confirm</a></li>';		
				    			}
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

