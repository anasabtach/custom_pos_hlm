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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Sale Detail (#{{ $sale_detail->sale_id}})
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
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
                                        <a href="#" onclick="printDiv()" class="ms-2">
                                            <span
                                                class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16"
                                                    class="bi bi-printer-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                </svg>
                                            </span>

                                        </a>
                                        <a href="#" class="ms-2">
                                            <span
                                                class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16"
                                                    class="bi bi-file-earmark-text-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                            </span>

                                        </a>

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
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Product</th>
                                                        <th class="no-sort text-end">Price</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Discount</th>
                                                        <th class="no-sort text-end">Total</th>
                                                        {{-- <th class="no-sort text-end">Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
            
                                                @foreach ($sale_detail->saleItems as $detail)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $detail->product->name }}  {{ (!is_null($detail->product_variation_id)) ? "| {$detail->productVariation->unit->name}" : '' }}</td>
                                                        <td class="text-center">{{ number_format($detail->price, 2) }}</td>
                                                        <td class="text-center">{{ number_format($detail->quantity, 2) }}</td>
                                                        <td class="text-center">{{ number_format($detail->discount, 2) }}</td>
                                                        <td class="text-center">{{ number_format($detail->total, 2) }}</td>

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

@endsection