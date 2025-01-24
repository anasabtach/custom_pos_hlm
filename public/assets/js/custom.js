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

 function createImagePreviews(inputId, previewContainerId) {
    const inputElement = document.getElementById(inputId);
    const previewContainer = document.getElementById(previewContainerId);

    // Ensure the input element and preview container exist
    if (!inputElement || !previewContainer) {
      console.error('Invalid input or preview container ID.');
      return;
    }

    // Clear previous previews
    previewContainer.innerHTML = '';

    // Access the files from the input element
    const files = inputElement.files;

    // Loop through selected files
    Array.from(files).forEach(file => {
      // Ensure it's an image
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function (e) {
          // Create image element
          const img = document.createElement('img');
          img.src = e.target.result;
          img.alt = file.name;
          img.classList.add('preview');
            // Set height and width
          img.style.width = '100px';
          img.style.height = '100px';
          // Append to the container
          previewContainer.appendChild(img);
        };

        // Read the image file as a data URL
        reader.readAsDataURL(file);
      } else {
        alert(`${file.name} is not a valid image file.`);
      }
    });
  }

 //show loader and disabled submit button when ever form gets submit
//  $('form').submit(function(){
//     let submitButton = $('button[type="submit"]', this);

//     if($(this).hasClass('validation')){
//         if(!$(this).valid()){
//             return false;
//         }
//     }
//     submitButton.prop('disabled', true);
//     submitButton.html('<i class="fa fa-spinner fa-spin"></i>Loading');
// });


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
$('.select_2').select2({
  placeholder: 'Please select',
  allowClear: true // This adds a clear button to remove the selection
});


 //show loader and disabled submit button when ever form gets submit
 $('form').submit(function(e) {
  let submitButton = $('button[type="submit"], input[type="submit"]', this);
  if (!$(this).valid()) {
      e.preventDefault();
      return;
  }else{
    console.log('dbne');
    submitButton.prop('disabled', true); // Disable the submit button
    submitButton.html('<i class="fa fa-spinner fa-spin"></i>Loading');
  }

});

$('.show_password').click(function () {
  // Select both password inputs
  var passwordInput = $('#password'); // First password field
  var confirmPasswordInput = $('input[name="password_confirmation"]'); // Confirm password field

  // Toggle input types for both fields
  if (passwordInput.attr('type') === 'password' && confirmPasswordInput.attr('type') === 'password') {
    passwordInput.attr('type', 'text');
    confirmPasswordInput.attr('type', 'text');
    $('.show_password').removeClass('fa-eye').addClass('fa-eye-slash'); // Update all icons
  } else {
    passwordInput.attr('type', 'password');
    confirmPasswordInput.attr('type', 'password');
    $('.show_password').removeClass('fa-eye-slash').addClass('fa-eye'); // Update all icons
  }
});
