<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/backend/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/backend/img/favicon.png') }}">
  <title>
    {{ $title ?? 'HLM' }} -- {{ config('app.name') }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/backend/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/backend/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset('assets/backend/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    @include('admin.partials.sidebar')
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('admin.partials.navbar')

    <!-- End Navbar -->
    @yield('content')
  </main>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

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
</body>

</html>