@extends('admin.partials.master')
@section('style')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="{{ asset('assets/admin/css/menu.css') }}" rel="stylesheet">

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form action="{{ route('admin.staffs.store') }}" class="form-horizontal form-material validation" method="POST" id="profile_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-12">First Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Enter first name" class="form-control form-control-line" value="{{ @$edit_staff->first_name }}" name="first_name"> 
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-12">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Enter last name" class="form-control form-control-line" value="{{ @$edit_staff->last_name }}" name="last_name"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Enter mail" class="form-control form-control-line" value="{{ @$edit_staff->email }}" name="email"> 
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <select class="form-control" name="user_type" id="user_type">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" @selected(@$edit_staff->user_type == $role->name)>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Enter password" class="form-control form-control-line" name="password" id="password"> 
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Enter confirm password" class="form-control form-control-line" name="password_confirmation"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('admin.components.single_image', ['id'=> 'profile_images', 'preview'=>'preview', 'name'=>'profile_image', 'is_update'=>true, 'image'=>getImage(@$edit_staff->profileImage->thumbnail ?? null)])
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <input type="hidden" name="staff_id" value="{{ @$edit_staff->hashid }}">
                            @include('admin.components.button', ['class'=> 'btn-success', 'type'=>'submit', 'name'=>'Update'])
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let is_edit    = "{{ (isset($is_edit)) ? true : false }}";
    </script>
    <script src="{{ asset('assets/admin/validation/staff.js') }}"></script>
    <script>
        // setTimeout(function() {
        //     $(".preloader").show();
        // }, 2000); // 2000 milliseconds = 2 seconds
    </script>
@endsection