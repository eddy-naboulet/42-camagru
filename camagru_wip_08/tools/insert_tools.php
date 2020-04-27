<?php
function insert_user($login, $password, $email, $fname, $lname, $choix, $connect)
{
	$key_user = md5(microtime(TRUE)*100000);
	$insert_user = $connect->prepare("INSERT INTO USERS (LOGIN, PASSWORD, EMAIL, FNAME, LNAME, PROFILE_PICTURE, KEY_USERS) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$insert_user->execute(array(htmlspecialchars($login),
								htmlspecialchars($password),
								htmlspecialchars($email),
								htmlspecialchars($fname),
								htmlspecialchars($lname),
								$choix, $key_user));
}

?>
