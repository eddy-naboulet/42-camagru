<?php
require('../../tools/use.php');
require('../../tools/search_tools.php');
session_start();
$connect = conn_bdd();
$author = $_SESSION['logged_in_user'];
$id_pictures = $_POST['id_pictures'];
$author_picture = $_POST['author_picture'];
$nb_page = $_POST['nb_page'];
$search_like = search_like($author, $id_pictures, $connect);
if ($search_like["TOTAL"] == '0')
{
	$insert_like = $connect->prepare("INSERT INTO LIKES (ID, ID_PICTURES, AUTHOR_LIKE) VALUES (?, ?, ?)");
	$insert_like->execute(array($id, $id_pictures, $author));
	$send_mail = $connect->prepare('SELECT EMAIL FROM USERS WHERE LOGIN ="'.$author_picture.'"');
	$send_mail->execute();
	$search_mail = $send_mail->fetch();

	$link = "http://localhost:8080/camagru_MVC_05/gallery/gallery.php?page=".$nb_page."#".$id_pictures;
	$destinataire = $search_mail['EMAIL'];
	$sujet = "Camagru Notification";
	$entete = "From: notification@camagru.com\r\n";
	$entete .= 'Content-Type: text/html';
	$message = "
	<html>

	Hello ".$author_picture."
	,".$author." just liked your pictures!
	<a href=".$link.">Click here to check it
	</a>
	</html>";
	mail($destinataire, $sujet, $message, $entete);
	http_response_code(200);
	echo "Liked";
}
else
{
	http_response_code(300);
	echo "you already like it";

}




?>
