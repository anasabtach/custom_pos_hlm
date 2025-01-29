@extends('admin.partials.master')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 px-4">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Suppliers</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="supplierFilter" class="form-control select_2">
                                                    <option value="">All</option>
                                                    @foreach($suppliers AS $supplier)
                                                        <option value="{{ $supplier->name }}">{{ $supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 px-4">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Purchases
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        @can('purchases')
                                        <a href="{{ route('admin.purchases.create') }}" class="btn ms-2 p-0" id="kt_notes_panel_toggle" data-bs-toggle="tooltip"
                                            title="" data-bs-placement="right"
                                            data-original-title="Check out more demos">
                                            <span
                                                class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

                                                <svg width="25px" height="25px" viewBox="0 0 16 16"
                                                    class="bi bi-plus white" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </span>
                                        </a>
                                        @endcan
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
                                        <div class=" table-responsive table_container" id="printableTable">
                                            <table id="purchase_table" class="display ">

                                                <thead class="text-body">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Batch No</th>
                                                        <th class="text-center">Supplier</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Deleted</th>
                                                        <th class="text-center">Remarks</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($purchases as $purchase)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center"><p class="text-sm font-weight-bold mb-0">{{ $purchase->batch_no }}</p></td>
                                                            <td class="text-center"><p class="text-sm font-weight-bold mb-0">{{ $purchase->supplier->name }}</p></td>
                                                            <td class="text-center"><p class="text-sm font-weight-bold mb-0">{{ getCustomDate($purchase->date) }}</p></td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    @if($purchase->trashed())
                                                                        <span class="badge bg-danger text-white">yes</span>
                                                                    @else 
                                                                        <span class="badge bg-success text-white">no</span> 
                                                                    @endif
                                                                </p>
                                                            </td>
                                                            <td class="text-center">{{ $purchase->remarks }}</td>
                                                            @if(is_null($purchase->deleted_at))
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
                                                                        <a href="{{ route('admin.purchases.details', ['purchase_id' => $purchase->hashid]) }}"
                                                                            class="dropdown-item click-edit"
                                                                            id="click-edit2" data-bs-toggle="tooltip"
                                                                            title="" data-bs-placement="right"
                                                                            data-original-title="Check out more demos">Details</a>
                                                                        @can('purchases')
                                                                        <a href="{{ route('admin.purchases.edit', ['purchase_id' => $purchase->hashid]) }}"
                                                                            class="dropdown-item click-edit"
                                                                            id="click-edit2" data-bs-toggle="tooltip"
                                                                            title="" data-bs-placement="right"
                                                                            data-original-title="Check out more demos">Edit</a>
                                                                        @endcan
                                                                        @can('purchases')
                                                                        <a class="dropdown-item confirm-delete"
                                                                            title="Delete"
                                                                            href="{{ route('admin.purchases.delete', ['purchase_id' => $purchase->hashid]) }}">Delete</a>
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
<script src="{{ asset('assets/js/purchase.js') }}"></script>
@endsection