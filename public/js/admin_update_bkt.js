var loadAjax = true;

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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

// them part
var modalConfirmInput = function(callback) {
   var divChoose;
   var modalChoose;
   $(document).on("click", ".div-choose", function() {
       divChoose = $(this);
       modalChoose = $("#modal-choose-part"+$(this).attr("data-part"));
       resetModal(modalChoose);
       modalChoose.modal('show');
   });
   
   $(document).on("click", ".btn-yes", function(){
       callback(true, modalChoose, divChoose);
       modalChoose.modal('hide');
   });
   
   $(document).on("click", ".btn-cancle", function(){
       modalChoose.modal('hide');
   });
   
};

modalConfirmInput(function(confirm, modalChoose, divChoose) {
    var tr = modalChoose.find(".choose-this-part");
    if(confirm==true){
        if(tr.length>1){
            tr = tr[0];
        }
        resetDivChoose(divChoose, tr);
        tr.addClass("chosen");
        tr.find("input[type='checkbox']").attr("disabled", "disabled");
    }
});


$(document).on("click", ".choose-ques-add", function(e){
   var tr = $(this).parent().parent().parent(); 
   var tbody = tr.parent();
   if(tr.hasClass("choose-this-part") == true){
       tr.removeClass("choose-this-part");
   }else{
       if(tbody.find(".choose-this-part").length > 0 ){
           e.preventDefault();
           alert("Không được chọn quá 1 part");
       }else{
           tr.addClass("choose-this-part");
       }   
   }
});

$(document).on("click", ".btn-remove", function(){
    var divPart = $(this).parent().parent().parent().parent();
    var boundaryDivChoose = divPart.parent().find(".boundary-div-choose");
    
    divPart.remove();
    boundaryDivChoose.removeClass("hide");
    var modalChoose = $("#modal-choose-part"+$(this).attr("data-part"));
    removeChoosePart(modalChoose);
});

$(".modal-choose-part").on("scroll", function(){
   var modal = $(this);
   var sum = $(this).find("tbody tr").length;
   var total = parseInt($(this).find("#total-ques").html());
   var loaiPart = parseInt($(this).attr("data-part"));
   var url="",typeUrl="";
   if(loaiPart<=4){
       url="update-bkt/get-list-part-nghe";
       typeUrl = "luyen-nghe";
   }else{
       url="update-bkt/get-list-part-doc";
       typeUrl = "luyen-doc";
   }
   if(loadAjax==true){
       if(sum!=total){
           var s = $(this).scrollTop(),
           d = $(this).find(".modal-dialog").height(),
           c = $(window).height();
           if( (d-c-s <= 100) ){
               loadAjax=false;
               $.ajax({
                  url: url,
                  data:{
                      index: (Math.floor(sum/20)+1),
                      loaiPart: loaiPart,
                  },
                  success: function(data){
                      addDataToModal(data,modal, typeUrl);
                      loadAjax = true;
                  }
               });
           }
       }
   }
});

$(document).on("click", "#submit-add", function(){
    var title = $("#tittle").val();
    var idBKT = $("#id-bkt").html();
    var ids = new Array();
    var audio = $("#form-upload-audio").attr("data-path");
    $(".btn-remove").each(function(i){
        ids[i] = $(this).attr("data-id");
    });
    
    if(title.length==0){
        alert("Hãy điền tiêu đề!!");
    }else if(ids.length < 7){
        alert("Hãy chọn đủ 7 part!!");
    } else if(typeof audio == "undefined"){
        alert("Hãy upload file audio cho bkt!!!");
    } else{
        $.ajax({
            url: $("#path-update").html(),
            method: "post",
            data:{
                ids: ids,
                title: title,
                idBKT: idBKT,
                audio: audio
            },
            success: function(data){
                if(data == "true"){
                    alert("Update thành công!!!");
                }else {
                    alert("Update không thành công!!!");
                }
            }
        });
    }
    
    
});

function addDataToModal(data, modal, typeUrl){
    console.log(data.length);
    for(i=0;i<data.length; i++){
        var tr = '<tr class="d-flex" data-id="'+data[i].id+'">'
            +'<td class="col-12"><a href="'+$("#root-path").html()+'/guest/'+typeUrl+'?id='+data[i].id+'" target="_blank">'
            +'<input type="checkbox" class="choose-ques-add">'
            +'<span class="content-ques">'
            +data[i].tittle+' (id '+data[i].id
            +')</span><img class="expand-ico" src="'
            +'/imgs/next.png"></a></td></tr>';
        modal.find("table tbody").append(tr);   
    }
    numPart = modal.find("#sum-ques");
    numPart.html(parseInt(numPart.html())+data.length);
}

function resetModal(modal){
    modal.find(".choose-this-part").each(function(){
       if($(this).hasClass("chosen")==false){
           $(this).find("input[type='checkbox']").click();
       } 
    });
}

function resetDivChoose(divChoose, tr){
    var divPart = '<div class="div-part" data-part="'
        +divChoose.attr("data-part")+'"><div class="part-name">PART '
                    +divChoose.attr("data-part")+'</div>'
                    + '<div class="part-detail">'
                    + '<div class="part-title">'+tr.find(".content-ques").html()
                    + '</div><div class="controll row"><div class="col-6">'
                    + '<a target="_blank" href="'+tr.find("a").attr("href")+'"><div class="ctrl-btn btn-view">View</div></a>'
                    + '</div><div class="col-6">'
                    + '<div class="ctrl-btn btn-remove" data-part="'
                    + divChoose.attr("data-part")+'" data-id="'+tr.attr("data-id")+'">Remove</div>'
                    + '</div></div></div></div>';
    
    divChoose.parent().addClass("hide");
    divChoose.parent().parent().append(divPart);
    console.log(divChoose);
}

function removeChoosePart(modal){
    modal.find("tbody .choose-this-part").each(function(){
        $(this).removeClass("choose-this-part");
        $(this).removeClass("chosen");
        $(this).find("input[type='checkbox']").removeAttr("disabled");
        $(this).find("input[type='checkbox']").prop("checked", false);
    });
}

//up load audio
$("#up-audio").change(function(event) {
  // upload len server
  var fileUpload = this;
  var formParent = $(this).parent();
//  var name = ((new Date().getTime()) + fileUpload.files[0].name);
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