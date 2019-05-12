var flag=0;
$(document).ready(function(){
	/*swiper*/
	var width= window.innerWidth;
	var num = 1;

	if(width <= 567){
		num=1;
	}else if(width<768){
		num=2;
	}else if(width<1020){
		num=3;
	}else if(width <1600){
		num=4;
	}else{
		num=5;
	}
	if(parseInt($("#num-sile").html())<num){
	    num=parseInt($("#num-sile").html());
	    console.log(num);
	}
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: num,
		spaceBetween: 2,
		slidesPerGroup: num,
		loop: true,
		initialSlide:0,
		loopFillGroupWithBlank: true,
		pagination: '.swiper-pagination',
		paginationClickable: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
	});
});

$(document).on("click","#btn-login",function(){
	$("#my-button").click();
});

$(window).resize(function(){

	var mySwiper = document.querySelector('.swiper-container').swiper;
	var width= window.innerWidth;
	var num = 1;

	if(width <= 567){
		num=1;
	}else if(width<768){
		num=2;
	}else if(width<1020){
		num=3;
	}else if(width <1600){
		num=4;
	}else{
		num=5;
	}
	if(parseInt($("#num-sile").html())<num){
        num=parseInt($("#num-sile").html());
        console.log(num);
    }
	mySwiper.params.slidesPerView=num;
	mySwiper.params.slidesPerGroup=num;
});


//search
$(document).on("click", "#search-submit", function(){
    $("#search-input").addClass("searching");
    $("#del-search").removeClass("hide");
    
    var tittle = $("#search-input").val();
    var part = $("#select-part").val();
    
    $.ajax({
        url: $("#path-search").html(),
        data: {
            title: tittle,
            loaiPart: part,
        },
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            $("#search-table tbody").html("");
            resetPagination(tittle, part);
            for(var i=0;i<data.length; i++){
                $("#search-table tbody")
                .append('<tr class="d-flex r search-result" data-id="'
                        +data[i].id
                        +'"><td class="col-12 col-sm-10 col-md-7"><span><img src="'
                        +$("#image-search").html()
                        +'"></span>'
                        + '<span style="padding-left: 0.5em">'
                        +data[i].loaiPart
                        +': '
                        +data[i].title
                        +'</span></td><td class="col-0 col-sm-2 col-md-5 count">'
                        +data[i].accessCount
                        +'</td></tr>');
            }
        }
    });
});

$(document).on("click", ".search-result", function(){
    window.location.href = $("#path-view").html()+'?id='+$(this).attr("data-id") ;
});

$(document).on("click", ".suggest", function(){
    window.location.href = $(this).attr("data-path");
});

//del search
$(document).on("click", "#del-search", function(){
   $(this).addClass("hide");
   $("#search-input").removeClass("searching");
   $("#search-input").val("");
   $("#select-part").val(0);
   $("#search-table tbody").html("");
   $("#pagination-div").addClass("hide");
});

//reset pagination after filter
function resetPagination(tittle, part) {
    var process = function(numPage) {
        if (parseInt(numPage) != parseInt($("#sum-page").html())) {
            $(".pagination").html("");
            $(".pagination").attr("data-max-page", numPage);
            $(".pagination")
                    .append(
                            '<li class="page-item" id="pre"><a class="page-link"><</a></li>');
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
                            '<li class="page-item" id="ne"><a class="page-link">></a></li>');
            $("#pagination-div").removeClass("hide");
        }
    }

    
    $
            .ajax({
                url : "luyen-doc-home/get-sum-part",
                data : {
                    id : -1,
                    accessCount : -1,
                    tittle : tittle,
                    loaiPart : part,
                },
                success : function(data) {
                    if (data == 0) {
                        $("#my-table tbody").html("");
                        $("#cur-page").html(0);
                    }
                    var sum = Math.round(data / 10);
                    if (sum * 10 < data)
                        sum++;
                    if(sum>0) {
                        process(sum);
                    }else{
                        $("#pagination-div").addClass("hide");  
                    }
                }
            });

}


//ajax cho pagination
$(document).on(
     "click",
     ".page-num",
     function() {
         var tittle = $("#search-input").val();
         var part = $("#select-part").val();
         var cur = $(this).attr("data-page");
         $(".active").removeClass("active");
         $(this).addClass("active");
         $.ajax({
             method : "GET",
             url : "luyen-doc-home/search",
             data : {
                 id: -1,
                 accessCount: -1,
                 tittle: tittle,
                 loaiPart: part,
                 index: cur,
                 maxResult: 10
             },
             success : function(data) {
                 
                 $("#search-table tbody").html("");
                 for(var i=0;i<data.length; i++){
                     $("#search-table tbody")
                     .append('<tr class="d-flex r search-result" data-id="'
                             +data[i].id
                             +'"><td class="col-12 col-sm-10 col-md-7"><span><img src="'
                             +$("#root-path").html()
                             +'/resources/img/guest-luyennghe-home/book.png"></span>'
                             + '<span style="padding-left: 0.5em">'
                             +data[i].loaiPart
                             +': '
                             +data[i].tittle
                             +'</span></td><td class="col-0 col-sm-2 col-md-5 count">'
                             +data[i].accessCount
                             +'</td></tr>');
                 }
                 
                 formatPagination(cur, $(".pagination")
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

$(document).on("click", "#pre", function () {
    var cur = $(".active").attr("data-page");

    if (parseInt(cur) > 1) {
        $(".page-num[data-page='" + (parseInt(cur) - 1) + "']").click();
    }
});

$(document).on("click", "#ne", function () {
    var cur = $(".active").attr("data-page");
    var num = $(".pagination").attr("data-max-page");
    if ((parseInt(cur) < parseInt(num)) == true) {
        $(".page-num[data-page='" + (parseInt(cur) + 1) + "']").click();
    }
});

