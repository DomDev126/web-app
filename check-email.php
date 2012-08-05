/**
 * I Have Plans -- check-email controller
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */
<?php
	
require_once 'includes/db.inc.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

$sql = $db->prepare('
	SELECT id
	FROM users
	WHERE email = :email

');

$sql->bindValue(':email', $email, PDO::PARAM_STR);
$sql->execute();
$results = $sql->fetch();

if(empty($results)) {

	echo 'available';

} else {

	echo 'unavailable';
}