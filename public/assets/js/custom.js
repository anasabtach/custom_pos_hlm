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


$('.status_toggle_btn').change(function(){
    let route = $(this).data('route');
    if ($(this).prop('checked')) {
        route = route.replace(':value', '1');  // Reassign the modified value
    } else {
        route = route.replace(':value', '0');  // Reassign the modified value
    }

    $.ajax({
        url: route,
        method: "GET",
        success: function(res) {
            if(res.success){
                toastr.success(res.success, 'Success', {
                    positionClass: 'toast-top-right',
                    timeOut: 3500
                });
            }else{
                toastr.error(res.error, 'Success', {
                    positionClass: 'toast-top-right',
                    timeOut: 3500
                });
            }
        }
    });
});

//datatable initialization
// let table = new DataTable('#table', {
//     columnDefs: [
//         { className: 'text-center', targets: '_all' } // Apply to all columns
//     ]
// });

// ClassicEditor
// .create(document.querySelector('#description'), {
//     toolbar: [
//         'heading','bold', 'italic',, 'link', 'bulletedList', 'numberedList', 'blockQuote',
//     ],
//     heading: {
//         options: [
//             { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
//             { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
//             { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
//         ]
//     }
// })
// .catch(error => {
//     console.error(error);
// });

$('.multiple_select_2').select2()