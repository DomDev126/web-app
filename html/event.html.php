<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>I Have Plans &middot; Login Page</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="login-box clearfix">
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
						<div class="small-text"><p><?php echo ucfirst($location['address']);?></p></div>
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

	<div>
</body>
</html>