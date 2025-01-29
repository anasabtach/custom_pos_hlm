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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">LPO
                                        </h3>
                                    </div>
                                    {{-- <div class="icons d-flex">
                                        @can('add-supplier')
                                            <a href="{{ route('admin.material_lpos.create') }}" class="btn ms-2 p-0"
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

                                    </div> --}}
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
                                        <div class=" table-responsive table_container" id="printableTable">
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
                                                        <th class="text-center">Remarks</th>
                                                        <th class="text-center">Status <br/>Remarks</th>
                                                        <th class="text-center">Update <br />At</th>
                                                        <th class="text-center">Created <br/>At</th>
                                                        <th class="no-sort text-end">Status</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach($lpos AS $lpo) 
                                                    {{-- {{ dd($lpo) }} --}}
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">{{ $lpo->reference_no }}</td>
                                                            <td class="text-center">{{ @$lpo->admin->full_name }}</td>
                                                            <td class="text-center">{{ $lpo->category->name }}</td>
                                                            <td class="text-center">{{ $lpo->product->name }}</td>
                                                            <td class="text-center">{{ @$lpo->supplier->name }}</td>
                                                            <td class="text-center">{{ @$lpo->brand->name }}</td>
                                                            <td class="text-center">{{ @$lpo->unit->name }}</td>
                                                            <td class="text-center">{{ $lpo->temperature_control }}</td>
                                                            <td class="text-center">{{ $lpo->color }}</td>
                                                            <td class="text-center">{{ $lpo->quantity }}</td>
                                                            <td class="text-center">{{ $lpo->price }}</td>
                                                            <td class="text-center">{{ $lpo->sku }}</td>
                                                            <td class="text-center">{{ $lpo->payment_type }}</td>
                                                            <td class="text-center">{{ $lpo->payment_terms }}</td>
                                                            <td class="text-center">{{ $lpo->remarks }}</td>
                                                            <td class="text-center">{{ $lpo->status_remarks }}</td>
                                                            <td class="text-center">{{ (is_null($lpo->status_update_at)) ? $lpo->status_update_date : null }}</td>
                                                            <td class="text-center">{{ getCustomDate($lpo->created_at) }}</td>
                                                            <td class="text-center">
                                                                @if($lpo->status == 'pending')
                                                                    <span class="badge bg-danger text-white">Pending</span>
                                                                @else
                                                                    <span class="badge bg-success text-white">Approve</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
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
                                                                        aria-labelledby="dropdowneditButton01">
                                                                        <a href="{{ route('admin.material_requisitions.edit_lpo', ['id' => $lpo->hashid, 'status' => 'reject']) }}"
                                                                            class="dropdown-item click-edit update_status"
                                                                            id="click-edit2" 
                                                                            data-bs-toggle="tooltip"
                                                                            title="Reject this requisition"
                                                                            data-bs-placement="right"
                                                                            data-original-title="Reject">Edit</a>
                                                                    
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
    </div>
    {{-- <div class="modal fade" id="update_status_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Your Remarks</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="" method="GET" id="update_status_form">
					<div class="modal-body">
							@csrf <!-- Include this for Laravel POST forms -->
							<div class="form-group mb-3">
								<label for="remarks" class="form-label">Remarks</label>
								<textarea name="remarks" id="remarks" class="form-control" rows="4" placeholder="Enter your remarks here..."></textarea>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div> --}}
@endsection
@section('script')
    <script src="{{ asset('assets/js/supplier.js') }}"></script>
    {{-- <script>
        	
	$('.update_status').click(function(e){
		e.preventDefault();
		jQuery('#update_status_modal').modal('show');
		jQuery('#update_status_form').attr('action', $(this).attr('href'));
    })
    </script> --}}
@endsection
