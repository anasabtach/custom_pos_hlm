@extends('admin.partials.master')
@section('style')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="{{ asset('assets/admin/css/menu.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-12 px-4">
                <div class="card card-custom gutter-b bg-white border-0">
                    <div class="card-header border-0 align-items-center">
                        <h3 class="card-label mb-0 font-weight-bold text-body">
                            {{ isset($edit_staff) ? 'Update' : 'Add' }} Staff
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.staffs.store') }}" class="form-horizontal form-material validation" method="POST" id="profile_form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <label for="first_name" class="form-control-label">First Name</label>
                                    <input type="text" class="form-control round bg-transparent text-dark" placeholder="Enter first name" name="first_name" value="{{ @$edit_staff->first_name }}">
                                </div>
                                
                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <label for="last_name" class="form-control-label">Last Name</label>
                                    <input type="text" class="form-control round bg-transparent text-dark" placeholder="Enter last name" name="last_name" value="{{ @$edit_staff->last_name }}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input type="text" class="form-control round bg-transparent text-dark" placeholder="Enter email" name="email" id="email" value="{{ @$edit_staff->email }}">
                                </div>
                                
                                <!-- Role -->
                                <div class="col-md-6">
                                    <label for="user_type" class="form-control-label">Role</label>
                                    <select class="form-control round bg-transparent text-dark" name="user_type" id="user_type">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" @selected(@$edit_staff->user_type == $role->name)>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Password -->
                                <div class="col-md-6">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input type="password" class="form-control round bg-transparent text-dark" placeholder="Enter password" name="password" id="password">
                                    <i class="fa-regular fa-eye text-input5 show_password"></i>
                                </div>
                                
                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-control-label">Confirm Password</label>
                                    <input type="password" class="form-control round bg-transparent text-dark" placeholder="Enter confirm password" name="password_confirmation">
                                    <i class="fa-regular fa-eye show_password text-input5"></i>
                               
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Profile Image -->
                                <div class="col-md-12">
                                    @include('admin.components.single_image', [
                                        'id'=> 'profile_images', 
                                        'preview'=>'preview', 
                                        'name'=>'profile_image', 
                                        'is_update'=>true, 
                                        'image'=>getImage(@$edit_staff->profileImage->filename ?? null)
                                    ])
                                </div>
                            </div>
                            
                            <div class="row mt-5">
                                <!-- Submit Button -->
                                <div class="col-md-12">
                                    <input type="hidden" name="staff_id" id="staff_id" value="{{ @$edit_staff->hashid }}">
                                    {{-- <input type="submit" class="btn btn-primary mt-4 float-end" value="{{ isset($edit_staff) ? 'Update' : 'Add' }}"> --}}
                                    <button type="submit" class="btn btn-primary mt-4 btn24" >{{ isset($is_update) ? 'Update' : 'Add' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End of col-lg-12 col-xl-12 -->
        </div> <!-- End of row -->
    </div> <!-- End of container-fluid -->
</div> <!-- End of d-flex flex-column-fluid -->
@endsection

@section('script')
<script>
    let is_edit = "{{ isset($is_edit) ? true : false }}";
</script>
<script src="{{ asset('assets/validation/staff.js') }}"></script>
<script>
    // setTimeout(function() {
    //     $(".preloader").show();
    // }, 2000); // 2000 milliseconds = 2 seconds
</script>
@endsection
