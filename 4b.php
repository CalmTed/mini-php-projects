<!DOCTYPE html >
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="stiker editor with jQuery and ajax">
	<meta name="copyright" Content="TeddyFrost">
	<meta name="Robots" content="INDEX,NOFOLLOW">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Scaled image</title>
	<link rel="shortcut icon" href="img/ISlogo.ico">
	<link rel="stylesheet" type="text/css" href="css/4bstyle.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<?php
if (($_FILES["file"]["size"] < 2000000)){
	if($_FILES['file']['type'] == "image/png"){$ext = "png";
	}elseif($_FILES['file']['type'] == "image/jpeg"){$ext = "jpg";
	}elseif($_FILES['file']['type'] == "image/jpg"){$ext = "jpg";
	}else{$ext = "gif";}
	if ($_FILES["file"]["error"] > 0){
		echo "Error Code: " . $_FILES["file"]["error"];
	}else{
		$newname = '';
		if (file_exists("uploaded/" . $_FILES["file"]["name"])){
			$r = rand(100000,999999);
			$newname = $r .'-'. $_FILES["file"]["name"];
		}else{
			$newname = $_FILES["file"]["name"];	
		}
		move_uploaded_file($_FILES["file"]["tmp_name"], "uploaded/" . $newname);
		
		if (isset($_POST['width']) && isset($_POST['height']) && isset($_POST['sizemeasure'])) {//did he want to scale it
			$w = $_POST['width'];
			$h = $_POST['height'];
			$s = $_POST['sizemeasure'];
			if($ext == 'jpg'){
				$img = imagecreatefromjpeg("uploaded/" . $newname);
			}elseif($ext == 'png'){
				$img = imagecreatefrompng("uploaded/" . $newname);
			}else{
				$img = imagecreatefromgif("uploaded/" . $newname);
			}
			$iw = imagesx($img);
			$ih = imagesy($img);
			if($s == 'persent'){
				$sw = ($iw / 100) * $w;
				$sh = ($ih / 100) * $h;
				$img = imagescale($img, $sw, $sh,  IMG_BICUBIC_FIXED);
				$scaledname = $sw . 'x' . $sh .'-'. $newname;
					if($ext == 'jpg'){
					imagejpeg($img ,'uploaded/'.$scaledname);
				}elseif($ext == 'png'){
					imagepng($img ,'uploaded/'.$scaledname);
				}else{
					imagegif($img ,'uploaded/'.$scaledname);
				}
			}else{
				$img = imagescale($img, $w, $h,  IMG_BICUBIC_FIXED);
				$scaledname = $w . 'x' . $h .'-'. $newname;
				if($ext == 'jpg'){
					imagejpeg($img,'uploaded/'.$scaledname);
				}elseif($ext == 'png'){
					imagepng($img,'uploaded/'.$scaledname);
				}else{
					imagegif($img,'uploaded/'.$scaledname);
				}
			}
		}else{
			
		}
	}
}else{
	echo "Invalid file";
}
?>
<body>
<div id="header"><div id="headericon"></div><a href="4.php"><div id="headertext">Image scaler</div></a></div>
<div id="back">
	<div id="b1" class="bline"></div>
	<div id="b2" class="bline"></div>
	<div id="b3" class="bline"></div>
	<div id="b4" class="bline"></div>
	<div id="b5" class="bline"></div>
	<img id="readyimage" src="<?php echo "uploaded/".$scaledname; ?>">
	<div id="b6" class="bline"></div>
	<div id="b7" class="bline"></div>
</div>
<div id="result">
	<div id="readylink">
		<label for="rlinkinput" id="rlinklabel"><i class="fa fa-link fa-fw" id="load_i"></i></label>
		<input type="text" id="rlinkinput" onfocus="this.select();" onclick="this.select();" onmouseup="return false;" value="<?php echo "http://193.107.226.245:2410/1/pr/6/uploaded/".$scaledname; ?>" disabled>
	</div>
	<a href="<?php echo "uploaded/".$scaledname; ?>" download><div id="downloadbotton"><i class="fa fa-download fa-fw" id="load_i"></i>Download</div></a>
</div>
<div id="footer">
	&copy;TeddyFrost&nbsp;Jun2016
</div>
</body>
<script src="js/jquery-1.12.0.min.js"></script>
<script>
</script>
</html>