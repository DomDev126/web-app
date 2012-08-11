<?php
/**
 * I Have Plans -- error output controller
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */


require_once 'includes/users.inc.php';

$error = $_SESSION['db_error'];

include "views/output.html.php";

UNSET($_SESSION['db_error']);

?>

