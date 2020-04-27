<?php
require('../../tools/use.php');
session_start();
if (!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user'] == "") {
		echo 'An error occured';
	}
	else
	{
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<title>Delete account</title>
			</head>
			<body>
		<?php
		if ($_POST['delete_a'] == "delete")
		{
			$connect = conn_bdd();
			$query = $connect->prepare("DELETE FROM USERS WHERE LOGIN LIKE :LOGIN");
			$query->execute(array(':LOGIN' => $_SESSION['logged_in_user']));
			$query = $connect->prepare("DELETE FROM PICTURES WHERE AUTHOR_PICTURE LIKE :LOGIN");
			$query->execute(array(':LOGIN' => $_SESSION['logged_in_user']));
			$query = $connect->prepare("DELETE FROM COMMENTS WHERE AUTHOR_COMMENT LIKE :LOGIN");
			$query->execute(array(':LOGIN' => $_SESSION['logged_in_user']));
			$query = $connect->prepare("DELETE FROM LIKES WHERE AUTHOR_LIKE LIKE :LOGIN");
			$query->execute(array(':LOGIN' => $_SESSION['logged_in_user']));


			$_SESSION['logged_in_user'] = NULL;
			$_SESSION['profile_picture'] = NULL;
				echo'Your account has been deleted';
		}
		else
		{
			echo'An error occured';
		}
	}
?>
		</body>
</html>
