<?php

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}

$_SESSION['visited'] = true;

$raw_email= filter_input(INPUT_POST, 'addEmail', FILTER_SANITIZE_STRING);


$user_id = ($_SESSION['user-id']);

$user_info = get_username ($db, $user_id);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	preg_match('/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i', $raw_email, $matches);

	$email = $matches[0];

	$errors = array();

	if(isset($email)) {
		$friend_id =  friend_email_check($db, $email);
	}

	if(!$friend_id){
		$errors['no-user'] = true;
	}

	if($friend_id) {

		$friendAlready = check_friend_id ($db, $user_id, $friend_id);
		if(!$friendAlready && $friend_id !== $user_id){

		add_friend_id ($db, $user_id, $friend_id, 0);

		$_SESSION['friend-request'] = true;
		
		header('Location: friends.php');
		exit;
	
		}
	}




}

include "html/friends.html.php";

?>