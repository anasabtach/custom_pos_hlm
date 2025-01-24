<!DOCTYPE html>

<html lang="en">


<head>
	<meta charset="utf-8" />
	<title>{{ config('app.name') ?? 'HLM' }}</title>
	<meta name="description" content="Updates and statistics" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<link href="{{ asset('assets/css/stylec619.css?v=1.0') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/api/pace/pace-theme-flat-top.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/api/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.html') }}" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- DataTables Buttons CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.0/css/buttons.dataTables.min.css"> --}}
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.0/css/buttons.dataTables.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<style>
	.error {
		color: red;
		font-size: 12px;
		font-weight: normal;
		font-style: italic;
	},
	input[type="file"]{
		display: block !important;
	},
	#myTable th, #myTable td {
        text-align: center;
    }

	.loader {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  border: 3px solid;
  border-color: #388CB8 #388CB8 transparent transparent;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
}
.loader::after,
.loader::before {
  content: '';  
  box-sizing: border-box;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  border: 3px solid;
  border-color: transparent transparent #388CB8 #388CB8;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  box-sizing: border-box;
  animation: rotationBack 0.5s linear infinite;
  transform-origin: center center;
}
.loader::before {
  width: 32px;
  height: 32px;
  border-color: #388CB8 #388CB8 transparent transparent;
  animation: rotation 1.5s linear infinite;
}
    
@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
} 
@keyframes rotationBack {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }
}
    
	</style>
	@yield('style')

</head>


<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
    <!-- Paste this code after body tag -->
	<div class="se-pre-con">
		<div class="pre-loader">
			<span class="loader"></span>
		</div>
	  </div>
	</div>



	<!--begin::Header Mobile-->
	<div id="tc_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<!--begin::Logo-->
		{{-- <a href="index-2.html" class="brand-logo">

			<span class="brand-text"><img style="height: 25px;" alt="Logo" src="{{ asset('assets/images/misc/logo.png') }}" /></span>

		</a> --}}
		<!--end::Logo-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
           
			 <div class="posicon">
				<a href="pos.html" class="btn btn-primary d-flex align-items-center justify-content-center white me-2">POS</a>
			</div>
			<button class="btn p-0" id="tc_aside_mobile_toggle">
				<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-justify-right" fill="currentColor"
					xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
				</svg>
			</button>

			<button class="btn p-0 ms-2" id="tc_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">

					<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
					</svg>

				</span>
			</button>

		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<div>
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="tc_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="tc_brand">
						<!--begin::Logo-->
	
						{{-- <a href="index-2.html" class="brand-logo">
							<img class="brand-image" style="height: 25px;" alt="Logo" src="{{ asset('assets/images/misc/k.png') }}" />
							<span class="brand-text"><img style="height: 25px;" alt="Logo"
									src="{{ asset('assets/images/misc/logo.png') }}" /></span>
	
						</a> --}}
						<!--end::Logo-->
	
	
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
                        @include('admin.partials.sidebar')
					<!--end::Aside Menu-->
				</div>
			</div>
			<!--begin::Aside-->
		
			<div class="aside-overlay"></div>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="tc_wrapper">
				<!--begin::Header-->
				@include('admin.partials.navbar')
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
					<!--begin::Subheader-->
					<div class="subheader py-2 py-lg-6 subheader-solid">
						<div class="container-fluid">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-white mb-0 px-0 py-2">
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
					</div>
					<!--end::Subheader-->
					<!--begin::Entry-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Container-->
						<div class="container-fluid">
							@yield('content')
						</div>
						
					</div>
					
				</div>

				
				<div class="footer bg-white py-4 d-flex flex-lg-column" id="tc_footer">
					
					{{-- <div
						class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
						
						<div class="text-dark order-2 order-md-1">
							<span class="text-muted font-weight-bold me-2">2020©</span>
							<a href="#" target="_blank" class="text-dark-75 text-hover-primary">Themescoder</a>
						</div>

						<div class="nav nav-dark">
							<a href="#" target="_blank" class="nav-link pl-0 pr-5">About</a>
							<a href="#c" target="_blank" class="nav-link pl-0 pr-5">Team</a>
							<a href="#" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
						</div>

					</div> --}}

				</div>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Main-->
      <!-- REMARK Modal -->
	  <div class="modal fade" id="remark_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Your Remarks</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="" method="GET" id="remark_form">
					<div class="modal-body">
							@csrf <!-- Include this for Laravel POST forms -->
							<div class="form-group mb-3">
								<label for="remarks" class="form-label">Remarks</label>
								<textarea name="remarks" id="remarks" class="form-control" rows="4" placeholder="Enter your remarks here..."></textarea>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<script src="{{ asset('assets/js/plugin.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/api/jqueryvalidate/jquery.validate.min.js') }}"></script> --}}
	<script src="{{ asset('assets/api/pace/pace.js') }}"></script>
	<script src="{{ asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ asset('assets/api/quill/quill.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/api/datatable/jquery.dataTables.min.js') }}"></script> --}}
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

		<!-- DataTables Buttons JS -->
	<script src="https://cdn.datatables.net/buttons/2.2.0/js/dataTables.buttons.min.js"></script>

	<!-- JSZip (needed for Excel export) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

	<!-- PDFMake (needed for PDF export) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

	<!-- DataTables Buttons Export JS -->
	<script src="https://cdn.datatables.net/buttons/2.2.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.0/js/buttons.print.min.js"></script>


	<script src="{{ asset('assets/js/script.bundle.js') }}"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script> --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
	<script src="{{ asset('assets/validation/custom_validation_rules.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        @if ($errors->any())
            var errors = @json($errors->all());
        @endif

        @if (session()->has('success'))
            var success = "{{ session()->get('success') }}";
        @endif

        @if (session()->has('error'))
            var error = "{{ session()->get('error') }}";
        @endif
    </script>
    <script src="{{ asset('assets/js/toast-error.js') }}"></script>
	<script>
	// 	var options = {
	//   debug: 'info',
	//   modules: {
	// 	toolbar: '#toolbar'
	//   },
	//   placeholder: 'Compose an epic...',
	//   readOnly: true,
	//   theme: 'snow'
	// };
	// var editor = new Quill('#editor', options);
	
	
	jQuery(document).ready( function () {
		// jQuery('#myTable').DataTable();
	} );
	
	$('.confirm-delete').click(function(e){
		e.preventDefault();
		jQuery('#remark_modal').modal('show');
		jQuery('#remark_form').attr('action', $(this).attr('href'));
    })

	</script>
	@yield('script')
</body>
</html>