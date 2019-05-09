$(document).ready(function(){
    
});

$(document).on("click",".page-num", function(){
   var i = $(this).attr("data-item");
   $(".show").addClass("hide");
   $(".show").removeClass("show");
   $(".content-container[data-part='"+i+"']").addClass("show");
   $(".show").removeClass("hide");
   $(".page-num.active").removeClass("active");
   $(this).addClass("active");
   
   if(parseInt(i)>=5){
       $("#audio-bkt").addClass("hide");
       $("#audio-bkt audio").get(0).pause();
       console.log($("#audio-bkt audio"));
   }else{
       $("#audio-bkt").removeClass("hide");
   }
   
});

$(document).on("click", ".submit-asw", function(){
    isRepeat = true;
    quesNoChoose = 1;
    numRight = 0;
    $(".ques[data-asw]").each(function(){
        if(isRepeat==true){
            daDung = $(this).attr("data-asw");
            da = $(this).find("input[type='radio']:checked").val();
            if(typeof da == 'undefined'){
                isRepeat = false;
                quesNoChoose = $(this).attr("data-ques");
            }else{
                if(da == daDung)
                    numRight++
            }
        }
    });  
    if(isRepeat == true){
        $(".noti").html("Bạn trả lời đúng "+numRight+"/200 câu!!!");
    }else{
        alert("Bạn chưa chọn câu đáp án cho câu: "+quesNoChoose+"!!!");
    }
});