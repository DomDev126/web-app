<?php

require_once 'includes/db.php';
require_once 'includes/users.php';
require_once 'includes/requests.php';

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}



$email= filter_input(INPUT_POST, 'addEmail', FILTER_SANITIZE_STRING);

$user_id = ($_SESSION['user-id']);
$user_name = ucFirst($_SESSION['username']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$errors = array();

	if(isset($email)) {
		$friend_id =  friend_email_check($db, $email);
	}

	if(!$friend_id){
		$errors['no-user'] = true;
	}

	if($friend_id) {

		$friendAlready = check_friend_id ($db, $user_id, $friend_id);
		if(!$friendAlready){

		add_friend_id ($db, $user_id, $friend_id);
		
		header('Location: friends.php');
		exit;
	
		}
	}
}

?>
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
					<a href="calendar.php"><img src="images/clips/myface.png" alt=""></a>
					<figcaption><?php echo $user_name;?></figcation>
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
					<h1>Add Friends</h1>
					<p><a href="calendar.php">Back to Calendar</a></p>
				</header>
				<div class="contentBody">
					<div class="friendBody clearfix">
						<ul class="friendsUl">
							<?php 

							$friend_ids = get_friend_ids($db, $user_id);

							foreach($friend_ids as $friends) {

							$current_friend = intval($friends['friend_id']);
							$_SESSION['friend_id'] = $current_friend;
							$friend_username = get_username ($db, $current_friend);
							$friend_email = get_friend_email ($db, $current_friend);
							
							echo '<li class="friendHolder">'.$friend_username.' || '.$friend_email['email'].'</li><a class="delete" href="delete.php">Delete</a> ';
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