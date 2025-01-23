@extends('admin.partials.master')
@section('style')
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/menu.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-12 px-4">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-header border-0 align-items-center">
                            <h3 class="card-label mb-0 font-weight-bold text-body">
                                {{ isset($edit_staff) ? 'Update' : 'Add' }} Material Requisition
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.material_requisitions.store') }}"
                                class="form-horizontal form-material validation" method="POST" id="material_requisition"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Categories</label>
                                        <select class="form-control round bg-transparent text-dark select_2" name="category_id"
                                            id="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories->whereNull('deleted_at') as $category)
                                                <option value="{{ $category->hashid }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Suppliers</label>
                                        <select class="form-control round bg-transparent text-dark select_2" name="supplier_id"
                                            id="supplier_id">
                                            <option value="">Select Supplier</option>
                                            @foreach ($suppliers->whereNull('deleted_at') as $supplier)
                                            <option value="{{ $supplier->hashid }}">{{ $supplier->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Products</label>
                                        <select class="form-control round bg-transparent text-dark select_2" name="product_id"
                                            id="product_id">
                                            <option value="">Select product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->hashid }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Brands</label>
                                        <select class="form-control round bg-transparent text-dark select_2" name="brand_id"
                                            id="brand_id">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands->whereNull('deleted_at') as $brand)
                                                <option value="{{ $brand->hashid }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Unit</label>
                                        <select class="form-control round bg-transparent text-dark select_2" name="unit_id"
                                            id="unit_id">
                                            <option value="">Select Unit</option>
                                            @foreach ($units->whereNull('deleted_at') as $unit)
                                                <option value="{{ $unit->hashid }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Shade/Colors</label>
                                        <select class="form-control round bg-transparent text-dark" name="is_color"
                                            id="is_color">
                                            <option value="no">no</option>
                                            <option value="yes">yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-none" id="color_row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Color</label>
                                        {{-- <select class="form-control round bg-transparent text-dark" name="color"
                                            id="color">

                                        </select> --}}
                                        
                                        <input type="text" class="form-control" name="color" id="color">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Temperature Control</label>
                                        <select class="form-control round bg-transparent text-dark"
                                            name="temperature_control" id="temperature_control">
                                            <option value="0">no</option>
                                            <option value="1">yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Order Quantity</label>
                                        <input type="number" class="form-control" name="order_quantity"
                                            id="order_quantity">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Price</label>
                                        <input type="number" class="form-control" placeholder="Enter price" ="price" id="price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">SKU</label>
                                        <input type="text" class="form-control" placeholder="Enter SKU" name="sku" id="sku">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Payment Type</label>
                                        <select class="form-control round bg-transparent text-dark" name="payment_type"
                                            id="payment_type">
                                            <option value="">Select Payment Type</option>
                                            <option value="pdc">pdc</option>
                                            <option value="online">online</option>
                                            <option value="transfer">transfer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Payment Terms</label>
                                        <textarea name="payment_terms" id="payment_terms" class="form-control" placeholder="Enter payment terms" cols="30" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Remarks</label>
                                        <textarea name="remarks" id="remarks" class="form-control" placeholder="Enter remarks" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                        </div>


                        <div class="row mt-5">
                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <input type="hidden" name="material_requisition_id" value="{{ @$edit_staff->hashid }}">
                                {{-- <input type="submit" class="btn btn-primary mt-4 float-end"
                                    value="{{ isset($edit_staff) ? 'Update' : 'Add' }}"> --}}
                                    <button type="submit" class="btn btn-primary mt-4 mb-1 btn24" >{{ isset($is_update) ? 'Update' : 'Add' }}</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End of col-lg-12 col-xl-12 -->
        </div> <!-- End of row -->
    </div> <!-- End of container-fluid -->
    </div> <!-- End of d-flex flex-column-fluid -->
@endsection

@section('script')
    <script>
        $('#is_color').change(function(){
            let selectedValue = $(this).val();
            if(selectedValue == 'yes'){
                $('#color_row').removeClass('d-none');
            }else{
                $('#color_row').addClass('d-none');

            }
        });
    </script>
    <script src="{{ asset('assets/validation/material_requisition.js') }}"></script>
@endsection
