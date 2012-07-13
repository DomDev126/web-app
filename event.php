<?php

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}

$user_id = $_SESSION['user-id'];
$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$event_info = get_event_loc_title ($db, $event_id);

$location_id = $event_info['location_id'];

$location = get_location($db, $location_id);

$confirmed_user_ids = get_event_user ($db, $event_id);

$event_date = get_event_date ($db, $event_id ) ;

$date = $event_date[0][2];
$day = date("l", strtotime($date));
$day_month = substr($date, 0, 5);
$date_string = $day.' '.$day_month.' at '. $event_date[0][0];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);


	$ok = update_user_confirmation($db, $user_id, $event_id);

	$_SESSION['confirmed'] = true;


	header('Location: calendar.php');
	exit;
}


include "html/event.html.php";

?>
