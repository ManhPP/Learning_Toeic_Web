var loadAjax = true;
var header;
var token;

$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

 // mo modal cau hoi
var modalConfirmInput = function(callback) {
    $("#ico-add").on("click", function() {
        $("num-cau-choose").html($(".list-cau").find(".ques").length);
        $("#model-choose-ques").modal('show');
    });

    $("#btn-input-yes").on("click", function() {
        callback(0);
    });


    $("#btn-input-no").on("click", function() {
        callback(1);
        $("#model-choose-ques").modal('hide');
    });
    

};

modalConfirmInput(function(confirm) {
    var arrCau = new Array();
    var i=0;
    if(confirm == 0){
        $(".choose-this-ques").each(function(){
            if($(this).find(".choose-ques-add").attr("disabled") != "disabled"){
                var chooseQues = $(this);
                var arrDa = new Array();
                chooseQues.find(".div-da .row span").each(function(index){
                    arrDa[index] = $(this).html();
                });
                arrCau[i] = new function(){
                    this.id = chooseQues.attr("data-id");
                    this.cauHoi = chooseQues.find(".content-ques").html();
                    this.arrDa = arrDa;
                    this.daDung = chooseQues.find(".div-da .row input[type='radio']:checked").val(); 
                }
                i++;
            }
        });
        addQues(arrCau);
    }else{
        $(".choose-this-ques").each(function(){
            $(this).find(".choose-ques-add[disabled!='disabled']").click();
        });
    }
    $("#model-choose-ques").modal('hide');
});

//
$(document).on("click",".main-table tbody tr td",function(){
    $(this).find(".div-da").toggleClass("hide");
    $(this).find(".expand-ico").toggleClass("hide");
    $(this).find(".shorten-ico").toggleClass("hide");
});

// chon cau de add
$(document).on("click", ".choose-ques-add", function(e){
    e.stopPropagation();
    if( parseInt($(".choose-this-ques").length) <=  39 || $(this).parent().parent().hasClass("choose-this-ques") ){
        $(this).parent().parent().toggleClass("choose-this-ques");
        $("#num-cau-choose").html($(".choose-ques-add:checked").length);
    }else{
        e.preventDefault();
        alert("Không thể chọn quá 40 câu!!!");
    }
});

// cap nhap table cau part5
function resetTable(id, cauHoi, daDung, arrDa){
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
    var append = '<tr class="d-flex" data-id="'
        +id+'"><td class="col-12"><input type="checkbox" class="choose-ques-add">'
        + '<span class="content-ques">'+cauHoi
        +'</span><img class="expand-ico" src="'+$("#root-path").html()+'/resources/img/next.png">'
        + '<img class="shorten-ico hide" src="'+$("#root-path").html()+'/resources/img/down-arrow.png">'
        + '<div class="div-da hide"><hr><div><b>Đáp án</b>'
        + '</div><div class="row"><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choose-'+id+'" value="A" '+checkA+'>'
        + '<span>'+'A: '+arrDa[0]+'</span></label><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choose-'+id+'" value="B" '+checkB+'>'
        + '<span>'+'B: '+arrDa[1]+'</span></label><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choose-'+id+'" value="C" '+checkC+'>'
        + '<span>'+'C: '+arrDa[2]+'</span></label><label class="col-12 col-md-6">'
        + '<input disabled="disabled" type="radio" name="choose-'+id+'" value="D" '+checkD+'>'
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
        var cau = '<div class="ques" data-id="'
                + arrCau[i].id
                + '" data-asw="'
                + arrCau[i].daDung
                + '"><div><span class="no-ques">Câu '
                + (i + 1)
                + '</span><span class="ques-content">'
                + arrCau[i].cauHoi
                + '</span></div><div class="row"><label class="col-12 col-md-6"><input '+checkA+' type="radio" disabled="disabled" name="choose'
                + arrCau[i].id
                + '"><span class="span-da">'
                + arrCau[i].arrDa[0]
                + '</span></label><label class="col-12 col-md-6"><input '+checkB+' type="radio" disabled="disabled" name="choose'
                + arrCau[i].id
                + '"><span class="span-da">'
                + arrCau[i].arrDa[1]
                + '</span></label><label class="col-12 col-md-6"><input '+checkC+' type="radio" disabled="disabled" name="choose'
                + arrCau[i].id
                + '"><span class="span-da">'
                + arrCau[i].arrDa[2]
                + '</span></label><label class="col-12 col-md-6"><input '+checkD+' type="radio" disabled="disabled" name="choose'
                + arrCau[i].id 
                + '"><span class="span-da">' 
                + arrCau[i].arrDa[3]
                + '</span></label></div>'
                +'<div class="align-right"><img class="ico-modified ico-del" alt="minus" src="'
                +$("#root-path").html()
                +'/resources/img/round-minus.png"></div><hr></div>';

        $("#list-to-add").append(cau);
    }
    $(".choose-ques-add:checked").each(function(){
        $(this).attr("disabled", "disabled");
    });
    resetNo();
}



//ajax khi scroll
$("#model-choose-ques").on("scroll", function(){
 
 var sum = $("#sum-ques").html();
 console.log(sum);
 var total = $("#total-ques").html();
 
 if(loadAjax==true){
     if(sum!=total){
         var s = $("#model-choose-ques").scrollTop(),
         d = $("#model-choose-ques .modal-dialog").height(),
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
    $("#modal-content-iques tbody tr[data-id='"+id+"'] .choose-ques-add").each(function(){
        $(this).removeAttr("disabled");
        $(this).click();
    });
    $("#modal-content-iques tbody tr[data-id='"+id+"']").removeClass("choose-this-ques");
    resetNo();
})

//them moi part
$(document).on("click", "#submit-add", function(){
    var arrId = new Array();
    var i=0;
    var partDoc="";
    var arrCau="[";
    $("#list-to-add .ques").each(function(){
        var id = $(this).attr("data-id");
        var arrDa = new Array();
        if(arrId.indexOf(""+id) == -1){
            console.log(id);
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
                        +arrDa[3]+'","dADung":"'
                        +$(this).attr("data-asw")+'"}';   
        }else{
            arrCau+=',{"id":"'
                        +$(this).attr("data-id")
                        +'", "cauHoi":"'
                        +$(this).find(".ques-content").html()
                        +'", "daA":"'+arrDa[0]+'", "daB": "'
                        +arrDa[1]+'", "daC":"'+arrDa[2]+'", "daD":"'
                        +arrDa[3]+'","dADung":"'
                        +$(this).attr("data-asw")+'"}';   
        }
    });
    arrCau+="]";
    
    console.log($("#tittle").val() + "-" + arrId.length);
    console.log($("#tittle").val().length+"--"+arrId.length);
    if($("#tittle").val().length > 0 && arrId.length == 40){
        partDoc = '{"id":"null","accessCount":"0", "loaiPart":"Part 5", "title":"'+$("#tittle").val()+'", "listCauPart5":'+arrCau+'}';

        console.log(i);
        console.log(arrId.length);
        // if(arrId.length == 40){
        //     $.ajax({
        //        url: $("#root-path").html()+"/admin/bai-hoc-manager/add-part-doc/check-repeat",
        //        method: "POST",
        //        beforeSend: function(xhr) {
        //            xhr.setRequestHeader(header, token);
        //        },
        //        contentType:"application/json; charset=utf-8",
        //        dataType:"json",
        //        data: partDoc,
        //        success: function(data){
        //            if(data == true){
                       $.ajax({
                           url: $("#path-add").html(),
                           method: "POST",
                           data: {
                               partDoc: partDoc,
                               listCauPart5: arrCau
                           },
                           success: function(data){
                               if(data == "true"){
                                   alert("Thêm thành công!!!");
                               }else{
                                   alert("Thêm không thành công, kiểm tra lại!!!");
                               }
                           }
                        });
            //        }else{
            //            alert("Bài đọc bị trùng, hãy chọn các câu khác!!!");
            //        }
            //    }
            // });
        }
    // }else{
    //     alert("Hãy điền đầy đủ tiêu đề và số câu!!!");
    // }
    
});

function resetNo(){
    $(".ques").each(function(i){
        $(this).find(".no-ques").html("Câu "+(i+1));
    });
}

