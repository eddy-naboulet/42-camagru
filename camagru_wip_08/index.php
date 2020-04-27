<?php
session_start();
require('tools/use.php');

if (!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user'] =="")
{
	require_once('background/php/background_index.php');
	require_once('header/php/header_index.php');
}
else
{
	redirect('take_picture/take_picture.php');
}
?>
