@extends('admin.partials.master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Categories</h6>
            <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary float-end">Add Supplier</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
              <table class="table align-items-center justify-content-center mb-0 text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Short Hand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($suppliers AS $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->name }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->short_hand }}</p></td>
                        <td class="align-middle text-center text-sm">
                          @if($supplier->status)
                            <span class="badge badge-sm bg-gradient-success">Active</span>
                          @else
                          <span class="badge badge-sm bg-gradient-secondary">Deactive</span>

                          @endif
                        </td>
                        <td>
                          <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.units.edit',['unit_id'=>$supplier->hashid]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                          <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('admin.units.delete',['unit_id'=>$supplier->hashid]) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
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