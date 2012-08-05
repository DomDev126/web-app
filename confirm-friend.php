/**
 * I Have Plans -- Friend confirmation controller
 
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

$friend_id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_STRING);
$user_id = $_SESSION['user-id'];

//confirm the friend in the b
confirm_friends($db, $friend_id, $user_id);

//add the same entry but opposite
add_friend_id ($db, $user_id, $friend_id, 1);
	
header('Location: calendar.php');
exit;