$('#role_form').validate({
    rules:{
        name:{
            required:true,
            maxlength:50,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'roles',
                    column_name : 'name',
                    value: function() {
                        return $('#name').val();
                    },
                    id: function() {
                        return $('#brand_id').val();
                    }
                }
            }
        },
        'permissions[]':{
            required:true,
        }
    },
    messages:{
        name:{
            remote: "This role name already exists."
        },
    }
});

$('#name').keyup(function() {
    $('#role_form').validate().element('#name');  // Manually trigger validation for the color field
});