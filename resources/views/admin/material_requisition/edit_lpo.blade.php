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
                            <form action="{{ route('admin.material_requisitions.update_lpo') }}"
                                class="form-horizontal form-material validation" method="POST" id="material_requisition"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Categories</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->category->name }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Suppliers</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->supplier->name }}"
                                            readonly>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Products</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->product->name }}"
                                            readonly>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Brands</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->brand->name }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Unit</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->unit->name }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Unit</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->color }}" readonly>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Shade/Colors</label>
                                        <select class="form-control round bg-transparent text-dark" name="is_color"
                                            id="is_color">
                                            <option value="no" @@selected(true)>no</option>
                                            <option value="yes">yes</option>
                                        </select>
                                    </div> --}}
                                </div>
                                {{-- <div class="row d-none" id="color_row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Color</label>
                                        
                                        
                                        <input type="text" class="form-control" name="color" id="color">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Temperature Control</label>
                                        <input class="form-control" type="text"
                                            value="{{ $edit_lpo->temperature_control == '1' ? 'yes' : 'no' }}" readonly>
                                        {{-- <select class="form-control round bg-transparent text-dark"
                                            name="temperature_control" id="temperature_control">
                                            <option value="0">no</option>
                                            <option value="1">yes</option>
                                        </select> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Order Quantity</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->quantity }}"
                                            readonly>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Price</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->price }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">SKU</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->sku }}" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Payment Type</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->payment_type }}"
                                            readonly>
                                        {{-- <select class="form-control round bg-transparent text-dark" name="payment_type"
                                            id="payment_type">
                                            <option value="">Select Payment Type</option>
                                            <option value="pdc" @s>pdc</option>
                                            <option value="online">online</option>
                                            <option value="transfer">transfer</option>
                                        </select> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Payment Terms</label>
                                        <textarea id="payment_terms" class="form-control" cols="30" rows="3" readonly>{{ $edit_lpo->payment_terms }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Remarks</label>
                                        <textarea id="payment_terms" class="form-control" cols="30" rows="3" readonly>{{ $edit_lpo->remarks }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Delivered Quantity</label>
                                        <input class="form-control" type="number"
                                            value="{{ $edit_lpo->delivered_quantity }}" name="delivered_quantity">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Cost Price</label>
                                        <input class="form-control" type="nujmber" value="{{ $edit_lpo->cost_price }}"
                                            name="cost_price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Batch No</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->batch_no }}"
                                            name="batch_no">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Free of charge +
                                            Quantity</label>
                                        <input class="form-control" type="nujmber" value="{{ $edit_lpo->foc }}"
                                            name="foc">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Invoice No</label>
                                        <input class="form-control" type="text" value="{{ $edit_lpo->invoice_no }}"
                                            name="invoice_no">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_type" class="form-control-label">Invoice Date</label>
                                        <input class="form-control" type="date" value="{{ $edit_lpo->invoice_date }}"
                                            name="invoice_date">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Product Images </label>
                                            <input type="file" id="imageUpload" multiple accept="image/*"
                                                class="form-control" name="product_image[]"
                                                onchange=" createImagePreviews('imageUpload','previewContainer');">
                                        </div>
                                        @foreach($edit_lpo->productImages->where('type', '!=', 'document') AS $document)
                                            <span>
                                                <img src="{{ getImage($document->filename) }}" alt="" width="100px" width="100px" class="icon-text1" >
                                            <i class="fa fa-times cross-icon delete_product_image" data-document-id="{{ $document->hashid }}" style=""></i>
                                            </span>
                                        @endforeach
                                        <div id="previewContainer" class="preview-container"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="example-text-input" class="form-control-label">Invoice/Supporting Documents </label>
                                        @include('admin.components.single_image', [
                                            'id'=> 'invoice_document', 
                                            'preview'=>'preview', 
                                            'name'=>'invoice_document', 
                                            'is_update'=>true, 
                                            'image'=>getImage(@$edit_lpo->invoiceImage->filename)
                                        ])
                                    </div>
                                </div>
                        </div>


                        <div class="row mt-5">
                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <input type="hidden" name="lpo_id" value="{{ $edit_lpo->hashid }}">
                                <input type="submit" class="btn btn-primary mt-4 float-end" value="Update">
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
        $('#is_color').change(function() {
            let selectedValue = $(this).val();
            if (selectedValue == 'yes') {
                $('#color_row').removeClass('d-none');
            } else {
                $('#color_row').addClass('d-none');

            }
        });
        $('.delete_product_image').click(function(){
        let document_id = $(this).data('document-id');
        $(this).parent().remove();
        $.ajax({
            url: "{{ route('admin.material_requisitions.deelte_lpo_product_image', ['id' => ':id']) }}".replace(':id', document_id),            
            method: "GET",
            success: function(res) {
                toastr.success('Image deleted succesfuly', 'Success', {
                    positionClass: 'toast-top-right',
                    timeOut: 3500
                });
            },
            error: function(err) {
                toastr.error('Some error occured', 'Success', {
                    positionClass: 'toast-top-right',
                    timeOut: 3500
                });            }
        });

    });
    </script>
    <script src="{{ asset('assets/validation/material_requisition.js') }}"></script>
@endsection
