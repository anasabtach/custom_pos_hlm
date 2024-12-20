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
                                            <label>Categories</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="categoryFilter" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Variations</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="variationFilter" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="yes">yes</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Units</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="unitFilter" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach($units as $unit)
                                                    <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                                                @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Expiration</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="expirationFilter" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach($products->pluck('expiration')->toArray() as $expiration)
                                                        @if(!is_null($expiration))
                                                            <option value="{{ getCustomDate($expiration) }}">{{ getCustomDate($expiration) }}</option>
                                                        @endif
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Products
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        @can('add-product')
                                            <a href="{{ route('admin.products.create') }}" class="btn ms-2 p-0"
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
                                        {{-- <a href="#" onclick="printDiv()" class="ms-2">
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

                                        </a> --}}

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
                                            <table id="product_table" class="display">
                                                <thead class="text-body">
                                                    <tr>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Category</th>
                                                        <th class="text-center">Unit</th>
                                                        <th class="text-center">Product Name</th>
                                                        <th class="text-center">SKU</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Stock</th>
                                                        <th class="text-center">Stock Alert</th>
                                                        <th class="text-center">Expiration</th>
                                                        <th class="text-center">Variations</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Image</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->category->name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ @$product->unit->name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">{{ $product->sku }}
                                                                </p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->price }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->stock }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->stock_alert }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ (!is_null($product->expiration) ? getCustomDate($product->expiration) : '') }}</p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                @if ($product->has_variation)
                                                                    yes
                                                                @else
                                                                    no
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                @if ($product->status)
                                                                    active
                                                                @else
                                                                    deactive
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <img src="{{ getImage(@$product->thumbnail->filename) }}"
                                                                    alt="" class="img-fluid" width="50px"
                                                                    height="50px">
                                                            </td>
                                                            <td>
                                                                <div class="card-toolbar text-end">
                                                                    <button class="btn p-0 shadow-none" type="button"
                                                                        id="dropdowneditButton01"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
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
                                                                        @can('edit-product')
                                                                            <a href="{{ route('admin.products.edit', ['product_id' => $product->hashid]) }}"
                                                                                class="dropdown-item click-edit">Edit</a>
                                                                        @endcan
                                                                        @can('delete-product')
                                                                            <a class="dropdown-item confirm-delete"
                                                                                href="{{ route('admin.products.delete', ['product_id' => $product->hashid]) }}">Delete</a>
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
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

    var table = jQuery('#product_table').DataTable();

    // Apply category filter
    jQuery('#categoryFilter').on('change', function() {
        var selectedCategory = $(this).val();
        table.column(1).search(selectedCategory).draw();
    });
    jQuery('#variationFilter').on('change', function() {
        var selectedVariation = $(this).val();
        table.column(9).search(selectedVariation).draw();
    });
    jQuery('#unitFilter').on('change', function() {
        var selectedUnit = $(this).val();
        table.column(2).search(selectedUnit).draw();
    });
    jQuery('#expirationFilter').on('change', function() {
        var selectedUnit = $(this).val();
        table.column(8).search(selectedUnit).draw();
    });
});

</script>
@endsection
