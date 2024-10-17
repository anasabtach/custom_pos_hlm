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
        product_name: {
            required: true,
            maxlength: 50
        },
        sku: {
            required: true,
            maxlength: 30
        },
        price: {
            required: true,
            number: true,
            rangelength: [1, 10] 
        },
        stock: {
            required: true,
            number: true,
            rangelength: [1, 10] 
        },
        stock_alert: {
            required: true,
            number: true,
            rangelength: [1, 10],
            lessThan: '#stock' 
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
        // Arrays
        'variation_sku[]': {
            required:function(element){
                return $('#has_variation').val() ==1;
            }, 
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
        }
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
        }
    },
});
