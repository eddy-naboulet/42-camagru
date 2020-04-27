<?php
require('use.php');
$connect = conn_bdd();
$img = $connect->prepare("SELECT IMG_DATA,ID FROM PICTURES ORDER BY id DESC LIMIT 0,6");
$img->execute();
$i = 1;
while ($ret = $img->fetch())
{
	echo '
	<a href="#'.$ret['ID'].'">
		<img class="last_g" src="'.$ret['IMG_DATA'].'" />
	</a>
	<div class="lightbox short-animate" id="'.$ret['ID'].'">
		<img class="long-animate" src="'.$ret['IMG_DATA'].'" />
	</div>
	<div id="lightbox-controls" class="short-animate">
	  <a id="close-lightbox" class="long-animate" href="#!">Close Lightbox</a>
	</div>
	';
	if ($i % 3 == 0)
	echo "<br/>";
	$i++;
}
?>
