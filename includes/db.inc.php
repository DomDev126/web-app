<?php
/**
 * I Have Plans -- Database connection / commented out set for phpfog
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */


$user = getenv('MYSQL_USERNAME');
$pass = getenv('MYSQL_PASSWORD');
$name= getenv('MYSQL_DB_NAME');
$host= getenv('MYSQL_DB_HOST');


$data_source = sprintf('mysql:host=%s;dbname=%s', $host, $name );


//PDO -> php data objects
$db = new PDO($data_source, $user, $pass);
//Make the connection to speak in UTF 8 - don't expect anything back
$db->exec('SET NAMES utf8');