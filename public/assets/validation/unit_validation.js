$('#unit_form').validate({
    rules:{
        unit_name:{
            required:true,
            maxlength:20,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'units',
                    column_name : 'name',
                    value: function() {
                        return $('#unit_name').val();
                    },
                    id: function() {
                        return $('#unit_id').val();
                    }
                }
            }
        },
        short_hand:{
            required:true,
            maxlength:10
        },
    },
    messages:{
        unit_name:{
            remote: "This unit name already exists."
        },
    }
});


$('#unit_name').keyup(function() {
    $('#unit_form').validate().element('#unit_name');  // Manually trigger validation for the color field
});