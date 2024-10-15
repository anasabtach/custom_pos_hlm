<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 order-xl-first order-last">
                <div class="card card-custom gutter-b bg-white border-0 justify-content-evenly">
                    <div class="card-body">
                        <div class="d-flex justify-content-between colorfull-select">
                            <div class="selectmain">
                                <select class="arabic-select w-150px bag-primary">
                                    <option value="1">Men's</option>
                                    <option value="2">Accessories</option>
                                </select>
                            </div>
                            <div class="selectmain">
                                <select class="arabic-select w-150px bag-secondary">
                                    <option value="1">Men's</option>
                                    <option value="2">Accessories</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="display-flex py-5 justify-content-evenly m-1 ps-2 p-3">
                        <span><a href="javascript:void(0)" wire:click="checkClick('all')" class="btn btn-primary">All</a></span>
                        @foreach($this->categories AS $category)
                        <span>
                            <a href="javascript:void(0)" class="btn btn-primary" wire:click="checkClick('{{ $category->hashid }}')">
                                {{ $category->name }}
                            </a>
                        </span>
                        @endforeach
                    </div>
                    <div class="product-items">
                        <div class="row">
                            @foreach($this->products AS $product)
                                @if($product->has_variation)
                                    @foreach($product->variations AS $variation)
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 col-6" wire:click="addItems('{{ $product->name."|".$variation->unit->name }}','{{ $variation->sku }}', '{{ $product->hashid }}', '{{ $product->stock }}', '{{ $product->price }}','1')">
                                        <div class="productCard">
                                                <div class="productThumb">
                                                    <img class="img-fluid" src="{{ asset('assets/images/carousel/element-banner2-right.jpg') }}" alt="ix">
                                                </div>
                                                <div class="productContent">
                                                    <a href="#">
                                                        {{ $product->name }} | $ {{ $variation->unit->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 col-6" wire:click="addItems('{{ $product->name }}','{{ $product->sku }}', '{{ $product->hashid }}', '{{ $product->stock }}', '{{ $product->price }}','0')">
                                        <div class="productCard">
                                            <div class="productThumb">
                                                <img class="img-fluid" src="{{ asset('assets/images/carousel/element-banner2-right.jpg') }}" alt="ix">
                                            </div>
                                            <div class="productContent">
                                                <a href="#">
                                                    {{ $product->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-8 col-md-8">
                <div class="">
                    <div class="card card-custom gutter-b bg-white border-0 table-contentpos">
                        <div class="card-body">
                            <div class="d-flex justify-content-between colorfull-select">
                                <div class="selectmain">
                                    <label class="text-dark d-flex">
                                        Choose a Customer
                                        <span class="badge badge-secondary white rounded-circle" data-bs-toggle="modal" data-bs-target="#choosecustomer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="svg-sm"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                id="Layer_122" x="0px" y="0px" width="512px" height="512px"
                                                viewBox="0 0 512 512" enable-background="new 0 0 512 512"
                                                xml:space="preserve">
                                                <g>
                                                    <rect x="234.362" y="128" width="43.263" height="256">
                                                    </rect>
                                                    <rect x="128" y="234.375" width="256" height="43.25">
                                                    </rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </label>
                                    <select class="arabic-select select-down ">
                                        @foreach($this->customers AS $customer)
                                            <option value="{{ $customer->hashid }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
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
                                            <th class=" text-right no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($items AS $item)
                                            <tr>
                                                <td>{{ $item['product_name'] }}</td>
                                                <td>
                                                    <input type="number" value="{{ $item['quantity'] }}" class="form-control border-dark w-100px" id="basicInput2" placeholder="">
                                                </td>
                                                <td>{{ $item['price'] }}</td>
                                                <td>
                                                    <div class="card-toolbar text-end">
                                                        <a href="#" class="confirm-delete" title="Delete"><i
                                                                class="fas fa-trash-alt"></i></a>
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
                                <table class="table right-table">
                                    <tbody>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                                Subtotal
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-dark font-size-base">
                                                $900
                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 ">
                                                <div class="d-flex align-items-center font-size-h5 mb-0 font-size-bold text-dark">
                                                    DISCOUNT(65%)
                                                    <span class="badge badge-secondary white rounded-circle ms-2" data-bs-toggle="modal" data-bs-target="#discountpop">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-sm"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            version="1.1" id="Layer_31" x="0px" y="0px"
                                                            width="512px" height="512px" viewBox="0 0 512 512"
                                                            enable-background="new 0 0 512 512"
                                                            xml:space="preserve">
                                                            <g>
                                                                <rect x="234.362" y="128" width="43.263"
                                                                    height="256"></rect>
                                                                <rect x="128" y="234.375" width="256"
                                                                    height="43.25"></rect>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-dark font-size-base">
                                                10%
                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                                Tax
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-dark font-size-base">
                                                $9
                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between item-price">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-primary">
                                                TOTAL
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-primary font-size-base">
                                                $81000
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
