<?php
function send_email($login, $email, $connect)
{
	$key_active = md5(microtime(TRUE)*100000);
	$key = $connect->prepare("UPDATE USERS SET KEY_ACTIVE=:KEY_ACTIVE WHERE LOGIN LIKE :LOGIN");
	$key->bindParam(':KEY_ACTIVE', $key_active);
	$key->bindParam(':LOGIN', $login);
	$key->execute();
	$destinataire = $email;
	$sujet = "Activer votre compte";
	$entete = "From: inscription@camagru.com";
	$message = 'Bienvenue sur Camagru,

	Pour activer votre compte, veuillez cliquer sur le lien ci dessous
	ou copier/coller dans votre navigateur internet.
	http://localhost:8080/camagru_MVC_05/tools/validation.php?log='.urlencode($login).'&KEY_ACTIVE='.urlencode($key_active).';';
	mail($destinataire, $sujet, $message, $entete);
}
?>
