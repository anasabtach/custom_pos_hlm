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
                                            <label>Brands</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="brandFilter" class="form-control select_2">
                                                    <option value="">All</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Categories</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="categoryFilter" class="form-control select_2">
                                                    <option value="">All</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Suppliers</label>
                                            <fieldset class="form-group mb-3">
                                                <select name="" id="supplierFilter" class="form-control select_2">
                                                    <option value="">All</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
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
                                                <select name="" id="unitFilter" class="form-control select_2">
                                                    <option value="">All</option>
                                                    @foreach ($units as $unit)
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
                                                    @foreach ($products->pluck('expiration')->toArray() as $expiration)
                                                        @if (!is_null($expiration))
                                                            <option value="{{ getCustomDate($expiration) }}">
                                                                {{ getCustomDate($expiration) }}</option>
                                                        @endif
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Products
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                    @can('products')
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
                                                        <th class="text-center">Supplier</th>
                                                        <th class="text-center">Brand</th>
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
                                                        <th class="text-center">Color</th>
                                                        <th class="text-center">Image</th>
                                                        <th class="text-center">Created <br/>At</th>
                                                        <th class="text-center">Draft</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->supplier->name }}</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ @$product->brand->name }}</p>
                                                            </td>
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
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $product->sku }}
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
                                                                    {{ !is_null($product->expiration) ? getCustomDate($product->expiration) : '' }}
                                                                </p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                @if ($product->has_variation)
                                                                    yes
                                                                @else
                                                                    no
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <div
                                                                    class="custom-control switch custom-switch-info custom-switch custom-control-inline form-check form-switch me-0">
                                                                    <input type="checkbox" class="custom-control-input form-check-input status_toggle_btn"  @checked($product->status) data-route="{{ route('admin.common.update_status', ['table_name' => 'products', 'column_name' => 'status', 'id' => $product->hashid, 'value' => ':value']) }}" id="customSwitchcolor3">
                                                                    <label
                                                                        class="custom-control-label form-check-label me-1"
                                                                        for="customSwitchcolor3">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $product->color }}
                                                            </td>
                                                            <td class="text-center">
                                                                <img src="{{ getImage(@$product->thumbnail->filename) }}"
                                                                    alt="" class="img-fluid" width="50px"
                                                                    height="50px">
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                {{ getCustomDate($product->created_at) }}
                                                            </td>
                                                            <td>
                                                                @if($product->is_draft == '1')
                                                                    <span class="badge bg-danger text-white">yes</span>
                                                                @else 
                                                                    <span class="badge bg-success text-white">no</span>
                                                                @endif
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
                                                                        @can('products')
                                                                            <a href="{{ route('admin.products.edit', ['product_id' => $product->hashid]) }}"
                                                                                class="dropdown-item click-edit">Edit</a>
                                                                        @endcan
                                                                        @can('products')
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
    <script src="{{ asset('assets/js/product.js') }}"></script>
@endsection
