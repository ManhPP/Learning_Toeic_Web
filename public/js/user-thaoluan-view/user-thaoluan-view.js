var temp = "";
$(document).ready(function () {

});

$(document).on("click", function () {
    $(".simulate-hover").removeClass("simulate-hover");
    $(".choise-list-action").removeClass("choise-list-action");
    // cho update
    $(".edit").html(temp);
    $(".edit").removeClass("edit");
});

$(document).on("click", "#btn-login", function () {
    $("#my-button").click();
});

//report
$(document).on("click", ".btn-report", function () {
    $("#input-report").val('');
    $("#btn-messreport").click();
    $("#mesage-report").find("#btn-report").attr("data-type", $(this).attr("data-type"));
    $("#mesage-report").find("#btn-report").attr("data-id", $(this).attr("data-id"));
});

$(document).on("click", "#btn-report", function(){
    var idBTL = -1, idCMT=-1, idRepCMT=-1;
    var noiDung, loaiReport;
    var type = $(this).attr("data-type");
    
    noiDung = $("#input-report").val();
    if(type=="rpbtl"){
        loaiReport="btl";
        idBTL = $(this).attr("data-id");
    } else if(type=="rpcmt"){
        loaiReport="cmt";
        idCMT = $(this).attr("data-id");
    } else {
        loaiReport="repcmt";
        idRepCMT = $(this).attr("data-id");
    }
    
    $.ajax({
       url: "bai-thao-luan/report",
       data: {
           noiDung: noiDung,
           loaiReport: loaiReport,
           idBTL: idBTL,
           idCMT: idCMT,
           idRepCMT: idRepCMT,
       },
       success: function(data){
           if(data==true)
               alert("Report thành công!!!");
           else
               alert("Report không thành công!!!");
           $("#btn-messreport").click();
       }
    });
    
});

// pagination

// ajax cho pagination
$(document)
        .on(
                "click",
                ".page-num",
                function () {
                    $(".active").removeClass("active");
                    $(this).addClass("active");
                    $("#cur-page").html($(this).attr("data-page"));
                    $
                            .ajax({
                                method : "GET",
                                url : "bai-thao-luan/comment-view",
                                dataType : "json",
                                data : {
                                    page : $(this).attr("data-page"),
                                    idBTL : $("#data-id-btl").html(),
                                },
                                success : function (data) {
                                    console.log(data);
                                    var comment = "";
                                    for (var i = 0; i < data[0].length; i++) {
                                        var id = data[0][i].id;
                                        var add = "";
                                        if (data[2].id == data[0][i].user.id) {
                                            add = '<span class="more-action">··· <span '
                                                    + 'class="span-list-action hide"> <img class="triangle" '
                                                    + 'src="'
                                                    + $("#root-path").html()
                                                    + '/resources/img/triangle.png" /> '
                                                    + '<div class="action-choise" data-cmt="'
                                                    + id
                                                    + '" data-cmt-lev="lev1"> '
                                                    + '<div class="update">Chỉnh sửa.</div> '
                                                    + '<div class="del">Xóa.</div></div></span></span>'
                                        }else if(data[2].hasRole == 'ROLE_ADMIN'){
                                            add = '<span class="more-action">··· <span '
                                                + 'class="span-list-action hide"> <img class="triangle" '
                                                + 'src="'
                                                + $("#root-path").html()
                                                + '/resources/img/triangle.png" /> '
                                                + '<div class="action-choise" data-cmt="'
                                                + id
                                                + '" data-cmt-lev="lev1"> '
                                                + '<div class="del">Xóa.</div></div></span></span>'
                                        }
                                        comment += '<div class="user-aswlv1"><div class="asw-info"><span class="pointer">'
                                                + data[0][i].user.hoTen
                                                + '</span> · <span class="reply-comment-color btn-report pointer" data-id="'+id+'" data-type="rpcmt">Report</span>'
                                                + add
                                                + '</div><div class="asw-content" data-cmt="'
                                                + id
                                                + '">'
                                                + data[0][i].noiDung
                                                + '</div><div class="reply-comment-color reply-comment-size no-select"><span class="reply pointer" data-cmt="'
                                                + id
                                                + '">Trả lời<span> · </span></span> <span class="show-more pointer" data-cmt="'
                                                + id
                                                + '">Các bình luận(<span class="num-rep" data-cmt="'
                                                + id
                                                + '">'
                                                + data[1][i]
                                                + '</span>)</span></div></div><div class="user-aswlv2"><div class="rep-outer" data-cmt="'
                                                + id
                                                + '"></div><div class="rep-cmt-controll" data-cmt="'
                                                + id
                                                + '"><span class="show-more no-select hide" style="margin-bottom: 2px" data-cmt="'
                                                + id
                                                + '" data-show-lev="lev2">Show more · </span> <span class="pointer btn-hide hide" data-cmt="'
                                                + id
                                                + '">Hide</span>'
                                                + '<div class="div-cmt row">'
                                                + '<textarea type="text" class="add-cmt col-12 hide" placeholder="Thêm bình luận" data-cmt="'
                                                + id
                                                + '" data-lev="lev2"></textarea>'
                                                + '</div></div></div>'
                                    }
                                    $(".user-asw").html(comment);
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

// xem binh luan
$(document)
        .on(
                "click",
                ".show-more",
                function () {
                    if (parseInt($(this).find(".num-rep").html()) == 0) {
                        return;
                    }
                    var id = $(this).attr("data-cmt");
                    var begin = $(".rep-cmt[data-cmt='" + id + "']").length;
                    console.log("begin"+begin);
                    $
                            .ajax({
                                url : "reply-comment-view",
                                method : "get",
                                dataType : "json",
                                data : {
                                    id : id,
                                    begin : begin,
                                },
                                success : function (data) {
                                    console.log(data);
                                    if (data[0] == null)
                                        return;
                                    for (var i = 0; i < data[0].length; i++) {
                                        var add = "";
                                        if (data[1].id == data[0][i].idAcc.id) {
                                            add = '<span class="more-action">··· <span '
                                                    + 'class="span-list-action hide"> <img class="triangle" '
                                                    + 'src="'
                                                    + $("#root-path").html()
                                                    + '/imgs/triangle.png" /> '
                                                    + '<div class="action-choise" data-reply-cmt="'
                                                    + data[0][i].id
                                                    + '" data-cmt-lev="lev2"> '
                                                    + '<div class="update">Chỉnh sửa.</div> '
                                                    + '<div class="del">Xóa.</div></div></span></span>';
                                        }else if(data[1].hasRole == 'ROLE_ADMIN'){
                                            add = '<span class="more-action">··· <span '
                                                + 'class="span-list-action hide"> <img class="triangle" '
                                                + 'src="'
                                                + $("#root-path").html()
                                                + '/resources/img/triangle.png" /> '
                                                + '<div class="action-choise" data-reply-cmt="'
                                                + data[0][i].id
                                                + '" data-cmt-lev="lev2"> '
                                                + '<div class="del">Xóa.</div></div></span></span>';
                                        }

                                        $(".rep-outer[data-cmt='" + id + "']")
                                                .append(
                                                        '<div class="rep-cmt" data-reply-cmt="'
                                                                + data[0][i].id
                                                                + '" data-cmt="'
                                                                + id
                                                                + '"><div class="asw-info">'
                                                                + data[0][i].idAcc.username
                                                                + ' · <span class="reply-comment-color btn-report pointer" data-id="'+data[0][i].id+'" data-type="rprepcmt">Report</span>'
                                                                + add
                                                                + '</div><div class="asw-content" data-reply-cmt="'
                                                                + data[0][i].id
                                                                + '">'
                                                                + data[0][i].noiDung
                                                                + '</div>'
                                                                + '</div>');
                                    }
                                    $(
                                            ".rep-cmt-controll[data-cmt='" + id
                                                    + "']").removeClass("hide");
                                    $
                                            .ajax({
                                                url : "get-sum-reply-comment",
                                                data : {
                                                    idCMT : id
                                                },
                                                success : function (numRep) {
                                                    $(
                                                            ".num-rep[data-cmt='"
                                                                    + id + "']")
                                                            .html(numRep);
                                                    var numRepCur = $(".rep-outer .rep-cmt[data-cmt='"
                                                            + id + "']").length;
                                                    if (numRep == numRepCur) {
                                                        $(
                                                                ".show-more[data-cmt='"
                                                                        + id
                                                                        + "'][data-show-lev='lev2']")
                                                                .addClass(
                                                                        "hide");
                                                    } else {
                                                        $(
                                                                ".show-more[data-cmt='"
                                                                        + id
                                                                        + "'][data-show-lev='lev2']")
                                                                .removeClass(
                                                                        "hide");
                                                    }
                                                    $(
                                                            ".btn-hide[data-cmt='"
                                                                    + id + "']")
                                                            .removeClass("hide");
                                                }
                                            });

                                }
                            });
                });

$(document).on(
        "click",
        ".btn-hide",
        function () {
            var id = $(this).attr("data-cmt");
            $(".rep-outer[data-cmt='" + id + "']").html("");
            $(".btn-hide[data-cmt='" + id + "']").addClass("hide");
            $(".rep-cmt-controll[data-cmt='" + id + "'] div input").addClass(
                    "hide");
            $(".show-more[data-cmt='" + id + "'][data-show-lev='lev2']")
                    .addClass("hide");
            $.ajax({
                url : "get-sum-reply-comment",
                data : {
                    idCMT : id
                },
                success : function (numRep) {
                    $(".num-rep[data-cmt='" + id + "']").html(numRep);
                }
            });
        });

// btn-reply
$(document).on(
        'click',
        ".reply",
        function () {
            var id = $(this).attr("data-cmt");
            $(".rep-cmt-controll[data-cmt='" + id + "'] div textarea")
                    .toggleClass("hide");
        });

$(document)
        .on(
                "keypress",
                ".add-cmt",
                function (e) {
                    var input = $(this);
                    if (e.which == 13 && e.shiftKey) {
                        return;
                    }
                    if (e.which == 13) {
                        if ($(this).val() == "") {
                            alert("Không được để trống!!!");
                        } else {
                            if ($(this).attr("data-lev") == 'lev1') {
                                $.ajax({
                                    url : "comment",
                                    data : {
                                        noiDung : $(this).val(),
                                        idBTL : $(this).attr("data-btl"),
                                    },
                                    success : function (data) {
                                        console.log(data);
                                        if (data!="true" && data!="false"){
                                            window.location.href = data;
                                        }else{
                                            if (data == 'true') {
                                                input.val("");
                                            }
                                            // resetPagination();
                                            location.reload();
                                        }
                                    }
                                });
                            } else if ($(this).attr("data-lev") == 'lev2') {
                                var idCMT = $(this).attr("data-cmt");
                                $
                                        .ajax({
                                            url : "reply-comment",
                                            data : {
                                                noiDung : $(this).val(),
                                                idCMT : idCMT,
                                            },
                                            success : function (data) {
                                                if (data!="true" && data!=false){
                                                    window.location.href = data;
                                                }else if (data == 'true') {
                                                    var numRep = $(".num-rep[data-cmt='"
                                                            + input
                                                                    .attr("data-cmt")
                                                            + "']");
                                                    numRep.html(parseInt(numRep
                                                            .html()) + 1);
                                                    if ($(".rep-outer .rep-cmt[data-cmt='"
                                                            + idCMT + "']").length != 0) {
                                                        $(
                                                                ".show-more[data-cmt='"
                                                                        + idCMT
                                                                        + "'][data-show-lev='lev2']")
                                                                .removeClass(
                                                                        "hide");
                                                    }
                                                    input.val("");
                                                }
                                            }
                                        });
                            }
                        }
                    }
                    input.css("height", "4em");
                });

// action sửa xóa các cmt
$(document).on("click", ".more-action", function (event) {
    event.stopPropagation();
    if ($(this).hasClass("simulate-hover")) {
        $(".choise-list-action").parent().removeClass("simulate-hover");
        $(".choise-list-action").removeClass("choise-list-action");
    } else {
        $(".choise-list-action").parent().removeClass("simulate-hover");
        $(".choise-list-action").removeClass("choise-list-action");
        $(this).addClass("simulate-hover");
        $(this).find(".span-list-action").addClass("choise-list-action");
    }
});
// xoa
$(document).on(
        "click",
        ".del",
        function () {

            if ($(this).parent().attr("data-cmt-lev") == "lev1") {
                var id = $(this).parent().attr("data-cmt");
                $.ajax({
                    url : "del-cmt",
                    data : {
                        id : id,
                    },
                    success : function (data) {
                        if (data == 'true') {
                            // resetPagination($(".page-num.active").attr(
                            //         "data-page"));
                            alert("Done.");
                            location.reload();
                        }
                    }
                });
            } else if ($(this).parent().attr("data-cmt-lev") == "lev2") {
                var id = $(this).parent().attr("data-reply-cmt");
                $
                        .ajax({
                            url : "del-rep-cmt",
                            data : {
                                id : id,
                            },
                            success : function (data) {
                                if (data == 'true') {
                                    alert("done.");
                                    var numRep = $(".num-rep[data-cmt='"
                                            + $(
                                                    ".rep-cmt[data-reply-cmt='"
                                                            + id + "']").attr(
                                                    "data-cmt") + "']");
                                    numRep.html(parseInt(numRep.html()) - 1);
                                    $(".rep-cmt[data-reply-cmt='" + id + "']")
                                            .remove();
                                }
                            }
                        });
            }
        });

$(document)
        .on(
                "click",
                ".update",
                function (event) {
                    event.stopPropagation();
                    $(".edit").html(temp);
                    $(".edit").removeClass("edit");
                    if ($(this).parent().attr("data-cmt-lev") == "lev1") {
                        var idCMT = $(this).parent().attr("data-cmt");
                        var content = $(".asw-content[data-cmt='" + idCMT
                                + "']");
                        if (content.find("textarea").length == 0) {
                            $(".edit").removeClass("edit");
                            content.addClass("edit");
                            temp = content.html();
                            content
                                    .html("<textarea data-lev='lev1' placeholder='Update comment' class='update-cmt' placehokder='Bình luận'>"
                                            + content.html() + "</textarea>");
                        }
                    } else if ($(this).parent().attr("data-cmt-lev") == "lev2") {
                        var idRCMT = $(this).parent().attr("data-reply-cmt");
                        var content = $(".asw-content[data-reply-cmt='" + idRCMT
                                + "']");
                        if (content.find("textarea").length == 0) {
                            $(".edit").removeClass("edit");
                            content.addClass("edit");
                            temp = content.html();
                            content
                                    .html("<textarea data-lev='lev2' placeholder='Update comment' class='update-cmt' placehokder='Bình luận'>"
                                            + content.html() + "</textarea>");
                        }
                    }
                    $(".choise-list-action").parent().removeClass(
                            "simulate-hover");
                    $(".choise-list-action").removeClass("choise-list-action");
                });

$(document).on("click", ".update-cmt", function (event) {
    event.stopPropagation();
    $(".choise-list-action").parent().removeClass("simulate-hover");
    $(".choise-list-action").removeClass("choise-list-action");
});

$(document).on("keypress", ".update-cmt", function(event){
   if(event.which!=13 || (event.which==13 && event.shiftKey)) {
       return;
   }
   var parent = $(this).parent();
   var noiDung= $(this).val();
   if($(this).attr("data-lev") == "lev1"){
       var idCMT = parent.attr("data-cmt");
       $.ajax({
           url: "update-cmt",
           data:{
             id: idCMT,
             noiDung: noiDung,
           },
           success: function(data){
               if(data=='true'){
                   parent.html(noiDung);
               }
           }
       });
   } else if($(this).attr("data-lev") == "lev2"){
       var idRCMT = parent.attr("data-reply-cmt");
       $.ajax({
           url: "update-repcmt",
           data:{
             id: idRCMT,
             noiDung: noiDung,
           },
           success: function(data){
               if(data=='true'){
                   parent.html(noiDung);
               }
           }
       });
   }
   $(".edit").removeClass("edit");
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

    $
            .ajax({
                url : "get-sum-comment",
                data : {
                    idBTL : $("#data-id-btl").html(),
                },
                success : function (data) {
                    if (data == 0) {
                        $("#my-table tbody").html("");
                        $("#cur-page").html(0);
                    }
                    var sum = Math.round(data / 10);
                    if (sum * 10 < data)
                        sum++;
                    process(sum);
                    if (typeof (indexReset) == "undefined") {
                        $(".pagination li[data-page='" + sum + "']").click();
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

$(document).on("click", "#update-btl", function(){
   $("#req-form-update").submit();
});
