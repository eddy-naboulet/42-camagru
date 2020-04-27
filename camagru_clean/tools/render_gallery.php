<?php
session_start();
require('display_tools.php');
require('select_tools.php');
require('paging_tools.php');

function render_gallery($connect)
{
	$imgparpage = 9;
	$premiereEntree = paging($connect, $imgparpage);
	$img = select_img($connect, $imgparpage, $premiereEntree);
	while ($img && $ret = $img->fetch())
	{
		$likes = select_likes($ret, $connect);
		$nb_page = $_GET['page'];
		display_gallery($ret, $nb_page, $likes);
		$author = $_SESSION['logged_in_user'];
		$author_profile_picture = $_SESSION['profile_picture'];
		display_form($ret, $nb_page, $author, $author_profile_picture);
		$comment = select_comments($ret, $connect);
		echo '<div class="comments_parent">';
		while ($ret2 = $comment->fetch())
		{
			display_comments($ret2);
		}
		echo '</div>';
		display_close_btn();
	}
}
function render_gallery_not_log($connect)
{
	$imgparpage = 9;
	$premiereEntree = paging($connect, $imgparpage);
	$img = select_img($connect, $imgparpage, $premiereEntree);
	while ($img && $ret = $img->fetch())
	{
		$likes = select_likes($ret, $connect);
		$nb_page = $_GET['page'];
		display_gallery_not_log($ret, $nb_page, $likes);
		$comment = select_comments($ret, $connect);
		echo '<div class="comments_parent">';
		while ($ret2 = $comment->fetch())
		{
			display_comments($ret2);
		}
		echo '</div>';
		display_close_btn();
	}
}
function render_gallery_my_profile($connect, $author)
{
	$imgparpage = 9;
	$premiereEntree = paging_my_profile($connect, $imgparpage, $author);
	$img = select_img_my_profile($connect, $imgparpage, $premiereEntree, $author);
	while ($img && $ret = $img->fetch())
	{
		$likes = select_likes($ret, $connect);
		$nb_page = $_GET['page'];
		display_gallery_my_profile($ret, $nb_page, $likes);
		$author = $_SESSION['logged_in_user'];
		$author_profile_picture = $_SESSION['profile_picture'];
		display_form($ret, $nb_page, $author, $author_profile_picture);
		$comment = select_comments($ret, $connect);
		echo '<div class="comments_parent">';
		while ($ret2 = $comment->fetch())
		{
			display_comments($ret2);
		}
		echo '</div>';
		display_close_btn();
	}
}
?>
