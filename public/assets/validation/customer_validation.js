$('#customer_form').validate({
    rules:{
        country_id:{
            required:true,
            maxlength:50
        },
        name:{
            required:true,
            maxlength:30
        },
        email:{
            required:true,
            maxlength:30,
            email:true,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'customers',
                    column_name : 'email',
                    value: function() {
                        return $('#email').val();
                    },
                    id: function() {
                        return $('#customer_id').val();
                    }
                }
            }
        },
        phone_no:{
            required:true,
            maxlength:20
        },
        city:{
            required:true,
            maxlength:30
        },
        address:{
            required:true,
            maxlength:500
        },
        note:{
            required:false,
            maxlength:5000
        },
    },
    messages:{
        email:{
            remote: "This email already exists."
        },
    }
});

$('#email').keyup(function() {
    $('#customer_form').validate().element('#email');  // Manually trigger validation for the color field
});