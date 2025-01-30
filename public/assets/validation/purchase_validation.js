$('#purchase_form').validate({
    rules:{
        date : {
            required:true,
            date:true,
        },
        supplier_id:{
            required:true,
        },
        batch_no:{
            required:true,
        },
        supplier_id:{
            required:true,
        }

    }
});