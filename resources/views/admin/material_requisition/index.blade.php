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
                        <div class="col-12  px-4">
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
                        </div>
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
                                                        <th class="text-center">User</th>
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
                                                        <th class="text-center">Created <br/>At</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    {{-- @foreach ($suppliers as $supplier)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $supplier->name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $supplier->email }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $supplier->phone_no }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $supplier->city }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $supplier->address }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {!! wordwrap($supplier->note, 100, "<br>\n", true) !!}
                                                                </p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {!! $supplier->offeredProducts->pluck('name')->map(fn($name) => "<span class='badge bg-primary text-white'>$name</span>")->join(' ') !!}
                                                                </p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $supplier->trn }}</p>
                                                            </td>
                                                            

                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    @if($supplier->trashed())
                                                                        <span class="badge bg-danger text-white">yes</span>
                                                                    @else 
                                                                        <span class="badge bg-success text-white">no</span> 
                                                                    @endif
                                                                </p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ getCustomDate($supplier->created_at) }}
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
                                                                        @can('edit-supplier')
                                                                            <a href="{{ route('admin.suppliers.edit', ['supplier_id' => $supplier->hashid]) }}"
                                                                                class="dropdown-item click-edit"
                                                                                id="click-edit2" data-bs-toggle="tooltip"
                                                                                title="" data-bs-placement="right"
                                                                                data-original-title="Check out more demos">Edit</a>
                                                                        @endcan
                                                                        @can('delete-supplier')
                                                                            <a class="dropdown-item confirm-delete"
                                                                                title="Delete"
                                                                                href="{{ route('admin.suppliers.delete', ['supplier_id' => $supplier->hashid]) }}">Delete</a>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}
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
