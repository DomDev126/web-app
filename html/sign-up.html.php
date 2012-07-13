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
			<form  enctype="multipart/form-data" id="login" method="post" action="sign-up.php">
				<input type="hidden" name="MAX_FILE_SIZE" value ="3247685">
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
				<div class="panel">
					<div class="panel-info">
						<label for="file">Photo:</label>
						<input id="photo" type="file" name="photo" >
					</div>
				</div>
				<div class="go-button">
					<button type="submit">Go</button>
					<?php if(isset($errors['user-exists'])) { echo ('That user already exists.');} ?>
				</div>
				<a class="bottomLink"href="index.php">Already a member?</a>
			</form>
		</div>
	<div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/user-validation.js"></script>
</body>
</html>
