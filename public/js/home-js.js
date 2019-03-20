var flagRead=0, flagLis=0;


$(document).ready(function(){
	
});

$(document).on("click", "#services", function(){
	$('.wow').removeClass('animated');
	$('.wow').removeAttr('style');
	new WOW().init();
});

$(document).on("click","#toggle-bar", function(){
	$("#bar").toggleClass("dark");
	$("#list-services").toggleClass("for-dark");
});

$(document).on("click","#btn-login",function(){
	$("#my-button").click();
});

/*list ra cac part cho luyen doc*/
$(document).on("click", "#prac-read", function(){
	if(flagRead==0){
		hideList();
		showRead();
	}else{
		hideRead();
	}

});

/*list ra cac part cho luyen nghe*/
$(document).on("click", "#prac-lis", function(){
	if(flagLis==0){
		hideRead();
		showList();
	}else{
		hideList();
	}
});

function showRead(){
	$("#part1").animate({marginLeft:"0px"}, 500);
	$("#part2").delay(100).animate({marginLeft:"0px"}, 500);
	$("#part3").delay(200).animate({marginLeft:"0px"}, 500);
	$("#part4").delay(300).animate({marginLeft:"0px"}, 500);
	$("#ex1").fadeIn();
	flagRead=1;
}


function showList(){
	$("#part5").animate({marginLeft:"0px"}, 500);
	$("#part6").delay(100).animate({marginLeft:"0px"}, 500);
	$("#part7").delay(200).animate({marginLeft:"0px"}, 500);
	$("#ex2").fadeIn();
	flagLis=1;
}


function hideRead(){
	$("#part1").animate({marginLeft:"-200px"}, 500);
	$("#part2").delay(100).animate({marginLeft:"-200px"}, 500);
	$("#part3").delay(200).animate({marginLeft:"-200px"}, 500);
	$("#part4").delay(300).animate({marginLeft:"-200px"}, 500);
	$("#ex1").fadeOut();
	flagRead=0;
}

function hideList(){
	$("#part5").animate({marginLeft:"-200px"}, 500);
	$("#part6").delay(100).animate({marginLeft:"-200px"}, 500);
	$("#part7").delay(200).animate({marginLeft:"-200px"}, 500);
	$("#ex2").fadeOut();
	flagLis=0;
}

$(document).on("click", "#ex1", function(){
	$("#prac-read").click();
});

$(document).on("click", "#ex2", function(){
	$("#prac-lis").click();
});