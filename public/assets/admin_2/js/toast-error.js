if (typeof errors !== 'undefined' && errors.length > 0) {
    errors.forEach(function(error) {
        $.toast({
            heading: 'Error',
            text: error,
            position: 'top-right',
            loaderBg: '#fff',
            icon: 'error',
            hideAfter: 3500,
            stack: 6
        });
    });
}

if (typeof success !== 'undefined' && success.length > 0) {
    $.toast({
        heading: 'Success',
        text: success,
        position: 'top-right',
        loaderBg: '#fff',
        icon: 'success',
        hideAfter: 3500,
        stack: 6
    });
}

if (typeof error !== 'undefined' && error.length > 0) {
    $.toast({
        heading: 'Error',
        text: error,
        position: 'top-right',
        loaderBg: '#fff',
        icon: 'error',
        hideAfter: 3500,
        stack: 6
    });
}
