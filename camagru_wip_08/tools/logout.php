<?php
require('use.php');
session_start();
$_SESSION['logged_in_user'] = NULL;
$_SESSION['profile_picture'] = NULL;
echo'You are now disconnected';
redirect('index.php');

?>
