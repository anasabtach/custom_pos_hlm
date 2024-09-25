@extends('admin.partials.master')
@section('content')
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('assets/backend/img/team-1.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              Sayo Kravits
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              Public Relations
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <form action="{{ route('admin.update_profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">First Name</label>
                  <input type="text" placeholder="Enter first name" class="form-control form-control-line" value="{{ $user->first_name }}" name="first_name"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Last Name</label>
                  <input type="text" placeholder="Enter last name" class="form-control form-control-line" value="{{ $user->last_name }}" name="last_name"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email</label>
                  <input type="text" placeholder="Enter mail" class="form-control form-control-line" value="{{ $user->email }}" name="email"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Password</label>
                  <input type="password" placeholder="Enter password" class="form-control form-control-line" name="password" id="password"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Confirm Password</label>
                  <input type="password" placeholder="Enter confirm password" class="form-control form-control-line" name="password_confirmation"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Profile Image</label>
                  @include('admin.components.single_image', ['id'=> 'profile_image', 'preview'=>'preview', 'name'=>'profile_image', 'is_update'=>true, 'image'=>@getImage($user->profileImage->filename)])
                </div>
              </div>
              <div class="col-md-12">
                <input type="hidden" name="user_id" value="{{ $user->hashid }}">
                <button class="btn btn-primary btn-sm float-end">Update</button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/validation/profile.js') }}"></script>
    <script>
        // setTimeout(function() {
        //     $(".preloader").show();
        // }, 2000); // 2000 milliseconds = 2 seconds
    </script>
@endsection