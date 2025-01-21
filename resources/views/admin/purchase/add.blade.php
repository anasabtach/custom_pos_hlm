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
                            {{ isset($is_update) ? 'Update' : 'Add' }} Purchase
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.purchases.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="row">
                                            <!-- Date Input -->
                                            <div class="col-md-6">
                                                <label for="date" class="form-control-label">Date</label>
                                                <fieldset class="form-group mb-3">
                                                    <input type="date" class="form-control round bg-transparent text-dark"
                                                           name="date" value="{{ isset($is_update) ? $edit_purchase->date : '' }}">
                                                </fieldset>
                                            </div>

                                            <!-- Supplier Selection -->
                                            <div class="col-md-6">
                                                <label for="supplier_id" class="form-control-label">Suppliers</label>
                                                <fieldset class="form-group mb-3">
                                                    <select class="form-control round bg-transparent text-dark select_2"
                                                            name="supplier_id" id="supplier_id">
                                                        <option value="">Select supplier</option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->hashid }}"
                                                                    @selected(($edit_purchase->supplier_id ?? null) == $supplier->id)>
                                                                {{ $supplier->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Batch No Input -->
                                            <div class="col-md-6">
                                                <label for="batch_no" class="form-control-label">Batch No</label>
                                                <fieldset class="form-group mb-3">
                                                    <input type="text" class="form-control round bg-transparent text-dark"
                                                           placeholder="Enter Batch no" name="batch_no"
                                                           value="{{ isset($is_update) ? $edit_purchase->batch_no : '' }}">
                                                </fieldset>
                                            </div>

                                            <!-- Product Search -->
                                            <div class="col-md-6">
                                                <label for="product_search" class="form-control-label">Products</label>
                                                <fieldset class="form-group mb-3">
                                                    <select class="form-control round bg-transparent text-dark"
                                                            name="product_search" id="product_search">
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <!-- Product Table Section -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-custom gutter-b bg-white border-0">
                                                    <div class="card-body">
                                                        <div>
                                                            <table class="table align-items-center justify-content-center mb-0 text-center" id="product_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Category</th>
                                                                        <th class="text-center">Product Name</th>
                                                                        <th class="text-center">Cost</th>
                                                                        <th class="text-center">Price</th>
                                                                        <th class="text-center">Stock</th>
                                                                        <th class="text-center">Qty</th>
                                                                        <th class="text-center">Expiration</th>
                                                                        <th class="text-center">Subtotal</th>
                                                                        <th class="no-sort text-end">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (isset($is_update))
                                                                        @include('admin.purchase.edit_item_component')
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="purchase_id" value="{{ isset($is_update) ? $edit_purchase->hashid : '' }}">
                                                <input type="submit" class="btn btn-primary mt-4 float-end"
                                                       value="{{ isset($is_update) ? 'Update' : 'Add' }}">
                                            </div>
                                        </div>
                                    </div>
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
        $(document).ready(function() {
            // Select2 for product search with AJAX
            $('#product_search').select2({
                ajax: {
                    url: "{{ route('admin.products.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        }; // Search term
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

        // On product select, dynamically append the product row
        $('#product_search').on('select2:select', function(e) {
            let product_id = e.params.data.id;
            let product_variation_id = '';

            if (product_id.includes('/')) {
                let split_ids = product_id.split('/');
                product_id = split_ids[0].trim();
                product_variation_id = split_ids[1].trim();
            }

            let isAlreadyExists = false;

            $('tr').each(function() {
                if ($(this).attr('id') == product_id || $(this).attr('id') == product_variation_id) {
                    isAlreadyExists = true;
                    return false;
                }
            });

            if (!isAlreadyExists) {
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

        // Remove product row
        $(document).on('click', '.delete_product_row', function() {
            $(this).parent().parent().remove();
        });

        // Update subtotal when quantity changes
        $(document).on('keyup', '.qty', function() {
            var $row = $(this).closest('tr');
            var price = parseFloat($row.find('.cost').val()) || 0;
            var quantity = parseFloat($(this).val()) || 0;
            var subtotal = price * quantity;
            $row.find('.subtotal').text(subtotal.toFixed(2));
        });
    </script>
@endsection
