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
                            <label for="sku" class="form-control-label">SKU</label>
                            <input type="text" placeholder="Enter sku no" class="form-control form-control-line"
                                name="variation_sku[]" value="{{ $variation->sku }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input type="number" placeholder="Enter price" class="form-control form-control-line"
                                name="variation_price[]"  value="{{ $variation->price }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock" class="form-control-label">Stock</label>
                            <input type="number" placeholder="Enter stock no" class="form-control form-control-line"
                                name="variation_stock[]"  value="{{ $variation->stock }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock_alert" class="form-control-label">Stock Alert</label>
                            <input type="number" placeholder="Enter stock alert" class="form-control form-control-line"
                                name="variation_stock_alert[]"  value="{{ $variation->stock_alert }}">
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="expiration" class="form-control-label">Expiration</label>
                            <input type="date" placeholder="Expiration date" class="form-control form-control-line"
                                name="variation_expiration[]"  value="{{ $variation->expiration }}">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endif
