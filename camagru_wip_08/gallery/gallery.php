<?php
session_start();
require('../tools/use.php');
require('../tools/render_gallery.php');
$connect = conn_bdd();
if (!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user'] =="")
{
	require_once('../header/php/header_gallery.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GALLERY</title>
		<link rel="stylesheet" type="text/css" href="css/ff_selector.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox2.css">
		<link rel="stylesheet" type="text/css" href="css/comment_box.css">

	</head>
	<body>
		<div class="center">
		<section class="ff-container">
			<input id="select-type-all" name="radio-set-1" type="radio" class="ff-selector-type-all inp" checked="checked" />
			<label for="select-type-all" class="ff-label-type-all btn">All</label>

			<input id="select-type-1" name="radio-set-1" type="radio" class="ff-selector-type-1 btn inp" value="Richard" />
			<label for="select-type-1" class="ff-label-type-1 btn">Richard</label>

			<input id="select-type-2" name="radio-set-1" type="radio" class="ff-selector-type-2 btn inp" value="Peter" />
			<label for="select-type-2" class="ff-label-type-2 btn">Peter</label>

			<input id="select-type-3" name="radio-set-1" type="radio" class="ff-selector-type-3 btn inp" value="Rasmus" />
			<label for="select-type-3" class="ff-label-type-3 btn">Rasmus</label>

			<input id="select-type-4" name="radio-set-1" type="radio" class="ff-selector-type-4 btn inp" value="Aubrey" />
			<label for="select-type-4" class="ff-label-type-4 btn">Aubrey</label>

			<input id="select-type-5" name="radio-set-1" type="radio" class="ff-selector-type-5 btn inp" value="Charlie" />
			<label for="select-type-5" class="ff-label-type-5 btn">Charlie</label>

			<input id="select-type-6" name="radio-set-1" type="radio" class="ff-selector-type-6 btn inp" value="Dennis" />
			<label for="select-type-6" class="ff-label-type-6 btn">Dennis</label>

			<input id="select-type-7" name="radio-set-1" type="radio" class="ff-selector-type-7 btn inp" value="Earl" />
			<label for="select-type-7" class="ff-label-type-7 btn">Earl</label>

			<input id="select-type-8" name="radio-set-1" type="radio" class="ff-selector-type-8 btn inp" value="Graham" />
			<label for="select-type-8" class="ff-label-type-8 btn">Graham</label>
		<ul class="ff-items">
			<?php
			render_gallery_not_log($connect);
			?>
		</ul>
		<?php
			display_paging($connect);
		?>
	</section>
</div>
<script src="js/like.js"></script>
<script src="js/comments.js"></script>
</html>

<?php
}
else
{
	require_once('../header/php/header.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GALLERY</title>
		<link rel="stylesheet" type="text/css" href="css/ff_selector.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox2.css">
		<link rel="stylesheet" type="text/css" href="css/comment_box.css">

	</head>
	<body>
		<div class="center">
		<section class="ff-container">
			<input id="select-type-all" name="radio-set-1" type="radio" class="ff-selector-type-all inp" checked="checked" />
			<label for="select-type-all" class="ff-label-type-all btn">All</label>

			<input id="select-type-1" name="radio-set-1" type="radio" class="ff-selector-type-1 btn inp" value="Richard" />
			<label for="select-type-1" class="ff-label-type-1 btn">Richard</label>

			<input id="select-type-2" name="radio-set-1" type="radio" class="ff-selector-type-2 btn inp" value="Peter" />
			<label for="select-type-2" class="ff-label-type-2 btn">Peter</label>

			<input id="select-type-3" name="radio-set-1" type="radio" class="ff-selector-type-3 btn inp" value="Rasmus" />
			<label for="select-type-3" class="ff-label-type-3 btn">Rasmus</label>

			<input id="select-type-4" name="radio-set-1" type="radio" class="ff-selector-type-4 btn inp" value="Aubrey" />
			<label for="select-type-4" class="ff-label-type-4 btn">Aubrey</label>

			<input id="select-type-5" name="radio-set-1" type="radio" class="ff-selector-type-5 btn inp" value="Charlie" />
			<label for="select-type-5" class="ff-label-type-5 btn">Charlie</label>

			<input id="select-type-6" name="radio-set-1" type="radio" class="ff-selector-type-6 btn inp" value="Dennis" />
			<label for="select-type-6" class="ff-label-type-6 btn">Dennis</label>

			<input id="select-type-7" name="radio-set-1" type="radio" class="ff-selector-type-7 btn inp" value="Earl" />
			<label for="select-type-7" class="ff-label-type-7 btn">Earl</label>

			<input id="select-type-8" name="radio-set-1" type="radio" class="ff-selector-type-8 btn inp" value="Graham" />
			<label for="select-type-8" class="ff-label-type-8 btn">Graham</label>
		<ul class="ff-items">
			<?php
			render_gallery($connect);
			?>
		</ul>
		<?php
			display_paging($connect);
		?>
	</section>
</div>
<script src="js/like.js"></script>
<script src="js/comments.js"></script>
</html>
<?php
}
?>
