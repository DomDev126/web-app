/**
 * I Have Plans --Check-friend controller
 
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

$requestType = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

	
	if($requestType == "all-users") {

		$json_users = get_users_by_name( $db );

		$userObjectArray = array();

		foreach( $json_users as $users ) {

			$userObject = ucFirst($users['username'].' : '.$users['email']);
			$userObjectArray[] = $userObject;

		}

		echo (json_encode( $userObjectArray ));


	}

	if($requestType == "friends") {

		$friend_ids = get_friend_ids($db, $_SESSION['user-id']);

		foreach($friend_ids as $friends) {

			if($friends[0] !== $_SESSION['user-id']){

				$current_friend = intval($friends['friend_id']);
	
				$friend_info = get_username ($db, $current_friend);

				$json_users[] = $friend_info['username'];
		 	
		 	}

		 }

		echo (json_encode( $json_users));


	}