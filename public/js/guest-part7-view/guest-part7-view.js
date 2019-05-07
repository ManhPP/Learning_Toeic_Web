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
    $(this).parent().parent().parent().find(".no-ques").addClass("is-choise");
});

$(document).on("click", "#submit", function(){
    if($(".list-cau .is-choise").length<48){
        alert("Hãy trả lời tất cả các câu hỏi!!!");
    }else{
        var numRight=0;
        $(".list-cau .is-choise").each(function(){
           var ques = $(this).parent().parent(); 
           var aswChoose = ques.find("input[type='radio']:checked").val();
           if(ques.attr("data-asw") == aswChoose){
               numRight++;
           }
        });
        $(".noti").html("Bạn trả lời đúng "+numRight+"/48 câu");
    }
});