<?php
session_start();
require('../../tools/use.php');
require('../../tools/search_tools.php');
require('../../tools/reset_password.php');
$connect = conn_bdd();
$query = $connect->prepare("UPDATE USERS SET PASSWORD = :PASSWORD WHERE LOGIN LIKE :LOGIN");
$query->execute(array(':PASSWORD' => hash('whirlpool', $_POST['password']), ':LOGIN' => $_POST['login']));
		echo "Your password has been updated";
?>
