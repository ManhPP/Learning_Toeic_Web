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
                                    url : $("#path-delete").html(),
                                    data : {
                                        arrId : arrId
                                    },
                                    method: "POST",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success : function (data) {
                                        if (data == "true") {
                                            $("#noti").html("");
                                            $("#noti")
                                                    .append(
                                                            '<span style="color: green">Xóa thành công.</span>');
                                            $("tr.selected").each(function(){
                                                $(this).remove();
                                            })
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


$(document).on("click", ".update, .view", function(e){
    e.stopPropagation();
});
