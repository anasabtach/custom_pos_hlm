@extends('admin.partials.master')
@section('style')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="{{ asset('assets/admin/css/menu.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<style>
    #myTable th,
    #myTable td {
        text-align: center;
    }
</style>
@endsection
@section('content')
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-12 text-right mb-3">
            @include('admin.components.anchor', ['class'=> 'btn-success', 'type'=>'submit', 'name'=>'Add Staff', 'route'=> route('admin.staffs.add')])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($staffs AS $staff)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $staff->full_name }}</td>
                          <td>{{ $staff->email }}</td>
                          <td>{{ $staff->user_type }}</td>
                          <td>
                            <label class="toggle-switch">
                              <input type="checkbox" @checked($staff->status) onChange="updateUserStatus(this)" data-id={{ $staff->hashid }} data-status={{ $staff->status }}>
                              <div class="toggle-switch-background">
                                <div class="toggle-switch-handle"></div>
                              </div>
                            </label>
                          </td>
                          <td>
                            <a href="{{ route('admin.staffs.edit',['id'=>$staff->hashid]) }}" style="margin-right: 10px">
                              <i class="fa fa-pencil-square-o  fa-fw edit-icon fa-2x text-primary" aria-hidden="true"></i> 
                            </a>
                            <a href="{{ route('admin.staffs.delete',['id'=>$staff->hashid]) }}" onclick="return confirm('Are you sure you want to delete this staff member)');">
                              <i class="fa fa-trash fa-fw delete-icon text-danger fa-2x" aria-hidden="true"></i> 
                          </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
      let update_status_route = "{{ route('admin.staffs.update_status', ['id' => ':id', 'status' => ':status']) }}";

    </script>

    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="{{ asset('assets/admin/validation/staff.js') }}"></script>
    <script src="{{ asset('assets/admin/js/staff.js') }}"></script>
    <script>
      let table       = new DataTable('#myTable');
  </script>
@endsection