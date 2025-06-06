$('#category_form').validate({
    rules:{
        category_name:{
            required:true,
            maxlength:50,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'categories',
                    column_name : 'name',
                    value: function() {
                        return $('#category_name').val();
                    },
                    id: function() {
                        return $('#category_id').val();
                    }
                }
            }
        }
    },
    messages:{
        category_name:{
            remote: "This category name already exists."
        },
    }
});

$('#category_name').keyup(function() {
    $('#category_form').validate().element('#category_name');  // Manually trigger validation for the color field
});