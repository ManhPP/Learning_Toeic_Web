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


$(document).on("click",".main-table tbody tr td",function(){
    $(this).find(".content-para").toggleClass("hide");
    $(this).find(".expand-ico").toggleClass("hide");
    $(this).find(".shorten-ico").toggleClass("hide");
});

 // them doan van
 var modalConfirmInput = function(callback) {
	$("#ico-add-ques").on("click", function() {
	    resetInput();
		$("#model-input-ques").modal('show');
	});

	$("#btn-input-yes").on("click", function() {
		callback(0);
		$("#model-input-ques").modal('hide');
	});

	$("#btn-input-oan").on("click", function() {
		callback(1);
		$("#model-input-ques").modal('hide');
	});

	$("#btn-input-no").on("click", function() {
		callback(2);
		$("#model-input-ques").modal('hide');
	});
	

};

modalConfirmInput(function(confirm) {
	if(confirm == 0 || confirm == 1){
	    var doanVan="";
	    var arrCau="[";
	    
	    $("#modal-content-iques .div-ques").each(function(){
	        var ques1 = $(this).find(".ques1-input").val();
	        var ques2 = $(this).find(".ques2-input").val();
	        var ques = ques1+" ........ "+ques2;
	        var daDung =  $(this).find("input[type='radio']:checked").attr("value");
	        var arrayAsw = new Array();
	        $(this).find(".input-asw").each(function(i){
	            arrayAsw[i] = $(this).val(); 
	        });
	        
	        if(arrCau.length == 1){
	            arrCau += '{"id":"null", "cauHoi":"'+ques+'", "daA":"A: '+arrayAsw[0]
	                            +'", "daB":"B: '+arrayAsw[1]+'", "daC":"C: '+arrayAsw[2]
	                            +'", "daD":"D: '+arrayAsw[3]+'","daDung":"'+daDung+'"}';
	        }else{
                arrCau += ',{"id":"null", "cauHoi":"'+ques+'", "daA":"A: '+arrayAsw[0]
                +'", "daB":"B: '+arrayAsw[1]+'", "daC":"C: '+arrayAsw[2]
                +'", "daD":"D: '+arrayAsw[3]+'","daDung":"'+daDung+'"}';
	        }
	    });

        arrCau+="]";
	    
	    doanVan+='{"id":"null", "listCauPart6":'+arrCau+'}';
	    
	    var para = JSON.parse(doanVan);
	    
	    if(checkData(para) == true){
	        $.ajax({
	            url: "manager-doan-part6/add",
	            method:"POST",

	            data: {
	                para:doanVan
                },
	            success: function(data){
	                if(parseInt(data)>0){
	                    if( parseInt($("#total-ques").html()) == parseInt($("#sum-ques").html()) ){
	                        para["id"] = data;
	                        $("#sum-ques").html(parseInt($("#sum-ques").html())+1);
	                        console.log(para+"----");
	                        alert("Thêm thành công!!!")
	                        resetTable(para);
	                    }
	                    $("#total-ques").html(parseInt($("#total-ques").html())+1);
	                    
	                }else{
	                    alert("Thêm mới không thành công!!");
	                }
	            }
	         });
	    }else{
	        alert("Phải điền đầy đủ các trường!!!");
	    }
	    
	    
	    
	}else{
	    resetInput();
	}
});

//update cau hoi
 var modalConfirmUpdate = function(callback) {
    var id;
	$(document).on("click", ".btn-update", function(e) {
		e.stopPropagation();
		loadDataForUpdate($(this).parent().parent().parent());
		id = $(this).attr("data-id");
		$("#model-update-ques").modal('show');
	});

	$("#btn-update-yes").on("click", function() {
		callback(true, id);
		$("#model-update-ques").modal('hide');
	});

	$("#btn-update-no").on("click", function() {
		callback(false);
		$("#model-update-ques").modal('hide');
	});
	

};

modalConfirmUpdate(function(confirm, id) {
    if(confirm==true){
        
        var doanVan="";
        var arrCau="[";
        var insertAfter;
        var isPrepend = false;
        
        
        $("#modal-content-update .div-ques").each(function(noQues){
            var ques1 = $(this).find(".ques1-input").val();
            var ques2 = $(this).find(".ques2-input").val();
            var ques = ques1+" ........ "+ques2;
            var daDung =  $(this).find("input[type='radio']:checked").attr("value");
            var arrayAsw = new Array();
            $(this).find(".input-asw").each(function(i){
                arrayAsw[i] = $(this).val(); 
            });
            
            
            if(arrCau.length == 1){
                arrCau += '{"id":"'+$(this).attr("data-id")+'", "cauHoi":"'+ques+'", "daA":"A: '+arrayAsw[0]
                                +'", "daB":"B: '+arrayAsw[1]+'", "daC":"C: '+arrayAsw[2]
                                +'", "daD":"D: '+arrayAsw[3]+'","daDung":"'+daDung+'"}';
            }else{
                arrCau += ',{"id":"'+$(this).attr("data-id")+'", "cauHoi":"'+ques+'", "daA":"A: '+arrayAsw[0]
                +'", "daB":"B: '+arrayAsw[1]+'", "daC":"C: '+arrayAsw[2]
                +'", "daD":"D: '+arrayAsw[3]+'","daDung":"'+daDung+'"}';
            }
        });

        arrCau+="]";
        
        doanVan+='{"id":"'+id+'", "listCauPart6":'+arrCau+'}';
        var para = JSON.parse(doanVan);
        
        if(checkData(para) ==true){
            $.ajax({
                url: "manager-doan-part6/update",
                method:"POST",
                data: {
                    para : doanVan
                },
                success: function(data){
                    if(data=='true'){
                        var temp;
                        $(".main-table tbody tr").each(function(i){
                            if($(this).attr("data-id") == id) {
                                if(i==0){
                                    isPrepend = true;
                                }else{
                                    insertAfter = temp;
                                }
                            }else{
                                temp = $(this);
                            }
                            
                        });
                        removeRow(id);
                        resetTable(para, insertAfter,isPrepend);
                        alert("Update thành công!!!");
                    }else{
                        alert("Update không thành công!!!")
                    }
                }
             });
        }else{
            alert("Hãy điền đầy đủ các trường!!!");
        }
        
        
    }
    resetInput();
});

//load data for update 
function loadDataForUpdate(tr){
    var arrQues = new Array();
    var arrDaDung = new Array();
    var arrAsw = new Array();
    var arrId = new Array();
    tr.find(".ques").each(function(i){
        var arrTemp=new Array();
        arrQues[i] = $(this).find(".ques-content").html().split(" ........ ");
        $(this).find(".asw-content").each(function(index){
            arrTemp[index]=$(this).html();
        });
        arrAsw[i] = [arrTemp[0].substr(3, arrTemp[0].length)
                    ,arrTemp[1].substr(3, arrTemp[1].length)
                    ,arrTemp[2].substr(3, arrTemp[2].length)
                    ,arrTemp[3].substr(3, arrTemp[3].length)];
        arrDaDung[i] = $(this).attr("data-asw");
        arrId[i] = $(this).attr("data-id");
    });
    $("#model-update-ques .div-ques").each(function(i){
        $(this).attr("data-id", arrId[i]);
        $(this).find(".ques1-input").val(arrQues[i][0]);
        $(this).find(".ques2-input").val(arrQues[i][1]);
        
        $(this).find(".input-asw").each(function(index){
            $(this).val(arrAsw[i][index]);
        });
        
        $(this).find("input[type='radio'][value='"+arrDaDung[i]+"']").click();
       
    });
//	$(this).find(".expand-ico").toggleClass("hide");
//	$(this).find(".shorten-ico").toggleClass("hide");
}

// xoa doan
$(document).on("click", ".btn-del", function(e){
    e.stopPropagation();
    var id = $(this).attr("data-id");
    $.ajax({
        url: "manager-doan-part6/del",
        data: {
            id:id
        },
        method: "GET",
        success: function(data){
            if(data=='true'){
                removeRow(id);
                alert("Xóa thành công!!!");
            }else{
                alert("Xóa không thành công!!!");
            }
        }
    });
});

$(window).on("scroll",function(){
    var sum = $("#sum-ques").html();
    var total = $("#total-ques").html();
    
    if($("#sum-ques").html() != $("#total-ques").html()){
        if(sum!=total){
            var s = $(window).scrollTop(),
                d = $(document).height(),
                c = $(window).height();
            if( (d-c-s <= 100) && loadAjax==true){
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

//reset page input
function resetInput(){
    $(".div-ques").each(function(){
       $(this).find(".ques1-input").val("");
       $(this).find(".ques2-input").val("");
       $(this).find("input[type='radio'][value='A']").click();
       $(this).find(".input-asw").each(function(){
           $(this).val("");
       });
    });
    
    
    $(".pagination-input[data-page='1']").each(function(){
        $(this).click();
    });
}

//chuyen page in put
$(document).on("click", ".pagination-input",function(){
    if($(this).attr("data-page")=="1"){
        $(".ques-in-para").html("1");
        $(".div-ques[data-index='1']").removeClass("hide");
        $(".pagination-input[data-page='1']").addClass("active");
        $(".div-ques[data-index='2']").addClass("hide");
        $(".pagination-input[data-page='2']").removeClass("active");
        $(".div-ques[data-index='3']").addClass("hide");
        $(".pagination-input[data-page='3']").removeClass("active");
    }else if($(this).attr("data-page")=="2"){
        $(".ques-in-para").html("2");
        $(".div-ques[data-index='1']").addClass("hide");
        $(".pagination-input[data-page='1']").removeClass("active");
        $(".div-ques[data-index='2']").removeClass("hide");
        $(".pagination-input[data-page='2']").addClass("active");
        $(".div-ques[data-index='3']").addClass("hide");
        $(".pagination-input[data-page='3']").removeClass("active");
    }else if($(this).attr("data-page")=="3"){
        $(".ques-in-para").html("3");
        $(".div-ques[data-index='1']").addClass("hide");
        $(".pagination-input[data-page='1']").removeClass("active");
        $(".div-ques[data-index='2']").addClass("hide");
        $(".pagination-input[data-page='2']").removeClass("active");
        $(".div-ques[data-index='3']").removeClass("hide");
        $(".pagination-input[data-page='3']").addClass("active");
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
        '<span class="ques-content">'+para.listCauPart6[i].cauHoi+'</span></div><div class="row">'+
        '<label class="col-12 col-md-6"><input '+checkA+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daA+'</span></label>'+
        '<label class="col-12 col-md-6"><input '+checkB+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daB+'</span></label>'+
        '<label class="col-12 col-md-6"><input '+checkC+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daC+'</span></label>'+
        '<label class="col-12 col-md-6"><input '+checkD+' type="radio" disabled="disabled" name="choise'+para.listCauPart6[i].id+i+'"><span class="asw-content">'+para.listCauPart6[i].daD+'</span></label></div><hr></div>'
    }
    var row = '<tr class="d-flex row" data-id="'+para.id+'"><td class="col-12">'
            + '<img class="ico-forward" src="/BKTOEIC/resources/img/forward-arrow.png">'
            + '<span class="ques-content">Đoạn văn id '+para.id+'</span><div class="controll-ques">'
            + '<span class="btn-update" data-id="'+para.id+'">update</span><span> • </span>'
            + '<span class="btn-del" data-id="'+para.id+'">delete</span></div>'
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

function removeRow(id){
    $(".main-table tbody tr[data-id='"+id+"']").remove();
}

function checkData(data){
    var isTrue=true;
    for(i=0; i<3; i++){
        cau = data.listCauPart6[i];
        if(cau.cauHoi == " ........ " || cau.daA.length<=3 || cau.daB.length<=3 || cau.daC.length<=3 || cau.daD.length<=3 || cau.daDung.length!=1 ){
            isTrue = false;
        }
    }
    return isTrue;
}
