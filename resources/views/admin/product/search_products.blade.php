@if($products->isNotEmpty())
    @foreach($products AS $product) 
        <option value="{{ $product->hashid }}">{{ $product->name }}</option>
    @endforeach
@endif