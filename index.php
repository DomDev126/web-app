
<?php
/*
 * I Have Plans -- Login controller
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */

require_once 'includes/db.inc.php';
require_once 'includes/users.inc.php';

$errors = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	if ( empty($username) ) {

		$errors['username'] = true;

	}

	if ( empty($password) ) {

		$errors['password'] = true;

	}

	if ( empty($errors) ) {

		$user_info = user_get($db, $username, $password);
		$user_id = $user_info['id'];
		$user_name = $user_info['username'];

		if ( $user_id ) {

			user_sign_in($user_id, $user_name);
			header('Location: calendar.php');
			exit;

		} else {

			$errors['no-user'] = true;

		}
	}
}

include "views/login.html.php"


?>