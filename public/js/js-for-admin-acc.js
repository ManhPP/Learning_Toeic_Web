$(document).ready(function(){
	arr = new Array();
	numSelect = 0;
	
});

$(document).on("click","tbody tr",function(){
	isBlank = ($(this).find("td").eq(0).html()=="");
	if(isBlank==true){
		return;
	}
	$(this).toggleClass("selected");
});



/*$(document).on("click","btnsearch",function(){
	$("#search").on("keyup",function(){
		var value = $(this).val().toLowerCase();
    	$("#myTable tr").filter(function() {
     	 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});
	});
});*/

$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
/*$(document).on("click", "#btnsearch",function(){
	searchKey = $("#search").val();
	var reg = new RegExp(".*"+searchKey+".*");
	if((searchKey==="")==true){
		$("table tr").each(function(){
			$(this).removeClass("selected");
		});
		return;
	}
	$("table tbody tr").each(function(){
		k = $(this).find("td").eq(1).html();
		if(!(reg.test(k)==true)){
			$(this).addClass("selected");
		}else{
			$(this).removeClass("selected");
		}
	});
});*/

$("#delete").click(function(){
	$("table tr").each(function(){
		
		if($(this).hasClass("selected")){
			$(this).remove();
			$("tbody").append('<tr class="d-flex">'+
				'<td class="col-sm-1 col-md-1"></td>'+
				'<td class="col-sm-4 col-md-4"></td>'+
				'<td class="col-sm-2 col-md-2"></td>'+
				'<td class="col-sm-2 col-md-2"></td>'+
				'<td class="col-sm-2 col-md-2"></td>'+
				'<td class="col-sm-1 col-md-1"></td>'+
				'</tr>');
		}
		
	});
});

$(document).on("click",".detail", function(e){
	e.stopPropagation();
	console.log("ok");
});
