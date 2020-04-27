<?php
session_start();
require('../tools/use.php');
require_once('../background/php/background_forgot.php');
if (!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user'] =="")
{
	redirect('index.php');
}
else
{


?>
<link rel="stylesheet" type="text/css" href="../login/css/style.css">
<link rel="stylesheet" type="text/css" href="css/formlogin.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/key_frames.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/radio.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/class_anime.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/msform.css">
<link rel="stylesheet" type="text/css" href="../create_user/css/progressbar.css">

<form id="formPassword" method="post" action="php/delete_account_server.php">
	<div class="isVisible isField">
		<h2 class="fs-title">Delete Account</h2>
		<input type="text" name="delete_a" onInput="verifDelete(this)" value="" placeholder="delete" />
		<input type="hidden" name="delete_c" value="delete" />
		<input id="my_btn" type="submit" name = "submit" value="OK" title="submit" alt="submit" />
	</div>
</form>
</div>
<script src="js/reset_password.js"></script>
<script src="js/verif.js"></script>
<?php
}
?>
