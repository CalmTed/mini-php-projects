<!DOCTYPE html >
<html lang="en">
<head>
<title>image</title>
<style>
	img{
		border:1px solid rgb(100,100,100);
		max-width:100%;
	}
</style>
</head>
<body>
<img src="img/image1.png" alt="image">
<img src="img/image2.png" alt="image">
<img src="img/image3.png" alt="image">
<img src="img/image4.png" alt="image">
<img src="img/image5.png" alt="image">
<img src="img/image6.png" alt="image">
<img src="img/image7.png" alt="image">
<?php
$img = imagecreate(300, 300);
$background = imagecolorallocate($img,255,255,255);
$text = imagecolorallocate($img,100,100,100);
imagestring($img,2,20,20,'just do it!',$text);
imagepng($img,'img/image7.png');
imagedestroy($img);
?>
</body>
</html>