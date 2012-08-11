<?php
/**
 * I Have Plans -- Event controller
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */


require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';

if ( !user_is_signed_in() ) {

	header('Location: index.php');
	exit;

}

$user_id = $_SESSION['user-id'];
$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

//get the event information
$event_info = get_event_loc_title ( $db, $event_id );

//get the location
$location = get_location ( $db, $event_info['location_id'] );

//get event users
$confirmed_user_ids = get_event_user ( $db, $event_id );

//get event date
$event_date = get_event_date ( $db, $event_id ) ;

//fix date to our liking
$date = $event_date[0][2];

$day = date("l", strtotime($date));
$day_month = substr($date, 0, 5);
$date_string = $day.' '.$day_month.' at '. $event_date[0][1];


//handle the confirmed click
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$ok = update_user_confirmation ( $db, $user_id, $event_id );

	$_SESSION['confirmed'] = true;

	header('Location: calendar.php');
	exit;
}

include "views/event.html.php";

?>
