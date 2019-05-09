var header;
var token;

$(document).ready(function() {
	header= $("#csrf-name").html();
	token = $("#csrf-value").html();
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
		url: "them-bai-thao-luan/file-upload",
		method: "post",
		data:formData, // khong duoc dung { formData } ma phai bo {}
		contentType: false,
        processData: false,
		beforeSend: function(xhr) {
            xhr.setRequestHeader(header, token);
        },
		success: function(data){
			if(data==true){
				readURL(name);	
			}
		}
	});
});

function readURL(fileName) {
	var size = "width:" + $("#w-img").val() + "px; height:" + $("#h-img").val()
			+ "px; ";
	var img = "<img style='vertical-align: bottom;" + size
			+ "; max-width: 100%' src='"+$('#path-upload').html()+fileName+"'/>";
	$("iframe").contents().find("body").find("br:last").remove();
	$("iframe").contents().find("body").find("p:last").append(img);
	$("#file-up").val('');
}

$(document).on("click", "#btn-submit", function() {
	$.ajax({
		url: "them-bai-thao-luan/add",
		method: "post",
		data:{
			tieuDe: $("#tittle-discus").val(),
			noiDung: $("iframe").contents().find("body").html()
		},
		beforeSend: function(xhr) {
            xhr.setRequestHeader(header, token);
        },
		success: function(data){
			if(data==true){
			    window.location.replace($("#root-path").html()+"/user/thaoluan-home");
			}
		}
	});
});
