$('#supplier_form').validate({
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
            email:true
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
    }
});