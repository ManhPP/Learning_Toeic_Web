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


$(document).on("click","#checkbox-choise", function(e){
    e.stopPropagation();
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

modalConfirmInput(function(confirm) {
    if(confirm == 0){
        var paras = new Array();
        
        $(".checkbox-choise[disabled!='disabled']:checked").each(function(i){
            var choisePara=$(this).parent().parent();
            var arrListCau = new Array();
            
            choisePara.find(".content-para .ques").each(function(index){
                var ques = $(this);
                var arrDa = new Array();
                $(this).find(".asw-content").each(function(indexAsw){
                   arrDa[indexAsw] = $(this).html();
                });
                arrListCau[index] = new function(){
                    this.id = ques.attr("data-id");
                    this.daA = arrDa[0];
                    this.daB = arrDa[1];
                    this.daC = arrDa[2];
                    this.daD = arrDa[3];
                    this.daDung = ques.attr("data-asw");
                    this.cauHoi = ques.find(".ques-content").html();
                }
            });
            
            paras[i] = new function(){
                this.id = choisePara.attr("data-id");
                this.listCauPart6 = arrListCau;
            }
        });
        $(".choise-this-para").each(function(){
            $(this).find(".choise-this-checkbox").attr("disabled", "disabled");
        });
        addPara(paras);
    }else{
        $(".choise-this-para").each(function(){
            $(this).find(".choise-this-checkbox[disabled!='disabled']").click();
        });
    }
});

function addPara(paras){

    var begin = ($(".refer-ques").length)*3+1;
    for(var i=0; i<paras.length; i++){
        var str = begin+"-"+(begin+2);
        var arrCheck = new Array();
        for(var j =0; j<12; j++){
            arrCheck[j] = "";
        }
        
        for(var j=0;j<3;j++){
            var da = paras[i].listCauPart6[j].daDung;
            if(da=='A'){
                arrCheck[j*4] = "checked='checked'";
            }else if(da=='B'){
                arrCheck[j*4+1] = "checked='checked'";
            }else if(da=='C'){
                arrCheck[j*4+2] = "checked='checked'";
            }else{
                arrCheck[j*4+3] = "checked='checked'";
            }
        }
        
        var row = '<div class="boundary-para" data-id="'+paras[i].id+'"><p class="ques refer-ques">Questions '
            +str
            +' refer to the following conversation.</p><div class="ques" data-id="'
            +paras[i].listCauPart6[0].id+'" data-asw="'
            +paras[i].listCauPart6[0].daDung+'"><div><span class="no-ques">Câu '
            +begin+
            '</span><span class="ques-content">'
            +paras[i].listCauPart6[0].cauHoi
            +'</span></div><div class="row"><label class="col-12 col-md-6"><input '
            +arrCheck[0]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[0].id+'"><span class="asw-content">'
            +paras[i].listCauPart6[0].daA
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[1]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[0].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[0].daB
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[2]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[0].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[0].daC
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[3]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[0].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[0].daD
            +'</span></label> </div><hr></div><div class="ques" data-id="'
            +paras[i].listCauPart6[1].id+'" data-asw="'
            +paras[i].listCauPart6[1].daDung+'"><div><span class="no-ques">Câu '
            +(begin+1)
            +'</span><span class="ques-content">'
            +paras[i].listCauPart6[1].cauHoi
            +'</span></div><div class="row"><label class="col-12 col-md-6"><input '
            +arrCheck[4]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[1].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[1].daA
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[5]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[1].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[1].daB
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[6]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[1].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[1].daC
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[7]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[1].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[1].daD
            +'</span></label></div><hr></div><div class="ques" data-id="'
            +paras[i].listCauPart6[2].id+'" data-asw="'
            +paras[i].listCauPart6[2].daDung+'"><div><span class="no-ques">Câu '
            +(begin+2)
            +'</span><span class="ques-content">'
            +paras[i].listCauPart6[2].cauHoi
            +'</span></div><div class="row"><label class="col-12 col-md-6"><input '
            +arrCheck[8]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[2].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[2].daA
            +'</span></label><label class="col-12 col-md-6"><input '
            +arrCheck[9]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[2].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[2].daB
            +'</span></label> <label class="col-12 col-md-6"><input '
            +arrCheck[10]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[2].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[2].daC
            +'</span></label><label class="col-12 col-md-6"><input '
            +arrCheck[11]+' type="radio" disabled="disabled" name="choise'
            +paras[i].listCauPart6[2].id
            +'"><span class="asw-content">'
            +paras[i].listCauPart6[2].daD
            +'</span></label></div><div class="align-right">'
            +'<img class="ico-modified ico-del" alt="minus" data-idpara="'
            +paras[i].id
            +'" src="/imgs/round-minus.png"></div><hr></div></div>';

        begin+=3;
        $(".list-cau").append(row);
    }
    
    
}

// expand or shorten ques in para
$(document).on("click",".main-table tbody tr td",function(){
    $(this).find(".content-para").toggleClass("hide");
    $(this).find(".expand-ico").toggleClass("hide");
    $(this).find(".shorten-ico").toggleClass("hide");
});

// scroll ajax 
$("#model-choise-ques").on("scroll",function(){
    var sum = $("#modal-content-iques tbody tr").length;
    var total = $("#total-ques").html();
    
    if(loadAjax == true){
        if(sum!=total){
            var s = $("#model-choise-ques").scrollTop(),
                d = $("#model-choise-ques .modal-dialog").height(),
                c = $(window).height();
            if( (d-c-s <= 100) ){
                loadAjax=false;
                $.ajax({
                    url: "manager-doan-part6/get-list-doan",
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
            + '<img class="expand-ico" src="/imgs/next.png">'
            + '<img class="shorten-ico hide" src="/imgs/down-arrow.png">'
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

//chon doan de add
$(document).on("click", ".checkbox-choise", function(e){
    e.stopPropagation();
    var numChoise = $(".checkbox-choise:checked").length;
    $(this).toggleClass("choise-this-checkbox");
    console.log(numChoise);
    if( parseInt(numChoise) <= 4 ){
        $(this).parent().parent().toggleClass("choise-this-para");
        $("#num-cau-choise").html(numChoise);
    }else{
        e.preventDefault();
        alert("Không thể chọn quá 4 đoạn văn trong cùng 1 part 6!!!");
    }
});

// del para 
$(document).on("click", ".ico-del", function(){
    var idPara = $(this).attr("data-idpara");
    console.log(idPara);
    var tr = $("#modal-content-iques").find("tr[data-id='"+idPara+"']");
    tr.find("input[type='checkbox']").removeAttr("disabled");
    tr.find("input[type='checkbox']").click();
    $(this).parent().parent().parent().remove();
});

// add part
$(document).on("click", "#submit-add", function(){
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
            part = '{"id":"null", "loaiPart":"Part 6", "tittle":"'
                    +$("#tittle").val()+'", "listDoanVanPart6":'+arrDoan+'}';
            // json = JSON.parse(part);
            console.log(part);
            $.ajax({
                url: $("#path-add").html(),
                method: "POST",
                data: {
                    part6 : part
                },
                success: function(data){
                    if(data == 'true'){
                        alert("Thêm thành công!!!");
                    }else{
                        alert("Thêm không thành công, kiểm tra lại!!!");
                    }
                }
            });
        }else{
            alert("Hãy điền tiêu đề!!!");
        }
    }
});

