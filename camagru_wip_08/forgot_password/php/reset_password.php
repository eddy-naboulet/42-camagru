<?php
session_start();
require('../../tools/use.php');
require_once('../../background/php/background_reset.php');
$connect = conn_bdd();
	if (!isset($_GET['login']) || $_GET['login'] == '')
		echo "An error occured";
	else{
		$query = $connect->prepare("SELECT LOGIN, KEY_PASSWORD FROM USERS WHERE LOGIN LIKE :LOGIN");
		$query->execute(array(':LOGIN' => $_GET['login']));
	}
	if ($user = $query->fetch(PDO::FETCH_ASSOC))
		{
			if ($user['KEY_PASSWORD'] != $_GET['key_password'])
				die ("An error occured");
			else
			{
				$login = $_GET['login'];
?>
				<link rel="stylesheet" type="text/css" href="../../login/css/style.css">
				<link rel="stylesheet" type="text/css" href="../css/formlogin.css">
				<link rel="stylesheet" type="text/css" href="../../create_user/css/key_frames.css">
				<link rel="stylesheet" type="text/css" href="../../create_user/css/radio.css">
				<link rel="stylesheet" type="text/css" href="../../create_user/css/class_anime.css">
				<link rel="stylesheet" type="text/css" href="../../create_user/css/msform.css">
				<link rel="stylesheet" type="text/css" href="../../create_user/css/progressbar.css">
				<form id="formPasswordReset" method="post" action="php/reset_password_server.php">
					<div class="isVisible isField">
						<h2 class="fs-title">Reset password</h2>
						<input type="password" name="password" onInput="verifPassword(this)" value="" placeholder="Password" />
						<input type="password" name="password_confirm" onInput="verifVerifPassword(this)"  value="" placeholder="Confirm Password" />
						<?php
						echo'
						<input type="hidden" name="login" value="'.$login.'" />
						';
						?>
						<input id="my_btn" type="submit" name = "submit" value="OK" title="submit" alt="submit" />
					</div>
				</form>
			</div>
			<script src="../js/reset_password.js"></script>
			<script src="../js/verif.js"></script>
<?php
		}
	}
?>
