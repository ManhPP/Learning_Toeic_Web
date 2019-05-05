var loadAjax = true;

$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


//up load image
$(".upload-para").change(function(event) {
    var parent = $(this).parent();
    var form = ($(this).parent())[0];
    $.ajax({
        url: $("#path-upload").html(),
        method: "POST",
        data: new FormData(form),
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            parent.attr("data-path", data.pathFile);
        }
    });

});

$(document).on("click",".main-table tbody tr td",function(){
});

// them doan van
var modalConfirmInput = function(callback) {
    $("#ico-add-ques").on("click", function() {
        resetInput();
        $("#model-input-ques").modal('show');
    });

    $("#btn-input-yes").on("click", function() {
        callback(0);

    });


    $("#btn-input-no").on("click", function() {
        callback(2);
        $("#model-input-ques").modal('hide');
    });


};

modalConfirmInput(function(confirm) {
    if(confirm == 0){
        var doanPart7="";
        var doanVan1="";
        var doanVan2="";
        var listCauPart7="[";
        var loaiPart7="";
        var numQues = 5;
        var isFillAll = true;
        var arr = ["A: ", "B: ", "C: ", "D: "];

        doanVan1 = $("#form-up-img1").attr("data-path");

        if( $(".type-para input[type='radio']:checked").val() == 1 ){
            loaiPart7="Đoạn đơn";
            numQues=parseInt($("#select-num-ques").val());
        }else{
            loaiPart7="Đoạn kép";
            doanVan2 = $("#form-up-img2").attr("data-path");
            if(doanVan2 == "" || typeof doanVan2 == "undefined") isFillAll = false;
        }

        for(var i=0; i<numQues; i++){
            var ques="";
            var daDung="";
            var arrAsw = new Array();
            var divQues = $("#model-input-ques .div-ques[data-index='"+(i+1)+"']");
            divQues.find(".input-asw").each(function(i){
                arrAsw[i] = $(this).val();
                if(arrAsw[i] == "") isFillAll = false;
                arrAsw[i] = arr[i]+arrAsw[i];
            });
            ques=divQues.find(".ques1-input").val();
            daDung = divQues.find("input[type='radio']:checked").val();

            if(listCauPart7.length == 1){
                listCauPart7 += '{"id":"null", "cauHoi":"'+ques+'", "daA":"'
                    +arrAsw[0]+'", "daB":"'+arrAsw[1]+'", "daC":"'+arrAsw[2]
                    +'", "daD":"'+arrAsw[3]+'", "daDung":"'+daDung+'"}';
            }else{
                listCauPart7 += ',{"id":"null", "cauHoi":"'+ques+'", "daA":"'
                    +arrAsw[0]+'", "daB":"'+arrAsw[1]+'", "daC":"'+arrAsw[2]
                    +'", "daD":"'+arrAsw[3]+'", "daDung":"'+daDung+'"}';
            }

        }
        listCauPart7+="]";

        doanPart7 = '{"id":"null", "doanVan1":"'+doanVan1+'", "doanVan2":"'
            +doanVan2+'", "loaiPart7":"'+loaiPart7+'", "listCauPart7":'
            +listCauPart7+'}';

        json = JSON.parse(doanPart7);

        console.log(json);

        if(ques=="" || daDung=="" || doanVan1=="" || typeof doanVan1 == "undefined" ){
            isFillAll = false;
        }

        if(isFillAll == true){
            $.ajax({
                url: $("#path-add").html(),
                method:"post",
                data: {
                    part7:doanPart7
                },
                success: function(data){
                    console.log("111111111");
                }
            });
        }else{
            alert("Hãy điền đầy đủ thông tin!!!");
        }


    }

});

//update cau hoi
var modalConfirmUpdate = function(callback) {
    var id;
    $(document).on("click", ".btn-update", function(e) {
        e.stopPropagation();
        var doanVan = loadDataForUpdate($(this).parent().parent().parent());
        json = JSON.parse(doanVan);
        updateToModal(json);
        $("#model-update-ques").modal("show");
    });

    $("#btn-update-yes").on("click", function() {
        callback(true);
        $("#model-update-ques").modal('hide');
    });

    $("#btn-update-no").on("click", function() {
        callback(false);
        $("#model-update-ques").modal('hide');
    });


};

modalConfirmUpdate(function(confirm) {
    if(confirm == true){
        var doanVan = getDataUpdate();
        if(doanVan == false){
            alert("Hãy điền đầy đủ các trường!!");
        }else{
            $.ajax({
                url: "manager-doan-part7/update",
                method:"POST",
                contentType:"application/json; charset=utf-8",
                dataType:"json",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader(header, token);
                },
                data: doanVan,
                success: function(data){
                    if(data == true){
                        console.log("reset");
                        json = JSON.parse(doanVan);
                        var numRow = $(".main-table tbody tr").length;
                        var insertAfter;
                        for(i=0;i<numRow; i++){
                            if( $($(".main-table tbody tr")[i]).attr("data-id") == json.id){
                                $(".main-table tbody tr")[i].remove();
                                if(i==0){
                                    resetTable(json, true);
                                }else if(i==(numRow-1)){
                                    resetTable(json, false);
                                    console.log("end");
                                    i=numRow;
                                }else{
                                    resetTable(json, false, insertAfter);
                                    console.log("mid");
                                    i=numRow;
                                }
                            }
                            insertAfter = $($(".main-table tbody tr")[i]);
                        }
                        $("#model-input-ques").modal('hide');
                        alert("Update thành công!!!");
                    }
                }
            });
        }
    }

});

function loadDataForUpdate(tr){
    var doanPart7="";
    var doanVan1="";
    var doanVan2="";
    var listCauPart7="[";
    var loaiPart7="";
    var numQues = 5;
    var isFillAll = true;

    tr.find(".paragrap img").each(function(i){
        if(i==0){
            doanVan1 = $(this).attr("src");
            loaiPart7="Đoạn đơn";
        }else{
            doanVan2 = $(this).attr("src");
            loaiPart7="Đoạn kép";
        }
    })

    tr.find(".para div.ques").each(function(i){
        var ques="";
        var daDung="";
        var arrAsw = new Array();

        ques = $(this).find(".ques-content").html();
        daDung = $(this).attr("data-asw");
        $(this).find(".asw-content").each(function(i){
            arrAsw[i] = $(this).html();
            arrAsw[i] = arrAsw[i].substr(3, arrAsw[i].length);
        });

        if(listCauPart7.length == 1){
            listCauPart7 += '{"id":"'+$(this).attr("data-id")+'", "cauHoi":"'+ques+'", "daA":"'
                +arrAsw[0]+'", "daB":"'+arrAsw[1]+'", "daC":"'+arrAsw[2]
                +'", "daD":"'+arrAsw[3]+'", "daDung":"'+daDung+'"}';
        }else{
            listCauPart7 += ',{"id":"'+$(this).attr("data-id")+'", "cauHoi":"'+ques+'", "daA":"'
                +arrAsw[0]+'", "daB":"'+arrAsw[1]+'", "daC":"'+arrAsw[2]
                +'", "daD":"'+arrAsw[3]+'", "daDung":"'+daDung+'"}';
        }
    });

    listCauPart7+="]";

    doanPart7 = '{"id":"'+tr.attr("data-id")+'", "doanVan1":"'+doanVan1+'", "doanVan2":"'
        +doanVan2+'", "loaiPart7":"'+loaiPart7+'", "listCauPart7":'
        +listCauPart7+'}';

    return doanPart7;
}

function getDataUpdate(){
    var doanPart7="";
    var doanVan1="";
    var doanVan2="";
    var listCauPart7="[";
    var loaiPart7="";
    var numQues = 0;
    var isFillAll = true;
    var arr = ["A: ", "B: ", "C: ", "D: "];

    $("#model-update-ques .pagination .page-item").each(function(){
        if($(this).hasClass("hide") == false){
            numQues++;
        }
    });

    doanVan1 = $("#form-update-img1").attr("data-path");
    doanVan2 = $("#form-update-img2").attr("data-path");
    if( typeof doanVan2 == "undefined" || doanVan2.length==0 ){
        loaiPart7="Đoạn đơn";
        doanVan2="";
    }else{
        loaiPart7="Đoạn kép";
    }

    for(var i=0; i<numQues; i++){
        var ques="";
        var daDung="";
        var arrAsw = new Array();
        var divQues = $("#model-update-ques .div-ques[data-index='"+(i+1)+"']");
        divQues.find(".input-asw").each(function(i){
            arrAsw[i] = $(this).val();
            arrAsw[i] = arr[i]+arrAsw[i];
            if(arrAsw[i].length == 3) isFillAll = false;
        });
        ques=divQues.find(".ques1-input").val();
        if(ques.length ==0 ){
            isFillAll = false;
        }
        daDung = divQues.find("input[type='radio']:checked").val();

        if(daDung.length==0){
            isFillAll = false;
        }

        if(listCauPart7.length == 1){
            listCauPart7 += '{"id":"'+divQues.attr("data-id")+'", "cauHoi":"'+ques+'", "daA":"'
                +arrAsw[0]+'", "daB":"'+arrAsw[1]+'", "daC":"'+arrAsw[2]
                +'", "daD":"'+arrAsw[3]+'", "daDung":"'+daDung+'"}';
        }else{
            listCauPart7 += ',{"id":"'+divQues.attr("data-id")+'", "cauHoi":"'+ques+'", "daA":"'
                +arrAsw[0]+'", "daB":"'+arrAsw[1]+'", "daC":"'+arrAsw[2]
                +'", "daD":"'+arrAsw[3]+'", "daDung":"'+daDung+'"}';
        }

    }
    listCauPart7+="]";

    doanPart7 = '{"id":"'+$("#model-update-ques .modal-body").attr("data-id")+'", "doanVan1":"'+doanVan1+'", "doanVan2":"'
        +doanVan2+'", "loaiPart7":"'+loaiPart7+'", "listCauPart7":'
        +listCauPart7+'}';

    json = JSON.parse(doanPart7);

    if(doanVan1.length==0 || typeof doanVan1 == "undefined" ){
        isFillAll = false;
    }

    if(isFillAll == true){
        return doanPart7;
    }else{
        return false;
    }

}

//load du lieu vao modal update
function updateToModal(doanVan){
    $("#model-update-ques .pagination .page-item[data-page='1']").click();
    $("#model-update-ques .modal-body").attr("data-id", doanVan.id);
    var numQues = doanVan.listCauPart7.length;
    for(i = 1; i<=5; i++){
        if(i<numQues+1){
            $("#model-update-ques .pagination .page-item[data-page='"+i+"']").removeClass("hide");
        }else{
            $("#model-update-ques .pagination .page-item[data-page='"+i+"']").addClass("hide");
        }
    }

    $("#form-update-img1").attr("data-path", doanVan.doanVan1);
    $("#form-update-img2").removeAttr("data-path");
    if(doanVan.doanVan2.length == 0){
        $("#form-update2").addClass("hide");
    }else{
        $("#form-update2").removeClass("hide");
        $("#form-update-img2").attr("data-path", doanVan.doanVan2);
    }

    $("#model-update-ques .modal-body .div-ques").each(function(i){
        if(i<numQues){
            $(this).attr("data-id", doanVan.listCauPart7[i].id);
            var arrDa = new Array();
            var daDung = doanVan.listCauPart7[i].daDung;
            $(this).find("textarea").val(doanVan.listCauPart7[i].cauHoi);
            arrDa[0] = doanVan.listCauPart7[i].daA;
            arrDa[1] = doanVan.listCauPart7[i].daB;
            arrDa[2] = doanVan.listCauPart7[i].daC;
            arrDa[3] = doanVan.listCauPart7[i].daD;
            $(this).find(".input-asw").each(function(i){
                $(this).val(arrDa[i]);
            });
            if(daDung=="A"){
                $(this).find("input[type='radio'][value='A']").click();
            }else if(daDung=="B"){
                $(this).find("input[type='radio'][value='B']").click();
            }else if(daDung=="C"){
                $(this).find("input[type='radio'][value='C']").click();
            }else{
                $(this).find("input[type='radio'][value='D']").click();
            }

        }
    });
}

// hien thi doan van
modalShowPara = function(callback){
    $(document).on("click",".main-table tbody tr td", function(){
        loadDataForPrev($(this));
        $("#model-preview-ques").modal('show');
    });
}

modalShowPara(function(){

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

    $("#form-up-img1").removeAttr("data-path");
    $("#form-up-img2").removeAttr("data-path");

    $(".pagination-input[data-page='1']").each(function(){
        $(this).click();
    });
    $(".input-para input[type='file']").each(function(){
        $(this).val('');
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
        $(".div-ques[data-index='4']").addClass("hide");
        $(".pagination-input[data-page='4']").removeClass("active");
        $(".div-ques[data-index='5']").addClass("hide");
        $(".pagination-input[data-page='5']").removeClass("active");
    }else if($(this).attr("data-page")=="2"){
        $(".ques-in-para").html("2");
        $(".div-ques[data-index='1']").addClass("hide");
        $(".pagination-input[data-page='1']").removeClass("active");
        $(".div-ques[data-index='2']").removeClass("hide");
        $(".pagination-input[data-page='2']").addClass("active");
        $(".div-ques[data-index='3']").addClass("hide");
        $(".pagination-input[data-page='3']").removeClass("active");
        $(".div-ques[data-index='4']").addClass("hide");
        $(".pagination-input[data-page='4']").removeClass("active");
        $(".div-ques[data-index='5']").addClass("hide");
        $(".pagination-input[data-page='5']").removeClass("active");
    }else if($(this).attr("data-page")=="3"){
        $(".ques-in-para").html("3");
        $(".div-ques[data-index='1']").addClass("hide");
        $(".pagination-input[data-page='1']").removeClass("active");
        $(".div-ques[data-index='2']").addClass("hide");
        $(".pagination-input[data-page='2']").removeClass("active");
        $(".div-ques[data-index='3']").removeClass("hide");
        $(".pagination-input[data-page='3']").addClass("active");
        $(".div-ques[data-index='4']").addClass("hide");
        $(".pagination-input[data-page='4']").removeClass("active");
        $(".div-ques[data-index='5']").addClass("hide");
        $(".pagination-input[data-page='5']").removeClass("active");
    }else if($(this).attr("data-page")=="4"){
        $(".ques-in-para").html("4");
        $(".div-ques[data-index='1']").addClass("hide");
        $(".pagination-input[data-page='1']").removeClass("active");
        $(".div-ques[data-index='2']").addClass("hide");
        $(".pagination-input[data-page='2']").removeClass("active");
        $(".div-ques[data-index='3']").addClass("hide");
        $(".pagination-input[data-page='3']").removeClass("active");
        $(".div-ques[data-index='4']").removeClass("hide");
        $(".pagination-input[data-page='4']").addClass("active");
        $(".div-ques[data-index='5']").addClass("hide");
        $(".pagination-input[data-page='5']").removeClass("active");
    }else if($(this).attr("data-page")=="5"){
        $(".ques-in-para").html("5");
        $(".div-ques[data-index='1']").addClass("hide");
        $(".pagination-input[data-page='1']").removeClass("active");
        $(".div-ques[data-index='2']").addClass("hide");
        $(".pagination-input[data-page='2']").removeClass("active");
        $(".div-ques[data-index='3']").addClass("hide");
        $(".pagination-input[data-page='3']").removeClass("active");
        $(".div-ques[data-index='4']").addClass("hide");
        $(".pagination-input[data-page='4']").removeClass("active");
        $(".div-ques[data-index='5']").removeClass("hide");
        $(".pagination-input[data-page='5']").addClass("active");
    }
});

// change type para

$(document).on("click", ".type-para input[type='radio']", function(){
    if($(this).val() == "1"){
        if($("#form-upload2").hasClass("hide") == false)
            resetInput();
        $("#form-upload2").addClass("hide");
        $("#div-num-ques").removeClass("hide");
        $("#max-ques").removeClass("hide");
        showPagination($("#select-num-ques").val());
    }else{
        if($("#form-upload2").hasClass("hide") == true)
            resetInput();
        $("#form-upload2").removeClass("hide");
        $("#div-num-ques").addClass("hide");
        $("#max-ques").addClass("hide");
        showPagination(5);
    }
});

function showPagination(n){
    $(".pagination li").each(function(){
        if( parseInt($(this).attr("data-page")) <= parseInt(n)){
            $(this).removeClass("hide");
        }else{
            $(this).addClass("hide");
        }
    });
}


$(document).on("change", "#select-num-ques", function(){
    showPagination($(this).val());
    resetInput();
})

//load data cho modal preview
function loadDataForPrev(tr){
    var content = tr.find(".div-append-para");
    $("#model-preview-ques .modal-body").html("");
    $("#model-preview-ques .modal-body").append(content.html());
}

function resetTable(doanVan, isPrepend, insertAfter){
    var cau = "", morePara="";

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
            + ' name="choise'+(i+1)+'" value="A" '+checkA+' disabled="disabled"><span'
            + ' class="asw-content">'+c.daA+'</span></label> <label'
            + ' class="col-12 col-md-6"><input type="radio"'
            + ' name="choise'+(i+1)+'" value="B" '+checkB+' disabled="disabled"><span'
            + ' class="asw-content">'+c.daB+'</span></label> <label'
            + ' class="col-12 col-md-6"><input type="radio"'
            + ' name="choise'+(i+1)+'" value="C" '+checkC+' disabled="disabled"><span'
            + ' class="asw-content">'+c.daC+'</span></label> <label'
            + ' class="col-12 col-md-6"><input type="radio"'
            + ' name="choise'+(i+1)+'" value="D" '+checkD+' disabled="disabled"><span'
            + ' class="asw-content">'+c.daD+'</span></label>'
            + ' </div><hr></div>';
    }

    if(doanVan.doanVan2.length>0){
        morePara = '<br><img src="'+doanVan.doanVan2+'">';
    }

    var append = '<tr class="d-flex row" data-id="'+doanVan.id+'">'
        + '<td class="col-12"><img class="ico-forward"'
        + 'src="'+$("#root-path").html()+'/resources/img/forward-arrow.png">'
        + '<span class="ques-content"> Đoạn văn id '+doanVan.id+' - <span'
        + ' class="type-part">'+doanVan.loaiPart7+'</span></span>'
        + '<div class="controll-ques">'
        + '<span class="btn-update" data-id="'+doanVan.id+'">update</span><span> • </span>'
        + '<span class="btn-del" data-id="'+doanVan.id+'">delete</span>'
        + '</div> <img class="expand-ico"'
        + 'src="'+$("#root-path").html()+'/resources/img/next.png">'
        + '<div class="div-append-para hide"><div><div class="paragrap">'
        + '<img src="'+doanVan.doanVan1+'">'
        + morePara
        + '</div><div class="para" data-id="'+doanVan.id+'">'
        +cau
        + '</div></div></div></td></tr>';
    if(isPrepend == true){
        $(".main-table tbody").prepend(append);
    }else if(typeof insertAfter == "undefined"){
        $(".main-table tbody").append(append);
    }else{
        $($.parseHTML(append)).insertAfter(insertAfter);
    }


}

$(document).on("click", ".btn-del", function(e){
    e.stopPropagation();
    var id = $(this).attr("data-id");
    var tr = $(this).parent().parent().parent();
    $.ajax({
        url: "manager-doan-part7/del",
        data: {
            id: id,
        },
        success: function(data){
            if(data==true){
                alert("Xóa thành công!!!");
                tr.remove();
            }
        }
    });
});

//scroll
$(document).on("scroll", function(){
    var sum = $("#sum-ques").html();
    var total = $("#total-ques").html();

    if($("#sum-ques").html() != $("#total-ques").html()){
        if(sum!=total){
            var s = $(window).scrollTop(),
                d = $(document).height(),
                c = $(window).height();
            if( (d-c-s <= 100) && loadAjax==true ){
                console.log("load");
                loadAjax=false;
                $.ajax({
                    url: "manager-doan-part7/get-list-doan",
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