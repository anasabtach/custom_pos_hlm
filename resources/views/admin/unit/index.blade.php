@extends('admin.partials.master')
@section('content')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            @can('units')
                <div class="row">
                    <div class="col-lg-12 col-xl-12 px-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header border-0 align-items-center">
                                <h3 class="card-label mb-0 font-weight-bold text-body">
                                    Unit
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.units.store') }}" method="POST" id="unit_form">
                                    @csrf
                                    <div class="form-group row">
                                        @if(isset($is_update))
                                        <div class="alert alert-success" role="alert">
                                        Please update the unit name
                                      </div>
                                    @endif
                                        <div class="col-md-6">
                                            <label> {{ isset($is_update) ? 'Update' : 'Add' }}  Unit Name</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="text" placeholder="Enter unit name"
                                                    class="form-control round bg-transparent text-dark"
                                                    value="{{ isset($is_update) ? $edit_unit->name : old('unit_name') }}"
                                                    name="unit_name" id="unit_name">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Short Hand</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="text" placeholder="Enter short hand"
                                                    class="form-control round bg-transparent text-dark"
                                                    value="{{ isset($is_update) ? $edit_unit->short_hand : old('short_hand') }}"
                                                    name="short_hand" id="short_hand">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="unit_id" id="unit_id"
                                            value="{{ isset($is_update) ? $edit_unit->hashid : '' }}">
                                            <button type="submit" class="btn btn-primary mt-4 btn24" >{{ isset($is_update) ? 'Update' : 'Add' }}</button>
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
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Unit Name</th>
                                                        <th class="text-center">Short Hand</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Deleted</th>
                                                        <th class="text-center">Remarks</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($units as $unit)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $unit->name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $unit->short_hand }}</p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <div
                                                                    class="custom-control switch custom-switch-info custom-switch custom-control-inline form-check form-switch me-0">
                                                                    <input type="checkbox" class="custom-control-input form-check-input status_toggle_btn"  @checked($unit->status) data-route="{{ route('admin.common.update_status', ['table_name' => 'units', 'column_name' => 'status', 'id' => $unit->hashid, 'value' => ':value']) }}" id="customSwitchcolor3">
                                                                    <label
                                                                        class="custom-control-label form-check-label me-1"
                                                                        for="customSwitchcolor3">
                                                                    </label>
                                                                </div>
                                                            </td>


                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    @if($unit->trashed())
                                                                        <span class="badge bg-danger text-white">yes</span>
                                                                    @else 
                                                                        <span class="badge bg-success text-white">no</span> 
                                                                    @endif
                                                                </p>
                                                            </td>
                                                            <td class="text-center">{{ $unit->remarks }}</td>
                                                            @if(is_null($unit->deleted_at))
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
                                                                        @can('units')
                                                                            <a href="{{ route('admin.units.edit', ['unit_id' => $unit->hashid]) }}"
                                                                                class="dropdown-item click-edit"
                                                                                id="click-edit2" data-bs-toggle="tooltip"
                                                                                title="" data-bs-placement="right"
                                                                                data-original-title="Check out more demos">Edit</a>
                                                                        @endcan
                                                                        @can('units')
                                                                            <a class="dropdown-item confirm-delete"
                                                                                title="Delete"
                                                                                href="{{ route('admin.units.delete', ['unit_id' => $unit->hashid]) }}">Delete</a>
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
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/validation/unit_validation.js') }}"></script>
@endsection
