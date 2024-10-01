@extends('admin.partials.master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Purchases</h6>
            <a href="{{ route('admin.purchases.create') }}" class="btn btn-primary float-end">Add Purchase</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
              <table class="table align-items-center justify-content-center mb-0 text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purchase ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($purchases AS $purchase)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $purchase->slug }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $purchase->supplier->name }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ getCustomDate($purchase->created_at) }}</p></td>
                      <td>
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.purchases.details', ['purchase_id'=>$purchase->hashid]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Details</a>
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.purchases.edit', ['purchase_id'=>$purchase->hashid]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('admin.purchases.delete',['purchase_id'=>$purchase->hashid]) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection