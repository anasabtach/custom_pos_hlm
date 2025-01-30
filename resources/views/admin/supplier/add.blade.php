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
                                {{ isset($is_update) ? 'Update' : 'Add' }} Supplier
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.suppliers.store') }}" method="POST" id="supplier_form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="text" placeholder="Enter supplier name"
                                                class="form-control round bg-transparent text-dark"
                                                value="{{ isset($is_update) ? $edit_supplier->name : old('name') }}"
                                                name="name" id="name">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="email" placeholder="Enter email address"
                                                class="form-control round bg-transparent text-dark"
                                                value="{{ isset($is_update) ? $edit_supplier->email : old('email') }}"
                                                name="email" id="email">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label>Phone</label>
                                                <fieldset class="form-group mb-3">
                                                    <select name="country_code" id="" class="numtext1">
                                                        @foreach (config('country_codes') as $cc)
                                                            <option value="{{ $cc['code'] }}"
                                                                @selected(isset($is_update) ? $edit_supplier->country_code == $cc['code'] : false)>{{ $cc['code'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-11">
                                                <label style="margin-left:-20px;">No</label>
                                                <fieldset class="form-group mb-3">
                                                    <input type="number" placeholder="Enter phone no"
                                                        class="form-control round bg-transparent text-dark numtext22"
                                                        value="{{ isset($is_update) ? $edit_supplier->phone_no : old('phone_no') }}"
                                                        name="phone_no" id="phone_no">
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <fieldset class="form-group mb-3">
                                            <select class="form-control round bg-transparent text-dark select_2"
                                                name="country_id" id="country_id">
                                                <option value="">Select country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->hashid }}" @selected(isset($is_update) ? $edit_supplier->country_id == $country->id : false)>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="text" placeholder="Enter city name"
                                                class="form-control round bg-transparent text-dark"
                                                value="{{ isset($is_update) ? $edit_supplier->city : old('city') }}"
                                                name="city" id="city">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="text" placeholder="Enter address"
                                                class="form-control round bg-transparent text-dark"
                                                value="{{ isset($is_update) ? $edit_supplier->address : old('address') }}"
                                                name="address" id="address">
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Offered Products</label>
                                        <fieldset class="form-group mb-3">
                                            <select class="form-control multiple_select_2" name="product_ids[]"
                                                id="product_ids" multiple>
                                                @foreach ($products as $product)
                                                    @if (is_null($product->deleted_at))
                                                        <option value="{{ $product->hashid }}"
                                                            @selected(in_array($product->id, $offered_product_ids ?? []))>
                                                            {{ $product->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <label>TRN</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="number" placeholder="Enter TRN"
                                                class="form-control round bg-transparent text-dark"
                                                value="{{ isset($is_update) ? $edit_supplier->trn : old('trn') }}"
                                                name="trn" id="trn">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">TRN/Trade License
                                            </label>
                                            <input type="file" id="imageUpload" multiple accept="image/*"
                                                class="form-control" name="trn_documents[]"
                                                onchange=" createImagePreviews('imageUpload','previewContainer');">
                                            @if (isset($is_update))
                                                @foreach ($edit_supplier->trnDocuments as $document)
                                                    <span>
                                                        <img src="{{ getImage($document->filename) }}" alt=""
                                                            width="100px" width="100px" class="icon-text1">
                                                        <i class="fa fa-times cross-icon delete_supplier_image"
                                                            data-document-id="{{ $document->hashid }}"
                                                            data-supplier-id={{ $edit_supplier->hashid }}
                                                            style=""></i>
                                                    </span>
                                                @endforeach
                                            @endif
                                            <div id="previewContainer" class="preview-container"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Note</label>
                                        <fieldset class="form-group mb-3">
                                            <textarea class="form-control round bg-transparent text-dark" name="note" cols="30" rows="3"
                                                id="note">{{ isset($is_update) ? $edit_supplier->note : old('note') }}</textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="supplier_id" id="supplier_id"
                                        value="{{ isset($is_update) ? $edit_supplier->hashid : '' }}">
                                    {{-- <input type="submit" class="btn btn-primary mt-4 float-end" value="{{ isset($is_update) ? 'Update' : 'Add' }}"> --}}
                                    <button type="submit"
                                        class="btn btn-primary mt-4 btn24">{{ isset($is_update) ? 'Update' : 'Add' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="{{ asset('assets/validation/supplier_validation.js') }}"></script>
        <script>
            $('.delete_supplier_image').click(function() {
                let document_id = $(this).data('document-id');
                let supplier_id = $(this).data('supplier-id');
                $(this).parent().remove();
                $.ajax({
                    url: "{{ route('admin.suppliers.delete_trx_document', ['supplier_id' => ':supplier_id', 'document_id' => ':document_id']) }}"
                        .replace(':supplier_id', supplier_id).replace(':document_id', document_id),
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
                        });
                    }
                });

            });
        </script>
    @endsection
