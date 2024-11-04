@extends('admin.partials.master')
@section('content')


    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-12 px-4">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-header border-0 align-items-center">
                            <h3 class="card-label mb-0 font-weight-bold text-body">
                                {{ isset($is_update) ? 'Update' : 'Add' }} Product
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="product_form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Categories</label>
                                        <fieldset class="form-group mb-3">
                                            <select class="form-control round bg-transparent text-dark" name="category_id" id="category_id">
                                                <option value="">Select category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->hashid }}" @selected(isset($is_update) ? $edit_product->category_id == $category->id : false)>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Brand</label>
                                        <fieldset class="form-group mb-3">
                                            <select class="form-control round bg-transparent text-dark" name="brand_id" id="brand_id">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->hashid }}" @selected(isset($is_update) ? $edit_product->brand_id == $brand->id : false)>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 hide_when_variation_is_set">
                                        <label>Units</label>
                                        <fieldset class="form-group mb-3">
                                            <select class="form-control round bg-transparent text-dark" name="unit_id" id="unit_id">
                                                <option value="">Select unit</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->hashid }}" @selected(($edit_product->unit_id ?? NULL) == $unit->id)>
                                                        {{ $unit->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Product Name</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="text" placeholder="Enter product name"
                                                   class="form-control round bg-transparent text-dark"
                                                   value="{{ isset($is_update) ? $edit_product->name : old('name') }}" name="product_name">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 hide_when_variation_is_set">
                                        <label>SKU</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="text" placeholder="Enter SKU"
                                                   class="form-control round bg-transparent text-dark"
                                                   value="{{ isset($is_update) ? $edit_product->sku : old('sku') }}" name="sku">
                                        </fieldset>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6 hide_when_variation_is_set">
                                        <label>Price</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="number" placeholder="Enter price"
                                                   class="form-control round bg-transparent text-dark"
                                                   value="{{ isset($is_update) ? $edit_product->price : old('price') }}" name="price">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 hide_when_variation_is_set">
                                        <label>Stock</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="number" placeholder="Enter stock quantity"
                                                   class="form-control round bg-transparent text-dark"
                                                   value="{{ isset($is_update) ? $edit_product->stock : old('stock') }}" name="stock" id="stock">
                                        </fieldset>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6 hide_when_variation_is_set">
                                        <label>Stock Alert</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="number" placeholder="Enter stock alert"
                                                   class="form-control round bg-transparent text-dark"
                                                   value="{{ isset($is_update) ? $edit_product->stock_alert : old('stock_alert') }}" name="stock_alert" id="stock_alert">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 hide_when_variation_is_set">
                                        <label>Expiration</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="date" placeholder="Expiration date"
                                                   class="form-control round bg-transparent text-dark"
                                                   value="{{ isset($is_update) ? $edit_product->expiration : old('expiration') }}" name="expiration" id="expiration">
                                        </fieldset>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Variations</label>
                                        <fieldset class="form-group mb-3">
                                            <select class="form-control round bg-transparent text-dark" name="has_variation" id="has_variation">
                                                <option value="0" @selected(($edit_product->has_variation ?? NULL))>No</option>
                                                <option value="1" @selected(($edit_product->has_variation ?? NULL))>Yes</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Product Image</label>
                                        <fieldset class="form-group mb-3">
                                            @include('admin.components.single_image', ['id'=> 'product_thumbnail', 'preview'=>'preview', 'name'=>'product_thumbnail', 'is_update'=>true, 'image'=>@getImage($edit_product->thumbnail->filename)])
                                        </fieldset>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <fieldset class="form-group mb-3">
                                            <textarea class="form-control round bg-transparent text-dark" name="description" id="description" cols="30" rows="10">{{ isset($is_update) ? $edit_product->description : old('description') }}</textarea>
                                        </fieldset>
                                    </div>
                                </div>
                            
                                <div id="variations">
                                    @include('admin.product.edit_variation')
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="product_id" value="{{ isset($is_update) ? $edit_product->hashid : '' }}">
                                        <input type="submit" class="btn btn-primary mt-4 float-end" value="{{ isset($is_update) ? 'Update' : 'Add' }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script src="{{ asset('assets/validation/product_validation.js') }}"></script>
<script>
const productVariations = `
    <div class="variation-row p-3 mb-4 bg-light border rounded">
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="button" class="btn btn-sm btn-primary float-end add_variation">+</button>    
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sku" class="form-control-label">SKU</label>
                    <input type="text" placeholder="Enter SKU no"
                        class="form-control shadow-sm rounded"
                        name="variation_sku[]" id="variation_sku">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price" class="form-control-label">Price</label>
                    <input type="number" placeholder="Enter price"
                        class="form-control shadow-sm rounded"
                        name="variation_price[]" id="variation_price">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="stock" class="form-control-label">Stock</label>
                    <input type="number" placeholder="Enter stock no"
                        class="form-control shadow-sm rounded"
                        name="variation_stock[]" id="variation_stock">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="stock_alert" class="form-control-label">Stock Alert</label>
                    <input type="number" placeholder="Enter stock alert"
                        class="form-control shadow-sm rounded"
                        name="variation_stock_alert[]" id="variation_stock_alert">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="unit" class="form-control-label">Units</label>
                    <select class="form-control shadow-sm rounded"
                        name="variation_unit_id[]" id="variation_unit_id">
                        <option value="">Select unit</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->hashid }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>  
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="expiration" class="form-control-label">Expiration</label>
                    <input type="date" class="form-control shadow-sm rounded"
                        name="variation_expiration[]" id="variation_expiration">
                </div>
            </div>
        </div>
    </div>
`;


    $('#has_variation').change(function() {
        let val = $(this).val();
        if (val == 1) {
            $('#variations').html('');
            $('#variations').append(productVariations);
            $('.hide_when_variation_is_set').addClass('d-none');
        }else{
            $('#variations').html('');
            $('.hide_when_variation_is_set').removeClass('d-none');
        }
    });

    $(document).on('click', '.add_variation', function() {
        $('#variations').append(productVariations);
        changeLastButtonAppearance(); // Change button appearance after adding a variation
    });

    function changeLastButtonAppearance() {
        // Change the last added button's class and HTML
        $('#variations').find('.variation-row:last .add_variation')
            .removeClass('btn-primary')
            .removeClass('add_variation')
            .addClass('btn-danger')
            .addClass('remove_variation')
            .html('×');
    }

    $(document).on('click', '.remove_variation', function(){
        $(this).parents().eq(2).remove();
    });
</script>
@endsection
