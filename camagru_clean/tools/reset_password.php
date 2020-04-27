<?php
function reset_password($connect)
{
$key_password = md5(microtime(TRUE)*100000);
$req = $connect->prepare("UPDATE USERS SET KEY_PASSWORD = :KEY_PASSWORD WHERE LOGIN like :LOGIN");
$req->execute(array(
	'KEY_PASSWORD' => $key_password,
	'LOGIN' => htmlspecialchars($_POST['login'])
));

$login = $_POST['login'];
$req = $connect->prepare('SELECT EMAIL FROM USERS WHERE LOGIN LIKE :LOGIN');
$req->execute(array(
	'LOGIN' => htmlspecialchars($_POST['login'])
));
$user = $req->fetch(PDO::FETCH_ASSOC);
$recipient = $user['EMAIL'];
$subject = "Reset your password";
$header = "From camagru@42.fr";
$link = 'http://localhost:8080/camagru_MVC_05/forgot_password/php/reset_password.php?login='.urlencode($_POST['login']).'&key_password='.urlencode($key_password);
$message = 'Welcome to Camagru!
To reset your password, please click on the link below.'."\n".$link.'
-------------
Do not reply.';
mail($recipient, $subject, $message, $header);
}
?>
