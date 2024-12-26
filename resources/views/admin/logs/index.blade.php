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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Logs</h3>
                                    </div>
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
                                                    <th class="text-center">Staff</th>
                                                    <th class="text-center">Log</th>
                                                    <th class="text-center">Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @foreach($logs AS $log)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $log->staff->full_name }}</td>
                                                        <td class="text-center">{{ $log->message }}</td>
                                                        <td class="text-center">{{ getCustomDate($log->created_at) }}</td>
                                                        {{-- <td class="align-middle text-center text-sm">
                                                            <div
                                                                class="custom-control switch custom-switch-info custom-switch custom-control-inline form-check form-switch me-0">
                                                                <input type="checkbox" class="custom-control-input form-check-input status_toggle_btn"  @checked($staff->status) data-route="{{ route('admin.common.update_status', ['table_name' => 'admins', 'column_name' => 'status', 'id' => $staff->hashid, 'value' => ':value']) }}" id="customSwitchcolor3">
                                                                <label
                                                                    class="custom-control-label form-check-label me-1"
                                                                    for="customSwitchcolor3">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.staffs.resend_credentials_email', ['user_id'=>$staff->hashid]) }}">
                                                                <span class="svg-icon nav-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw">
                                                                        <polyline points="23 4 23 10 17 10"></polyline>
                                                                        <polyline points="1 20 1 14 7 14"></polyline>
                                                                        <path d="M3.51 9a9 9 0 0 1 14.36-3.36L23 10M1 14l5.63 5.64A9 9 0 0 0 20.49 15"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                @if($staff->trashed())
                                                                    <span class="badge bg-danger text-white">yes</span>
                                                                @else 
                                                                    <span class="badge bg-success text-white">no</span> 
                                                                @endif
                                                            </p>
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
                                                        </td> --}}
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
