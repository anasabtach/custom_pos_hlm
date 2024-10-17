$('#category_form').validate({
    rules:{
        category_name:{
            required:true,
            maxlength:50
        }
    }
});