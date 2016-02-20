<?php
$key = $_POST['key'];
$posx = $_POST['posx'];
$posy = $_POST['posy'];
$img = imagecreatefrompng($key);
$background = @imagecreatefrompng('img/image24.png');
if(!$background){
	$background = imagecreate(1300, 600);
	$backgroundColor = imagecolorallocate($img,255,255,255);
	imagecolortransparent($background, $backgroundColor);
}
imagecopy($background, $img, $posx, $posy, 0, 0,imagesx($img),imagesy($img));
imagepng($background,'img/image24.png');
?>