@extends('admin.partials.master')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ isset($is_update) ? 'Update' : 'Add' }} Customer</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Categories</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->hashid }}" @selected(isset($is_update) ? $edit_product->category_id == $category->id : false)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Units</label>
                                        <select class="form-control" name="unit_id" id="unit_id">
                                            <option value="">Select unit</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->hashid }}" @selected(($edit_product->unit_id ?? NULL) == $unit->id)>
                                                    {{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Product Name</label>
                                        <input type="text" placeholder="Enter product no"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_product->name : old('name') }}"
                                            name="product_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">SKU</label>
                                        <input type="text" placeholder="Enter sku no"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_product->sku : old('sku') }}"
                                            name="sku">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Price</label>
                                        <input type="number" placeholder="Enter price"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_product->price : old('price') }}"
                                            name="price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Stock</label>
                                        <input type="number" placeholder="Enter stock no"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_product->stock : old('stock') }}"
                                            name="stock">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Stock Alert</label>
                                        <input type="number" placeholder="Enter stock alert"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_product->stock_alert : old('stock_alert') }}"
                                            name="stock_alert">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Expiration</label>
                                        <input type="date" placeholder="Expiration date"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_product->expiration : old('expiration') }}"
                                            name="expiration">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Variations</label>
                                        <select class="form-control" name="has_variation" id="has_variation">
                                            <option value="0" @selected(($edit_product->has_variation ?? NULL))>no</option>
                                            <option value="1" @selected(($edit_product->has_variation ?? NULL))>yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                        {{ isset($is_update) ? $edit_product->description : old('description') }}
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="variations">
                                @include('admin.product.edit_variation')
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="product_id"
                                    value="{{ isset($is_update) ? $edit_product->hashid : '' }}">
                                <input type="submit" class="btn btn-primary mt-4 float-end"
                                    value="{{ isset($is_update) ? 'Update' : 'Add' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    const productVariations = `
        <div class="variation-row">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn float-end btn-primary add_variation">+</button>    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sku" class="form-control-label">SKU</label>
                        <input type="text" placeholder="Enter sku no"
                            class="form-control form-control-line"
                            name="variation_sku[]">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="form-control-label">Price</label>
                        <input type="number" placeholder="Enter price"
                            class="form-control form-control-line"
                            name="variation_price[]">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stock" class="form-control-label">Stock</label>
                        <input type="number" placeholder="Enter stock no"
                            class="form-control form-control-line"
                            name="variation_stock[]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stock_alert" class="form-control-label">Stock Alert</label>
                        <input type="number" placeholder="Enter stock alert"
                            class="form-control form-control-line"
                            name="variation_stock_alert[]">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Units</label>
                        <select class="form-control" name="variation_unit_id[]" id="unit_id">
                            <option value="">Select unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->hashid }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="expiration" class="form-control-label">Expiration</label>
                        <input type="date" placeholder="Expiration date"
                            class="form-control form-control-line"
                            name="variation_expiration[]">
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
        }else{
            $('#variations').html('');
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
