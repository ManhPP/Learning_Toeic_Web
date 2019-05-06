$(document).ready(function(){
	
});


$(document).on("click","#btn-login",function(){
	$("#my-button").click();
});

/*timer*/

$(document).on("click", ".timer-btn", function(){
	$(this).removeClass("timer-btn");
	var start =0;
	setInterval(function(){
		var h = Math.floor(start / 3600);
		if(h<10) h="0"+h;
		var m = Math.floor(start % 3600 / 60);
		if(m<10) m="0"+m;
		var s = Math.floor(start % 3600 % 60);
		if(s<10) s="0"+s;
		$(".clock").html(h+":"+m+":"+s);
		start++;
	}, 1000);
});

$(document).on("click", "input[type='radio']", function(){
    var cau = $(this).parent().parent().parent().find(".no-ques");
    cau.addClass("is-choise");
    cau.attr("data-choise", $(this).val());
});

$(document).on("click", "#submit", function(){
    var numCorrect=0;
    if($(".is-choise").length != 40){
        alert("Hãy chọn đủ số câu trả lời!!");
    }else{
        $(".is-choise").each(function(){
            if($(this).attr("data-choise") == $(this).parent().parent().attr("data-asw")){
                numCorrect++;
            }
        });
        $(".noti").html("Bạn trả lời đúng "+numCorrect+"/40 câu!!!");
    }
    
});