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


 // them cau hoi
 var modalConfirmInput = function(callback) {
	$("#ico-add-ques").on("click", function() {
	    resetModalInput();
		$("#model-input-ques").modal('show');
	});

	$("#btn-input-yes").on("click", function() {
		callback(0);
	});

	$("#btn-input-oan").on("click", function() {
		callback(1);
	});

	$("#btn-input-no").on("click", function() {
		callback(2);
		$("#model-input-ques").modal('hide');
	});
	

};

modalConfirmInput(function(confirm) {
	if(confirm == 0 || confirm == 1){
	    var isFill = true;
	    var cauHoi = $("#ques1-input").val()+" ........ "+$("#ques2-input").val();
	    var daDung =  $("#model-input-ques input[type='radio']:checked").val();
	    
	    var arrDa = new Array();
	    
	    $("#model-input-ques .input-asw").each(function(index){
	        if(($(this).val()).length == 0) isFill = false;
	        arrDa[index] = $(this).val();
	    });
	    
	    if( cauHoi == " ........ " || isFill == false){
	        alert("Hãy điền hết giữ liệu!!!");
	    }else{
	        $.ajax({
	            url: $("#path-add").html(),
	            method: "POST",
	            data: {
	                cauHoi: cauHoi,
	                daA: "A: "+arrDa[0],
	                daB: "B: "+arrDa[1],
	                daC: "C: "+arrDa[2],
	                daD: "D: "+arrDa[3],
	                daDung: daDung,
	            },
	            
	            success: function(id){
	                if(id != -1){
	                    resetTable(id, cauHoi, daDung, arrDa);
	                    resetModalInput();
	                    $("#sum-ques").html(parseInt( $("#sum-ques").html())+1);
	                    $("#total-ques").html(parseInt( $("#total-ques").html())+1);
	                    if(confirm==0){
	                        $("#model-input-ques").modal('hide');
	                    }else{
	                        
	                    }
	                }else{
	                    $("#model-input-ques").modal('hide');
                        alert("Thêm không thành không công!!!");
	                }
	            }
	         });
	    }
	}else{
	    resetModalInput();
	}
});

//update cau hoi

 var modalConfirmUpdate = function(callback) {
    var id;
	$(document).on("click", ".btn-update", function(e) {
		e.stopPropagation();
		loadDataUpdata($(this).parent().parent());
		id = $(this).attr("data-id");
		$("#model-update-ques").modal('show');
	});

	$("#btn-update-yes").on("click", function() {
		callback(0, id);
		$("#model-update-ques").modal('hide');
	});

	$("#btn-update-no").on("click", function() {
		callback(2);
		$("#model-update-ques").modal('hide');
	});
	

};

modalConfirmUpdate(function(confirm, id) {
    if(confirm == 0){
        var isFill = true;
        var cauHoi = $("#ques1-update").val()+" ........ "+$("#ques2-update").val();
        var daDung =  $("#model-update-ques input[type='radio']:checked").val();
        var arrDa = new Array();
        
        $("#model-update-ques .input-asw").each(function(index){
            if(($(this).val()).length == 0) isFill = false;
            arrDa[index] = $(this).val();
        });
        
        if( cauHoi == " ........ " || isFill == false){
            alert("Hãy điền hết giữ liệu!!!");
        }else{
            $.ajax({
                url: "manager-cau-part5/update",
                method: "POST",
                data: {
                    cauHoi: cauHoi,
                    id: id,
                    daA: "A: "+arrDa[0],
                    daB: "B: "+arrDa[1],
                    daC: "C: "+arrDa[2],
                    daD: "D: "+arrDa[3],
                    daDung: daDung,
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader(header, token);
                },
                success: function(data){
                    if(data==true){
                        $(".main-table tbody tr[data-id='"+id+"']").remove();
                        resetTable(id, cauHoi, daDung, arrDa)
                        $("#model-update-ques").modal('hide');
                        alert("Update thành công!!!");
                    }
                }
             });
        }
        
    }
});

function loadDataUpdata(objtd){
	var ques =  (objtd.find(".content-ques").html()).split(" ........ ");
	var ques_1 = ques[0];
	var ques_2 = ques[1];
	var arrDa = new Array();
	var daDung=objtd.find(".div-da label input:checked").val();

	objtd.find(".div-da label").each(function(index){
		var temp = $(this).find("span").html();
		arrDa[index] = temp.substr(3, temp.length);
	});

	$("#ques1-update").val(ques_1);
	$("#ques2-update").val(ques_2);

	$("#model-update-ques .input-asw").each(function(index){
		$(this).val(arrDa[index]);
	});
	$("#model-update-ques input[type='radio'][value='"+daDung+"']").click();
}

function resetModalInput(){
    $("#ques1-input").val("");
    $("#ques2-input").val("");
    $("#model-input-ques input.input-asw").each(function(){
       $(this).val(""); 
    });
    $("#model-input-ques input[type='radio'][value='A']").click();    
}

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
        +id+'"><td class="col-12"><img class="ico-forward"'
        + ' src="'+$("#root-path").html()+'/resources/img/forward-arrow.png">'
        + '<span class="content-ques">'+cauHoi+'</span><div class="controll-ques">'
        + '<span class="btn-update" data-id="'+id+'">update</span><span> • </span>'
        + '<span class="btn-del" data-id="'+id+'">delete</span></div> '
        + '<img class="expand-ico" src="'+$("#root-path").html()+'/resources/img/next.png">'
        + '<img class="shorten-ico hide" src="'+$("#root-path").html()+'/resources/img/down-arrow.png">'
        + '<div class="div-da hide"><hr><div><b>Đáp án</b>'
        + '</div><div class="row"><label class="col-12 col-md-6">'
        + '<input type="radio" name="choise-'+id+'" value="A" '+checkA+' disabled="disabled">'
        + '<span>'+'A: '+arrDa[0]+'</span></label><label class="col-12 col-md-6">'
        + '<input type="radio" name="choise-'+id+'" value="B" '+checkB+' disabled="disabled">'
        + '<span>'+'B: '+arrDa[1]+'</span></label><label class="col-12 col-md-6">'
        + '<input type="radio" name="choise-'+id+'" value="C" '+checkC+' disabled="disabled">'
        + '<span>'+'C: '+arrDa[2]+'</span></label><label class="col-12 col-md-6">'
        + '<input type="radio" name="choise-'+id+'" value="D" '+checkD+' disabled="disabled">'
        + '<span>'+'D: '+arrDa[3]+'</span></label></div></div></td></tr>';
    $(".main-table tbody").append(append);
}


//
$(document).on("click",".main-table tbody tr td",function(){
	$(this).find(".div-da").toggleClass("hide");
	$(this).find(".expand-ico").toggleClass("hide");
	$(this).find(".shorten-ico").toggleClass("hide");
});

// xoa cau
$(document).on("click", ".btn-del", function(e){
    e.stopPropagation();
    var id = $(this).attr("data-id");
    $.ajax({
        url: "manager-cau-part5/del",
        method: "POST",
        data: {
            id: id,
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader(header, token);
        },
        success: function(data){
            if(data==true){
                $(".main-table tbody tr[data-id='"+id+"']").remove();
                $("#sum-ques").html(parseInt( $("#sum-ques").html())-1);
                $("#total-ques").html(parseInt( $("#total-ques").html())-1);
            }else{
                alert("Xóa không thành công!!!")
            }
        }
     });
});

$(window).on("scroll",function(){
    var sum = $("#sum-ques").html();
    var total = $("#total-ques").html();
    
    if(loadAjax==true){
        if(sum!=total){
            var s = $(window).scrollTop(),
                d = $(document).height(),
                c = $(window).height();
            if( (d-c-s <= 100) ){
                loadAjax=false;
                $.ajax({
                    url: "manager-cau-part5/get-list-cau",
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