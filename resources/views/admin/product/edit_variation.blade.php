@if (isset($is_update))
    @if (isset($edit_product->has_variation))
        @foreach ($edit_product->variations as $variation)
            <div class="variation-row">
                <div class="row">
                    <div class="col-md-12">
                        @if($loop->first)
                            <button type="button" class="btn float-end btn-primary add_variation">+</button>
                        @else
                            <button type="button" class="btn float-end btn-danger remove_variation">x</button>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sku" class="form-control-label">Variation Name</label>
                            <input type="text" placeholder="Enter variation name" class="form-control shadow-sm rounded"
                                name="name[]" id="name"  value="{{ $variation->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sku" class="form-control-label">SKU</label>
                            <input type="text" placeholder="Enter sku no" class="form-control form-control-line"
                                name="variation_sku[]" value="{{ $variation->sku }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input type="number" placeholder="Enter price" class="form-control form-control-line"
                                name="variation_price[]"  value="{{ $variation->price }}" min="1">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock" class="form-control-label">Stock</label>
                            <input type="number" placeholder="Enter stock no" class="form-control form-control-line"
                                name="variation_stock[]"  value="{{ $variation->stock }}" min="0">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock_alert" class="form-control-label">Stock Alert</label>
                            <input type="number" placeholder="Enter stock alert" class="form-control form-control-line"
                                name="variation_stock_alert[]"  value="{{ $variation->stock_alert }}" min="0">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Units</label>
                            <select class="form-control" name="variation_unit_id[]" id="unit_id">
                                <option value="">Select unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->hashid }}" @selected(($variation->unit_id ?? null) == $unit->id)>{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="expiration" class="form-control-label">Expiration</label>
                            <input type="date" placeholder="Expiration date" class="form-control form-control-line"
                                name="variation_expiration[]"  value="{{ $variation->expiration }}">
                        </div>
                    </div>
                    <!-- Color Picker Input -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color" class="form-control-label">Color</label>
                            <input type="text" class="form-control shadow-sm rounded" name="variation_color[]" id="variation_color" value="{{ $variation->color }}">
                        </div>
                    </div>

                    <!-- Image Upload with Preview -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input type="file" class="form-control shadow-sm rounded variation_image" name="variation_image[]" id="variation_image" accept="image/*" onchange="previewVariationImage(event)">
                            <img src="{{ @getImage($variation->thumbnail) }}" height="100" width="100" alt="Image Preview" class="img-thumbnail mt-2" id="image_preview" @if(!isset($is_update)) style="display: none; max-width: 100px;" @endif>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="product_variation_id[]" value="{{ $variation->hashid }}">
        @endforeach
    @endif
@endif
