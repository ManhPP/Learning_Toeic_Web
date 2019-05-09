var header;
var token;


$(document).ready(function(){
    header= $("#csrf-name").html();
    token = $("#csrf-value").html();
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
// input data
var inputQues = function(callback) {
    var index;
    $(document).on("click", ".ico-edit", function() {
        index = $(this).attr("data-index");
        loadData(parseInt(index));
        $("#lb-index-ques").html(parseInt(index)+1);
        $("#model-input-page").modal('show');
    });

    $("#btn-input-yes").on("click", function() {
        callback(true, index, function(isNext){
            if(isNext == true){
                if(index==29){
                    $("#model-input-page").modal('hide');
                    $("#btn-input-yes").attr("data-next","false");
                }else{
                    index ++;
                    $("#lb-index-ques").html(parseInt(index)+1);
                    loadData(parseInt(index));
                }
            }
        });
    });

    $("#btn-input-no").on("click", function() {
        callback(false, index);
    });
};

inputQues(function(bool, index, callBackNext){
    var arrText = new Array();
    var rightAsw;
    if(bool==true){
        var i=0;
        $(".input-ques-modal").each(function(){
            if($(this).val().length==0){
            }else{
                arrText[i] = $(this).val();
                i++;
            }
        });
        if(i==5){
            var k=1;
            var arrIndex=["A","B","C","D"];
            rightAsw = $("input[name='choise']:checked").val();
            $(".ques[data-index='"+index+"']").find(".ques-content").html(arrText[0]);
            $(".ques[data-index='"+index+"']").find(".asws").each(function(){
                $(this).html(arrIndex[k-1]+": "+arrText[k]);
                k++;
            });
            $(".ques[data-index='"+index+"']").find("input[type='radio'][value='"+rightAsw+"']").attr("checked","checked");
            
            if( ($("#btn-input-yes").attr("data-next") == "true") ){
                $("#btn-input-yes").attr("data-next","false");
                callBackNext(true);
            }else{
                $("#model-input-page").modal('hide');
            }
            
        }else{
            alert("Hãy nhập đầy đủ giữ liệu!!");
        }
    }else{
        $("#model-input-page").modal('hide');
    }
    $("#btn-input-yes").attr("data-next","false");
});

$(document).on("click","#btn-input-oan", function(){
    $("#btn-input-yes").attr("data-next","true");
    $("#btn-input-yes").click();
});

function loadData(index){
    var choise="A";
    var arrDa = new Array();
    arrDa[0] = $("div.ques[data-index='"+index+"']").find(".ques-content").html();
    choise = $("div.ques[data-index='"+index+"']").find("input:checked").val();
    $("div.ques[data-index='"+index+"']").find(".asws").each(function(i){
        arrDa[i+1] = $(this).html().substr(3, $(this).html().length);
    });
    $(".input-ques-modal").each(function(i){
        $(this).val(arrDa[i]);
    });

    $(".radio-choise[value='"+choise+"']").trigger("click");
}

//end input

// xu ly update
$(document).on("click","#add-part", function(){
    var partNghe="";
    var listHoiThoai="[";
    var intro=$('.intro .form-upload-img').attr('data-path');
    var audio = $("#form-upload-audio").attr("data-path");
    var tittle= $("#tittle").val();
    var isEnough = true;

    
    if( ((typeof intro != "undefined") && (typeof audio != "undefined") && (typeof tittle != "undefined")  == true && tittle.length>0) == false ){
        alert("Không được để trống giữ liệu!!");
        return;
    }
    var arrListCau="[";
    $(".block").each(function(){
        var idDht = $(this).attr("data-id");
        var listCau="[";
        $(this).find("div.ques").each(function(){
            var idCht=$(this).attr("data-id");
            var cauHoi=$(this).find(".ques-content").html();
            var arrDa=new Array();
            var daDung=$(this).find("input[type='radio']:checked").val(); 

            if(cauHoi.length == 0 || typeof (daDung) =="undefined" || idDht.length == 0){
                isEnough=false;
            }
            
            $(this).find(".asws").each(function(index){
                if($(this).html().length == 0){
                    isEnough = false;
                }
                arrDa[index] = $(this).html();
            });
            if(listCau.length==1){
                listCau+='{"id":"'+idCht+'","cauHoi":"'+cauHoi+'","dAA":"'+arrDa[0]+'","dAB":"'
                                    +arrDa[1]+'","dAC":"'+arrDa[2]+'","dAD":"'+arrDa[3]+'", "dADung":"'+daDung+'"}';
            }else{
                listCau+=',{"id":"'+idCht+'","cauHoi":"'+cauHoi+'","dAA":"'+arrDa[0]+'","dBB":"'
                                    +arrDa[1]+'","dAC":"'+arrDa[2]+'","dDD":"'+arrDa[3]+'", "dADung":"'+daDung+'"}';
            }
        });
        listCau+="]";
        if(arrListCau.length==1){
            arrListCau+=listCau;
        }else{
            arrListCau+=(","+listCau);
        }
        if(listHoiThoai.length==1){
            listHoiThoai+='{"id":"'+idDht+'","loaiPart":"Part 3"}';
        }else{
            listHoiThoai+=',{"id":"'+idDht+'","loaiPart":"Part 3"}';
        }
    });
    arrListCau+="]";
    if(isEnough == false){
        alert("Hãy điền đầy đủ câu hỏi!!!");
        return;
    }
    
    listHoiThoai+="]";
    
    partNghe='{"id":"'+$("#id-pn").html()+'","intro":"'+intro+'", "audio":"'+audio+'", "title":"'+tittle
                +'", "loaiPart":"Part 3"}';
    
    
    $.ajax({
        url: $("path-update").html(),
        method: "POST",
        //    contentType:"application/json; charset=utf-8",
        //    dataType:"json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data: {
            part3:partNghe,
            listHoiThoai:listHoiThoai,
            arrListCau:arrListCau
        },
        success: function(data){
            console.log(data);
            if(data!=null){
                alert("Update thành công!!");
            }else{
                alert("Update thất bại!!");
            }
        }
    });
});



//up load audio
$("#up-audio").change(function(event) {
  // upload len server
  var fileUpload = this;
  var formParent = $(this).parent();
  
  var formData = new FormData(($(this).parent())[0]);

  $.ajax({
      url: $("#root-path").html()+"/upload-audio-listen",
      type: 'POST',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:formData, // khong duoc dung { formData } ma phai bo {}
      contentType: false, // khong cho trinh duyet tu dong them contentType text vao header
      processData: false,
     
      success: function(data){
          // alert('a');
          if(data!="false"){
              formParent.attr("data-path", data.pathFile); 
          }
      }
  });
});

//up load img
$("#up-img").change(function(event) {
 // upload len server
 var fileUpload = this;
 var formParent = $(this).parent();
 
 var formData = new FormData($(this).parent()[0]);

 $.ajax({
     url: $("#root-path").html()+"/upload-image-listen",
     type: 'POST',
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:formData, // khong duoc dung { formData } ma phai bo {}
     contentType: false, // khong cho trinh duyet tu dong them contentType text vao header
     processData: false,
    
     success: function(data){
         // alert('a');
         if(data!="false"){
             formParent.attr("data-path", data.pathFile); 
         }
     }
 });
});







