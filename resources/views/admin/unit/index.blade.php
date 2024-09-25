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
                    <div class="col-md-5">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Unit Name</label>
                          <input type="text" placeholder="Enter unit name" class="form-control form-control-line" value="{{ (isset($is_update)) ? $edit_unit->name : old('unit_name') }}" name="unit_name"> 
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Short Hand</label>
                          <input type="text" placeholder="Enter unit short hand" class="form-control form-control-line" value="{{ (isset($is_update)) ? $edit_unit->name : old('short_hand') }}" name="short_hand"> 
                        </div>
                    </div>
                    <div class="col-md-2">
                      <input type="hidden" name="unit_id" value="{{ (isset($is_update)) ? $edit_unit->hashid : '' }}">
                        <input type="submit" class="btn btn-primary mt-4" value="{{ (isset($is_update)) ? 'Update' : 'Add' }}">
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Categories</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0 text-center">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($units AS $unit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $unit->name }}</p></td>
                        <td class="align-middle text-center text-sm">
                          @if($unit->status)
                            <span class="badge badge-sm bg-gradient-success">Active</span>
                          @else
                          <span class="badge badge-sm bg-gradient-secondary">Deactive</span>

                          @endif
                        </td>
                        <td>
                          <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.categories.edit',['category_id'=>$unit->hashid]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                          <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('admin.categories.delete',['category_id'=>$unit->hashid]) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                        </td>
                    </tr>
                  @empty 
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection