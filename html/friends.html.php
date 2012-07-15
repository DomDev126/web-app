
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Friends &middot; I Have Plans</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>
	<div class="container">	
	<?php if (user_is_signed_in()) : ?>
		<p class="sign-out"><a href="sign-out.php">Sign Out</a></p>
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
				<header class="contentHead extended">
					<h1>Add Friends</h1>
					<p><a href="calendar.php">Back to Calendar</a></p>
				</header>
				<div class="contentBody">
					<div class="friendBody clearfix">
						<ul class="friendsUl">
							<?php 

							$friend_ids = get_friend_ids($db, $user_id);
							
							foreach($friend_ids as $friends) {

								if($friends[0] !== $user_id){

									$current_friend = intval($friends['friend_id']);
						
									$friend_info = get_username ($db, $current_friend);
									$friend_email = get_friend_email ($db, $current_friend);
									
									echo '<li class="friendHolder"><div><img src="'.USER_IMAGE_PATH.$friend_info['photo'].'" alt=""></div><span>'.$friend_info['username'].'  (  '.$friend_email['email'].' )</span></li><a class="bottomLink delete" href="delete.php?id='.$current_friend.'">Delete</a> ';
							 	}

							 }; ?>
						</ul>
						<form id="addFriend" method="post" action="friends.php">
							<label for="addFriend">Add one of your friends</label>
							<input id="addEmail" name="addEmail" placeholder="ie. steve@partypooper.com" value="">
							<button id="addBtn" type="submit">Add</button>
							<?php if (isset($errors['no-user'])) { echo ('<em>No such user/email exists</em>');} ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<body>
</html>