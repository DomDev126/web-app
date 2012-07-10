<?php

require_once 'includes/db.php';
require_once 'includes/users.php';
require_once 'includes/requests.php';

$errors = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$name_check = friend_check($db, $username);

	if($name_check) {
		$errors['user-exists'] = true;
	}

	if (empty($username)) {
	$errors['username'] = true;
	}

	if (empty($password)) {
	$errors['password'] = true;
	}

	if (empty($email)) {
	$errors['email'] = true;
	}

	if (empty($errors)) {
		$id = user_create($db, $username,  $password, $email);

	}
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
			<form id="login" method="post" action="sign-up.php">

				<h2>Sign Up</h2>
				<div class="panel">
					<div class="panel-info">
						<label for="username">Username:</label>
						<input id="username" name="username">	
						<strong class="user-available" data-status="unchecked">Available</strong>

					</div>
				</div>
				<div class="panel">
					<div class="panel-info">
						<label for="password">Password:</label>
						<input id="password" name="password" type="password">
					</div>
				</div>
				<div class="panel">
					<div class="panel-info">
						<label for="email">Email:</label>
						<input id="email" type="email" name="email" >
					</div>
				</div>
				<div class="go-button">
					<button type="submit">Go</button>
					<?php if(isset($errors['user-exists'])) { echo ('That user already exists.');} ?>
				</div>
			</form>
		</div>
	<div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/user-validation.js"></script>

</body>
</html>
