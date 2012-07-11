<?php

require_once 'includes/db.php';
require_once 'includes/requests.php';
require_once 'includes/users.php';


$user_id = $_SESSION['user-id'];
$friend_id = $_SESSION['friend_id'];
$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

var_dump($_SESSION['delete-event']);


if(isset($_SESSION['delete-event'])){

	delete_event ($db, $user_id, $event_id);
	unset($_SESSION['delete-event']);

	header('Location: calendar.php');
	exit;

}	else {

	if (empty($user_id)) {
		header('Location: friends.php');
		exit;
	}

	delete_friend($db, $user_id, $friend_id); 

	header('Location: friends.php');
	exit;

}

