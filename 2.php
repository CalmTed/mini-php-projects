<!DOCTYPE html >
<html lang="en">
<head>
<title>creating transparent image image</title>
<style>
	img{
		border:1px solid rgba(100,100,100,0.5);
		max-width:100%;
	}
	background{
		background: rgb(200, 200, 200);
	}
</style>
</head>
<body>
<img src="input/1.png" alt="image">
<img src="input/2.png" alt="image">
<br>
<img src="img/image21.png" alt="image">
<img src="img/image22.png" alt="image">
<img src="img/image23.png" alt="image">
<?php
//$key = $_POST['key'];
//$posx = $_POST['posx'];
//$posy = $_POST['posy'];
$key = '2';
$posx = 128;
$posy = 128;
$img = imagecreatefrompng('input/'.$key.'.png');
$backgroundColor = imagecolorallocate($img,255,255,255);
$background = @imagecreatefrompng('img/image23.png');
if(!$background){
	$background = imagecreate(1300, 600);
	imagecolortransparent($background, $backgroundColor);
}/*
$output = imagecreate(imagesx($background),imagesy($background));
// $output = $background;
//imagecopy($output,$background,0,0,0, 0,imagesx($background),imagesy($background));
//imagecolortransparent($output, $backgroundColor);
//imagecopy($output, $img, $posx, $posy, 0, 0,imagesx($img),imagesy($img));
imagedestroy($img);
imagedestroy($background);
imagedestroy($output);*/
imagecopy($background, $img, $posx, $posy, 0, 0,imagesx($img),imagesy($img));
imagepng($background,'img/image23.png');
?>
</body>
</html>