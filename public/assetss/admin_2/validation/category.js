$('#category_form').validate({
    rules : {
        name:{
            required  :true,
            minlength : 2,
            maxlength : 50,
        }
    }
});