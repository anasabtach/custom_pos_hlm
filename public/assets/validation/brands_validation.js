$('#brand_form').validate({
    rules:{
        brand_name:{
            required:true,
            maxlength:50,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'brands',
                    column_name : 'name',
                    value: function() {
                        return $('#brand_name').val();
                    },
                    id: function() {
                        return $('#brand_id').val();
                    }
                }
            }
        }
    },
    messages:{
        brand_name:{
            remote: "This brand name already exists."
        },
    }
});

$('#brand_name').keyup(function() {
    $('#brand_form').validate().element('#brand_name');  // Manually trigger validation for the color field
});