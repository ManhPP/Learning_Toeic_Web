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

// $(document).on("click", ".timer-btn", function(){
//     $(this).removeClass("timer-btn");
//     var start =0;
//     setInterval(function(){
//         var h = Math.floor(start / 3600);
//         if(h<10) h="0"+h;
//         var m = Math.floor(start % 3600 / 60);
//         if(m<10) m="0"+m;
//         var s = Math.floor(start % 3600 % 60);
//         if(s<10) s="0"+s;
//         $(".clock").html(h+":"+m+":"+s);
//         start++;
//     }, 1000);
// });


//up load audio

$(document).on("change","#up-audio",function (){
    //console.log("error");
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
})

//up load img
$(document).on("change","#up-img",function(){
    //console.log("anh thanh");
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
// $("#up-img").change(function(event) {
//     console.log("image");
//     // upload len server
//     var fileUpload = this;
//     var formParent = $(this).parent();
//
//     var name = ((new Date().getTime()) + $("#id-user").html() +"." +fileUpload.files[0].type.split("/")[1]);
//     var formData = new FormData($(this).parent()[0]);
//     formData.append("name", name);
//
//     $.ajax({
//         url: $("#root-path").html()+"/admin/bai-hoc-manager/upload-image",
//         method: "post",
//         data:formData, // khong duoc dung { formData } ma phai bo {}
//         contentType: false, // khong cho trinh duyet tu dong them contentType text vao header
//         processData: false,
//         beforeSend: function(xhr) {
//             xhr.setRequestHeader(header, token);
//         },
//         success: function(data){
//             if(data==true){
//                 formParent.attr("data-path", $("#root-path").html()+"/img-listen/"+name);
//             }
//         }
//     });
// });

//add part2
$(document).on("click", "#add-part", function(){
    //console.log("addd");
   var intro=$('.intro .form-upload-img').attr("data-path");
   var audio = $("#form-upload-audio").attr("data-path");
   var tittle= $("#tittle").val();
   var partNghe="";
   //console.log(intro+"-"+audio+"-"+tittle);
    if( (typeof intro != "undefined") && (typeof audio != "undefined") && (typeof tittle != "undefined")  == true && tittle.length>0){
        partNghe='{"id":"null","intro":"'+intro+'", "audio":"'+audio+'", "loaiPart":"Part 2","acessCount":0, "title":"'+tittle+'"';
    }else{
        alert("Không được để trống!!!");
        return ;
    }
   var arrCau="[";
   $("input:checked").each(function(){
       var daDung=$(this).val();
       if(arrCau.length == 1){
           arrCau+='{"id":"null","dADung":"'+daDung+'"}';
       }else{
           arrCau+=',{"id":"null","dADung":"'+daDung+'"}';
       }
   });
   arrCau+="]";
   //partNghe+=(', "listCauPart2":'+arrCau);
   partNghe+="}"
   console.log(partNghe);
   console.log(arrCau);
   // var data = JSON.parse(partNghe);
   // console.log(data);
   //upload
    //upload
    $.ajax({
        url: $("#root-path").html()+"/admin/manager-listening-part/add-part2/do-add",
        method: "POST",
        //    contentType:"application/json; charset=utf-8",
        //    dataType:"json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            part2:partNghe,
            listCau: arrCau
        },
        success: function(data){
            //console.log(data);
            if(data!=null){
                alert("Thêm thành công!!");
            }else{
                alert("Thêm thất bại!!");
            }
        }
    });
});