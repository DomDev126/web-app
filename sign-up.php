<?php

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

$errors = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	$file_tmp = $_FILES['photo']['tmp_name'];


	//check to make sure the name doesn't already exist
	$name_check = friend_check( $db, $username );

	if( $name_check ) {

		$errors['user-exists'] = true;

	}

	if ( empty($username) ) {

		$errors['username'] = true;

	}

	if ( empty($password) ) {

		$errors['password'] = true;

	}

	if ( $email.length < 2 || $email.length > 50 ) {

		$errors['email'] = true;

	}

	if ( empty($errors) ) {

		if ( $_FILES['photo']['name'] == "" ) {
			//if no pic set it to default pic
			$photo_name = "nopic.jpg";

		} else {

			$photo_name = stripslashes( $_FILES['photo']['name'] );

		}
		
		// create the user
		$id = user_create($db, $username, $password, $email, $photo_name);

		var_dump($id);

		//resize and move the screenshot to the images folder
		if($_FILES['photo']['name'] !== "" ) {

			image_resize_move($file_tmp, $photo_name);
		}
		
		header('Location: index.php');
		exit;

	}
}

include "html/sign-up.html.php";

?>
