$(document).ready(function(){
});


$(document).on("click",".our-service", function(){
	window.location.href = $(this).attr("data-path");
});