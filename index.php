<!DOCTYPE html>
<html>
<head>

<style>
body{
	font-family:inset;
}
.lastcont{
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: transparent;
	opacity: 0.8;
}
.lastdiv{
	background-size: auto 100%;
    position: absolute;
    width: 100%;
    top: 0;
    opacity: 0.3;
    left: 0;
}
.lastcont .span{
    position: relative;
    z-index: 200;
    font-size: 25px;
	display: block;
	padding-top: 40px;
}
.lasttime{
    position: relative;
    z-index: 200;
    font-size: 20px;
}
.lastcont .img{
    display: inline;
    width: 25px;
    height: 25px;
    position: relative;
    z-index: 200;
    font-size: 30px;
	display:none;
}
.lastcont img{
	display:none;
}
.lastcont a{
	/*cursor:default;*/
	position: relative;
    z-index: 200;
    font-size: 25px;
    line-height: 30px;
    text-decoration: none;
    color: #344BC0;
}
/*http://193.107.226.245:2410/1/pr/9/css/fonts/*/
@font-face {
    font-family: inset;
    src: url(pr/9/css/fonts/GoodChair.ttf);
}
</style>
<meta http-equiv='refresh' content='30'>
</head>
<body>

<?php
if (isset($_GET['l'])) {
		if ($_GET['l'] == 'ru') {
			$leng = 'ru';
		}else{
			$leng = 'en';
		}
	}else{
		$leng = 'en';
	}
//index.php for localhost
// date date ("F d Y H:i:s.", filemtime($path))
$d = array();
$p = array();

foreach (glob("{pr/*/*/*.js,pr/*/*/*.php,pr/*/*/*.css,pr/*/*/*.txt,pr/*/*/*.png}",GLOB_BRACE) as $path) {//смотрим все папки в /pr
		$name = substr($path, 6, -4);
		$date = filemtime($path);
		//echo '<a href="'.$path.'"><div class="block" text=""><h3>'.$path.'</h3><p text="">'.$date.'<p></div></a>';
		array_push($d,strval($date));//заносим дату каждой в массив;
		$p[$date] = $path;//заносим их путь с ключом-временем
		//echo $path.'<br>';
}
foreach (glob("{pr/*/*.js,pr/*/*.php,pr/*/*.css,pr/*/*.txt,pr/*/*.png}",GLOB_BRACE) as $path) {//смотрим все папки в /pr
		$name = substr($path, 6, -4);
		$date = filemtime($path);
		//echo '<a href="'.$path.'"><div class="block" text=""><h3>'.$path.'</h3><p text="">'.$date.'<p></div></a>';
		array_push($d,strval($date));//заносим дату каждой в массив;
		$p[$date] = $path;//заносим их путь с ключом-временем
		//echo $path.'<br>';
}
//foreach (glob("pr/*/*") as $path) {//смотрим все папки в /pr
/*		$name = substr($path, 6, -4);
		$date = filemtime($path);
		//echo '<a href="'.$path.'"><div class="block" text=""><h3>'.$path.'</h3><p text="">'.$date.'<p></div></a>';
		array_push($d,strval($date));//заносим дату каждой в массив;
		$p[$date] = $path;//заносим их путь с ключом-временем
}
foreach (glob("pr/*") as $path) {//смотрим все папки в /pr
		$name = substr($path, 6, -4);
		$date = filemtime($path);
		//echo '<a href="'.$path.'"><div class="block" text=""><h3>'.$path.'</h3><p text="">'.$date.'<p></div></a>';
		array_push($d,strval($date));//заносим дату каждой в массив;
		$p[$date] = $path;//заносим их путь с ключом-временем
}*/
rsort($d);//сортируем массив с датами по убыванию
$n = 0;//начинаем отсчет файлов внутри каждой папки
foreach ($d as $num) {
	//echo $p[$num].' - '.date ("F d Y H:i:s.", filemtime($p[$num])).'<br>';
	//echo substr($p[$num], 0, 5).'<br>';
	if($n < 1){//выбираем только первый файл/папку
		$path = substr($p[$num], 0, 5);
		//echo	'<a href="'.$p[$num].'">'.$p[$num].'<a><br>';/*
		$d1 = array();//массив для времени
		$p1 = array();//массив для путей
		$l = 0;//начинаем отсчет файлов внутри выбраной папки в /пр
		foreach (glob(strval($p[$num]).'/*') as $path1) {//для каждого файла внутри...
			$l++;
			$name1 = substr($path1, 6, -4);
			$date1 = filemtime($path1);
			//echo '<a href="'.$path.'"><div class="block" text=""><h3>'.$path.'</h3><p text="">'.$date.'<p></div></a>';
			array_push($d1,strval($date1));//вносим дату в массив 2 уровня
			$p1[$date1] = $path1;//вносим путь в массив 2 уровня для путей
			//echo $l;
		}
		/*if($l>0){
			
			arsort($d1);
			$n1 = 0;
			foreach ($d1 as $num1) {
				if($n1<1){*/
					$readme = substr($p[$num],0,5).'/readme.txt';
					//echo intval('041')." ";
					//echo html_entity_decode(file_get_contents($readme, NULL, NULL, 0, 3));
					//<img class="img" src="'.substr($p[$num],0,5).'/img/logo.png">
					//<img class="lastdiv" src="'.substr($p[$num],0,5).'/img/cover.png">
					$n1lr = intval(file_get_contents($readme, NULL, NULL, 0, 3));
				 	$n1l = intval(file_get_contents($readme, NULL, NULL, 4, 6));
					echo'<div class="lastcont">';
					if($leng == 'ru'){
						echo '<span class="span">Последнее изменение в:</span><br><a href="'.substr($p[$num],0,5).'" target="_parent">'.file_get_contents($readme, NULL, NULL, 6,$n1lr).'</a><br><span class="lasttime">'.date ("F d Y H:i:s.", filemtime($p[$num])).'</span>';
					}else{
						echo	'<span class="span">Last modification in:</span><br><a href="'.substr($p[$num],0,5).'" target="_parent">'.file_get_contents($readme, NULL, NULL, 6+$n1lr, $n1l).'</a><br><span class="lasttime">'.date ("F d Y H:i:s.", filemtime($p[$num])).'</span>';
					}
					echo '</div>';
					//echo	'<ul><a href="'.$p1[$num].'">'.$p1[$num].'<a><br></ul>';
				/*}
				$n1++;
			}
		}else{
			$n--;
		}*/
	}
	$n++;
}
?>
</body>
</html>