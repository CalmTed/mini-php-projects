<!DOCTYPE html >
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="stiker editor with jQuery and ajax">
	<meta name="copyright" Content="TeddyFrost">
	<meta name="Robots" content="INDEX,NOFOLLOW">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Image scaler</title>
	<link rel="shortcut icon" href="img/ISlogo.ico">
	<link rel="stylesheet" type="text/css" href="css/4style.css">
</head>
<body>
<div id="back">
	<div id="b1" class="bline"></div>
	<div id="b2" class="bline"></div>
	<div id="b3" class="bline"></div>
	<div id="b4" class="bline"></div>
	<div id="b5" class="bline"></div>
	<div id="b6" class="bline"></div>
	<div id="b7" class="bline"></div>
</div>
<div id="header"><div id="headericon"></div><div id="headertext">Image scaler</div>
<form  enctype="multipart/form-data" action="4b.php" method="POST" id="fileform">
	<div id="input">
		<label id="filelabel" for="file">Choose file</label>
		<input type="text" id="addres" readonly value="No file there">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" >
		<input type="file" id="file" name="file" style="display:none">
	</div>
	<div id="settings">
		<label for="imagewidth">Width:</label>
		<input type="number" max="500" min="10" name="width" class="numberinput" id="imagewidth" value="50">
		<label for="imageheight">Height:</label>
		<input type="number" max="500" min="10" name="height" class="numberinput" id="imageheight" value="50">
		<label id="persentch" class="forsizem disabled" for="persent">%</label>
		<label id="pixelch"  class="forsizem enebled" for="pixel">px</label>
		<input type="radio" name="sizemeasure" id="persent" class="sizemeasure" value="persent" checked>
		<input type="radio" name="sizemeasure" id="pixel" class="sizemeasure" value="pixel">
	</div>
	<input type="submit" value="Scale" id="scalebutton">
</form>
<div id="footer">
	&copy;TeddyFrost&nbsp;Jun2016
</div>
</body>
<script src="js/jquery-1.12.0.min.js"></script>
<script>
	document.getElementById('file').onchange = function () { 
		document.getElementById('addres').value = this.value;
		$('#filelabel').html('Change file'); 
		$('#settings').css('display','block');
		$('#scalebutton').css('display','block');
	};
	$('#persentch').on( 'click',function(){
		$('#pixelch').addClass('enebled');
		$('#pixelch').removeClass('disabled');
		$('#persentch').addClass('disabled');
		$('#persentch').removeClass('enebled');
		$('.numberinput').attr('min','10');
		$('.numberinput').attr('max','500');
	});
	$('#pixelch').on( 'click',function(){
		$('#persentch').addClass('enebled');
		$('#persentch').removeClass('disabled');
		$('#pixelch').addClass('disabled');
		$('#pixelch').removeClass('enebled');
		$('.numberinput').attr('min','100');
		$('.numberinput').attr('max','3000');
	});
</script>
</html>