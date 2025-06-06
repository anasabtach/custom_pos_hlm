$.validator.addMethod("lessThan", function (value, element, param) {//check less than
    const current_value = parseInt(value);
    const comparison_value = parseInt($(param).val()); 
    return this.optional(element) || (current_value < comparison_value);
}, function (params, element) {
    const comparisonValue = $(params).val();
    return `This value should be less than ${comparisonValue}`;
});


$.validator.addMethod("boolean", function(value, element) {//check boolean
    return this.optional(element) || value === "0" || value === "1" || value.toLowerCase() === "true" || value.toLowerCase() === "false";
}, "Please enter a valid boolean value (0 or 1, true or false)");

// $.validator.addMethod('requiredIf', function(value, element, param){//required when the other field is required
//     return 
//     return this.optional(element) || $(param).val() == "1";
// }, "This field is required");

$.validator.addMethod("lessThanOrEqual", function(value, element, param) {
    var target = $(param); // The element you want to compare with
    if (this.optional(element)) {
        return true; // If the field is optional, validation passes
    }
    return parseFloat(value) <= parseFloat(target.val()); // Compare the values
}, "Value must be less than or equal to the specified value.");