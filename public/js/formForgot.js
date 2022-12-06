$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".form_forgot").submit(function (e) {
        e.preventDefault();
        regEmail =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (regEmail.test($("#form3Example77").val())) {
            $.ajax({
                url: "/auth/forgot",
                method: "POST",
                data: {
                    email: $(".email_forgot").val(),
                },
                success: function (data) {},
                error: function (error) {
                    // console.log(error.responseJSON.message);
                    ShowToast(error.responseJSON.message);
                },
            });
        } else {
            ShowToast("Email không hợp lệ");
        }
    });
    function ShowToast(mess) {
        Toastify({
            text: mess,
            duration: 3000,
            style: {
                background: "#dc3545",
            },
        }).showToast();
    }
});
