<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 order-xl-first order-last">
                <div class="card card-custom gutter-b bg-white border-0 justify-content-evenly">
                 
                    <div class="display-flex py-5 justify-content-evenly m-1 ps-2 p-3 topTabsHd">
                        <span><a href="javascript:void(0)" wire:click="checkClick('')" class="btn btn-primary @if(empty($category_id)) active @endif" >All</a></span>
                        @foreach($this->categories as $category)
                            <span>
                                <a href="javascript:void(0)" class="btn btn-primary @if($category_id == $category->hashid) active @endif" wire:click="checkClick('{{ $category->hashid }}')" >
                                    {{ $category->name }}
                                </a>
                            </span>
                        @endforeach
                    </div>
                    <div class="product-items">
                        <div class="row">
                            @forelse($this->products as $product)
                                @if($product->has_variation)
                                    @foreach($product->variations as $variation)
                                    <div class="col-xl-3 col-lg-2 col-md-2 col-sm-3 col-6" wire:click="addItems('{{ $product->name."|".$variation->unit->name }}', '{{ $variation->sku }}', '{{ hashid_encode($variation->product_id) }}', '{{ $variation->stock }}', '{{ $variation->price }}', '1', '{{ $variation->hashid }}')">
                                        <div class="productCard">
                                                <div class="productThumb">
                                                    @if(is_null($variation->thumbnail))
                                                        <img class="img-fluid" src="{{ getImage($product->thumbnail->filename ?? null) }}" alt="ix">
                                                    @else 
                                                        <img class="img-fluid" src="{{ getImage($variation->thumbnail ?? null) }}" alt="ix">
                                                    @endif
                                                </div>
                                                <div class="productContent">
                                                    <div class="inContent">
                                                        <h4>
                                                            {{ $variation->name ?? $product->name }} 
                                                        </h4>
                                                        <small>{{ $variation->unit->name }}</small>
                                                    </div>
                                                        <h5>
                                                    
                                                            AED {{ $variation->price }} 
                                                        </h5>
                                                        
                                                    
                                                    <a href="javascript:;" class="btnCustom">
                                                        Add To Basket
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-xl-3 col-lg-2 col-md-2 col-sm-3 col-6" wire:click="addItems('{{ $product->name }}','{{ $product->sku }}', '{{ $product->hashid }}', '{{ $product->stock }}', '{{ $product->price }}','0',)">
                                        <div class="productCard">
                                            <div class="productThumb">
                                                <img class="img-fluid" src="{{ getImage($product->thumbnail->filename ?? null) }}" alt="ix">
                                            </div>
                                            
                                            <div class="productContent">
                                                <div class="inContent">
                                                    <h4>
                                                        {{ $product->name }} 
                                                    </h4>
                                                    {{-- <small>{{ $variation->unit->name }}</small> --}}
                                                </div>

                                                    <h5>
                                                    
                                                        AED {{ $product->price }} 
                                                    </h5>
                                                  
                                             
                                                <a href="javascript:;" class="btnCustom">
                                                    Add To Basket
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                    <div class="col-md-12 alert alert-info">No products found</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-8 col-md-8">
                <div class="">
                    <div class="card card-custom gutter-b bg-white border-0 table-contentpos">
                        <div class="card-body">
                            <div class="d-flex justify-content-between colorfull-select">
                                <div class="selectmain">
                                    <div class="row  mt-2 align-items-center">
                                        <div class="col-md-6">
                                            <h5 class="text-dark d-flex">
                                                Choose a Customer
                                            </h5>
                                        </div>
                                        <div class="col-md-6">                                                    
                                            <select class="arabic-select select-down" wire:model.live="customer_id">
                                                <option value="#">Select Customer</option>
                                                @foreach($this->customers as $customer)
                                                    <option value="{{ $customer->hashid }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                        <div class="table-datapos">
                            <div class="table-responsive" id="printableTable">
                                <table id="orderTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th class="text-right no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($items as $item)
                                            <tr>
                                                <td>{{ $item['product_name'] }}</td>
                                                <td>
                                                    <input type="number" value="{{ $item['quantity'] }}"  class="form-control border-dark w-100px" id="basicInput2" placeholder="" max="{{ $item['stock'] }}" min="1" wire:input="updaeItemQuantity('{{ $item['sku'] }}', $event.target.value)">
                                                </td>
                                                <td>AED {{ $item['price'] }}</td>
                                                <td>
                                                    <div class="card-toolbar text-end">
                                                        <a href="#" class="confirm-delete" title="Delete" wire:click="removeItem('{{ $item['sku'] }}')"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty 
                                        <tr>
                                            <td colspan="3">No item selected</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="resulttable-pos">
                                <table class="table right-table totalTableLast">
                                    <tbody>
                                        <tr class="d-flex align-items-center justify-content-between item-price">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-primary">
                                                TOTAL
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-primary font-size-base">
                                                AED {{ $total['total'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                 
                                </table>
                            </div>
                            <a href="#" class="btn btn-primary white mb-2" data-bs-toggle="modal" data-bs-target="#payment-popup">
                                <i class="fas fa-money-bill-wave me-2"></i>
                                Pay With Cash
                            </a>
                        </div>
                    </div>
                    <div class="card card-custom gutter-b bg-white border-0 table-contentpos">
                     
                        <div class="table-datapos1">
                            <div class="table-responsive" id="printableTable">
                                <table id="orderTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th class="text-right no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($this->recentBills As $bill)
                                            <tr>
                                                {{-- <td>{{ $bill->sale_id }}</td> --}}
                                                <td>{{ $bill->customer->name }}</td>
                                                <td>{{ $bill->total }}</td>
                                                <td>{{ getCustomDate($bill->created_at) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.pos.bill', ['sale_id'=>$bill->hashid]) }}" target="_blank">View</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" wire:click="editBill('{{$bill->hashid }}')">Edit</a>
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
    </div>

    <div class="modal fade text-left" id="payment-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel11">Payment</h3>
                    <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-bs-dismiss="modal" aria-label="Close">
                        <!-- Close button SVG -->
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table right-table">
                        <tbody>
                            <tr class="d-flex align-items-center justify-content-between">
                                <th class="border-0 px-0 font-size-lg mb-0 font-size-bold text-primary">
                                    Total Amount to Pay :
                                </th>
                                <td class="border-0 justify-content-end d-flex text-primary font-size-lg font-size-bold px-0 mb-0">
                                    AED {{ $total['total'] }}
                                </td>
                            </tr>
                            <tr class="d-flex align-items-center justify-content-between">
                                <th class="border-0 px-0 font-size-lg mb-0 font-size-bold text-primary">
                                    Payment Mode :
                                </th>
                                <td class="border-0 justify-content-end d-flex text-primary font-size-lg font-size-bold px-0 mb-0">
                                    Cash
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form wire:submit.prevent="generateBill">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-body">Received Amount</label>
                                <fieldset class="form-group mb-3">
                                    <input type="number" name="number" class="form-control" placeholder="Enter Amount" wire:model.live="recieved_amount" wire:keyup="updateRecievedAmount($event.target.value)">
                                </fieldset>
                                <div class="p-3 bg-light-dark d-flex justify-content-between border-bottom">
                                    <h5 class="font-size-bold mb-0">Amount to Return :</h5>
                                    <h5 class="font-size-bold mb-0">AED{{ $return_amount }}</h5>
                                </div>
                            </div>
                        </div>
                        @if (session('select_customer_error'))
                            <div class="alert alert-danger">
                                {{ session('select_customer_error') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-body">Note (If any)</label>
                                <fieldset class="form-label-group">
                                    <textarea class="form-control fixed-size" id="horizontalTextarea" rows="5" placeholder="Enter Note"></textarea>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-6 text-end">
                                <button type="submit" class="btn btn-primary" {{ ((!($return_amount >= 0) || is_null($return_amount))) ? 'disabled' : '' }}>Pay</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@script
<script>
    $wire.on('bill-generated', (event) => {
        if(event.success){
            toastr.success('Bill generated successfully', 'Success', {
                positionClass: 'toast-top-right',
                timeOut: 3500
            });
            $('#payment-popup').modal('hide');
            let route = "{{ route('admin.pos.bill', ':id') }}";
            route = route.replace(':id', event.sale_id);            
            window.open(route, "_blank");
        }else{
            toastr.error('Some error occured can not generate the bill', 'Success', {
                positionClass: 'toast-top-right',
                timeOut: 3500
            });
        }
    });
</script>
@endscript