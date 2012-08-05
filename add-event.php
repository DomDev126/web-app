/**
 * I Have Plans -- Add event controller
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */
<?php

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

$errors = array();

if ( !user_is_signed_in() ) {

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



if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	if ( empty($title) ) {

		$errors['title'] = true;

	}

	if ( empty($location) ) {

		$errors['location'] = true;

	}



	if ( empty($errors) ) {

		try {

			//make location id
			$location_id = make_event_location ($db, $location);

			//make the event
			$event_id = make_event($db, $location_id, $title, $event_from, $event_to, $event_date);

			//make the event in the user_event table
			make_user_event($db, $user_id, $event_id, $confirmed = 1);

		} catch (Exception $e ) {
 			
			$_SESSION['db_error'] = $e;

 			header('Location: error-output.php');
			exit;

  		}

			//set this for calendar.php
			$_SESSION['event_added'] = true;
		
			 if( !empty($who_with) ){

			 	//if a friend was inputted add them	
				$has_friends = friend_check( $db, $who_with );

				//make the event
			 	make_user_event($db, $has_friends, $event_id, $confirmed = 0);
				
			}

			header('Location: calendar.php');
			exit;
	}
}

//for img display purposes
$user_info = get_username ($db, $user_id);

include "html/add-event.html.php"

?>
