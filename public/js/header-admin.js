$(document).on("click", ".btn-expand", function(){
	$("#sidebar-wrapper").toggleClass("hide");
	$("#hide-ico").toggleClass("hide");
	$("#list-ico").toggleClass("hide");
});


//mo modal rp
var modalReport = function(callback) {
	$(document).on("click","#recv-rp", function(){
		$("#model-message").modal("show");
	});

	$(document).on("click", "#btn-close", function(){
		$("#model-message").modal("hide");
	});
}

modalReport(function(){

});

$(document).on("click", "#skip-rp", function () {
	row = $(this).parent().parent();
	var id = $(this).attr("data-id");
	$.ajax({
		url: $("#skip-rp-path").html(),
		method: 'post',
		data: {
			id: id,
		},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function(data){
			if(data!="true" && data!="false"){
				window.location.href = data;
			}else if(data=="true"){
				num = parseInt($(".sum-notice").html())-1;
				$(".sum-notice").html(num);
				row.remove();

			}else{
				alert("Không thành công!!");
			}

		}
	});
});

$(document).on("click", "#view-rp", function () {
	row = $(this).parent().parent();
	button = $(this);
	var id = $(this).attr("data-id");
	var path = $(this).attr("data-path");
	$.ajax({
		url: path,
		method: 'get',
		data: {
			id: id,
		},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function(data){
			if(data!="true" && data!="false"){
				window.location.href = data;
			}else if(data=="true"){
				num = parseInt($(".sum-notice").html())-1;
				$(".sum-notice").html(num);
				row.remove();
				if(button.hasClass("admin-del-cmt") == true){
					$(".admin-del-rep").each(function () {
						if($(this).attr("data-parent") == id){
							$(this).parent().parent().remove();
						}
					});
				}
			}else{
				alert("Không thành công!!");
			}

		}
	});
});