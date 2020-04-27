<?php
require('use.php');
session_start();
header('Content-Type: image/png');
$imageData = (array)json_decode(file_get_contents('php://input'));
$filteredData=substr($imageData['img'], strpos($imageData['img'], ",") + 1);
$no_filteredData=base64_decode($filteredData);
$filter = imagecreatefrompng($imageData['mask']);

$pict = @imagecreatefromstring($no_filteredData);
if (!$pict)
{
	die('error');

}
else
{

$wid = imagesx($pict);
$hei = imagesy($pict);
if ($wid == 0 || $hei == 0)
{
	// echo "error";
	return ;
}
// imagecopyresized($pict, $filter, 100, 0, 0, 0, 150, 150, 270, 270);
imagecopy($pict, $filter, 152, 78, 0, 0, 270, 270);
ob_start();
imagepng($pict);
$content = ob_get_contents();
ob_end_clean();
$dataUri = "data:image/png;base64," . base64_encode($content);
echo($dataUri);

$conn = conn_bdd();
$author = $_SESSION['logged_in_user'];
$cle = md5(microtime(TRUE)*100000);
$cle_2 = md5(microtime(TRUE)*100000);
$MASK_NAME = $imageData['mask_name'];
$sql = $conn->prepare("INSERT INTO PICTURES (IMG_DATA, KEY_PICTURES, KEY_USERS, MASK_NAME, AUTHOR_PICTURE) VALUES (?, ?, ?, ?, ?)");
$sql->execute(array($dataUri, $cle, $cle_2, $MASK_NAME, $author));
// var_dump($filteredData);
}
?>
