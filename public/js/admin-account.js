var loadAjax = true;

$(document).ready(function() {
	arr = new Array();
	numSelect = 0;

});

$(document).on("click", "tbody tr", function() {
	isBlank = ($(this).find("td").eq(0).html() == "");
	if (isBlank == true) {
		return;
	}
	$(this).toggleClass("selected");
});


// ajax cho pagination
$(document).on(
		"click",
		".page-num",
		function() {
			var arrAttr = new Array();
			var arrData = new Array();
			var i = 0;
			// la du lieu bo loc
			$("#my-table thead th").each(function() {
				var data = $(this).find("p").find("span").html();
				if (typeof (data) != "undefined") {
					arrAttr[i] = $(this).attr("data-name");
					arrData[i] = data;
					console.log(arrAttr[i]);
					console.log(arrData[i]);
					i++;
				}
			});
			var valueActive = $(".filter-active input[type='radio']:checked")
					.attr("data-bool-active");
			if (valueActive != "undefined") {
				arrAttr[i] = "active";
				arrData[i] = valueActive;
			}
			//
			$(".active").removeClass("active");
			$(this).addClass("active");
			$("#cur-page").html($(this).attr("data-page"));
			$.ajax({
				method : "GET",
				url : "account-manager/page",
				dataType : "json",
				data : {
					page : $(this).attr("data-page"),
					arrAttr : arrAttr,
					arrData : arrData,
				},
				success : function(data) {
//					alert('asd');
					console.log(data);
					$("#my-table tbody tr").remove();
					var tbody = "";
					for (var i = 0; i < data.length; i++) {
						var ngaySinh = new Date(data[i].ngaySinh);
						var date = ngaySinh.getDate();
						var month = ngaySinh.getMonth() + 1;
						var year = ngaySinh.getFullYear();
						tbody += '<tr class="d-flex" data-activ="'
								+ data[i].active + '">'
								+ '<td class="col-sm-1 col-md-1">' + data[i].id
								+ '</td>' + '<td class="col-sm-2 col-md-2">'
								+ data[i].hoTen + '</td>'
								+ '<td class="col-sm-2 col-md-2">' + date + '/'
								+ month + '/' + year + '</td>'
								+ '<td class="col-sm-1 col-md-1">'
								+ data[i].gioiTinh + '</td>'
								+ '<td class="col-sm-2 col-md-2">'
								+ data[i].username + '</td>'
								+ '<td class="col-sm-2 col-md-2">'
								+ data[i].email + '</td>'
								+ '<td class="col-sm-2 col-md-2">'
								+ data[i].hasRole + '</td>' + '</tr>'
					}
					$("#my-table tbody").append(tbody);
					formatPagination($("#cur-page").html(), $(".pagination")
							.attr("data-max-page"));
				}
			});
		});
// an hien dau ...
function formatPagination(cur, numPage) {

	if (parseInt(cur) < 5) {
		$("#first").addClass("hide");
		$("#last").removeClass("hide");
		for (i = 1; i < 6; i++) {
			$(".page-num[data-page='" + i + "']").removeClass("hide");
		}
		for (i = 6; i < parseInt(numPage); i++) {
			$(".page-num[data-page='" + i + "']").addClass("hide");
		}
	} else if (parseInt(cur) > parseInt(numPage) - 4) {
		$("#last").addClass("hide");
		$("#first").removeClass("hide");
		for (i = (parseInt(numPage) - 4); i < parseInt(numPage); i++) {
			$(".page-num[data-page='" + i + "']").removeClass("hide");
		}
		for (i = 2; i < (parseInt(numPage) - 4); i++) {
			$(".page-num[data-page='" + i + "']").addClass("hide");
		}
	} else {
		$("#first").removeClass("hide");
		$("#last").removeClass("hide");
		for (i = 2; i < parseInt(numPage); i++) {
			if ((i > (parseInt(cur) - 3)) && (i < (parseInt(cur) + 3))) {
				$(".page-num[data-page='" + i + "']").removeClass("hide");
			} else {
				$(".page-num[data-page='" + i + "']").addClass("hide");
			}
		}
	}

}

$(document).on("click", "#pre", function() {
	var cur = $(".active").attr("data-page");

	if (parseInt(cur) > 1) {
		$(".page-num[data-page='" + (parseInt(cur) - 1) + "']").click();
	}
});

$(document).on("click", "#ne", function() {
	var cur = $(".active").attr("data-page");
	var num = $(".pagination").attr("data-max-page");
	if ((parseInt(cur) < parseInt(num)) == true) {
		$(".page-num[data-page='" + (parseInt(cur) + 1) + "']").click();
	}
});

// ban acc
function ban() {
	var arrId = new Array();
	var index = 0;
	$("table tbody tr").each(function() {
		if ($(this).hasClass("selected")) {
			arrId[index] = $(this).find("td").eq(0).html();
			index++;
		}
	});
	$.ajax({
		url : $("#root-path").html()+"/admin/account-manager/ban",
		data : {
			arrId : arrId
		},
		method: "POST",
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success : function(data) {
			console.log(data);
			// resetPagination($(".page-num.active").attr("data-page"));
			$("#noti span").remove();
			$("#noti").append(
					"<span style='color: #ff6508'>Đã ban tài khoản</span>");
		}
	});
}

// unban
function unBan() {
	var arrId = new Array();
	var index = 0;
	$("table tbody tr").each(function() {
		if ($(this).hasClass("selected")) {
			arrId[index] = $(this).find("td").eq(0).html();
			index++;
		}
	});
	$.ajax({
		url : $("#root-path").html()+"/admin/account-manager/unban",
		data : {
			arrId : arrId
		},
		method: "POST",
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success : function() {
			// resetPagination($(".page-num.active").attr("data-page"));
			$("#noti span").remove();
			$("#noti").append(
					"<span style='color: #ff6508'>Đã unban tài khoản</span>");
		}
	});
}

// confirm action
var modalConfirm = function(callback) {
	var obj;
	$("#ban").on("click", function() {
		if ($("#my-table tbody tr.selected").length == 0) {
			alert("Hãy chọn một tài khoản để ban!!")
		} else {
			$("#model-confirm").modal('show');
			obj = $(this);
		}
	});

	$("#unban").on("click", function() {
		if ($("#my-table tbody tr.selected").length == 0) {
			alert("Hãy chọn một tài khoản để unban!!")
		} else {
			$("#model-confirm").modal('show');
			obj = $(this);
		}
	});

	$("#modal-btn-yes").on("click", function() {
		callback(true, obj);
		$("#model-confirm").modal('hide');
	});

	$("#modal-btn-no").on("click", function() {
		callback(false, obj);
		$("#model-confirm").modal('hide');
	});
};

modalConfirm(function(confirm, obj) {
	if (confirm == true) {
		if (obj.is($("#unban"))) {
			unBan();
		} else if (obj.is($("#ban"))) {
			ban();
		}
	}
});

// filter
var modelFilter = function(callback) {
	var obj;

	$(".ico-filter")
			.on(
					"click",
					function() {
						$("#model-input-filter .modal-body input").remove();
						if ($(this).parent().find("span").html() == "ID") {
							$("#model-input-filter .modal-body").append(
									$("#container-input-number").html());
						} else if ($(this).parent().find("span").html() == "Ngày sinh") {
							$("#model-input-filter .modal-body").append(
									"<input id='filter-val' type='date'/`>")
						} else {
							$("#model-input-filter .modal-body")
									.append(
											"<input id='filter-val' placeholder='Input filter' />");
						}
						$("#model-input-filter").modal('show');
						$("#type-filter").html(
								$(this).parent().find("span").html()
										.toLowerCase());
						obj = $(this).parent();
					});

	$("#btn-filter-yes").on("click", function() {
		callback(true, obj, $("#filter-val").val());
		$("#model-input-filter").modal('hide');
	});

	$("#btn-filter-no").on("click", function() {
		callback(false);
		$("#model-input-filter").modal('hide');
	});
};

modelFilter(function(confirm, obj, value) {
	if (confirm == true && value.length > 0) {
		obj.find("p").remove();
		obj.append("<p class='filter-text' style='text-align: start'>"
				+ $("#ico-append").html() + "<span>" + value + "</span></p>");
	}
	resetPagination();
});
// remove filter
$(document).on("click", ".ico-ext-filter", function() {
	$(this).parent().remove();
	resetPagination();
});

// check radio
$(".filter-active input[type='radio'][name='status-user']").change(function() {
	resetPagination();
});

// reset pagination after filter
function resetPagination(indexReset) {
	var process = function(numPage) {
		if (parseInt(numPage) != parseInt($("#sum-page").html())) {
			$(".pagination").html("");
			$(".pagination").attr("data-max-page", numPage);
			$("#sum-page").html(numPage);
			$(".pagination")
					.append(
							'<li class="page-item" id="pre"><a class="page-link" href="#"><</a></li>');
			if (numPage <= 6) {
				for (var i = 1; i <= numPage; i++) {
					if (i == 1) {
						$(".pagination")
								.append(
										'<li class="page-num page-item active" data-page="1"><a class="page-link">1</a></li>');
					} else {
						$(".pagination").append(
								'<li class="page-num page-item" data-page="'
										+ i + '"><a class="page-link">' + i
										+ '</a></li>');
					}

				}
			} else {
				for (var i = 1; i <= numPage; i++) {
					if (i == 1) {
						$(".pagination")
								.append(
										'<li class="page-num page-item active" data-page="1"><a class="page-link">1</a></li>');
						$(".pagination")
								.append(
										'<li class="page-item hide more" id="first"><a class="page-link">...</a></li>');
					} else if (i == numPage) {
						$(".pagination")
								.append(
										'<li class="page-item more" id="last"><a class="page-link">...</a></li>');
						$(".pagination").append(
								'<li class="page-num page-item" data-page="'
										+ i + '"><a class="page-link">' + i
										+ '</a></li>');
					} else {
						if (i <= 5) {
							$(".pagination").append(
									'<li class="page-num page-item" data-page="'
											+ i + '"><a class="page-link">' + i
											+ '</a></li>');
						} else {
							$(".pagination").append(
									'<li class="page-num page-item hide" data-page="'
											+ i + '"><a class="page-link">' + i
											+ '</a></li>');
						}
					}

				}
			}

			$(".pagination")
					.append(
							'<li class="page-item" id="ne"><a class="page-link" href="#">></a></li>');
		}
	}

	var arrAttr = new Array();
	var arrData = new Array();
	var i = 0;
	// lay du lieu bo loc
	$("#my-table thead th").each(function() {
		var data = $(this).find("p").find("span").html();
		if (typeof (data) != "undefined") {
			arrAttr[i] = $(this).attr("data-name");
			arrData[i] = data;
			console.log(arrAttr[i]);
			console.log(arrData[i]);
			i++;
		}
	});
	var valueActive = $(".filter-active input[type='radio']:checked").attr(
			"data-bool-active");
	if (valueActive != "undefined") {
		arrAttr[i] = "active";
		arrData[i] = valueActive;
	}
	$
			.ajax({
				url : "account-manager/get-sum-user",
				data : {
					arrAttr : arrAttr,
					arrData : arrData,
				},
				success : function(data) {
					if (data == 0) {
						$("#my-table tbody").html("");
						$("#cur-page").html(0);
					}
					var sum = Math.round(data / 10);
					if (sum * 10 < data)
						sum++;
					process(sum);
					console.log(data);
					if (typeof (indexReset) == "undefined") {
						$(".pagination li[data-page='1']").click();
					} else {
						if (parseInt(indexReset) > parseInt(sum)) {
							$(".pagination li[data-page='" + sum + "']")
									.click();
						} else {
							$(".pagination li[data-page='" + indexReset + "']")
									.click();
						}
					}
				}
			});

}

// input page
// confirm action
var inputPage = function(callback) {
	$(document).on("click", ".more", function() {
		$("#input-number").val("");
		$("#model-input-page").modal('show');
	});

	$("#btn-input-yes").on("click", function() {
		callback(true);
		$("#model-input-page").modal('hide');
	});

	$("#btn-input-no").on("click", function() {
		callback(false);
		$("#model-input-page").modal('hide');
	});
};

inputPage(function(confirm) {
	console.log(confirm);
	var num = $(".pagination").attr("data-max-page");
	if (confirm == true) {
		var page = $("#input-number").val();
		if (parseInt(page) > parseInt(num)) {
			$(".page-num[data-page='" + parseInt(num) + "']").click();
		} else if (parseInt(page) < 1) {
			$(".page-num[data-page='" + 1 + "']").click();
		} else {
			$(".page-num[data-page='" + parseInt(page) + "']").click();
		}
	}
});

// submit add
$(document).on("click", "#submit-add-btn", function() {
	
	if($('.isright').length==4){
	$("#form-them").submit();}
	else alert("Kiểm tra lại username và email");
});

// submit update
$(document).on(
		"click",
		"#update",
		function() {
			var id = 0;
			id = $("#my-table tbody tr.selected td:first").html();
			console.log(id);
			$("#id-tittle-update").html(id);
			console.log($("#id-submit-update").val(id));
			if ((typeof ($("#id-submit-update").val()) != "undefined")
					&& ($("#my-table tbody tr.selected").length == 1)) {
				$("#myModal-update").modal();
			} else {
				alert("Hãy chọn 1 tài khoản để update");
			}
		});
$(document).on("click", "#submit-update-btn", function() {

	
	$("#form-update").submit();
	
});
// confirm action delete
var modalConfirmDel = function(callback) {

	$("#del").on("click", function() {
		if ($("#my-table tbody tr.selected").length == 0) {
			alert("Hãy chọn ít nhất 1 tài khoản để xóa");
		} else {
			$("#model-confirm-del").modal('show');
		}
	});

	$("#modal-del-yes").on("click", function() {
		callback(true);
		$("#model-confirm-del").modal('hide');
	});

	$("#modal-del-no").on("click", function() {
		callback(false);
		$("#model-confirm-del").modal('hide');
	});
};

modalConfirmDel(function(confirm, obj) {
	if (confirm == true) {
		delAcc();
	}
});

// ajax del
function delAcc() {
	var id = new Array();
	var i = 0;
	$("#my-table tbody tr.selected").each(function() {
		id[i] = $(this).find("td").eq(0).html();
		i++;
	});

	$.ajax({
		url : "account-manager/del-account",
		data : {
			id : id
		},
		success : function(data) {
			resetPagination($(".page-num.active").attr("data-page"));
		}

	});
}

// ajax cho check username
$(".username").change(function() {
	
	var objr = $(this).parent().find("img.right");
	var objw = $(this).parent().find("img.wrong");
	if ($(this).val() == "") {
		objr.addClass("hide");
		objw.addClass("hide");
	} else {
		$.ajax({
			url : $("#root-path").html()+"/account-manager/check-username",
			data : {
				username : $(this).val()
			},
			method: "POST",
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success : function(data) {
				console.log(data);
				if (data.length==0) {
					objr.removeClass("hide");
					objw.addClass("hide");
					$('.username').addClass('isright');
					console.log('usernamerigt');
					console.log($('.isright').length);
					
				} else {
					objw.removeClass("hide");
					objr.addClass("hide");
					$('.username').removeClass('isright');
					console.log('usernamerfalse');
					console.log($('.isright').length);
				}
			}
		});
	}
});

// ajax cho check email
$(".email").change(function() {
	var objr = $(this).parent().find("img.right");
	var objw = $(this).parent().find("img.wrong");
	if ($(this).val() == "") {
		objr.addClass("hide");
		objw.addClass("hide");
	} else {
		$.ajax({
			url :  $("#root-path").html()+"/account-manager/check-email",
			data : {
				email : $(this).val()
			},
			method: "POST",
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success : function(data) {

				if (data.length == 0) {
					objr.removeClass("hide");
					objw.addClass("hide");
					$('.email').addClass('isright');
					console.log('emailrigt');
					console.log($('.isright').length);
				} else {
					objw.removeClass("hide");
					objr.addClass("hide");
					$('.email').removeClass('isright');
					console.log('emailfalse');
					console.log($('.isright').length);
				}
			}
		});
	}
});


//Report
$(document).on("click","#recv-rp", function(){
   $.ajax({
       url: $("#root-path").html()+"/admin/report-manager/get-new-report",
       data: {
           index: 0,
       },
       success: function(data){
           console.log(data);
       }
   });
});

//get sum report
function getSumReport(){
    $.ajax({
       url: $("#root-path").html()+"/admin/report-manager/get-sum-report",
       success: function(data){
           console.log(data);
       }
    });
}

//change status process
function changeStatusProcess(id){
    $.ajax({
       url: $("#root-path").html()+"/admin/report-manager/change-status-process", 
       data:{
           id: id,
       },
       success: function(data){
           console.log(data);
       }
    });
}

//get history part nghe
function getHistoryPartNghe(id,index){
    $.ajax({
        url: $("#root-path").html()+"/user/account-manager/history-pn", 
        data:{
            id: id,
            index: index,
        },
        success: function(data){
            console.log(data);
        }
    });
}

//get history part doc
function getHistoryPartDoc(id, index){
    $.ajax({
        url: $("#root-path").html()+"/user/account-manager/history-pd", 
        data:{
            id: id,
            index: index,
        },
        success: function(data){
            console.log(data);
        }
    });
}

//get history bkt
function getHistoryBKT(id, index){
    $.ajax({
        url: $("#root-path").html()+"/user/account-manager/history-bkt", 
        data:{
            id: id,
            index: index,
        },
        success: function(data){
            console.log(data);
        }
    });
}

//mo modal cau hoi
var modalConfirmInput = function(callback) {
    $(document).on("click","#recv-rp", function(){
        $("#model-message").modal("show");
    });
    
    $(document).on("click", "#btn-close", function(){
        $("#model-message").modal("hide");
    });
}

modalConfirmInput(function(){
    
});

//ajax load more report
//scroll ajax 
$("#model-message").on("scroll",function(){
    if(loadAjax == true){
        var s = $("#model-message").scrollTop(),
            d = $("#model-message .modal-dialog").height(),
            c = $(window).height();
        if( (d-c-s <= 100) ){
            loadAjax=false;
            $.ajax({
                url: $("#root-path").html()+"/admin/report-manager/get-sum-report",
                success: function(data){
                    var sum = $(".group-rp").length;
                    var total = data;
                    if(sum!=total){
                        $(".sum-notice").html(data);
                        $.ajax({
                            url: $("#root-path").html()+"/admin/report-manager/get-new-report",
                            data:{
                                index: sum,
                            },
                            success: function(data){
                                var append='';
                                for(i=0;i<data.length; i++){
                                    append += '<div class="group-rp"><div class="row one-rp">'
                                    +'<div class="col-12">'
                                    +'<span class="acc-rp">Tài khoản: '+data[i].user.hoTen+', id '
                                    +data[i].user.id+' đã report '+data[i].noiDung+': </span>'
                                    +'<span class="content-rp">${rp.noiDung }</span>'
                                    +'</div></div>'
                                    +'<div class="col-12 div-proc-rp">'
                                    +'<button class="btn proc-rp" id="skip-rp" data-id="'+data[i].id+'">Bỏ qua repport</button>'
                                    +'<button class="btn proc-rp" id="view-rp">Đi đến nội dung bị report</button>'
                                    +'</div></div>'
                                }
                            }
                        });
                    }
                }
            });
        }
    }
});
