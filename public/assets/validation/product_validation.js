$('#product_form').validate({
    rules: {
        category_id: {
            required: true,
            maxlength: 50
        },
        unit_id: {
            required: true,
            maxlength: 50
        },
        brand_id: {
            required: true,
            maxlength: 50
        },
        supplier_id: {
            required: true,
            maxlength: 50
        },
        product_name: {
            required: true,
            maxlength: 50,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'products',
                    column_name : 'name',
                    value: function() {
                        // Ensure that you're using the correct selector for your product name input field
                        return $('#product_name').val();  // Get the value of the input
                    },
                    id: function() {
                        return $('#product_id').val();
                    }
                }
            }
        },
        sku: {
            required: true,
            maxlength: 30,
            remote : {
                url : '/admin/common/check-value-exists',
                type : "GET",
                data:{
                    table_name  : 'products',
                    column_name : 'sku',
                    value: function() {
                        return $('#sku').val();
                    },
                    id: function() {
                        return $('#product_id').val();
                    }
                }
            }
        },
        price: {
            min: 1,
            required: true,
            number: true,
            rangelength: [1, 10] 
        },
        stock: {
            min: 0,
            required: true,
            number: true,
            rangelength: [1, 10] 
        },
        stock_alert: {
            required: true,
            number: true,
            rangelength: [1, 10],
            lessThanOrEqual: "#stock",
            min: 0,
        },
        expiration: {
            required: false,
            date: true
        },
        description: {
            required: false,
            maxlength: 65000
        },
        has_variation: {
            required: true,
            boolean: true 
        },
        product_thumbnail: {
            required: function () {
              return is_edit ? false : true; // No need for `== true`
            },
            extension: "jpg|jpeg|png",
            filesize: 2097152 // 2MB
        },
        // Arrays
        'variation_sku[]': {
            required:true,
            maxlength: 30
        },
        'variation_unit_id[]': {
            required:function(element){
                return $('#has_variation').val() ==1;
            }, 
            maxlength: 50
        },
        'variation_price[]': {
            required:function(element){
                return $('#has_variation').val() ==1;
            }, 
            number: true,
            rangelength: [1, 10] 
        },
        'variation_stock[]': {
            required:function(element){
                return $('#has_variation').val() ==1;
            }, 
            number: true,
            rangelength: [1, 10] 
        },
        'variation_stock_alert[]': {
            required:function(element){
                return $('#has_variation').val() ==1;
            }, 
            number: true,
            rangelength: [1, 10] 
        },
        'variation_expiration[]': {
            required: false,
            date: true
        },
        'name[]': {
            required:function(element){
                return $('#has_variation').val() ==1;
            }, 
            maxlength: 50
        },
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    messages: {
        // Optional: Define custom error messages for clarity
        category_id: {
            required: "Category is required.",
            maxlength: "Category name cannot exceed 50 characters."
        },
        unit_id: {
            required: "Unit is required.",
            maxlength: "Unit name cannot exceed 50 characters."
        },
        product_name: {
            required: "Product name is required.",
            maxlength: "Product name cannot exceed 50 characters."
        },
        sku: {
            required: "SKU is required.",
            maxlength: "SKU cannot exceed 30 characters."
        },
        price: {
            required: "Price is required.",
            number: "Please enter a valid number.",
            rangelength: "Price must be between 1 and 10 digits long."
        },
        stock: {
            required: "Stock is required.",
            number: "Please enter a valid number.",
            rangelength: "Stock must be between 1 and 10 digits long."
        },
        stock_alert: {
            required: "Stock alert is required.",
            number: "Please enter a valid number.",
            rangelength: "Stock alert must be between 1 and 10 digits long.",
            lessThan: "Stock alert must be less than stock."
        },
        has_variation: {
            required: "Please specify if there are variations.",
            boolean: "Invalid value for variations."
        },
        product_thumbnail: {
            accept: "Only JPEG, JPG, and PNG files are allowed.",
            filesize: "File size must be less than 2MB."
        },
        product_name:{
            remote: "This product name already exists."
        },
        sku:{
            remote: "This SKU name already exists."
        }
    },
});
