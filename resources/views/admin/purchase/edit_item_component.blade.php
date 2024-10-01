{{-- {{ dd($edit_purchase->items) }} --}}
@foreach ($edit_purchase->items as $item)
    @if (!is_null($item->product_variation_id))
        <tr id="{{ hashid_encode($item->product_variation_id) }}">
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->product->category->name }}</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->product->name }} | {{ $item->productVariation->unit->name }}</p>
            </td>
            <td>
                <input class="form-control cost" type="number" name="cost[]" value="{{ $item->cost }}">
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->price }}</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->productVariation->stock }}</p>
            </td>
            <td>
                <input class="form-control qty" type="number" name="qty[]" value="{{ $item->qty }}">
            </td>
            <td>
                <input class="form-control expiration" type="date" name="expiration[]" value={{ $item->expiration }}>
            </td>
            <td class="subtotal">{{ $item->total }}</td>
            <td>
                <a class="btn btn-link text-danger text-gradient px-3 mb-0 delete_product_row   "
                    href="javascript:void(0)"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
            </td>
            <input type="hidden" name="product_id[]" value="{{ hashid_encode($item->product_id) }}">
            <input type="hidden" name="product_variation_id[]" value="{{ hashid_encode($item->product_variation_id) }}">
        </tr>
    @else
        <tr id="{{ hashid_encode($item->product_id) }}">
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ @$item->product->category->name }}</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->product->name }}</p>
            </td>
            <td>
                <input class="form-control cost" type="number" name="cost[]" value={{ $item->cost }}>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->price }}</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0">{{ $item->product->stock }}</p>
            </td>
            <td>
                <input class="form-control qty" type="number" name="qty[]" value="{{ $item->qty }}">
            </td>
            <td>
                <input class="form-control" type="date" name="expiration[]" value="{{ $item->expiration }}">
            </td>
            <td class="subtotal">{{ $item->total }}</td>
            <td>
                <a class="btn btn-link text-danger text-gradient px-3 mb-0 delete_product_row"
                    href="javascript:void(0)"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
            </td>
            <input type="hidden" name="product_id[]" value="{{ hashid_encode($item->product_id) }}">
        </tr>
    @endif
@endforeach
