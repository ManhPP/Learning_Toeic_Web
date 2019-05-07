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



//chon dap an
$(document).on("click", "input[type='radio']",function(){
  var ques = $(this).parent().parent().parent();
  ques.find(".no-ques").addClass("is-choise");
  ques.attr("data-choise", $(this).val());
});

//nop bai
$(document).on("click", "#submit-asw", function(){
  var len = $(".is-choise").length;
  if(len==30){
      var num=0;
      $(".ques").each(function(){
          console.log($(this).attr("data-asw")+"-"+$(this).attr("data-choise"));
          if(($(this).attr("data-asw")===$(this).attr("data-choise"))===true){
              $(this).find(".noti").html("<span style='color: green'>Đáp án đúng</span>");
              num++;
          }else{
              $(this).find(".noti").html("<span style='color: red'>Đáp không án đúng (Đ/A: "+$(this).attr("data-asw")+")</span>");
          }
      });
      $("#num-right").html("<span style=''>Bạn trả lời đúng "+num+"/30 câu.</span>");
  }else{
      alert("Hãy trả lời hết trước khi nộp bài!");
  }
});