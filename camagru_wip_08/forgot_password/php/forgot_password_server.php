<?php
session_start();
require('../../tools/use.php');
require('../../tools/search_tools.php');
require('../../tools/reset_password.php');
$connect = conn_bdd();
$login = $_POST['login'];
$search_login = search_login($login, $connect);
$search_active = search_active($login, $connect);
if ($_POST['login'] != NULL &&  $_SESSION['login'] == NULL)
{
	if ($search_login == '1')
		{
			if ($search_active == 1)
			{
				reset_password($connect);
				echo "email send";
			}
			else
			{
				echo "Account not active";
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
