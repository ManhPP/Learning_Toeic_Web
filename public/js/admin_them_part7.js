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

//mo modal chon doan van don
var modalConfirmInput1 = function(callback) {
    $("#ico-add1").on("click", function() {
        cleanModal($("#model-choose-ques1"));
        $("#model-choose-ques1").modal('show');
    });

    $("#btn-input-yes1").on("click", function() {
        callback(true);
        $("#model-choose-ques1").modal('hide');
    });


    $("#btn-input-no1").on("click", function() {
        callback(false);
        $("#model-choose-ques1").modal('hide');
    });
    

};

modalConfirmInput1(function(confirm) {
    if(confirm == true){
        var paras = new Array();
        $("#model-choose-ques1 tbody tr").each(function(i){
            if($(this).hasClass("choose-this-para") == true && $(this).hasClass("chosen") == false){
                paras[i] = $(this).find(".div-append-para").html();
                $(this).find(".checkbox-choose").attr("disabled","disabled");
                $(this).addClass("chosen");
            }
        });
        addPara(paras, $(".list-cau1"));
    }
});

//mo modal chon doan van kep
var modalConfirmInput2 = function(callback) {
    $("#ico-add2").on("click", function() {
        cleanModal($("#model-choose-ques2"));
        $("#model-choose-ques2").modal('show');
    });
    
    $("#btn-input-yes2").on("click", function() {
        callback(true);
        $("#model-choose-ques2").modal('hide');
    });
    
    
    $("#btn-input-no2").on("click", function() {
        callback(false);
        $("#model-choose-ques2").modal('hide');
    });
    
    
};

modalConfirmInput2(function(confirm) {
    if(confirm == true){
        var paras = new Array();
        $("#model-choose-ques2 tbody tr").each(function(i){
            if($(this).hasClass("choose-this-para") == true && $(this).hasClass("chosen") == false){
                paras[i] = $(this).find(".div-append-para").html();
                $(this).find(".checkbox-choose").attr("disabled","disabled");
                $(this).addClass("chosen");
            }
        });
        addPara(paras, $(".list-cau2"));
    }
});

$(document).on("click", "#model-choose-ques1 table tbody tr", function(){
    openWindowPrev($(this).find(".div-append-para").html(), $("#style-for-prev").html());
})

$(document).on("click", "#model-choose-ques2 table tbody tr", function(){
    openWindowPrev($(this).find(".div-append-para").html(), $("#style-for-prev").html());
})

//del para 1
$(document).on("click",".list-cau1 .ico-del", function(){
    var id = $(this).attr("data-idpara");
    $(".body .boundary-para[data-id='"+id+"']").remove();
    resetIndex($(".list-cau1"));
    removePara($("#model-choose-ques1 tbody tr[data-id='"+id+"']"))
})

//del para 2
$(document).on("click",".list-cau2 .ico-del", function(){
    var id = $(this).attr("data-idpara");
    $(".body .boundary-para[data-id='"+id+"']").remove();
    resetIndex($(".list-cau2"));
    removePara($("#model-choose-ques2 tbody tr[data-id='"+id+"']"))
})

// scroll 1 ajax 
$("#model-choose-ques1").on("scroll",function(){
    var sum = $("#sum-ques1").html();
    var total = $("#total-ques1").html();
    
    if($("#sum-ques1").html() != $("#total-ques1").html()){
        if(sum!=total){
            var s = $("#model-choose-ques1").scrollTop(),
                d = $("#model-choose-ques1 .modal-dialog").height(),
                c = $(window).height();
            if( (d-c-s <= 100) && loadAjax==true ){
                loadAjax=false;
                $.ajax({
                    url: "add-part7/get-list-doan",
                    data: {
                        index: parseInt(sum),
                        loaiPart: "Đoạn đơn"
                    },
                    success: function(data){
                        $("#sum-ques1").html(parseInt(sum)+data.length);
                        
                        for(var i=0;i<data.length; i++){
                            resetTable(data[i], $("#model-choose-ques1 table tbody"));
                        }
                        loadAjax= true;
                    }
                });
            }
        }
    }
});

// scroll 2 ajax 
$("#model-choose-ques2").on("scroll",function(){
    var sum = $("#sum-ques2").html();
    var total = $("#total-ques2").html();
    
    if($("#sum-ques2").html() != $("#total-ques2").html()){
        if(sum!=total){
            var s = $("#model-choose-ques2").scrollTop(),
            d = $("#model-choose-ques2 .modal-dialog").height(),
            c = $(window).height();
            if( (d-c-s <= 100) && loadAjax==true ){
                loadAjax=false;
                $.ajax({
                    url: "add-part7/get-list-doan",
                    data: {
                        index: parseInt(sum),
                        loaiPart: "Đoạn kép"
                    },
                    success: function(data){
                        $("#sum-ques2").html(parseInt(sum)+data.length);
                        
                        for(var i=0;i<data.length; i++){
                            resetTable(data[i], $("#model-choose-ques2 table tbody"));
                        }
                        loadAjax= true;
                    }
                });
            }
        }
    }
});


function resetTable(doanVan, tbody){
    var cau = "", morePara="";
    var numQues="";
    
    for(i = 0; i<doanVan.listCauPart7.length; i++){
        var c = doanVan.listCauPart7[i];
        var daDung = c.daDung;
        var checkA='',checkB='',checkC='',checkD='';
        
        if(daDung == "A"){
            checkA = 'checked="checked"';
        }else if(daDung == "B"){
            checkB = 'checked="checked"';
        }else if(daDung == "C"){
            checkC = 'checked="checked"';
        }else{
            checkD = 'checked="checked"';
        }
        
        cau += '<div class="ques" data-id="'+c.id+'" data-asw="'+c.daDung+'">'
                + '<div><span class="no-ques">Câu '+(i+1)+'</span><span'
                + ' class="ques-content">'+c.cauHoi+'</span></div>'
                + ' <div class="row"><label class="col-12 col-md-6"><input type="radio"'
                + ' name="choose'+(i+1)+'" value="A" '+checkA+' disabled="disabled"><span'
                + ' class="asw-content">'+c.daA+'</span></label> <label'
                + ' class="col-12 col-md-6"><input type="radio"'
                + ' name="choose'+(i+1)+'" value="B" '+checkB+' disabled="disabled"><span'
                + ' class="asw-content">'+c.daB+'</span></label> <label'
                + ' class="col-12 col-md-6"><input type="radio"'
                + ' name="choose'+(i+1)+'" value="C" '+checkC+' disabled="disabled"><span'
                + ' class="asw-content">'+c.daC+'</span></label> <label'
                + ' class="col-12 col-md-6"><input type="radio"'
                + ' name="choose'+(i+1)+'" value="D" '+checkD+' disabled="disabled"><span'
                + ' class="asw-content">'+c.daD+'</span></label>'
                + ' </div><hr></div>';
    }
    
    if(doanVan.doanVan2.length>0){
        morePara = '<br><img src="'+doanVan.doanVan2+'">';
    }else{
        numQues =' (<span class="num-ques">'+doanVan.listCauPart7.length+'</span> câu)';
    }
    
    
    var append = '<tr class="d-flex row" data-id="'+doanVan.id+'">'
            + '<td class="col-12">'
            + '<input class="checkbox-choose" type="checkbox">'
            + '<span class="ques-content"> Đoạn văn id '+doanVan.id+' - <span'
            + ' class="type-part">'+doanVan.loaiPart7
            +numQues
            +'</span></span>'
            + '<img class="expand-ico"'
            + 'src="'+'/imgs/next.png">'
            + '<div class="div-append-para hide"><div class="boundary-para" data-id="'
            +doanVan.id+'" data-num-ques="'
            +doanVan.listCauPart7.length+'"><div class="paragrap">'
            + '<img src="'+doanVan.doanVan1+'">'
            + morePara
            + '</div><div class="para" data-id="'+doanVan.id+'">'
            +cau
            + '</div></div></div></td></tr>';
    tbody.append(append);
    
}

function openWindowPrev(content, style){
    var rootPath =  window.location.origin;
    var w = window.open('','test','height=600, width=800'); 
    $(w.document.head).append('<link rel="stylesheet" type="text/css" href="'+rootPath+$("#root-path").html()+'/resources/css/bootstrap.min.css">')
    $(w.document.body).html(content+style);
    $(w.document.body).css("padding-top","2em");
    $(w.document.body).find(".paragrap img").each(function(){
        var src = rootPath+$(this).attr("src");
        $(this).attr("src", src);
    });
}

//check box cho doan don
$(document).on("click", "#model-choose-ques1 tbody .checkbox-choose", function(e){
    e.stopPropagation();
    var tr =  $(this).parent().parent();
    var numPara, numQues;
    if( tr.hasClass("choose-this-para") == true ){
        numPara = parseInt($("#num-doan-choose1").html())-1;
        numQues = parseInt($("#num-cau-choose1").html()) - parseInt($(this).parent().find(".num-ques").html());
    }else{
        numPara = parseInt($("#num-doan-choose1").html())+1;
        numQues = parseInt($("#num-cau-choose1").html()) + parseInt($(this).parent().find(".num-ques").html());
    }
    
    if((numPara<9 && numQues<28)||(numPara==9 && numQues==28)){
        tr.toggleClass("choose-this-para");
        
        $("#num-doan-choose1").html(numPara);
        $("#num-cau-choose1").html(numQues);
    }else{
        e.preventDefault();
        if(numPara>9 && numQues>28){
            alert("Không được chọn quá số đoạn và câu!!!");
        }else{
            alert("Phải chọn đủ số đoạn văn và số câu!!!");
        }
        
    }
    
});
//check box cho doan kep
$(document).on("click", "#model-choose-ques2 tbody .checkbox-choose", function(e){
    e.stopPropagation();
    var tr =  $(this).parent().parent();
    var numPara;
    if( tr.hasClass("choose-this-para") == true ){
        numPara = parseInt($("#num-doan-choose2").html())-1;
    }else{
        numPara = parseInt($("#num-doan-choose2").html())+1;
    }
    
    if((numPara<=4)){
        tr.toggleClass("choose-this-para");
        
        $("#num-doan-choose2").html(numPara);
    }else{
        e.preventDefault();
        alert("Không được chọn quá số đoạn văn!!!");
        
    }
    
});

function addPara(paras, typeList){
    
    for(var i=0; i<paras.length; i++){
        typeList.append(paras[i]);
    }
    resetIndex(typeList);
}

function resetIndex(typeList){
    var numQues=0;
    
    
    typeList.find(".boundary-para").each(function(i){
        var minusIco = '<div class="align-right"><img class="ico-modified ico-del" alt="minus" data-idpara="'
                        +$(this).attr("data-id")+'" src="/imgs/round-minus.png"></div>';
        if($(this).find(".ico-del").length==0){
            $($.parseHTML(minusIco)).insertAfter($(this).find(".ques").last().find(".row"));
            $(this).prepend('<p class="ques refer-ques">Questions <span class="begin"></span>-<span class="end"></span> refer to the following conversation.</p>');
        }
        
        var begin = numQues+1;
        var end = numQues + parseInt($(this).attr("data-num-ques"));
        numQues=end;
        
        
        $(this).find(".begin").html(begin);
        $(this).find(".end").html(end);
        
        $(this).find(".no-ques").each(function(j){
            $(this).html("Câu "+(begin+j));
        });
    });
    
    typeList.attr("data-num-ques", numQues);
}

function removePara(tr){
//    tr.removeClass("choose-this-para");
    tr.removeClass("chosen");
    tr.find(".checkbox-choose").removeAttr("disabled");
    tr.find(".checkbox-choose").click();
}

// bo chon cac check box k confirm tren modal
function cleanModal(modal){
    modal.find("table tbody tr").each(function(){
       if($(this).hasClass("choose-this-para")==true && $(this).hasClass("chosen") == false){
           $(this).find(".checkbox-choose").click();
       } 
    });
}


$(document).on("click", "#submit-add", function(){
    var part7="", listDoanVanPart7="[";
    var title = $("#tittle").val();
    var isFilTitle = true;
    var numPara1=0,numPara2=0;
    
    if(title.length==0){
        isFilTitle = false;
    }
    
    
    $(".list-cau .boundary-para").each(function(i){
        var doanVan1="", doanVan2="";
        $(this).find(".paragrap img").each(function(i){
            if(i==0){
                numPara1++;
                doanVan1=$(this).attr("src");
            }else{
                numPara2++;
                doanVan2=$(this).attr("src");
            }
        });
        
        var listCauPart7="[";
        $(this).find(".para .ques").each(function(){
            var arrDa = new Array();
            $(this).find(".asw-content").each(function(i){
                arrDa[i] = $(this).html();
            });
            if(listCauPart7.length==1){
                listCauPart7+='{"id":"'
                                +$(this).attr("data-id")+'", "cauHoi":"'+$(this).find(".ques-content").html()
                                +'", "daA":"'+arrDa[0]+'", "daB":"'+arrDa[1]+'", "daC":"'+arrDa[2]+'", "daD":"'
                                +arrDa[3]+'", "daDung":"'+$(this).attr("data-asw")+'"}';
            }else{
                listCauPart7+=',{"id":"'
                    +$(this).attr("data-id")+'", "cauHoi":"'+$(this).find(".ques-content").html()
                    +'", "daA":"'+arrDa[0]+'", "daB":"'+arrDa[1]+'", "daC":"'+arrDa[2]+'", "daD":"'
                    +arrDa[3]+'", "daDung":"'+$(this).attr("data-asw")+'"}';
            }
        });
        listCauPart7+="]";
        
        if(listDoanVanPart7.length==1){
            listDoanVanPart7+='{"id":"'+$(this).attr("data-id")+'","doanVan1":"'+doanVan1+'", "doanVan2":"'
                                +doanVan2+'", "loaiPart7":"'+$(this).parent().attr("data-type")
                                +'", "listCauPart7":'+listCauPart7+'}';
        }else{
            listDoanVanPart7+=',{"id":"'+$(this).attr("data-id")+'","doanVan1":"'+doanVan1+'", "doanVan2":"'
                                +doanVan2+'", "loaiPart7":"'+$(this).parent().attr("data-type")
                                +'", "listCauPart7":'+listCauPart7+'}';
        }
        
    });
    listDoanVanPart7+="]";
    
    part7='{"id":"null", "loaiPart":"Part 7", "accessCount":"0", "title":"'+title+'"}';
    
    
    if(isFilTitle==false){
        alert("Hãy điền tiêu đề cho bài!!!");
    }else if(numPara1-numPara2<9){
        alert("Hãy chọn đủ đoạn văn cho part đơn!!!");
    }else if(numPara2<4){
        alert("Hãy chọn đủ đoạn văn cho part kép!!!");
    }else{

        json = JSON.parse(part7);
        console.log(json);
        
        // $.ajax({
        //     url: $("#root-path").html()+"/admin/bai-hoc-manager/add-part-doc/check-repeat",
        //     method: "POST",
        //     data: {
        //         part7: part7,
        //         listDoanVan: listDoanVanPart7
        //     },
        //     success: function(data){
        //         console.log(data);
        //         if(data == true){
                    $.ajax({
                        url: $("#path-add").html(),
                        method: "POST",
                        data: {
                            part7: part7,
                            listDoanVan: listDoanVanPart7
                        },
                        success: function(data){
                            if(data == "true"){
                                alert("Thêm thành công!!!");
                            }else{
                                alert("Thêm không thành công, kiểm tra lại!!!");
                            }
                        }
                     });
        //         }else{
        //             alert("Bài đọc bị trùng, hãy chọn các câu khác!!!");
        //         }
        //     }
        //  });
    }
    
});
