<?php
session_start();
require('../tools/use.php');
require('../tools/footer.php');

if (!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user'] =="")
{
	redirect('index.php');
}
else
{
	require_once('../header/php/header_my_profile.php');
	require('../tools/search_tools.php');
	require('../tools/count_tools.php');
	// require('../tools/display_tools.php');
	require('../tools/render_gallery.php');


?>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/ff_selector.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox2.css">
		<link rel="stylesheet" type="text/css" href="css/comment_box.css">

	</head>
	<body>
		<?php
		$connect = conn_bdd();
		$author = $_SESSION['logged_in_user'];

		$total_pictures = count_pictures($connect, $author);
		$total_comments = count_comments($connect, $author);
		$total_likes = count_likes($connect, $author);
		$search_info = search_info($connect, $author);
		display_info_my_profile($total_pictures, $total_comments, $total_likes, $search_info);

		?>
		<section class="ff-container">
		<ul class="ff-items">
			<?php
			render_gallery_my_profile($connect, $author);
			?>
		</ul>
		<?php
		display_paging_my_profile($connect, $author);
		?>
	</section>
</div>
<script src="js/like.js"></script>
<script src="js/comments.js"></script>

</html>
<?php
}
?>
