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
	require_once('../header/php/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/take_picture.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/select_masks.css">
</head>
<body>
</table>
<div class="center">
	<table class="vd" id="parent">
		<tr id="testspan8">
			<td id="testspan" class="">
				<video id="video"></video>
				<img id="Richard" class="prev" src="../sources/take_picture/mask_01.png" width="270" height="270"/>
				<img id="Peter" class="prev" src="../sources/take_picture/mask_02.png" width="270" height="270"/>
				<img id="Rasmus" class="prev" src="../sources/take_picture/mask_03.png" width="270" height="270"/>
				<img id="Aubrey" class="prev" src="../sources/take_picture/mask_04.png" width="270" height="270"/>
				<img id="Charlie" class="prev" src="../sources/take_picture/mask_05.png" width="270" height="270"/>
				<img id="Dennis" class="prev" src="../sources/take_picture/mask_06.png" width="270" height="270"/>
				<img id="Earl" class="prev" src="../sources/take_picture/mask_07.png" width="270" height="270"/>
				<img id="Graham" class="prev" src="../sources/take_picture/mask_08.png" width="270" height="270"/>
			</td>
			<td id="testspan2" class="none">
				<img src=""class="lolilol" id="img_upload" alt="photo" width="600" height="450">
				<img id="Richard" class="prev" src="../sources/take_picture/mask_01.png" width="270" height="270"/>
				<img id="Peter" class="prev" src="../sources/take_picture/mask_02.png" width="270" height="270"/>
				<img id="Rasmus" class="prev" src="../sources/take_picture/mask_03.png" width="270" height="270"/>
				<img id="Aubrey" class="prev" src="../sources/take_picture/mask_04.png" width="270" height="270"/>
				<img id="Charlie" class="prev" src="../sources/take_picture/mask_05.png" width="270" height="270"/>
				<img id="Dennis" class="prev" src="../sources/take_picture/mask_06.png" width="270" height="270"/>
				<img id="Earl" class="prev" src="../sources/take_picture/mask_07.png" width="270" height="270"/>
				<img id="Graham" class="prev" src="../sources/take_picture/mask_08.png" width="270" height="270"/>
			</td>
			<td>
				<img src="" id="photo" alt="photo" width="600" height="450">
			</td>
		</tr>
	</table>
	<table class="vd">
		<form id="tkp">
			<tr>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_01.png" id="Richard"/>
						<img id="Richard" src="../sources/take_picture/mask_01.png" width="100" height="100"/>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_02.png" id="Peter"/>
						<img id="Peter" src="../sources/take_picture/mask_02.png" width="100" height="100"/>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_03.png" id="Rasmus"/>
						<img id="Rasmus" src="../sources/take_picture/mask_03.png" width="100" height="100"/>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_04.png" id="Aubrey"/>
						<img id="Aubrey" src="../sources/take_picture/mask_04.png" width="100" height="100"/>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_05.png" id="Charlie"/>
						<img id="Charlie" src="../sources/take_picture/mask_05.png" width="100" height="100"/>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_06.png" id="Dennis"/>
						<img id="Dennis" src="../sources/take_picture/mask_06.png" width="100" height="100"/>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_07.png" id="Earl"/>
						<img id="Earl" src="../sources/take_picture/mask_07.png" width="100" height="100"/>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" onclick="prev_filter(this.id)" name="mask" value="../sources/take_picture/mask_08.png" id="Graham"/>
						<img id="Graham" src="../sources/take_picture/mask_08.png" width="100" height="100"/>
					</label>
				</td>
			</tr>
			<input type="submit" class="btn fil-cat" name="submit" id="startbutton"  value="Submit" />
			<input id="ouais" type="file" class="btn fil-cat" name="file" id="upload"  onchange="img_upload_prev()" />
		</form>
	</table>

	<div class="gallery" id="gallery">

		<?php
		$connect = conn_bdd();
		$img = $connect->query("SELECT IMG_DATA,ID FROM PICTURES ORDER BY id DESC LIMIT 0,6");
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
	</div>
	<canvas id="canvas" style="display: none"></canvas>
	<script src="js/camagru.js"></script>
	<script src="js/prev_filter.js"></script>
	<!-- <script src="js/lightbox.js"></script> -->
</body>
</html>

<?php
}
?>
