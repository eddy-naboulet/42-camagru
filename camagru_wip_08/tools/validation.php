<?php
session_start();
require('use.php');

$conn = conn_bdd();
$login = $_GET['log'];
$cle = $_GET['KEY_ACTIVE'];

$stmt = $conn->prepare("SELECT KEY_ACTIVE,ACTIVE FROM USERS WHERE LOGIN LIKE :LOGIN");
if ($stmt->execute(array(':LOGIN' => $login)) && $row = $stmt->fetch())
{
	$clebdd = $row['KEY_ACTIVE'];
	$actif = $row['ACTIVE'];
}

if ($actif == '1')
	echo "You have already activated your account !";
else
{
	if($cle == $clebdd)
	{
		echo "Your account is successfully activated !";
		$stmt = $conn->prepare("UPDATE USERS SET ACTIVE = 1 WHERE LOGIN LIKE :login");
		$stmt->bindParam(':login', $login);
		$stmt->execute();
	}
	else
		echo "Error ! your account cannot be activated...";
}
?>
