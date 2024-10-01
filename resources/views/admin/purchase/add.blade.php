@extends('admin.partials.master')
@section('content')
    <div class="container-fluid py-4">
        <form action="{{ route('admin.purchases.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>{{ isset($is_update) ? 'Update' : 'Add' }} Customer</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Date</label>
                                        <input type="date" placeholder="Enter product no"
                                            class="form-control form-control-line" name="date"
                                            value="{{ isset($is_update) ? $edit_purchase->date : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Suppliers</label>
                                        <select class="form-control" name="supplier_id" id="supplier_id">
                                            <option value="">Select supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->hashid }}" @selected(($edit_purchase->supplier_id ?? null) == $supplier->id)>
                                                    {{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="example-text-input" class="form-control-label">Suppliers</label>
                                    <select class="form-control" name="product_search" id="product_search">
                                    </select>
                                </div>
                            </div>

        </form>
    </div>
    <div class="table-responsive p-3">
        <table class="table align-items-center justify-content-center mb-0 text-center" id="">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product
                        Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Cost</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Stock</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Qty</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Expiration</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Subtotal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($is_update))
                    @include('admin.purchase.edit_item_component')
                @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" name="purchase_id" value="{{ isset($is_update) ? $edit_purchase->hashid : '' }}">
            <input type="submit" class="btn btn-primary mt-4 float-end" value="{{ isset($is_update) ? 'Update' : 'Add' }}">
        </div>
    </div>
    </div>
    </div>

    </div>

    </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#product_search').select2({
                ajax: {
                    url: "{{ route('admin.products.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term, // search term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
        $('#product_search').on('select2:select', function(e) {
            let product_id = e.params.data.id;
            let product_variation_id = '';

            if (product_id.includes('/')) {
                let split_ids = product_id.split('/');
                product_id = split_ids[0].trim(); // product id
                product_variation_id = split_ids[1].trim(); // product variation id (could be empty)
            }

            let isAlreadyExists = false;

            $('tr').each(function() {
                // Check if the row with that product id or variation id already exists
                if ($(this).attr('id') == product_id || $(this).attr('id') == product_variation_id) {
                    isAlreadyExists = true; // Set flag if exists
                    return false; // Exit the loop
                }
            });

            if (!isAlreadyExists) { // If product or variation doesn't already exist, make the Ajax call
                $.ajax({
                    url: "{{ route('admin.products.product_and_variation_row') }}",
                    method: "GET",
                    data: {
                        product_id,
                        product_variation_id
                    },
                    success: function(res) {
                        $('tbody').append(res.html);
                    }
                });
            }
        });


        $(document).on('click', '.delete_product_row', function() { //remove the row
            $(this).parent().parent().remove();
        })

        $(document).on('keyup', '.qty', function() {
            var $row = $(this).closest('tr');
            var price = parseFloat($row.find('.cost').val()); // Use .val() for input
            var quantity = parseFloat($(this).val()) || 0; // Default to 0 if empty
            var subtotal = price * quantity;
            $row.find('.subtotal').text(subtotal.toFixed(2)); // Format to 2 decimal places
        });
    </script>
@endsection
