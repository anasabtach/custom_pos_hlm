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
                                            <label>Customers</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="customerFilter" class="form-control select_2">
                                                    <option value="">All</option>
                                                    @foreach($customers AS $customer)
                                                        <option value="{{ $customer->name }}">{{ $customer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
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
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 px-4">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Sales
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
                                            <table id="sale_table" class="display ">

                                                <thead class="text-body">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Invoiecs ID</th>
                                                        <th class="text-center">Cusomter</th>
                                                        <th class="text-center">Received Amount</th>
                                                        <th class="no-sort text-end text-center">Return Amount</th>
                                                        <th class="no-sort text-end text-center">Discount</th>
                                                        <th class="no-sort text-end text-center">Total</th>
                                                        <th class="no-sort text-end text-center">Created At</th>
                                                        <th class="no-sort text-end text-center">Remarks</th>
                                                        <th class="no-sort text-end text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($sales as $sale)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $sale->sale_id }}</td>
                                                        <td class="text-center">{{ $sale->customer->name }}</td>
                                                        <td class="text-center">{{ number_format($sale->received_amount) }}</td>
                                                        <td class="text-center">{{ number_format($sale->return_amount) }}</td>
                                                        <td class="text-center">{{ number_format($sale->discount) }}</td>
                                                        <td class="text-center">{{ number_format($sale->total) }}</td>
                                                        <td class="text-center">{{ getCustomDate($sale->created_at) }}</td>
                                                        <td class="text-center">{{ $sale->remarks }}</td>
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
                                                                    <a href="{{ route('admin.sales.details', ['id' => $sale->hashid]) }}"
                                                                        class="dropdown-item click-edit"
                                                                        id="click-edit2" data-bs-toggle="tooltip"
                                                                        title="" data-bs-placement="right"
                                                                        data-original-title="Check out more demos">Details</a>
                                                                    {{-- <a href="{{ route('admin.purchases.edit', ['purchase_id' => $purchase->hashid]) }}"
                                                                        class="dropdown-item click-edit"
                                                                        id="click-edit2" data-bs-toggle="tooltip"
                                                                        title="" data-bs-placement="right"
                                                                        data-original-title="Check out more demos">Edit</a>
                                                                    <a class="dropdown-item confirm-delete"
                                                                        title="Delete"
                                                                        href="{{ route('admin.purchases.delete', ['purchase_id' => $purchase->hashid]) }}">Delete</a> --}}
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
@endsection
@section('script')
<script>
    $(document).ready(function() {

    var table = jQuery('#sale_table').DataTable({
        dom: 'Bfrtip',  // This controls the placement of the buttons
        buttons: [
            'copy',        // Copy to clipboard
            'csv',         // Export to CSV
            'excel',       // Export to Excel
            'pdf',         // Export to PDF
            'print'        // Print the table
        ]
    });
    jQuery('#customerFilter').on('change', function() {
        var selectedCustomer = $(this).val();
        table.column(2).search(selectedCustomer).draw();
    });

    // var table = jQuery('#sale_table').DataTable();

    jQuery.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var columnData = data[7]; // Adjust to your date column index

        if (!fromDate && !toDate) {
            return true; // Show all rows if no date filters are set
        }

        var rowDate = new Date(columnData);
        if (fromDate && rowDate < new Date(fromDate)) {
            return false;
        }
        if (toDate && rowDate > new Date(toDate)) {
            return false;
        }

        return true;
    });

    $('#from_date, #to_date').on('change', function() {
        table.draw(); // Redraw the table with the applied filters
    });
});

</script>
@endsection
