$('.btn_totop').hide();

$(window).scroll(function(){

	var fvheight = $('.main').offset().top;

	if($(window).scrollTop() > fvheight){
			$('.btn_totop').fadeIn(500);
	} else {
			$('.btn_totop').fadeOut(500);
	}

	$('.btn_totop').css({
			'position':'fixed',
			'bottom': '30px',
			'right':'30px'
	});
});

var currentScrPoint;
 $('.gnav_toggle').on('click',function(){
	 if($('.gnav').hasClass('open')){
		 $('.gnav').removeClass('open');

		 $('body').css({
			 'top': 0,
			 'position':'static',
			 'width':'auto',
			 'height': 'auto'
		 });
		 window.scrollTo( 0 , currentScrPoint );
	 }else{
		 $('.gnav').addClass('open');

		 currentScrPoint = $(window).scrollTop();
		 $('body').css({
			 'top': -currentScrPoint,
			 'position':'fixed',
			 'width':'100%',
			 'height': '100%'
		 });
	 }
 });
 $('.gnav_inner').on('click',function(){
	 $('.gnav').removeClass('open');

	 $('body').css({
		 'top': 0,
		 'position':'static',
		 'width':'auto',
		 'height': 'auto'
	 });
	 window.scrollTo( 0 , currentScrPoint );
 });

$('a[href^="#"]').on('click',function(e){
	var scrPos = $($(this).attr('href')).offset().top;
	$('html, body').animate({scrollTop:scrPos},600);
	e.preventDefault();
});

$('.fadeBlock').each(function(){
	if($(this).length){
		var fadePos = $(this).offset().top;
	}
	$(window).on('scroll',()=>{
		var scrPos = $(window).scrollTop();
		if(scrPos > fadePos - 250){
			$(this).addClass('show');
		}
	});
})

//　KV泡

var min = 1;
var max = 20;
var minSize = 5;
var maxSize = 9;

var spFlag = false;
var pcFlag = false;

$(window).on('load resize',function(){
	var winW = $(window).width();
	if(winW > 780 && !pcFlag){
		pcFlag = true;
		spFlag = false;
		for(var i = 0;i < 20;i++){
			$('.kv_home').prepend('<div class="bubble"></div>');
		}

		$('.bubble').each(function(){
			var index = $('.bubble').index(this);
			var randNum = Math.floor( Math.random() * (max + 1 - min) ) + min ;
			var bubbleSize = Math.floor( Math.random() * (maxSize + 1 - minSize) ) + minSize ;
			$(this).css({
				'left': (index) * 5+'%',
				'width': bubbleSize * 5,
				'height': bubbleSize * 5
			}).addClass('bubble0'+randNum);

		});

	}else if(winW <= 780 && !spFlag){
		spFlag = true;
		pcFlag = false;
		$('.bubble').remove();
	}

});



// フォームバリデーション
var flagFormName = false;
var flagFormEmail = false;
var flagFormMessage = false;
formValidate();

$('input[name="name"]').on('blur keyup',function(){
	formValidate();
});
$('input[name="email"]').on('blur keyup',function(){
	formValidate();
});
$('textarea').on('blur keyup',function(){
	formValidate();
});

function formValidate(){
	if($('input[name="name"]').val() != ''){
		flagFormName = true;
	}else{
		flagFormName = false;
	}
	if($('input[name="email"]').val() != ''){
		flagFormEmail = true;
	}else{
		flagFormEmail = false;
	}
	if($('textarea').val() != ''){
		flagFormMessage = true;
	}else{
		flagFormMessage = false;
	}

	if(flagFormName && flagFormEmail && flagFormMessage){
		$('.btn_confirm').addClass('action');
	}else{
		$('.btn_confirm').removeClass('action');
	}
}




//cookie表示
$.cookie('cookie_box_close') == 'on'?$('.cookie_box').hide():$('.cookie_box').show();
$('.cookie_box_close').on('click',function(){
	$('.cookie_box').hide();
	$.cookie('cookie_box_close', 'on', { expires: 30,path: '/' });
})

// 波
var unit = 100,
    canvas, context, canvas2, context2,
    height, width, xAxis, yAxis,
    draw;

/**
 * Init function.
 *
 * Initialize variables and begin the animation.
 */


function init() {

    canvas = document.getElementById("wave");

    // canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる

    context = canvas.getContext("2d");

    height = canvas.height;
    width = canvas.width;

		xAxis = Math.floor(height/2);
    yAxis = 0;

    draw();
}

/**
 * Draw animation function.
 *
 * This function draws one frame of the animation, waits 20ms, and then calls
 * itself again.
 */
function draw() {

    // キャンバスの描画をクリア
    context.clearRect(0, 0, width, height);

    //波を描画
    drawWave('#61a6c6', .1, 3, 0);

    // Update the time and draw again
    draw.seconds = draw.seconds + .009;
    draw.t = draw.seconds*Math.PI;
    setTimeout(draw, 35);
};
draw.seconds = 0;
draw.t = 0;

/**
* 波を描画
* drawWave(色, 不透明度, 波の幅のzoom, 波の開始位置の遅れ)
*/
function drawWave(color, alpha, zoom, delay) {
    context.fillStyle = color;
    context.globalAlpha = alpha;

    context.beginPath(); //パスの開始
    drawSine(draw.t / 0.5, zoom, delay);
    // context.lineTo(width + 10, 0);
    // context.lineTo(0, 0);
    context.lineTo(width + 10, height);
    context.lineTo(0, height);
    context.closePath() //パスを閉じる
    context.fill(); //塗りつぶす
}

/**
 * Function to draw sine
 *
 * The sine curve is drawn in 10px segments starting at the origin.
 * drawSine(時間, 波の幅のzoom, 波の開始位置の遅れ)
 */
function drawSine(t, zoom, delay) {

    // Set the initial x and y, starting at 0,0 and translating to the origin on
    // the canvas.
    var x = t; //時間を横の位置とする
    var y = Math.sin(x)/zoom;
    context.moveTo(yAxis, unit*y+xAxis); //スタート位置にパスを置く

    // Loop to draw segments (横幅の分、波を描画)
    for (i = yAxis; i <= width + 10; i += 10) {
        x = t+(-yAxis+i)/unit/zoom;
        y = Math.sin(x - delay)/3;
        context.lineTo(i, unit*y+xAxis);
    }
}
if($('.wave').length){
	init();
}
