$(".form_add_user").submit(function (e) {
    if (!$(".input_name").val() || !$(".input_").val()) {
        e.preventDefault();
        ToastError("Invalid Value");
        const validate = HandleValidate();
    }
});

function HandleValidate() {
    regEmail =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!regEmail.test()) console.log();
    ShowToast();
}

function ToastError(mess = "This is a toast") {
    Toastify({
        text: mess,
        duration: 3000,
        style: {
            background: "#dc3545",
        },
    }).showToast();
}
