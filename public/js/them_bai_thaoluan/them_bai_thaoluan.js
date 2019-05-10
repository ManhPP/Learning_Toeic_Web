var header;
var token;

$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
});

/* preview */
$('#pre').click(
		function() {
			var editor = $("iframe").contents().find("body").html();
			editor = "<h2 style='color:blue'>" + $("#tittle-discus").val()
					+ "</h2><hr>" + editor;
			$("#preview-container").html(editor);
		});

$(document).on("click", "#btn-login", function() {
	$("#my-button").click();
});

$("#btn-upload").click(function() {
	$("#file-up").click();
});

$("#file-up").change(function(event) {
	// upload len server
	var fileUpload = this;
	console.log(this.files[0]);
	
	var name = ((new Date().getTime()) + $("#id-user").html() +"." +fileUpload.files[0].type.split("/")[1]);
	var formData = new FormData($("#form-up-image")[0]);
	formData.append("name", name);

//	var boundary = '--'+Math.random().toString().substr(2);
	console.log($("#form-up-image")[0]);
	$.ajax({
		url: "upload-img",
		method: "post",
		data:formData, // khong duoc dung { formData } ma phai bo {}
		contentType: false,
        processData: false,

		success: function(data){
				// alert(data.pathFile);
				if(data!='false'){
					// formParent.attr("data-path", data.pathFile);
					var size = "width:" + $("#w-img").val() + "px; height:" + $("#h-img").val()
						+ "px; ";
					var img = "<img style='vertical-align: bottom;" + size
						+ "; max-width: 100%' src='"+$('#path-upload').html()+data.pathFile+"'/>";
					$("iframe").contents().find("body").find("br:last").remove();
					$("iframe").contents().find("body").find("p:last").append(img);
					$("#file-up").val('');
				};

		}
	});
});

// function readURL(fileName) {
// 	var size = "width:" + $("#w-img").val() + "px; height:" + $("#h-img").val()
// 			+ "px; ";
// 	var img = "<img style='vertical-align: bottom;" + size
// 			+ "; max-width: 100%' src='"+$('#path-upload').html()+fileName+"'/>";
// 	$("iframe").contents().find("body").find("br:last").remove();
// 	$("iframe").contents().find("body").find("p:last").append(img);
// 	$("#file-up").val('');
// }

$(document).on("click", "#btn-submit", function() {
	$.ajax({
		url: "/user/discussion/add",
		method: "post",
		data:{
			tieuDe: $("#tittle-discus").val(),
			noiDung: $("iframe").contents().find("body").html()
		},

		success: function(data){
			if(data=='true'){
			    window.location.replace($("#root-path").html()+"/discussion/home");
			}else{
				alert("Thêm không thành công!!!")
			}
		}
	});
});
