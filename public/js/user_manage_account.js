var updateMode = false;
$(document).ready(function(){

});

$(document).on("click",".ico-edit",function(){
    if(updateMode == false)
        toggleMode();
    infoItem = $(this).parent().parent();
    $(this).parent().addClass('hide');
    if(infoItem.find(".input-info").hasClass("radio-input")){
        infoItem.find(".input-info input[type='radio']").each(function () {
           if($(this).val() == infoItem.attr("data-item")){
               $(this).click();
           }
        });
    }else{
        infoItem.find(".input-info").val(infoItem.attr("data-item"));
    }
    infoItem.find(".input-info").removeClass("hide");
});

$(document).on("click", "#cancle-update", function () {
    toggleMode();
    $(".show-info").each(function(){
        $(this).removeClass("hide");
    });
    $(".input-info").each(function(){
        $(this).addClass("hide");
    });
});

function toggleMode(){
    updateMode = !updateMode;
    $('#delete-acc').toggleClass("hide");
    $("#group-update").toggleClass("hide");
}

//del
var deleteAccount = function(calback){
    $(document).on("click", "#delete-acc", function(){
       $("#model-confirm-del").modal("show");
    });

    $(document).on("click","#modal-del-yes",function () {
        $("#model-confirm-del").modal("hide");
        calback(true);
    });
    $(document).on("click","#modal-del-no",function () {
        $("#model-confirm-del").modal("hide");
    });
};

deleteAccount(function(data){
    arr = new Array();
    arr[0] = $("#acc-id").html();
    if(data==true){
        $.ajax({
           url: $("#del-path").html(),
           method: "post",
           data: {
               id: arr
           },
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function(data){
               if(data==1){
                   window.location.reload();
               }else{
                    alert("Xóa tài khoản không thành công!!");
               }
           }
        });
    }
});

//update
var updateAccount = function(calback){
    $(document).on("click", "#update-acc", function(){
       $("#model-confirm-update").modal("show");
    });

    $(document).on("click","#modal-update-yes",function () {
        $("#model-confirm-update").modal("hide");
        calback(true);
    });
    $(document).on("click","#modal-update-no",function () {
        $("#model-confirm-update").modal("hide");
    });
};

updateAccount(function(data){
    id=$("#acc-id").html();
    hoTen = $("#input-ht").val();
    gioiTinh = $("#input-gt").find("input[type='radio']:checked").val();
    ngaySinh = $("#input-ns").val();
    username = $("#input-username").val();
    email = $("#input-email").val();
    pass = $("#input-password").val();


    console.log(hoTen+"--"+id);

    if(data==true){
        $.ajax({
            url: $("#update-path").html(),
            method: "post",
            data: {
                id: id,
                hoTen: hoTen,
                gioiTinh: gioiTinh,
                ngaySinh: ngaySinh,
                username: username,
                email: email,
                pass: pass
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data=="true"){
                    window.location.reload();
                }else{
                    alert("Xóa tài khoản không thành công!!");
                }
            }
        });
    }
});

$(document).on("click",".panel-item", function () {
    window.open($(this).attr("data-path"), '_blank');
});


//del
var deleteDiscuss = function(calback){
    arr = new Array();
    arr[0] = true;
    $(document).on("click", ".del-discuss", function(event){
        arr[1] = $(this).attr("data-id");
        event.stopPropagation();
        $("#model-confirm-del-discuss").modal("show");
    });

    $(document).on("click","#modal-del-dis-yes",function () {
        $("#model-confirm-del-discuss").modal("hide");
        calback(arr);
    });
    $(document).on("click","#modal-del-dis-no",function () {
        $("#model-confirm-del-discuss").modal("hide");
    });
};

deleteDiscuss(function(data){
    if(data[0]==true){
        arrId = new Array();
        arrId[0] = data[1];
        $.ajax({
            url: $("#del-path-discuss").html(),
            method: "POST",
            data : {
                arrId : arrId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success : function(data) {
                if (data == "true") {
                    window.location.reload();
                }else{
                    alert("Xóa không thành công!1");
                }
            }
        });
    }
});