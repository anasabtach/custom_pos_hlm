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
    <div class="row">
      <div class="col-md-12">
          <div class="white-box">
            <form action="{{ route('admin.roles.store') }}" method="POST" id="category_form" class="validation">
              @csrf
              <div class="row">
                <div class="form-group col-md-5">
                  <label class="col-md-12">Role Name</label>
                  <div class="col-md-12">
                      <input type="text" placeholder="Role Name" class="form-control form-control-line" name="name" value="{{ $edit_role->name ?? '' }}" required> 
                  </div>
                </div>
                <div class="form-group col-md-5"> 
                  <label class="col-md-12">Permissions</label>
                  <div class="col-md-12">
                    <select class="form-control multiple_select_2" name="permissions[]" id="permissions" multiple>
                      @foreach($permissions AS $permission)
                        <option value="{{ $permission->hashid }}" @isset($is_edit) @selected(in_array($permission->id, $edit_role->permissions->pluck('id')->toArray())) @endisset>{{ $permission->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-2" style="margin-top:20px">
                  <input type="hidden" name="role_id" value="{{ $edit_role->hashid ?? '' }}">
                  @include('admin.components.button', ['class'=> 'btn-success', 'type'=>'submit', 'name'=>(isset($is_edit)) ? 'Update' : 'Add'])
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($roles AS $role)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $role->name }}</td>
                          <td>
                            <a href="{{ route('admin.roles.edit',['id'=>$role->hashid]) }}" style="margin-right: 10px">
                              <i class="fa fa-pencil-square-o  fa-fw edit-icon fa-2x text-primary" aria-hidden="true"></i> 
                            </a>
                            <a href="{{ route('admin.roles.delete',['id'=>$role->hashid]) }}" onclick="return confirm('Are you sure you want to delete this role?');">
                              <i class="fa fa-trash fa-fw delete-icon text-danger fa-2x" aria-hidden="true"></i> 
                          </a>
                          </td>
                        </tr>
                      @endforeach
                      {{-- @foreach($categories AS $category)
                      
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $category->name }}</td>
                          <td>
                            <label class="toggle-switch">
                              <input type="checkbox" @checked($category->status) onChange="updateCategoryStatus(this)" data-id={{ $category->hashid }} data-status={{ $category->status }}>
                              <div class="toggle-switch-background">
                                <div class="toggle-switch-handle"></div>
                              </div>
                            </label>
                          </td>
                          <td>
                            <a href="{{ route('admin.parent_categories.edit',['id'=>$category->hashid]) }}" style="margin-right: 10px">
                              <i class="fa fa-pencil-square-o  fa-fw edit-icon fa-2x text-primary" aria-hidden="true"></i> 
                            </a>
                            <a href="{{ route('admin.parent_categories.delete',['id'=>$category->hashid]) }}" onclick="return confirm('Are you sure you want to delete this parent category?(This will delete all the sub categories, questions and their related answers too)');">
                              <i class="fa fa-trash fa-fw delete-icon text-danger fa-2x" aria-hidden="true"></i> 
                          </a>
                          </td>
                        </tr>
                      @endforeach --}}
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
      let update_status_route = "{{ route('admin.categories.update_status', ['id' => ':id', 'status' => ':status']) }}";
      $('.multiple_select_2').select2();
    </script>

    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="{{ asset('assets/admin/validation/parent_category.js') }}"></script>
    <script src="{{ asset('assets/admin/js/category.js') }}"></script>
    <script>
      let update_list = "{{ route('admin.categories.update_list') }}"
      let table       = new DataTable('#myTable');
  </script>
@endsection