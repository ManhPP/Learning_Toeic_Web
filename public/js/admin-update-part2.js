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


//up load audio
$("#up-audio").change(function(event) {
    // upload len server
    var fileUpload = this;
    var formParent = $(this).parent();
//    var name = ((new Date().getTime()) + fileUpload.files[0].name);
    var name = ((new Date().getTime()) + $("#id-user").html()+"."+fileUpload.files[0].type.split("/")[1]);
    var formData = new FormData($("#form-upload-audio")[0]);
    formData.append("name", name);

    $.ajax({
        url: $("#root-path").html()+"/admin/bai-hoc-manager/audio-upload",
        method: "post",
        data:formData, // khong duoc dung { formData } ma phai bo {}
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader(header, token);
        },
        success: function(data){
            if(data==true){
                formParent.attr("data-path", $("#root-path").html()+"/audio-upload/"+name);
            }
        }
    });
});

//up load img
$("#up-img").change(function(event) {
    // upload len server
    var fileUpload = this;
    var formParent = $(this).parent();
    
    var name = ((new Date().getTime()) + $("#id-user").html() +"." +fileUpload.files[0].type.split("/")[1]);
    var formData = new FormData($(this).parent()[0]);
    formData.append("name", name);

    $.ajax({
        url: $("#root-path").html()+"/admin/bai-hoc-manager/upload-image",
        method: "post",
        data:formData, // khong duoc dung { formData } ma phai bo {}
        contentType: false, // khong cho trinh duyet tu dong them contentType text vao header
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader(header, token);
        },
        success: function(data){
            if(data==true){
                formParent.attr("data-path", $("#root-path").html()+"/img-listen/"+name); 
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
       partNghe='{"id":"'+$("#id-part").html()+'","intro":"'+intro+'", "audio":"'+audio+'", "loaiPart":"Part 2", "tittle":"'+tittle+'"';
   }else{
       alert("Không được để trống!!!");
       return ;
   }
   var arrCau="[";
   $("input:checked").each(function(){
       var daDung=$(this).val();
       var id = $(this).parent().parent().parent().attr("data-id");
       if(arrCau.length == 1){
           arrCau+='{"id":"'+id+'","daDung":"'+daDung+'"}';
       }else{
           arrCau+=',{"id":"'+id+'","daDung":"'+daDung+'"}';
       }
   });
   arrCau+="]";
   partNghe+=(', "listCauPart2":'+arrCau);
   partNghe+="}"
   console.log(partNghe);
   console.log(arrCau);
   var data = JSON.parse(partNghe);
   console.log(data);
   //upload
   $.ajax({
       url: "update-part-nghe/update",
       method: "POST",
       contentType:"application/json; charset=utf-8",
       dataType:"json",
       beforeSend: function(xhr) {
           xhr.setRequestHeader(header, token);
       },
       data: partNghe,
       success: function(data){
          if(data==true){
              alert("Update thành công!!");
          }else{
              alert("Update thất bại!!");
          }
       }
   });
});