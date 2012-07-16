<?php	

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';
require_once 'includes/requests.inc.php';
require_once 'includes/functions.inc.php';

$json_users = get_users_by_name( $db );

$userObjectArray = array();

foreach( $json_users as $users ) {

	$userObject = ucFirst($users['username'].' : '.$users['email']);
	$userObjectArray[] = $userObject;

}

echo (json_encode( $userObjectArray ));
