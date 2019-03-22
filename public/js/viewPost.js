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

$(document).on("click", ".btn-report", function () {
    $("#input-report").val('');
    $("#btn-messreport").click();
});

// pagination


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

$(document).on(
    'click',
    ".reply",
    function () {
        var id = $(this).attr("data-cmt");
        $(".rep-cmt-controll[data-cmt='" + id + "'] div textarea")
            .toggleClass("hide");
    });