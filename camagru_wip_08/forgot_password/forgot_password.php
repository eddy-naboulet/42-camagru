<?php
session_start();
require_once('../background/php/background_forgot.php');
?>
<link rel="stylesheet" type="text/css" href="../login/css/style.css">
<link rel="stylesheet" type="text/css" href="css/formlogin.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/key_frames.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/radio.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/class_anime.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/msform.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/progressbar.css">

<form id="formPassword" method="post" action="php/forgot_password_server.php">
	<div class="isVisible isField">
		<h2 class="fs-title">Forgot password</h2>
		<input type="text" name="login" value="" placeholder="Login" />
		<input id="my_btn" type="submit" name = "submit" value="OK" title="submit" alt="submit" />
	</div>
</form>
</div>
<script src="js/forgot_password.js"></script>
