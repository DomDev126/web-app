<?php

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

if (!user_is_signed_in()) {
	header('Location: index.php');
	exit;
}

$user_id = $_SESSION['user-id'];
$user_info = get_username ($db, $user_id);
$event_array = check_schedule($db,$user_id);



$list_view_events = check_all_events ($db, $user_id) ;

//var_dump($list_view_events);


if(isset($_POST['list-post'])) {

	$_SESSION['list-view'] = true;

}

if(isset($_POST['calendar-post'])) {
	
	unset($_SESSION['list-view']);

}



include "html/calendar.html.php"

?>
