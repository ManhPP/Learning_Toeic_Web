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
            if(data!="false"){
                formParent.attr("data-path", data.pathFile); 
            }
        }
    });
});

//up load img
$(".up-img").change(function(event) {
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

//add part1
$(document).on("click", "#add-part", function(){
   var intro=$('.intro .form-upload-img').attr('data-path');
   var audio = $("#form-upload-audio").attr("data-path");
   var tittle= $("#tittle").val();
   var partNghe="";
   if( (typeof intro != "undefined") && (typeof audio != "undefined") && (typeof tittle != "undefined")  == true && tittle.length>0){
       partNghe='{"id":"null","intro":"'+intro+'", "audio":"'+audio+'", "loaiPart":"Part 1","acessCount":0, "title":"'+tittle+'"';
   }else{
       alert("Không được để trống!!!");
       return ;
   }
   var arrCau="[";
   var isReturn = false;
   $("input:checked").each(function(){
       var pathImg = $(this).parent().parent().parent().find(".form-upload-img").attr("data-path");
       var daDung=$(this).val();
       if(typeof pathImg != "undefined"){
           if(arrCau.length == 1){
               arrCau+='{"id":"null","anh":"'+pathImg+'", "dADung":"'+daDung+'"}';
           }else{
               arrCau+=',{"id":"null","anh":"'+pathImg+'", "dADung":"'+daDung+'"}';
           }
       }else{
           isReturn=true;
       }
   });
   if(isReturn==true){
       alert("Phải upload đầy đủ ảnh!!!");
       return;
   }
   arrCau+="]";
   partNghe+="}"
  
   //upload
   $.ajax({
       url: $("#path-add").html(),
       method: "POST",
    //    contentType:"application/json; charset=utf-8",
    //    dataType:"json",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            part1:partNghe,
            listCau: arrCau
        },
        success: function(data){
            console.log(data);
            if(data=="true"){
                alert("Thêm thành công!!");
            }else{
                alert("Thêm thất bại!!");
            }
        }
   });
});