@extends('admin.partials.master')
@section('content')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 px-4">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Material Requisition
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        @can('add-supplier')
                                            <a href="{{ route('admin.material_requisitions.create') }}" class="btn ms-2 p-0"
                                                id="kt_notes_panel_toggle" data-bs-toggle="tooltip" title=""
                                                data-bs-placement="right" data-original-title="Check out more demos">
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
                    <div class="row"></div>
                    <div class="row">
                        {{-- <div class="col-12  px-4">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>From Date</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="date" class="form-control" id="from_date">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>To Date</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="date" class="form-control" id="to_date">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    <div class="row">
                        <div class="col-12  px-4">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div>
                                        <div class=" table-responsive" id="printableTable">
                                            <table id="supplier_datatable" class="display ">

                                                <thead class="text-body">
                                                    <tr>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Reference No</th>
                                                        {{-- <th class="text-center">User</th> --}}
                                                        <th class="text-center">Category</th>
                                                        <th class="text-center">Product</th>
                                                        <th class="text-center">Supplier</th>
                                                        <th class="text-center">Brand</th>
                                                        <th class="text-center">Unit</th>
                                                        <th class="text-center">Temperatur <br/>Control</th>
                                                        <th class="text-center">Color</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">SKU</th>
                                                        <th class="text-center">Payment <br />Type</th>
                                                        <th class="text-center">Payment <br/> Terms</th>
                                                        <th class="text-center">Remarks</th>
                                                        <th class="text-center">Admin <br /> Remarks</th>
                                                        <th class="text-center">Created <br/>At</th>
                                                        <th class="no-sort text-end">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach($material_requistions AS $requisition) 
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">{{ $requisition->reference_no }}</td>
                                                            <td class="text-center">{{ $requisition->category->name }}</td>
                                                            <td class="text-center">{{ $requisition->product->name }}</td>
                                                            <td class="text-center">{{ @$requisition->supplier->name }}</td>
                                                            <td class="text-center">{{ @$requisition->brand->name }}</td>
                                                            <td class="text-center">{{ @$requisition->unit->name }}</td>
                                                            <td class="text-center">{{ $requisition->temperature_control }}</td>
                                                            <td class="text-center">{{ $requisition->color }}</td>
                                                            <td class="text-center">{{ $requisition->quantity }}</td>
                                                            <td class="text-center">{{ $requisition->price }}</td>
                                                            <td class="text-center">{{ $requisition->sku }}</td>
                                                            <td class="text-center">{{ $requisition->payment_type }}</td>
                                                            <td class="text-center">{{ $requisition->payment_terms }}</td>
                                                            <td class="text-center">{{ $requisition->remarks }}</td>
                                                            <td class="text-center">{{ $requisition->status_remarks }}</td>
                                                            <td class="text-center">{{ getCustomDate($requisition->created_at) }}</td>
                                                            <td class="text-center">
                                                                @if($requisition->status == 'pending')
                                                                    <span class="badge bg-danger text-white">Pending</span>
                                                                @else
                                                                    <span class="badge bg-success text-white">Approve</span>
                                                                @endif
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
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/supplier.js') }}"></script>
@endsection
