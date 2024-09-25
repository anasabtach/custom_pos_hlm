function singleImagePreview(inputId, previewImage){//image preview funciton
    const input = document.querySelector(inputId);
    const preview = document.querySelector(previewImage);
    preview.style.removeProperty('display');
    // Clear previous preview
    preview.src = '';

    const file = input.files[0];

    if (file) {
        const imageUrl = URL.createObjectURL(file);
        preview.src = imageUrl;
    }
 }

 //show loader and disabled submit button when ever form gets submit
 $('form').submit(function(){
    let submitButton = $('button[type="submit"]', this);

    if($(this).hasClass('validation')){
        if(!$(this).valid()){
            return false;
        }
    }
    submitButton.prop('disabled', true);
    submitButton.html('<i class="fa fa-spinner fa-spin"></i>Loading');
});