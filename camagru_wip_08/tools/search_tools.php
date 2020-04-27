<?php
function search_active($login, $connect)
{
	$stmt = $connect->prepare("SELECT ACTIVE FROM USERS WHERE LOGIN LIKE :login");
	if ($stmt->execute(array(':login' => $login)) && $row = $stmt->fetch())
	{
		$active = $row['ACTIVE'];
	}
	return($active);
}
function search_login($login, $connect)
{
	$requete_login = $connect->prepare("SELECT LOGIN FROM USERS WHERE LOGIN = :login");
	$requete_login->execute(array(':login' => $login));
	$search_login = $requete_login->rowCount();
	return($search_login);
}
function search_password($password, $login, $connect)
{
	$requete_password = $connect->prepare("SELECT PASSWORD,LOGIN FROM USERS WHERE PASSWORD = :password AND LOGIN = :login");
	$requete_password->execute(array(':password' => $password, ':login' => $login));
	$search_password = $requete_password->rowCount();
	return($search_password);
}
function search_profile_picture($login, $connect)
{
	$requete_profile_picture = $connect->query('SELECT PROFILE_PICTURE FROM USERS WHERE LOGIN ="'.$login.'"');
	$search_profile_picture = $requete_profile_picture->fetch();
	return($search_profile_picture);
}
function search_like($author, $id_pictures, $connect)
{
	$requete_like = $connect->prepare("SELECT COUNT(*) AS TOTAL FROM LIKES WHERE AUTHOR_LIKE = :AUTHOR AND ID_PICTURES = :ID_PICTURES");
	$requete_like->execute(array(':AUTHOR' => $author, ':ID_PICTURES' => $id_pictures));
	$total = $requete_like->fetch(PDO::FETCH_ASSOC);
	return($total);
}
function search_info($connect, $author)
{
	$fname = $connect->query("SELECT FNAME,LNAME,EMAIL,CREATE_DATE FROM USERS WHERE LOGIN='".$author."'");
	$search_info = $fname->fetch();
	return($search_info);
}
?>
