<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assetss/backend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assetss/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assetss/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assetss/backend/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* .bg-gradient-primary {
    background-image: linear-gradient(310deg, #388cb8 0%, #388cb8 100%) !important;
    opacity: 0.5;
}  */
img.text9c {
    border-radius: 50px 0px 0px 50px;
    object-fit: cover;
    height: 1000px;
    /* width: 90%; */
    object-position: right;
}
button.btn.btn-lg.btn-primary.btn-lg.w-100.mt-4.mb-0 {
    background-color: #388cb8 !important;
}
/* i.fa-regular.fa-eye.show_password.text-input51 {
    position: absolute;
    left: 357px;
    top: 197px;
}
@media only screen and (max-width: 600px) {
    i.fa-regular.fa-eye.show_password.text-input51 {
    position: absolute;
    left: 309px;
    top: 197px;
}
} */
i.fa-regular.show_password.text-input51 {
    margin-top: 16px;
    margin-left: -20px;
}
.form-control-lg, .form-upset1{
    width: 361px !important;
}
    </style>
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.login') }}" id="login_form" method="POST">
										@csrf
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg"
                                                placeholder="Email" aria-label="Email" name="email" id="email">
                                        </div>
                                        <div class="mb-31">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <input type="password" class="form-control form-control-lg form-upset1"
                                                    placeholder="Password" aria-label="Password" name="password" id="password">
                                                   
                                                </div>
                                                <div class="col-md-1">
                                                    <i class="fa-regular fa-eye show_password text-input51"></i>
                                                </div>
                                            </div>
                                          
                                               
                                        </div>
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <img src="https://t4.ftcdn.net/jpg/02/58/35/17/360_F_258351702_w1Qymr2sn3MLR1txUqpbJatHsFdjZs8M.jpg" class="text9c"/>
                            {{-- <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden bg-texte"
                                style="background-image: url('https://t4.ftcdn.net/jpg/02/58/35/17/360_F_258351702_w1Qymr2sn3MLR1txUqpbJatHsFdjZs8M.jpg');
          background-size: cover; background-position: center right;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                {{-- <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="{{ asset('assetss/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assetss/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetss/backend/validation/login_validation.js') }}"></script>
	<script>
        @if($errors->any())
            var errors = @json($errors->all());
        @endif

        @if(session()->has('success'))
            var success = "{{ session()->get('success') }}";
        @endif

        @if(session()->has('error'))
            var error = "{{ session()->get('error') }}";
        @endif
    
    </script>
    <script src="{{ asset('assets/backend/js/toast-error.js') }}"></script>
    <script>
        $('.show_password').click(function () {
        // Select both password inputs
        var passwordInput = $('#password'); // First password field
        // var confirmPasswordInput = $('input[name="password_confirmation"]'); // Confirm password field

        // Toggle input types for both fields
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            $('.show_password').removeClass('fa-eye').addClass('fa-eye-slash'); // Update all icons
        } else {
            passwordInput.attr('type', 'password');
            $('.show_password').removeClass('fa-eye-slash').addClass('fa-eye'); // Update all icons
        }
        });
    </script>
</body>

</html>
