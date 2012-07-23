<?php

require_once 'includes/users.inc.php';

$error = $_SESSION['db_error'];

include "html/output.html.php";

UNSET($_SESSION['db_error']);

?>

