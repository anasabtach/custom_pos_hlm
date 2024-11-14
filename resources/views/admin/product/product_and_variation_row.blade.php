@if ($data instanceof \App\Models\Product)
    <tr id="{{ $data->hashid }}">
        <td>
            <p class="text-center">{{ $data->category->name }}</p>
        </td>
        <td>
            <p class="text-center">{{ $data->name }}</p>
        </td>
        <td>
            <input class="form-control cost" type="number" name="cost[]">
        </td>
        <td>
            <p class="text-center">{{ $data->price }}</p>
        </td>
        <td>
            <p class="text-center">{{ $data->stock }}</p>
        </td>
        <td>
            <input class="form-contro qtyl" type="number" name="qty[]">
        </td>
        <td>
            <input class="form-control" type="date" name="expiration[]">
        </td>
        <td class="subtotal">Total</td>
        <td>
            <a class="btn btn-link text-danger text-gradient px-3 mb-0 delete_product_row"
                href="javascript:void(0)">>Delete</a>
        </td>
        <input type="hidden" name="product_id[]" value="{{ $data->hashid }}">
    </tr>
@elseif($data instanceof \App\Models\ProductVariation)
    <tr id="{{ $data->hashid }}">
        <td>
            <p class="text-center">{{ $data->product->category->name }}</p>
        </td>
        <td>
            <p class="text-center">{{ $data->product->name }} | {{ $data->unit->name }}</p>
        </td>
        <td>
            <input class="form-control cost" type="number" name="cost[]">
        </td>
        <td>
            <p class="text-center">{{ $data->product->price }}</p>
        </td>
        <td>
            <p class="text-center">{{ $data->product->stock }}</p>
        </td>
        <td>
            <input class="form-control qty" type="number" name="qty[]">
        </td>
        <td>
            <input class="form-control expiration" type="date" name="expiration[]">
        </td>
        <td class="subtotal">Total</td>
        <td>
            <a class="btn btn-link text-danger text-gradient px-3 mb-0 delete_product_row   " 
                href="javascript:void(0)">Delete</a>
        </td>
        <input type="hidden" name="product_id[]" value="{{ $data->product->hashid }}">
        <input type="hidden" name="product_variation_id[]" value="{{ $data->hashid }}">

    </tr>
@endif
