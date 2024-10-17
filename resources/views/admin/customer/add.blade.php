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
                            {{ isset($is_update) ? 'Update' : 'Add' }} Customer
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.customers.store') }}" method="POST" id="customer_form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <fieldset class="form-group mb-3">
                                        <input type="text" placeholder="Enter unit name" class="form-control round bg-transparent text-dark" 
                                               value="{{ isset($is_update) ? $edit_customer->name : old('name') }}" name="name">
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <fieldset class="form-group mb-3">
                                        <input type="email" placeholder="Enter email address" class="form-control round bg-transparent text-dark" 
                                               value="{{ isset($is_update) ? $edit_customer->email : old('email') }}" name="email">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone No</label>
                                    <fieldset class="form-group mb-3">
                                        <input type="text" placeholder="Enter phone no" class="form-control round bg-transparent text-dark" 
                                               value="{{ isset($is_update) ? $edit_customer->phone_no : old('phone_no') }}" name="phone_no">
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <fieldset class="form-group mb-3">
                                        <select class="form-control round bg-transparent text-dark" name="country_id" id="country_id">
                                            <option value="">Select country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->hashid }}" @selected((isset($is_update) ? $edit_customer->country_id == $country->id : false))>
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
                                        <input type="text" placeholder="Enter city name" class="form-control round bg-transparent text-dark" 
                                               value="{{ isset($is_update) ? $edit_customer->city : old('city') }}" name="city">
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <fieldset class="form-group mb-3">
                                        <input type="text" placeholder="Enter address" class="form-control round bg-transparent text-dark" 
                                               value="{{ isset($is_update) ? $edit_customer->address : old('address') }}" name="address">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Note</label>
                                    <fieldset class="form-group mb-3">
                                        <textarea class="form-control round bg-transparent text-dark" name="note" cols="30" rows="3">{{ isset($is_update) ? $edit_customer->note : old('note') }}</textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="customer_id" value="{{ isset($is_update) ? $edit_customer->hashid : '' }}">
                                <input type="submit" class="btn btn-primary mt-4 float-end" value="{{ isset($is_update) ? 'Update' : 'Add' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/validation/customer_validation.js') }}"></script>
@endsection