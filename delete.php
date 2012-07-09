<?php

require_once 'includes/db.php';
require_once 'includes/requests.php';
require_once 'includes/users.php';


$user_id = $_SESSION['user-id'];
$friend_id = $_SESSION['friend_id'];


var_dump($user_id);
var_dump($friend_id);

if (empty($user_id)) {
	header('Location: friends.php');
	exit;
}

delete_friend($db, $user_id, $friend_id); 


header('Location: friends.php');
exit;