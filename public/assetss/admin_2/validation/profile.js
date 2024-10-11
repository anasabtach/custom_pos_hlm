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
            maxlength:50
        },
        password:{
            required:false,
            minlength:6,
            maxlength:30,
        },
        password_confirmation:{
            equalTo:"#password"
        }
    },
    messages:{
        password_confirmation:{
            equalTo:"Please enter the same password again"
        }
    }
});