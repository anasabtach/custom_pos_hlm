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
                                            <table id="product_table" class="display">
                                                <thead class="text-body">
                                                    <tr>
                                                        <th class="text-center">ID</th>
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
                                                        <th class="text-center">Color</th>
                                                        {{-- <th class="text-center">Color</th> --}}
                                                        <th class="text-center">Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
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

                                                            <td>
                                                                {{ $product->color }}
                                                            </td>
                                                            <td class="text-center">
                                                                <img src="{{ getImage(@$product->thumbnail->filename) }}"
                                                                    alt="" class="img-fluid" width="50px"
                                                                    height="50px">
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
