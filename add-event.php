<?php


require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

$errors = array();

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}


$user_id = ($_SESSION['user-id']);
$user_name = ucFirst($_SESSION['username']);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$event_date= filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$event_from = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$event_to = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$who_with = filter_input(INPUT_POST, 'who-with', FILTER_SANITIZE_STRING);
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (empty($title)) {
		$errors['title'] = true;
	}

	if (empty($location)) {
		$errors['location'] = true;
	}


	if (empty($errors)) {


		$location_id = make_event_location ($db, $location);
		$event_id = make_event($db, $location_id, $title, $event_from, $event_to, $event_date);
		make_user_event($db, $user_id, $event_id, $confirmed = 1);

		$_SESSION['event_added'] = true;

		
		 if(!empty($who_with)){

			$has_friends = friend_check( $db, $who_with );
		 	make_user_event($db, $has_friends, $event_id, $confirmed = 0);

		 	
			
		}

		header('Location: calendar.php');
		exit;
	}
}

$user_info = get_username ($db, $user_id);

include "html/add-event.html.php"


?>
