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
    var choiseAsw = $(this).attr("value");
    var ques = $(this).parent().parent().parent();
    ques.find(".no-ques").addClass("is-choise");
    ques.attr("data-choise", choiseAsw);
});

$(document).on("click", "#submit", function(){
    var isDone = true;
    var point = 0;
    $("div.ques").each(function(){
        var asw = $(this).attr("data-choise");
        if(typeof asw != "undefined"){
            if($(this).attr("data-asw") == asw)
                point++;
        }else{
            isDone = false;
        }
    });
    if(isDone == true){
        $(".noti").empty();
        $(".noti").append("Bạn trả lời đúng "+point+"/12 câu!!!");
    }else{
        alert("Hãy trả lời hết các câu hỏi!!");
    }
    
});