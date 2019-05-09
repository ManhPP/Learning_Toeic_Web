var header;
var token;
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

//mo modal cau hoi
var modalConfirmInput = function(callback) {
    $("#ico-add").on("click", function() {
        var arr = getArrayId();
        for(i=0;i<arr.length;i++){
            var tr = $("#model-choise-ques tbody tr[data-id='"+arr[i]+"']");
            if(tr.hasClass("choise-this-para")==false){
                tr.find(".checkbox-choise").click();
                tr.addClass("choise-this-para");
                tr.find(".checkbox-choise").attr("disabled","disabled");
            }
        }
        $("#num-cau-choise").html($(".boundary-para").length);
        
        $("#model-choise-ques").modal('show');
    });

    $("#btn-input-yes").on("click", function() {
        callback(0);
        $("#model-choise-ques").modal('hide');
    });


    $("#btn-input-no").on("click", function() {
        callback(1);
        $("#model-choise-ques").modal('hide');
    });

};

modalConfirmInput(function(data){
    if(data==0){
        var arrPara = new Array();
        var iPara=0;
        $(".choise-this-para").each(function(){
            var idPara = $(this).attr("data-id");
            
            if(typeof ($(this).find(".checkbox-choise").attr("disabled")) == "undefined" ){
                $(this).find(".checkbox-choise").attr("disabled", "disabled");
                var row = $(this).parent().parent();
                var arrCau = new Array();
                $(this).find(".content-para .ques").each(function(iQues){
                    var arrDa = new Array();
                    var cauHoi = $(this).find(".ques-content").html();
                    var daDung = $(this).attr("data-asw");
                    var id = $(this).attr("data-id");
                    $(this).find(".asw-content").each(function(iAsw){
                        arrDa[iAsw] = $(this).html(); 
                    });
                    var cau = new function(){
                        this.id = id;
                        this.daDung = daDung;
                        this.cauHoi = cauHoi;
                        this.daA = arrDa[0];
                        this.daB = arrDa[1];
                        this.daC = arrDa[2];
                        this.daD = arrDa[3];
                    }
                    arrCau[iQues] = cau;
                });
                var para = new function(){
                    this.id = idPara;
                    this.listCauPart6 = arrCau;
                }
                arrPara[iPara] = para;
                iPara++;
            }
            
        });
        
        addPara(arrPara);
    }else{
        
    }
});

//lay cac cau da nam trong bai kiem tra
function getArrayId(){
    var arrId = new Array();
    $(".boundary-para").each(function(i){
        if( typeof $(this).attr("data-id") != "undefined" ){
            arrId[i] = $(this).attr("data-id");
        }
    });
    return arrId;
}

//xoa
$(document).on("click", ".ico-del", function(){
    $(this).parent().parent().parent().remove();
    var id = $(this).attr("data-id");
    var row = $("#model-choise-ques tbody tr.choise-this-para[data-id='"+id+"']");
    row.removeClass("choise-this-para");
    row.find(".checkbox-choise").removeAttr("disabled");
    row.find(".checkbox-choise").prop("checked", false);
    resetList();
});

//expand or shorten ques in para
$(document).on("click",".main-table tbody tr td",function(){
    $(this).find(".content-para").toggleClass("hide");
    $(this).find(".expand-ico").toggleClass("hide");
    $(this).find(".shorten-ico").toggleClass("hide");
});

$(document).on("click", "input[type='checkbox']", function(e){
    e.stopPropagation();
    if($(".choise-this-para").length < 4 || ($(this).parent().parent().hasClass("choise-this-para") == true) ){
        $(this).parent().parent().toggleClass("choise-this-para");
        $("#num-cau-choise").html($(".choise-this-para").length);
    }else{
        e.preventDefault();
        alert("Chỉ được chọn 4 đoạn văn cho 1 part!!!")
    }
});

function addPara(arrPara){
    console.log(arrPara.length);
    for(var i =0; i<arrPara.length; i++){
        var para="";
        var listCau="";
        var startQues = ($(".refer-ques").length)*3+1;
        for(var j=0; j<3; j++){
            var add = '';
            var checkAandDis="disabled='disabled' ", checkBandDis="disabled='disabled' ",
                    checkCandDis="disabled='disabled' ", checkDandDis="disabled='disabled' ";
            if (j == 2){
                add = '<div class="align-right">'
                        + '<img class="ico-modified ico-del" data-id="'+arrPara[i].id+'" alt="minus"'
                        + ' src="'+$("#root-path").html()+'/resources/img/round-minus.png"></div>';
            }
            
            var daDung = arrPara[i].listCauPart6[j].daDung;
            
            switch (daDung){
                case "A":
                    checkAandDis += "checked='checked'";
                    break;
                case "B":
                    checkBandDis += "checked='checked'";
                    break;
                case "C":
                    checkCandDis += "checked='checked'";
                    break;
                case "D":
                    checkDandDis += "checked='checked'";
                    break;
            }
            
            listCau += '<div class="ques" data-id="'+arrPara[i].listCauPart6[j].id+'" data-asw="'+daDung+'}"><div>'
                        + '<div class="no-ques">Câu '+(startQues+j)+'</div>'
                        + '<span class="ques-content">'+arrPara[i].listCauPart6[j].cauHoi+'</span>'
                        + '</div><div class="row">'
                        + '<label class="scol-12 col-md-6"><input type="radio" '+checkAandDis
                        + ' name="choise'+arrPara[i].listCauPart6[j].id+'" value="A"><div class="asw-content">'+arrPara[i].listCauPart6[j].daA+'</div></label> <label'
                        + ' class="col-12 col-md-6"><input type="radio" '+checkBandDis
                        + ' name="choise'+arrPara[i].listCauPart6[j].id+'" value="B"><div class="asw-content">'+arrPara[i].listCauPart6[j].daB+'</div></label> <label'
                        + ' class="col-12 col-md-6"><input type="radio" '+checkCandDis
                        + ' name="choise'+arrPara[i].listCauPart6[j].id+'" value="C"><div class="asw-content">'+arrPara[i].listCauPart6[j].daC+'</div></label> <label'
                        + ' class="col-12 col-md-6"><input type="radio" '+checkDandDis
                        + ' name="choise'+arrPara[i].listCauPart6[j].id+'" value="D"><div class="asw-content">'+arrPara[i].listCauPart6[j].daD+'</div></label></div>'
                        + add
                        +'<hr></div>';
        }
        para = '<div class="boundary-para" data-id="'+arrPara[i].id+'">'
                +'<p class="ques refer-ques">Questions '+(startQues)+'-'+(startQues+2)
                +' refer to the following conversation.</p>'
                +listCau
                +'</div>';
        $(".list-cau").append(para);
    }
}

function resetList(){
    var i = 1;
    var refer = 1;
    $(".no-ques").each(function(){
        $(this).html("Câu "+i);
        i++;
    });
    $(".refer-ques").each(function(){
        $(this).html("Questions "+refer+"-"+(refer+2)+" refer to the following conversation.");
        refer+=3;
    });
}


//scroll ajax 
$("#model-choise-ques").on("scroll",function(){
     var sum = $("#modal-content-iques tr").length;
     var total = $("#total-ques").html();
     
     if(loadAjax == true){
         if(sum!=total){
             var s = $("#model-choise-ques").scrollTop(),
                 d = $("#model-choise-ques .modal-dialog").height(),
                 c = $(window).height();
             if( (d-c-s <= 100) ){
                 loadAjax=false;
                 $.ajax({
                     url: "update-part-doc/get-list-doan",
                     data: {
                         index: parseInt(sum),
                     },
                     success: function(data){
                         $("#sum-ques").html(parseInt(sum)+data.length);
                         
                         for(var i=0;i<data.length; i++){
                             resetTable(data[i]);
                         }
                         loadAjax= true;
                     }
                 });
             }
         }
     }
});

function resetTable(para, insertAfter, isPrepend){
    var quess='';
    for(i=0;i<3;i++){
        var checkA,checkB, checkC, checkD;
        if(para.listCauPart6[i].daDung=='A'){
            checkA="checked='checked'";
        }else if(para.listCauPart6[i].daDung=='B'){
            checkB="checked='checked'";
        }else if(para.listCauPart6[i].daDung=='C'){
            checkC="checked='checked'";
        }else{
            checkD="checked='checked'";
        }
        
        quess+='<div class="ques" data-asw="'+para.listCauPart6[i].daDung+'" data-id="'+para.listCauPart6[i].id+'"><div>'+
        '<span class="no-ques">Câu '+(i+1)+' </span>'+
        '<span class="ques-content">'+para.listCauPart6[i].cauHoi+'</span></div><div class="row" data-idpara="'+para.id+'">'+
        '<label class="col-12 col-md-6"><input '+checkA+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daA+'</span></label>'+
        '<label class="col-12 col-md-6"><input '+checkB+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daB+'</span></label>'+
        '<label class="col-12 col-md-6"><input '+checkC+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daC+'</span></label>'+
        '<label class="col-12 col-md-6"><input '+checkD+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daD+'</span></label></div><hr></div>'
    }
    var row = '<tr class="d-flex row" data-id="'+para.id+'"><td class="col-12">'
            + '<input class="checkbox-choise" type="checkbox">'
            + '<span class="ques-content">Đoạn văn id '+para.id+'</span>'
            + '<img class="expand-ico" src="/BKTOEIC/resources/img/next.png">'
            + '<img class="shorten-ico hide" src="/BKTOEIC/resources/img/down-arrow.png">'
            + '<div class="content-para hide">'
            +quess
            + '</div></td></tr>';
    if(isPrepend == true){
        console.log("prepend");
        $(".main-table tbody").prepend(row);
    }else if(typeof insertAfter == "undefined"){
        $(".main-table tbody").append(row);
    }else{
        $($.parseHTML(row)).insertAfter(insertAfter);
    }

}

//update
$(document).on("click", "#submit", function(){
    var isEnough = true;
    var part="";
    
    if($(".boundary-para").length != 4){
        alert("Hãy chọn đủ 4 đoạn văn để thêm!!!");
    }else{
        var arrDoan="[";
        $(".boundary-para").each(function(i){
            var arrCau="[";
            $(this).find("div.ques").each(function(){
                var arrDa = new Array();
                var cauHoi = $(this).find(".ques-content").html();
                var daDung = $(this).attr("data-asw");  
                $(this).find(".asw-content").each(function(indexCau){
                    arrDa[indexCau] = $(this).html();
                });
                if(arrCau.length==1){
                    arrCau+='{"id":"'+$(this).attr("data-id")+'", "cauHoi":"'+cauHoi+'", "daA":"'+arrDa[0]+'", "daB":"'
                                +arrDa[0]+'", "daC":"'+arrDa[0]+'", "daD":"'+arrDa[0]+'", "daDung":"'+daDung+'"}';
                } else{
                    arrCau+=',{"id":"'+$(this).attr("data-id")+'", "cauHoi":"'+cauHoi+'", "daA":"'+arrDa[0]+'", "daB":"'
                        +arrDa[0]+'", "daC":"'+arrDa[0]+'", "daD":"'+arrDa[0]+'", "daDung":"'+daDung+'"}';
                }
            });
            arrCau+="]";
            if(arrDoan.length==1){
                arrDoan+='{"id":"'+$(this).attr("data-id")+'", "listCauPart6":'+arrCau+'}';
            }else{
                arrDoan+=',{"id":"'+$(this).attr("data-id")+'", "listCauPart6":'+arrCau+'}';
            }
        });
        arrDoan+="]";
        if(($("#tittle").val()).length > 0){
            part = '{"id":"'+$("#id-part").html()+'", "loaiPart":"Part 6", "tittle":"'
                    +$("#tittle").val()+'", "listDoanVanPart6":'+arrDoan+'}';
            json = JSON.parse(part);
            console.log(json);

                        $.ajax({
                            url: $("#path-update").html(),
                            method: "POST",
                            data: {
                                part : part
                            },
                            success: function(data){
                                if(data == 'true'){
                                    alert("Update thành công!!!");
                                }else{
                                    alert("Update không thành công, kiểm tra lại!!!");
                                }
                            }
                         });
        }else{
            alert("Hãy điền tiêu đề!!!");
        }
    }
});