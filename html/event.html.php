<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>I Have Plans &middot; Login Page</title>
	<link href="css/general.css" rel="stylesheet">
	 <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDtmaZTxrVMEhTgYyGeUWjUQmxX--4JRXw&sensor=true">
    </script>
</head>
<body>
	<div class="container">
		
		<div class="login-box clearfix">
			<div class="googleMapCanvas"><div id="innerMap" style="width:317px; height:300px"></div></div>
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
						<div class="small-text" data-loc="<?php echo ucfirst($location['address']);?>"><p><?php echo ucfirst($location['address']);?></p></div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-info">
						<p id="panel-friends">
						<?php 
							$counter = 0;
							foreach ($confirmed_user_ids as $users) {
								
								$displayed_user = get_username_single($db, $users['user_id'] );

								if($counter>0) {
									echo ', '.ucfirst($displayed_user['username']);
								}else {
									echo ucfirst($displayed_user['username']);
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
		    				echo ('<div class="go-button"><a class="bottomLink"href="calendar.php">Go Back</a></div>');
		    			}  
		    		}else {
		    			echo ('<div class="go-button"><a class="bottomLink" href="calendar.php">Go Back</a></div>');
		    		}

				 ?>
			</form>
			<div class="go-button"><a class="bottomLink" href="delete.php?id=<?php $_SESSION['delete-event'] = true; echo $event_id;?>">Delete</a></div>
		</div>
	</div>
	<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/eventGoogle.js"></script>
</body>
</html>