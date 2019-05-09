	$(document)
		.on(
				"click",
				".page-num",
				function() {
					$(".active").removeClass("active");
					$(this).addClass("active");
					$("#cur-page").html($(this).attr("data-page"));
					$
							.ajax({
								method : "GET",
								url : "thao-luan-manager/page",
								dataType : "json",
								data : {
									page : $(this).attr("data-page"),
								},
								success : function(data) {
									console.log(data);
									$("#table-btl tbody").html("");
									console.log(data);
									for (var i = 0; i < data[0].length; i++) {
//										var numCmt = data[i].listComment.length;
//										for (var j = 0; j < data[i].listComment.length; j++) {
//											var bool = (typeof (data[i].listComment[j].listReplyComment) != "undefined");
//											if (bool == true) {
//												numCmt += data[i].listComment[j].listReplyComment.length;
//											}
//										}
										var ngay = new Date(data[0][i].ngayDang);
										var date = ngay.getDate();
										var month = ngay.getMonth() + 1;
										var year = ngay.getFullYear();

										$("#table-btl tbody")
												.append(
														'<tr class="d-flex">'
																+ '<td class="col-12 col-md-10">'
																+ '<div class="tittle" data-toggle="tooltip"'
																+ 'data-placement="top" title="'
																+ data[0][i].tieuDe
																+ '"><a class="color-tittle no-decoration" href="'
																+$("#root-path").html()
																+'/guest/bai-thao-luan?id='
																+data[0][i].id+'">'
																+ data[0][i].tieuDe
																+ '</a></div>'
																+ '<div>'
																+ '<span class="user">'
																+ data[0][i].user.hoTen
																+ ', </span><span '
																+ 'class="date">'
																+ date
																+ '/'
																+ month
																+ '/'
																+ year
																+ '</span>'
																+ '</div>'
																+ '</td>'
																+ '<td class="col-md-2 hide-md"><p class="count">'
																+ data[0][i].accessCount
																+ '/'
																+ data[1][i]
																+ '</p></td>'
																+ '</tr>');
									}

									formatPagination($("#cur-page").html(), $(
											".pagination")
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
