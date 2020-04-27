<?php
require('../../tools/use.php');
session_start();
$connect = conn_bdd();
$author = $_SESSION['logged_in_user'];
$picture_profile_comment = $_SESSION['profile_picture'];
$comment = htmlspecialchars($_POST['id_comment']);
$id_pictures = $_POST['id_pictures'];
$author_picture = $_POST['author_picture'];
$nb_page = $_POST['nb_page'];


$insert_comment = $connect->prepare("INSERT INTO COMMENTS (ID, AUTHOR_COMMENT, COMMENT, ID_PICTURES, PROFILE_PICTURE_COMMENT) VALUES (?, ?, ?, ?, ?)");
$insert_comment->execute(array($id, $author, $comment, $id_pictures, $picture_profile_comment));

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
You have a new comment on your picture by ".$author."!
<a href=".$link.">Click here to check it
</a>
</html>";
mail($destinataire, $sujet, $message, $entete);

?>
