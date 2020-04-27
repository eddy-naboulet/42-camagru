<?php
session_start();
require('../../tools/use.php');
require('../../tools/search_tools.php');
$connect = conn_bdd();
$login = htmlspecialchars($_POST['login']);
$password = hash('whirlpool', $_POST['password']);
$search_login = search_login($login, $connect);
$search_password = search_password($password, $login, $connect);
$search_active = search_active($login, $connect);
$search_profile_picture = search_profile_picture($login, $connect);
if ($_POST['login'] != NULL && $_POST['login'] != "" && $_POST['password'] != "" &&  $_POST['password'] != NULL && $_SESSION['login'] == NULL)
{
	if ($search_login == '1')
	{
		if ($search_password == '1')
		{
			if ($search_active == 1)
			{
				$_SESSION['logged_in_user'] = strtolower($_POST['login']);
				$_SESSION['profile_picture'] = $search_profile_picture['PROFILE_PICTURE'];
				echo "Successfully logged in";
			}
			else
			{
				echo "Account not active";
			}
		}
		else
		{
			echo "Wrong password";
		}
	}
	else
	{
		echo "Wrong login";
	}
}
else
{
	echo "Empty fields";
}
?>
