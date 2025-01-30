@extends('admin.partials.master')
@section('style')
    {{-- <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets/admin/css/menu.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        @can('roles')
            <div class="row">
                <div class="col-lg-12 col-xl-12 px-4">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-header align-items-center border-0">
                            <h3 class="card-label font-weight-bold text-body">
                                {{ isset($is_update) ? 'Update' : 'Add' }} Role
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.roles.store') }}" method="POST" id="role_form" class="validation">
                                @csrf
                                <div class="form-group row">
                                    @if(isset($is_update))
                                    <div class="alert alert-success" role="alert">
                                    Please update the Role and permissions
                                  </div>
                                @endif
                                    <div class="col-md-5">
                                        <label>Role Name</label>
                                        <input type="text" placeholder="Role Name"
                                            class="form-control round bg-transparent text-dark" name="name" id="name"
                                            value="{{ $edit_role->name ?? '' }}" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Permissions</label>
                                        <select class="form-control fav_clr" name="permissions[]" id="permissions" multiple>
                                            <option value="all">All</option>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->hashid }}"
                                                    @isset($is_update) @selected(in_array($permission->id, $edit_role->permissions->pluck('id')->toArray())) @endisset>
                                                    {{ $permission->name }}</option>
                                            @endforeach
                                        </select>




                                    </div>
                                    <div class="col-md-2 d-flex align-items-center">
                                        <input type="hidden" name="role_id" id="role_id" value="{{ $edit_role->hashid ?? '' }}">
                                        {{-- @include('admin.components.button', [
                                            'class' => 'btn-primary',
                                            'type' => 'submit',
                                            'name' => isset($is_edit) ? 'Update' : 'Add',
                                        ]) --}}
                                        <button type="submit" class="btn btn-primary mt-4 btn24" >{{ isset($is_update) ? 'Update' : 'Add' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-12 px-4">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 px-4">
                        <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                            <div class="card-header align-items-center  border-bottom-dark px-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Roles
                                    </h3>
                                </div>
                                <div class="icons d-flex">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12  px-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-body">
                                <div>
                                    <div class=" table-responsive" id="printableTable">
                                        <table id="myTable" class="display ">

                                            <thead class="text-body">
                                                <tr>
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Deleted</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @foreach ($roles as $role)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $role->name }}</td>
                                                        <td class="text-center">
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                @if($role->trashed())
                                                                    <span class="badge bg-danger text-white">yes</span>
                                                                @else 
                                                                    <span class="badge bg-success text-white">no</span> 
                                                                @endif
                                                            </p>
                                                        </td>
                                                        @if(is_null($role->deleted_at))
                                                        <td>
                                                            <div class="card-toolbar text-end">
                                                                <button class="btn p-0 shadow-none" type="button"
                                                                    id="dropdowneditButton01" data-bs-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="svg-icon">
                                                                        <svg width="20px" height="20px"
                                                                            viewBox="0 0 16 16"
                                                                            class="bi bi-three-dots text-body"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdowneditButton01"
                                                                    style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    @can('roles')
                                                                        <a href="{{ route('admin.roles.edit', ['id' => $role->hashid]) }}"
                                                                            class="dropdown-item click-edit" id="click-edit2"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-placement="right"
                                                                            data-original-title="Check out more demos">Edit</a>
                                                                    @endcan
                                                                    @can('roles')
                                                                        <a class="dropdown-item confirm-delete" title="Delete"
                                                                            href="{{ route('admin.roles.delete', ['id' => $role->hashid]) }}">Delete</a>
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @else 
                                                        <td></td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/validation/role_validation.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.fav_clr').select2({
            placeholder: 'Permissions',
            width: '100%',
            closeOnSelect: false,
        });
    });

    $('.fav_clr').on('select2:select', function (e) {
        var selectedOption = e.params.data.id;

        if (selectedOption === 'all') {
            // Get all options except "all"
            var allOptions = $('.fav_clr option')
                .map(function () {
                    return $(this).val() !== 'all' ? $(this).val() : null;
                })
                .get();

            // Update the select2 value
            $('.fav_clr').val(allOptions).trigger('change');
        }
    });

    $('.fav_clr').on('select2:unselect', function (e) {
        var unselectedOption = e.params.data.id;

        if (unselectedOption === 'all') {
            // Deselect all options if "all" is unselected
            $('.fav_clr').val(null).trigger('change');
        }
    });
</script>

@endsection
