<?php
function count_pictures($connect, $author)
{
	$count_pictures = $connect->query('SELECT COUNT(*) AS total FROM PICTURES WHERE AUTHOR_PICTURE ="'.$author.'"');
	while ($count = $count_pictures->fetch())
		$total_pictures = $count['total'];
	return($total_pictures);
}
function count_comments($connect, $author)
{
	$count_comments = $connect->query('SELECT COUNT(*) AS total FROM COMMENTS WHERE AUTHOR_COMMENT ="'.$author.'"');
	while ($count = $count_comments->fetch())
		$total_comments = $count['total'];
	return($total_comments);
}
function count_likes($connect, $author)
{
	$count_likes = $connect->query('SELECT COUNT(*) AS total FROM LIKES WHERE AUTHOR_LIKE ="'.$author.'"');
	while ($count = $count_likes->fetch())
		$total_likes = $count['total'];
	return($total_likes);
}
?>
