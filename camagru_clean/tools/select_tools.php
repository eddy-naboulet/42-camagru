<?php
function select_img($connect, $imgparpage, $premiereEntree)
{
	if ($premiereEntree >= 0 && $imgparpage)
	{
		// die ('SELECT IMG_DATA,ID,MASK_NAME,CREATE_DATE_PICTURE,KEY_PICTURES,AUTHOR_PICTURE FROM PICTURES ORDER BY id DESC LIMIT '.$premiereEntree.', '.$imgparpage);
		$img = $connect->prepare('SELECT IMG_DATA,ID,MASK_NAME,CREATE_DATE_PICTURE,KEY_PICTURES,AUTHOR_PICTURE FROM PICTURES ORDER BY id DESC LIMIT '.$premiereEntree.', '.$imgparpage);
		$img->execute();
		return ($img);
	}
	return (NULL);
}
function select_img_my_profile($connect, $imgparpage, $premiereEntree, $author)
{
	if ($premiereEntree >= 0 && $imgparpage)
	{
		// $img = $connect->prepare('SELECT IMG_DATA,ID,MASK_NAME,CREATE_DATE_PICTURE,KEY_PICTURES,AUTHOR_PICTURE FROM PICTURES WHERE AUTHOR_PICTURE='.$author.' ORDER BY id DESC LIMIT '.$premiereEntree.', '.$imgparpage);
		$img = $connect->prepare('SELECT IMG_DATA,ID,MASK_NAME,CREATE_DATE_PICTURE,KEY_PICTURES,AUTHOR_PICTURE FROM PICTURES WHERE AUTHOR_PICTURE= :author ORDER BY id DESC LIMIT '.$premiereEntree.', '.$imgparpage);
		$img->execute(array(':author' => $author));
		return ($img);
	}
	return (NULL);
}
function select_comments($ret, $connect)
{
	$id_pict = $ret['KEY_PICTURES'];
	$img2 = $_SESSION['profile_picture'];
	$comment = $connect->prepare('SELECT DISTINCT AUTHOR_COMMENT,COMMENT,ID_PICTURES,CREATE_DATE_COMMENT,PROFILE_PICTURE_COMMENT FROM COMMENTS,PICTURES  WHERE COMMENTS.ID_PICTURES="'.$id_pict.'"');
	$comment->execute();
	return ($comment);

}
function select_likes($ret, $connect)
{
	$id_pict = $ret['KEY_PICTURES'];
	$retour_total = $connect->query('SELECT COUNT(*) AS total FROM LIKES WHERE ID_PICTURES="'.$id_pict.'"');
	while ($req2 = $retour_total->fetch())
		$total2 = $req2['total'];
		return($total2);

}
 ?>
