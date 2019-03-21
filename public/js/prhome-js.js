var flag=0;
$(document).ready(function(){
	/*swiper*/
	var width= window.innerWidth;
	var num = 1;

	if(width <= 567){
		num=1;
	}else if(width<768){
		num=2;
	}else if(width<1020){
		num=3;
	}else if(width <1600){
		num=4;
	}else{
		num=5;
	}
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: num,
		spaceBetween: 2,
		slidesPerGroup: num,
		loop: true,
		initialSlide:0,
		loopFillGroupWithBlank: true,
		pagination: '.swiper-pagination',
		paginationClickable: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
	});
});

$(document).on("click","#btn-login",function(){
	$("#my-button").click();
});

$(window).resize(function(){

	var mySwiper = document.querySelector('.swiper-container').swiper;
	var width= window.innerWidth;
	var num = 1;

	if(width <= 567){
		num=1;
	}else if(width<768){
		num=2;
	}else if(width<1020){
		num=3;
	}else if(width <1600){
		num=4;
	}else{
		num=5;
	}
	mySwiper.params.slidesPerView=num;
	mySwiper.params.slidesPerGroup=num;
});