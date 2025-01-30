$('#color_form').validate({
    rules:{
        color:{
            required:true,
            maxlength:50,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'colors',
                    column_name : 'color',
                    value: function() {
                        return $('#color').val();
                    },
                    id: function() {
                        return $('#color_id').val();
                    }
                }
            }
        }
    },
    messages:{
        color:{
            remote: "This color name already exists."
        },
    }
});

$('#color').keyup(function() {
    $('#color_form').validate().element('#color');  // Manually trigger validation for the color field
});