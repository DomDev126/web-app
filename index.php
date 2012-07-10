<?php

require_once 'includes/db.php';
require_once 'includes/users.php';

$errors = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($username)) {
	$errors['username'] = true;
	}

	if (empty($password)) {
	$errors['password'] = true;
	}

	if (empty($errors)) {
	$user_info = user_get($db, $username, $password);
	$user_id = $user_info['id'];
	$user_name = $user_info['username'];

	if ($user_id) {
	user_sign_in($user_id, $user_name);
		header('Location: calendar.php');
		exit;

		
	} else {
		$errors['no-user'] = true;
		}
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
			<form id="login" method="post" action="index.php">
				<h2>Login</h2>
				<div class="panel">
					<div class="panel-info">
						<label for="username">Username:</label>
						<input id="username" name="username">
					</div>
				</div>
				<div class="panel">
					<div class="panel-info">
						<label for="password">Password:</label>
						<input id="password" name="password" type="password">
					</div>
				</div>
				<div class="panel last">
					<h3>Not a member? Sign up <a href="sign-up.php">here</a>
				</div>
				<div class="go-button">
					<button type="submit">Go</button>
				</div>
			</form>
		</div>
	<div>

</body>
</html>
