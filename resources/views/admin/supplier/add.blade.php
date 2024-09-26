@extends('admin.partials.master')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Add Unit</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('admin.units.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input type="text" placeholder="Enter name"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_supplier->name : old('name') }}"
                                            name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Email</label>
                                      <input type="email" placeholder="Enter email address"
                                          class="form-control form-control-line"
                                          value="{{ isset($is_update) ? $edit_supplier->email : old('email') }}"
                                          name="email">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone No</label>
                                        <input type="text" placeholder="Enter phone no"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_supplier->phone_no : old('phone_no') }}"
                                            name="phone_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Country</label>
                                      <input type="email" placeholder="Enter country name"
                                          class="form-control form-control-line"
                                          value="{{ isset($is_update) ? $edit_supplier->country : old('country') }}"
                                          name="country">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input type="text" placeholder="Enter city name"
                                            class="form-control form-control-line"
                                            value="{{ isset($is_update) ? $edit_supplier->city : old('city') }}"
                                            name="phone_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Address</label>
                                      <input type="email" placeholder="Enter address"
                                          class="form-control form-control-line"
                                          value="{{ isset($is_update) ? $edit_supplier->address : old('address') }}"
                                          name="address">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Note</label>
                                    <textarea class="form-control" name="note" id="" cols="30" rows="3">
                                        {{ isset($is_update) ? $edit_supplier->address : old('address') }}
                                    </textarea>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="unit_id"
                                    value="{{ isset($is_update) ? $edit_unit->hashid : '' }}">
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
