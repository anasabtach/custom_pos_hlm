$('#profile_form').validate({
    rules : {
        first_name:{
            required  :true,
            minlength : 2,
            maxlength : 30,
        },
        last_name:{
            required  :true,
            minlength : 2,
            maxlength : 30,
        },
        email:{
            required:true,
            minlength:5,
            maxlength:50,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'admins',
                    column_name : 'email',
                    value: function() {
                        return $('#email').val();
                    },
                    id: function() {
                        return $('#staff_id').val();
                    }
                }
            }
        },
        user_type:{
            required:true,
        },
        password:{
            required:function(){
                return (is_edit == true) ? false : true;
            },
            minlength:6,
            maxlength:30,
        },
        password_confirmation:{
            equalTo:"#password"
        },
        profile_image: {
            required:function(){
                return (is_edit == true) ? false : true;
            },
        }
    },
    messages:{
        password_confirmation:{
            equalTo:"Please enter the same password again"
        },
        email:{
            remote: "This email already exists."
        },
    }
});
$('#email').keyup(function() {
    $('#profile_form').validate().element('#email');  // Manually trigger validation for the color field
});