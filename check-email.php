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