var id=0;
var arrNames = new Array();
$(document).ready(function(){


});

/*preview*/
$('#pre').click( function () {
	var editor = $("iframe").contents().find("body").html();
	editor = "<h2 style='color:blue'>"+$("#tittle-discus").val()+"</h2><hr>"+editor;
	$("#preview-container").html(editor);
});

$(document).on("click","#btn-login",function(){ 	
	$("#my-button").click();
});

$("#btn-upload").click(function(){
	$("#file-up").click();
});

$("#file-up").change(function(event){
	readURL(this);
});

function readURL(input) {
	var size="width:"+$("#w-img").val()+"px; height:"+$("#h-img").val()+"px; ";
	var img = "<img class='"+id+"' style='vertical-align: bottom;"+size+"'/>"
	$("iframe").contents().find("body").find("br:last").remove();
	$("iframe").contents().find("body").find("p:last").append(img);


	if (input.files && input.files[0]) {
		var reader = new FileReader();

		var byId = "[class="+id+"]"
		reader.onload = function (e) {
			$("iframe").contents().find(byId).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
	arrNames[id] = ((new Date().getTime())+input.files[0].name);
	id++;
	$("#file-up").val('');
}

$(document).on("click","#btn-submit",function(){
	$("#div-submit").html($("iframe").contents().find("body").html());
	for(i=0;i<id;i++){
		$("#div-submit ."+i).attr("src",arrNames[i]);
	}
});




