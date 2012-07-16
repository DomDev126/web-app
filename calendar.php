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

include "html/calendar.html.php"

?>
