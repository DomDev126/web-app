/**
 * I Have Plans -- Delete controller
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */
<?php

require_once 'includes/db.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/users.inc.php';

$user_id = $_SESSION['user-id'];
$event_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

//handle the delete click
if ( isset($_SESSION['delete-event']) ){

	delete_event ( $db, $user_id, $event_id );
	unset( $_SESSION['delete-event'] );

	header('Location: calendar.php');
	exit;

} else {

	if ( empty($user_id) ) {

		header('Location: friends.php');
		exit;

	} else {

		$friend_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

		delete_friend($db, $user_id, $friend_id); 

		header('Location: friends.php');
		exit;
	}

}

