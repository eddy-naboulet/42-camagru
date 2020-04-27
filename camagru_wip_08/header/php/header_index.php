<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="login/css/style.css">
		<link rel="stylesheet" type="text/css" href="login/css/formlogin.css">
		<link rel="stylesheet" type="text/css" href="create_user/css/key_frames.css">
		<link rel="stylesheet" type="text/css" href="create_user/css/radio.css">
		<link rel="stylesheet" type="text/css" href="create_user/css/class_anime.css">
		<link rel="stylesheet" type="text/css" href="create_user/css/msform.css">
		<link rel="stylesheet" type="text/css" href="create_user/css/progressbar.css">
	</head>
	<body>
		<header>
			<div id="my_create_user" class="create_user">
				<a href="javascript:void(0)" class="closebtn" onclick="close_create_user()">&times;</a>
<?php
					require_once('create_user/create_user.php');
?>
			</div>
			<div id="my_login" class="login">
				<a href="javascript:void(0)" class="closebtn" onclick="close_login()">&times;</a>
<?php
					require_once('login/login.php');
?>
			</div>
			<table class="menu-2">
				<tr>
					<td id="open_create_user" class="g1 menu 001">
						<p onclick="open_create_user()">CREATE ACCOUNT</p>
					</td>
				</tr>
			</table>
			<table class="menu-1">
				<tr>
					<td id="open_login" class="g1 menu 001">
						<p onclick="open_login()">LOGIN</p>
					</td>
				</tr>
			</table>
			<table class="menu-1">
				<tr>
					<td id="open_gallery" class="g1 menu 001"> <a href="gallery/gallery.php?page=1#!">
						<p>GALLERY</p>
					</td>
				</tr>
			</table>
			<script src="create_user/js/inspect_create_user.js"></script>
			<script src="login/js/slide.js"></script>
			<script src="create_user/js/create_user.js"></script>
			<script src="login/js/login_server.js"></script>
		</header>
	</body>
</html>
