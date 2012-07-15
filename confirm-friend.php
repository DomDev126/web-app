<?php

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

$friend_id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_STRING);

$user_id = $_SESSION['user-id'];

var_dump($friend_id);
var_dump($user_id);


confirm_friends($db, $friend_id, $user_id);
add_friend_id ($db, $user_id, $friend_id, 1);
	
header('Location: calendar.php');
exit;