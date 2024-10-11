if (typeof errors !== 'undefined' && errors.length > 0) {
    errors.forEach(function(error) {
        toastr.error(error, 'Error', {
            positionClass: 'toast-top-right',
            timeOut: 3500
        });
    });
}

if (typeof success !== 'undefined' && success.length > 0) {
    toastr.success(success, 'Success', {
        positionClass: 'toast-top-right',
        timeOut: 3500
    });
}

if (typeof error !== 'undefined' && error.length > 0) {
    toastr.error(error, 'Error', {
        positionClass: 'toast-top-right',
        timeOut: 3500
    });
}
