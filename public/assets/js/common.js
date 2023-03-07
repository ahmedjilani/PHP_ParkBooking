function toast(message) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "timeOut": "3000",
        "extendedTimeOut": "1000",

    }
    toastr.success(message, 'Congrats,');
}
function dnagerToast(message) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "timeOut": "3000",
        "extendedTimeOut": "1000",

    }
    toastr.error(message, 'Alert,');
}
