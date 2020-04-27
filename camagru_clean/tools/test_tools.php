<?php
function test_email($email, $connect)
{
	$request_email = $connect->prepare("SELECT EMAIL FROM USERS WHERE EMAIL = ?");
	$request_email->execute(array($email));
	$test_email = $request_email->rowCount();
	return($test_email);
}
function test_login($login, $connect)
{
	$request_login = $connect->prepare("SELECT LOGIN FROM USERS WHERE LOGIN = ?");
	$request_login->execute(array($login));
	$test_login = $request_login->rowCount();
	return($test_login);
}
function test_password($password)
{
	$test = preg_match("#[A-Z]#", $password) + preg_match("#[a-z]#", $password) + preg_match("#[0-9]#", $password) + preg_match("#[^a-zA-Z0-9]#", $password);
	if($test == 4){
	  return (TRUE);
	}else{
		return (FALSE);
	}
}

?>
