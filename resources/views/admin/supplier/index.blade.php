@extends('admin.partials.master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Suppliers</h6>
            <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary float-end">Add Supplier</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
              <table class="table align-items-center justify-content-center mb-0 text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Note</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($suppliers AS $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->name }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->email }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->phone_no }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->city }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->address }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $supplier->note }}</p></td>
                        <td>
                          <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.suppliers.edit',['supplier_id'=>$supplier->hashid]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                          <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('admin.suppliers.delete',['supplier_id'=>$supplier->hashid]) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
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