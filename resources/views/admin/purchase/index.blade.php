@extends('admin.partials.master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Products</h6>
            <a href="{{ route('admin.purchases.create') }}" class="btn btn-primary float-end">Add Purchase</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
              <table class="table align-items-center justify-content-center mb-0 text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKU</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock Alert</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Expiration</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Variations</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($products AS $product)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $product->category->name }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ @$product->unit->name }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $product->name }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $product->sku }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $product->price }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $product->stock }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ $product->stock_alert }}</p></td>
                      <td><p class="text-sm font-weight-bold mb-0">{{ getCustomDate($product->expiration) }}</p></td>
                      <td class="align-middle text-center text-sm">
                        @if($product->has_variation)
                          <span class="badge badge-sm bg-gradient-success">yes</span>
                        @else
                          <span class="badge badge-sm bg-gradient-secondary">no</span>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($product->status)
                          <span class="badge badge-sm bg-gradient-success">Active</span>
                        @else
                          <span class="badge badge-sm bg-gradient-secondary">Deactive</span>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.products.edit',['product_id'=>$product->hashid]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('admin.products.delete',['product_id'=>$product->hashid]) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                      </td>
                    </tr>
                  @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection