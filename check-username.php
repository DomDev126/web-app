/**
 * I Have Plans -- Check user controller
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */
<?php
	
require_once 'includes/db.inc.php';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

$sql = $db->prepare('
	SELECT id
	FROM users
	WHERE username = :username

');

$sql->bindValue(':username', $username, PDO::PARAM_STR);
$sql->execute();
$results = $sql->fetch();

if(empty($results)) {

	echo 'available';

} else {

	echo 'unavailable';
}