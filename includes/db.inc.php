<?php

$user = getenv('MYSQL_USERNAME');
$pass = getenv('MYSQL_PASSWORD');
$data_source = 'mysql:host=' . getenv('MYSQL_DB_HOST') . ';dbname=' . getenv('MYSQL_DB_NAME');

//PDO -> php data objects
$db = new PDO($data_source, $user, $pass);
//Make the connection to speak in UTF 8 - don't expect anything back
$db->exec('SET NAMES utf8');