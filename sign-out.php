<?php

require_once 'includes/users.inc.php';

user_sign_out();
header('Location: index.php');