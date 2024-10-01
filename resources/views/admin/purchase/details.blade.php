@extends('admin.partials.master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Purchases Details</h6>
            <a href="{{ route('admin.purchases.index') }}" class="btn btn-primary float-end">Back</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-3">
              <table class="table align-items-center justify-content-center mb-0 text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cost</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expiration</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($detail->items AS $item)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $item->product->name }} {{ (!is_null($item->product_variation_id)) ? "| {$item->product->unit->name}" : '' }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $item->cost }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $item->price }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $item->qty }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ $item->total }}</p></td>
                        <td><p class="text-sm font-weight-bold mb-0">{{ (!is_null($item->expiration)) ? getCustomDate($item->expiration) : '' }}</p></td>
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