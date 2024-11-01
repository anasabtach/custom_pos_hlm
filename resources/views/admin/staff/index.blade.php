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
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 px-4">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Staff Management</h3>
                                    </div>
                                    @can('add-staff')
                                    <div class="icons d-flex">
                                        <a href="{{ route('admin.staffs.add') }}" class="btn ms-2 p-0" id="kt_notes_panel_toggle" data-bs-toggle="tooltip" title="Add Staff">
                                            <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle shadow-sm">
                                                <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 px-4">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-bordered display">
                                            <thead class="text-body">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Full Name</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center no-sort">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @foreach($staffs AS $staff)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $staff->full_name }}</td>
                                                        <td class="text-center">{{ $staff->email }}</td>
                                                        <td class="text-center">{{ $staff->user_type }}</td>
                                                        <td class="text-center">
                                                            <label class="toggle-switch">
                                                                <input type="checkbox" @checked($staff->status) onChange="updateUserStatus(this)" data-id={{ $staff->hashid }} data-status={{ $staff->status }}>
                                                                <div class="toggle-switch-background">
                                                                    <div class="toggle-switch-handle"></div>
                                                                </div>
                                                            </label>
                                                        </td>
                               
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
                                                                    @can('edit-staff')

                                                                    <a href="{{ route('admin.staffs.edit', ['id' => $staff->hashid]) }}"
                                                                        class="dropdown-item click-edit"
                                                                        id="click-edit2" data-bs-toggle="tooltip"
                                                                        title="" data-bs-placement="right"
                                                                        data-original-title="Check out more demos">Edit</a>
                                                                    @endcan
                                                                    @can('delete-staff')
                                                                    <a class="dropdown-item confirm-delete"
                                                                        title="Delete"
                                                                        href="{{ route('admin.staffs.delete', ['id' => $staff->hashid]) }}">Delete</a>
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        </td>
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
<script>
    let update_status_route = "{{ route('admin.staffs.update_status', ['id' => ':id', 'status' => ':status']) }}";
</script>
@endsection
