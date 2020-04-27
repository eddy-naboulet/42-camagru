<?php
function redirect($url)
{
	$rootpath = array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1);
	echo '<META HTTP-EQUIV="Refresh" Content="1; URL=/' . $rootpath[1] ."/". $url . '">';
}

function conn_bdd()
{
	$DB_USER = "enaboule";
	$DB_PASSWORD = "dtqEb8F6xas9J4Kp";
	$DB_NAME = "camgru";
	$DB_DSN = "mysql:host=138.68.111.194;dbname=camgru;charset=utf8;";
try{
	$sql_co = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql_co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOexception $e)
	{
		echo $sql . "<br>" . $e->getMessage();
		die();
	}
	return ($sql_co);
}
?>
