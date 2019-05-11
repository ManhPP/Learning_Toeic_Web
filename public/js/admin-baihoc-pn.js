var header;
var token;

$(document).ready(function () {
    header= $("#csrf-name").html();
    token = $("#csrf-value").html();
});

$(document).on("click", "tbody tr", function () {
    isBlank = ($(this).find("td").eq(0).html() == "");
    if (isBlank == true) {
        return;
    }
    $(this).toggleClass("selected");
});

// //////// chuyen trang
$(document)
        .on(
                "click",
                ".page-num",
                function () {
                    var tittle ="";
                    var id=-1;
                    var accessCount=-1;
                    var loaiPart=0;
                    var index=$(this).attr("data-page");
                    $(".filter-text").each(function(){
                        if($(this).parent().attr("data-name") === "id") id =$(this).find("span").html();
                        if($(this).parent().attr("data-name") === "tittle") tittle =$(this).find("span").html();
                        if($(this).parent().attr("data-name") === "loaiPart") loaiPart =$(this).find("span").html();
                        if($(this).parent().attr("data-name") === "accessCount") accessCount =$(this).find("span").html();
                    });
                    
                    $(".active").removeClass("active");
                    $(this).addClass("active");
                    $("#cur-page").html($(this).attr("data-page"));
                    $
                            .ajax({
                                method : "GET",
                                url : "part-nghe/page",
                                dataType : "json",
                                data : {
                                    id: id,
                                    tittle : tittle,
                                    loaiPart : loaiPart,
                                    accessCount : accessCount,
                                    index : index,
                                },
                                success : function (data) {
                                    $("#table-thaoluan tbody tr").remove();
                                    var tbody = "";
                                    for (var i = 0; i < data.length; i++) {
                                        tbody += '<tr class="d-flex">'
                                                + '<td class="col-sm-1 col-md-1">'+data[i].id+'</td>'
                                                + '<td class="col-sm-4 col-md-4">'+data[i].tittle+'</td>';
                                        if(typeof data[i].loaiPart == 'undefined'){
                                            tbody+= '<td class="col-sm-3 col-md-3">Bài kiểm tra</td>';
                                        }else{
                                            tbody+= '<td class="col-sm-3 col-md-3">'+data[i].loaiPart+'</td>';
                                        }
                                        tbody+= '<td class="col-sm-3 col-md-3">'+data[i].accessCount+'</td>'
                                                + '<td class="col-sm-1 col-md-1"><div class="detail">'
                                                + '<a target="_blank" class="view" href="'+$("#root-path").html()
                                                +'/guest/luyen-nghe?id='+data[i].id
                                                +'">View</a>/<a target="_blank" class="update" href="'
                                                +$("#root-path").html()
                                                +'/admin/bai-hoc-manager/update-part-nghe?id='+data[i].id
                                                +'">Update</a></div></td></tr>';
                                    }
                                    $("#table-thaoluan tbody").append(tbody);
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

// input page
// confirm action
var inputPage = function (callback) {
    $(document).on("click", ".more", function () {
        $("#input-number").val("");
        $("#model-input-page").modal('show');
    });

    $("#btn-input-yes").on("click", function () {
        callback(true);
        $("#model-input-page").modal('hide');
    });

    $("#btn-input-no").on("click", function () {
        callback(false);
        $("#model-input-page").modal('hide');
    });
};

inputPage(function (confirm) {
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

// filter
var modelFilter = function (callback) {
    var obj;

    $(".ico-filter")
            .on(
                    "click",
                    function () {
                        $("#model-input-filter .modal-body").html("");
                        if ($(this).parent().find("span").html() == "ID"
                                || $(this).parent().attr("data-name") == "accessCount") {
                            $("#model-input-filter .modal-body").append(
                                    $("#container-input-number").html());
                        } else if ( $(this).parent().attr("data-name") == "tittle") {
                            $("#model-input-filter .modal-body").append(
                                    "<input id='filter-val' type='text'/`>")
                        } else {
                            $("#model-input-filter .modal-body").append(
                                    "<div class='row' style='padding-left: 2em'>"
                                    +"<label class='col-12'><input checked='checked' type='radio' name='choose-type' value='1'/>Part 1</label>"
                                    +"<label class='col-12'><input type='radio' name='choose-type' value='2'/>Part 2</label>"
                                    +"<label class='col-12'><input type='radio' name='choose-type' value='3'/>Part 3</label>"
                                    +"<label class='col-12'><input type='radio' name='choose-type' value='4'/>Part 4</label></div>"
                                    +"<input class='hide' id='filter-val' value='1' type='text'/`>")
                        }
                        $("#model-input-filter").modal('show');
                        $("#type-filter").html(
                                $(this).parent().find("span").html()
                                        .toLowerCase());
                        obj = $(this).parent();
                    });

    $("#btn-filter-yes").on("click", function () {
        callback(true, obj, $("#filter-val").val());
        $("#model-input-filter").modal('hide');
    });

    $("#btn-filter-no").on("click", function () {
        callback(false);
        $("#model-input-filter").modal('hide');
    });
};

modelFilter(function (confirm, obj, value) {
    if (confirm == true && value.length > 0) {
        obj.find("p").remove();
        obj.append("<p class='filter-text' style='text-align: start'>"
                + $("#ico-append").html() + "<span>" + value + "</span></p>");
    }
    resetPagination();
});
// remove filter
$(document).on("click", ".ico-ext-filter", function () {
    $(this).parent().remove();
    resetPagination();
});

// reset pagination after filter
function resetPagination(indexReset) {
    var process = function (numPage) {
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

    var tittle ="";
    var id=-1;
    var accessCount=-1;
    var loaiPart=0;
    $(".filter-text").each(function(){
        if($(this).parent().attr("data-name") === "id") id =$(this).find("span").html();
        if($(this).parent().attr("data-name") === "tittle") tittle =$(this).find("span").html();
        if($(this).parent().attr("data-name") === "loaiPart") loaiPart =$(this).find("span").html();
        if($(this).parent().attr("data-name") === "accessCount") accessCount =$(this).find("span").html();
    });
    
    $
            .ajax({
                url : "part-nghe/get-sum-bai-hoc",
                data : {
                    id : id,
                    tittle : tittle,
                    accessCount : accessCount,
                    loaiPart : loaiPart,
                },
                success : function (data) {
                    console.log(data+"-----------");
                    if (data == 0) {
                        $("#table-thaoluan tbody").html("");
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

// xoa bai thao luan
$(document)
        .on(
                "click",
                "#delete",
                function () {
                    var arrId = new Array();
                    var i = 0;
                    $("#table-thaoluan tbody .selected").each(function () {
                        arrId[i] = $(this).find("td:first").html();
                        i++;
                    });
                    console.log(arrId);
                    if (i == 0) {
                        alert("Hãy chọn ít nhất một bài thảo luận để xóa!!!");
                    } else {
                        $
                                .ajax({
                                    url : $("#root-path").html()+"/admin/bai-hoc-manager/delete-part-nghe",
                                    data : {
                                        arrId : arrId
                                    },
                                    method: "POST",
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    
                                    success : function (data) {
                                        if (data == 1) {
                                            $("#noti").html("");
                                            $("#noti")
                                                    .append(
                                                            '<span style="color: green">Xóa thành công.</span>');
                                            $("tr.selected").each(function () {
                                                $(this).remove();
                                              });
                                        } else {
                                            $("#noti").html("");
                                            $("#noti")
                                                    .append(
                                                            '<span style="color: red">Xóa không thành công.</span>');
                                        }
                                        
                                    }
                                });
                    }
                });

$(document).on("click", "input[name='choose-type']", function(){
    $("#filter-val").val($(this).val());
});

$(document).on("click", ".update, .view", function(e){
    e.stopPropagation();
})


//mo modal chon part
var modelChoosePart = function(callback){
    $(document).on("click","#add",function(){
        $(".checked-choose").removeClass("checked-choose");
        $(".choose-part:first").addClass("checked-choose");
        $("#model-choose-part").modal("show");
    });

    $(document).on("click", "#btn-input-yes",function () {
        callback(true);
        $("#model-choose-part").modal("hide");
    });
    $(document).on("click", "#btn-input-no",function () {
        callback(false);
        $("#model-choose-part").modal("hide");
    });
};

modelChoosePart(function(data){
    if(data==true){
        window.open($(".checked-choose").attr("data-path"),"_blank");
    }
});

$(document).on("click",".choose-part", function(){
    $(".checked-choose").removeClass("checked-choose");
    $(this).addClass("checked-choose");
});



