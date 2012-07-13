<?php

require_once 'includes/db.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/users.inc.php';

$user_id = $_SESSION['user-id'];
$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if (isset($_SESSION['delete-event'])){

	delete_event ($db, $user_id, $event_id);
	unset($_SESSION['delete-event']);

	header('Location: calendar.php');
	exit;

} else {

	if (empty($user_id)) {
		header('Location: friends.php');
		exit;
	} else {

		$friend_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

		delete_friend($db, $user_id, $friend_id); 

		header('Location: friends.php');
		exit;
	}

}

