//TeddyFrost©
//if you want to use this code please contact me : r2d2f9@gmail.com
//using this code without contact me is a theft!

var start = function() {//main function
	var x=100, y=100, mx, my,xk,yk, tuch=0,key;
	$('body').css('height',$(window).height()-10);
	$('#stikersList img').on('mousedown',function(){
		key = $(this).attr("src");
		console.log(key);
		$('#sticker').css('background-image','url('+key+')');
		$('#stikersList').css('width','0');
		$('#close').css('display','none');
		$('#back').css('display','block');
	});
	
	$('#close').click(function(){
		$('#stikersList').css('width','0%');
		$('#close').css('display','none');
		$('#back').css('display','block');
	});
	$('#back').click(function(){
		$('#stikersList').css('width','20%');
		$('#back').css('display','none');
		$('#close').css('display','block');
	});
	$('body').mousedown(function() {
		xk = x-mx;
		yk = y-my;
		tuch = 1;
	});
	$(document).mouseup(function() {
		tuch = 0;
	});
	$(document).mousemove(function(e){
			mx=e.pageX;
			my=e.pageY;
			if(tuch == 1){
				x = mx+xk;
				y = my+yk;
				move(x,y,tuch);
			}
	});
$('#merge').click(function(){
	objs = {
		"posx" : x,
		"posy" : y,
		"key": key
	}
	$.ajax({
		type : "POST",
		data : objs,
		url : "3b.php",
		datatype : "json",
		success : function(){
			reload = $("<meta http-equiv='refresh' content='0'>");
			$('head').append(reload);
			$('#background').css('background','url(img/image24.png)');
		},
		error : function() {
			console.log('error!');
		}
	})
});
}//end main function
move = function(x,y,tuch) {
	if(x<0){x=0}
	if(y<0){y=0}
	if(x>$('#redactor').width() - $('#sticker').width()){x = $('#redactor').width() - $('#sticker').width()}
	if(y>$('#redactor').height() - $('#sticker').height()){y = $('#redactor').height() - $('#sticker').height()}
	if(tuch == 1){
		$("#sticker").css("top" ,y);
		$("#sticker").css("left",x);	
	}
}
$(document).ready(function(){start()});