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
	 var winW = $(window).width();
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
 $('.btn-nav_close').on('click',function(){
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
