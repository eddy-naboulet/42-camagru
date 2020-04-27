<?php
require('../../tools/send_email.php');
require('../../tools/use.php');
require('../../tools/test_tools.php');
require('../../tools/insert_tools.php');
$connect = conn_bdd();
if ($_SESSION['login'] == NULL || $_SESSION['login'] == "")
{
	$login = $_POST['login'];
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$choix = $_POST['profile_picture'];
	$password = hash('whirlpool', $_POST['password']);
	$password_confirm = hash('whirlpool', $_POST['password_confirm']);
	$test_login = test_login($login, $connect);
	$test_email = test_email($email, $connect);
  	if ($_POST['login'] != NULL && $_POST['password'] != NULL  && $_POST['password_confirm'] != NULL && $_POST['email'])
	{
		if ($test_login == 0)
		{
			if ($test_email == 0)
			{
				if ($password == $password_confirm)
				{
					insert_user($login, $password, $email, $fname, $lname, $choix, $connect);
					send_email($login, $email, $connect);
					echo "Account successfully created";
				}
				else
				{
					http_response_code(201);
					echo "The passwords do not match";
				}
			}
			else
			{
				http_response_code(201);
				echo "Email address is already in use";
			}
		}
		else
		{
			http_response_code(201);
			echo "Login is already in use";
		}
	}
	else
	{
		http_response_code(201);
		echo "Empty";
	}
}
?>
