var loadAjax = true;
var header;
var token;

$(document).ready(function(){
    header= $("#csrf-name").html();
    token = $("#csrf-value").html();
});

 // mo modal cau hoi
var modalConfirmInput = function(callback) {
    $("#ico-add").on("click", function() {
        var arr = getArrayId();
        for(i=0;i<arr.length;i++){
            var tr = $("#model-choise-ques tbody tr[data-id='"+arr[i]+"']");
            if(tr.hasClass("choise-this-ques")==false){
                tr.find(".choise-ques-add").click();
                tr.addClass("choise-this-ques");
                tr.find(".choise-ques-add").attr("disabled","disabled");
            }
        }
        $("#num-cau-choise").html($(".list-cau").find(".one-ques").length);
        console.log($(".list-cau").find(".one-ques").length);
        $("#model-choise-ques").modal('show');
    });

    $("#btn-input-yes").on("click", function() {
        callback(0);
    });


    $("#btn-input-no").on("click", function() {
        callback(1);
        $("#model-choise-ques").modal('hide');
    });
    

};

modalConfirmInput(function(confirm) {
    var arrCau = new Array();
    var i=0;
    if(confirm == 0){
        $(".choise-this-ques").each(function(){
            if($(this).find(".choise-ques-add").attr("disabled") != "disabled"){
                var choiseQues = $(this);
                var arrDa = new Array();
                choiseQues.find(".div-da .row span").each(function(index){
                    arrDa[index] = $(this).html();
                });
                arrCau[i] = new function(){
                    this.id = choiseQues.attr("data-id");
                    this.cauHoi = choiseQues.find(".content-ques").html();
                    this.arrDa = arrDa;
                    this.daDung = choiseQues.find(".div-da .row input[type='radio']:checked").val(); 
                }
                i++;
            }
        });
        addQues(arrCau);
    }else{
        $(".choise-this-ques").each(function(){
            $(this).find(".choise-ques-add[disabled!='disabled']").click();
        });
    }
    $("#model-choise-ques").modal('hide');
});

//lay cac cau da nam trong bai kiem tra
function getArrayId(){
    var arrId = new Array();
    $(".ques").each(function(i){
        if( typeof $(this).attr("data-id") != "undefined" ){
            arrId[i] = $(this).attr("data-id");
        }
    });
    return arrId;
}

//
$(document).on("click",".main-table tbody tr td",function(){
    $(this).find(".div-da").toggleClass("hide");
    $(this).find(".expand-ico").toggleClass("hide");
    $(this).find(".shorten-ico").toggleClass("hide");
});

// chon cau de add
$(document).on("click", ".choise-ques-add", function(e){
    e.stopPropagation();
    console.log($(".choise-this-ques").length);
    if( parseInt($(".choise-this-ques").length) <=  39 || $(this).parent().parent().hasClass("choise-this-ques") ){
        $(this).parent().parent().toggleClass("choise-this-ques");
        $("#num-cau-choise").html($(".choise-ques-add:checked").length);
    }else{
        e.preventDefault();
        alert("Không thể chọn quá 40 câu!!!");
    }
});

// cap nhap table cau part5
function resetTable(id, cauHoi, daDung, arrDa){
    var arr = getArrayId();
    var isChoiseThisQues="";
    var isDisabled="";
    var isChecked="";
    if(arr.indexOf(id+"") >=0 ){
        isChoiseThisQues="choise-this-ques";
        isDisabled="disabled='disabled'";
        isChecked="checked='checked'";
    }
    
    var checkA="",checkB="",checkC="",checkD="";
    if(daDung == 'A'){  
        checkA = 'checked="checked"';
    }else if(daDung == 'B'){
        checkB = 'checked="checked"';
    }else if(daDung == 'C'){
        checkC = 'checked="checked"';
    }else{
        checkD = 'checked="checked"';
    }
    var append = '<tr class="d-flex '+isChoiseThisQues+'" data-id="'
        +id+'"><td class="col-12"><input '+isDisabled+' '+isChecked+' type="checkbox" class="choise-ques-add">'
        + '<span class="content-ques">'+cauHoi
        +'</span><img class="expand-ico" src="'+$("#root-path").html()+'/resources/img/next.png">'
        + '<img class="shorten-ico hide" src="'+$("#root-path").html()+'/resources/img/down-arrow.png">'
        + '<div class="div-da hide"><hr><div><b>Đáp án</b>'
        + '</div><div class="row"><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choise-'+id+'" value="A" '+checkA+'>'
        + '<span>'+'A: '+arrDa[0]+'</span></label><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choise-'+id+'" value="B" '+checkB+'>'
        + '<span>'+'B: '+arrDa[1]+'</span></label><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choise-'+id+'" value="C" '+checkC+'>'
        + '<span>'+'C: '+arrDa[2]+'</span></label><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choise-'+id+'" value="D" '+checkD+'>'
        + '<span>'+'D: '+arrDa[3]+'</span></label></div></div></td></tr>';
    $(".main-table tbody").append(append);
}

//add cau vao part 5
function addQues(arrCau){
    for(var i=0; i<arrCau.length; i++){
        var checkA="",checkB="",checkC="",checkD="";
        if( arrCau[i].daDung == "A" ){
            checkA="checked='checked'";
        }else if( arrCau[i].daDung == "B" ){
            checkB="checked='checked'";
        }else if( arrCau[i].daDung == "C" ){
            checkC="checked='checked'";
        }else{
            checkD="checked='checked'";
        }
        var cau = '<div class="ques one-ques" data-id="'
                + arrCau[i].id
                + '" data-asw="'
                + arrCau[i].daDung
                + '"><div><span class="no-ques">Câu '
                + (i + 1)
                + '</span><span class="ques-content">'
                + arrCau[i].cauHoi
                + '</span></div><div class="row"><label class="col-12 col-md-6"><input '+checkA+' type="radio" disabled="disabled" name="choise'
                + arrCau[i].id
                + '"><span class="span-da">'
                + arrCau[i].arrDa[0]
                + '</span></label><label class="col-12 col-md-6"><input '+checkB+' type="radio" disabled="disabled" name="choise'
                + arrCau[i].id
                + '"><span class="span-da">'
                + arrCau[i].arrDa[1]
                + '</span></label><label class="col-12 col-md-6"><input '+checkC+' type="radio" disabled="disabled" name="choise'
                + arrCau[i].id
                + '"><span class="span-da">'
                + arrCau[i].arrDa[2]
                + '</span></label><label class="col-12 col-md-6"><input '+checkD+' type="radio" disabled="disabled" name="choise'
                + arrCau[i].id 
                + '"><span class="span-da">' 
                + arrCau[i].arrDa[3]
                + '</span></label></div>'
                +'<div class="align-right"><img class="ico-modified ico-del" alt="minus" src="'
                +$("#root-path").html()
                +'/resources/img/round-minus.png"></div><hr></div>';

        $("#list-to-add").append(cau);
    }
    $(".choise-ques-add:checked").each(function(){
        $(this).attr("disabled", "disabled");
    });
    resetNo();
}



//ajax khi scroll
$("#model-choise-ques").on("scroll", function(){
 
 var sum = $("#sum-ques").html();
 var total = $("#total-ques").html();
 
 if(loadAjax==true){
     if(sum!=total){
         var s = $("#model-choise-ques").scrollTop(),
         d = $("#model-choise-ques .modal-dialog").height(),
         c = $(window).height();
         if( (d-c-s <= 10) ){
             loadAjax=false;
             $.ajax({
                 url: "add-part5/get-list-cau",
                 data: {
                     index: parseInt(sum),
                 },
                 success: function(data){
                     console.log(data);
                     $("#sum-ques").html(parseInt(sum)+data.length);
                     
                     for(var i=0;i<data.length; i++){
                         arrDa = [data[i].daA, data[i].daB, data[i].daC, data[i].daD];
                         resetTable(data[i].id, data[i].cauHoi, data[i].daDung, arrDa);
                     }
                     loadAjax= true;
                 }
             });
         }
     }
 }
});

//xoa cau hoi khoi de
$(document).on("click",".ico-del", function(){
    
    $(this).parent().parent().remove();
    var id = $(this).parent().parent().attr("data-id");
    
    var tr = $("#model-choise-ques tbody tr[data-id='"+id+"']");
    tr.find(".choise-ques-add").removeAttr("disabled");
    tr.find(".choise-ques-add:checked").click();
    tr.removeClass("choise-this-ques");
    
//    $("#modal-content-iques tbody tr[data-id='"+id+"'] .choise-ques-add").each(function(){
//        if($(this).attr("disabled") == "disabled"){
//            $(this).removeAttr("disabled");
//            $(this).click();    
//        }
//    });
//    $("#modal-content-iques tbody tr[data-id='"+id+"']").removeClass("choise-this-ques");
    resetNo();
})

//them moi part
$(document).on("click", "#submit", function(){
    var arrId = new Array();
    var i=0;
    var partDoc="";
    var arrCau="[";
    $("#list-to-add .ques").each(function(){
        var id = $(this).attr("data-id");
        var arrDa = new Array();
        if(arrId.indexOf(""+id) == -1){
            arrId[i] = id;
            i++;
        }
        $(this).find(".span-da").each(function(i){
            arrDa[i] = $(this).html();  
        });
        if(arrCau.length==1){
            arrCau+='{"id":"'
                        +$(this).attr("data-id")
                        +'", "cauHoi":"'
                        +$(this).find(".ques-content").html()
                        +'", "daA":"'+arrDa[0]+'", "daB": "'
                        +arrDa[1]+'", "daC":"'+arrDa[2]+'", "daD":"'
                        +arrDa[3]+'","daDung":"'
                        +$(this).attr("data-asw")+'"}';   
        }else{
            arrCau+=',{"id":"'
                        +$(this).attr("data-id")
                        +'", "cauHoi":"'
                        +$(this).find(".ques-content").html()
                        +'", "daA":"'+arrDa[0]+'", "daB": "'
                        +arrDa[1]+'", "daC":"'+arrDa[2]+'", "daD":"'
                        +arrDa[3]+'","daDung":"'
                        +$(this).attr("data-asw")+'"}';   
        }
    });
    arrCau+="]";
    
    console.log($("#tittle").val() + "-" + arrId.length);
    
    if($("#tittle").val().length > 0 && arrId.length == 40){
        partDoc = '{"id":"'+$("#id-part").html()+'", "loaiPart":"Part 5", "tittle":"'+$("#tittle").val()+'", "listCauPart5":'+arrCau+'}';

        console.log(i);
        console.log(arrId.length);
        if(arrId.length == 40){
            $.ajax({
               url: $("#root-path").html()+"/admin/bai-hoc-manager/add-part-doc/check-repeat",
               method: "POST",
               beforeSend: function(xhr) {
                   xhr.setRequestHeader(header, token);
               },
               contentType:"application/json; charset=utf-8",
               dataType:"json",
               data: partDoc,
               success: function(data){
                   if(data == true){
                       $.ajax({
                           url: $("#root-path").html()+"/admin/bai-hoc-manager/update-part-doc/update",
                           method: "POST",
                           beforeSend: function(xhr) {
                               xhr.setRequestHeader(header, token);
                           },
                           contentType:"application/json; charset=utf-8",
                           dataType:"json",
                           data: partDoc,
                           success: function(data){
                               if(data == true){
                                   alert("Thêm thành công!!!");
                               }else{
                                   alert("Thêm không thành công, kiểm tra lại!!!");
                               }
                           }
                        });
                   }else{
                       alert("Bài đọc bị trùng (hoặc bạn chưa thay đổi), hãy chọn các câu khác!!!");
                   }
               }
            });
        }
    }else{
        alert("Hãy điền đầy đủ tiêu đề và số câu!!!");
    }
    
});

function resetNo(){
    $(".ques").each(function(i){
        $(this).find(".no-ques").html("Câu "+(i+1));
    });
}

