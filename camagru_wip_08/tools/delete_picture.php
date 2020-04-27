<?php
require('use.php');
session_start();
$connect = conn_bdd();
$id_pictures = $_POST['id_pictures'];
$query = $connect->prepare('DELETE FROM PICTURES WHERE KEY_PICTURES = :id_pictures');
$query->execute(array(':id_pictures' => $id_pictures));
redirect('my_profile/my_profile.php');
?>
