@extends('admin.partials.master')

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-primary">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">All Brands</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $brands_count }}">{{ $brands_count }}</span></span>

                                        </div>
                                        {{-- <div class="text-black-50 mt-3">Compare to last year (2019)</div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div
                                class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle theme-circle-secondary">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold"> All Categories</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $categories_count }}">{{ $categories_count }}</span></span>

                                        </div>
                                        {{-- <div class="text-black-50 mt-3">Compare to last year (2019)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">All Untis</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $units_count }}">{{ $units_count }}</span></span>

                                        </div>
                                        {{-- <div class="text-black-50 mt-3">Compare to last year (2019)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">All Suppliers</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $suppliers_count }}">{{ $suppliers_count }}</span></span>

                                        </div>
                                        {{-- <div class="text-black-50 mt-3">Compare to last year (2019)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">All Customers</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $customers_count }}">{{ $customers_count }}</span></span>

                                        </div>
                                        {{-- <div class="text-black-50 mt-3">Compare to last year (2019)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">Total Purchase</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $purchase_count }}">{{ $purchase_count }}</span></span>

                                        </div>
                                        <div class="text-black-50 mt-3">Total amount of all purchases
                                            ({{ number_format($purchase_item_sum, 2) }})</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">All Staff</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3"><span class=""
                                                    data-bs-target="{{ $staff_count }}">{{ $staff_count }}</span></span>

                                        </div>
                                        {{-- <div class="text-black-50 mt-3">Compare to last year (2019)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3">
                            <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-info">

                                <div class="card-body">
                                    <h3 class="text-body font-weight-bold">Sales</h3>
                                    <div class="mt-3">
                                        <div class="d-flex align-items-center">
                                            <span class="text-dark font-weight-bold font-size-h1 me-3">$<span
                                                    class="" data-bs-target="{{ $all_sales_count }}">{{ $all_sales_count }}</span></span>
                                            {{-- <span class="font-weight-bold font-size-h4 text-danger">8.2</span> --}}
                                            {{-- <span class="svg-icon text-danger">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-arrow-up-short" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                                            </svg>
                                        </span> --}}
                                        </div>
                                        <div class="text-black-50 mt-3">Total amount of all sales
                                            ({{ number_format($all_sales_sum, 2) }})</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                    <div class="col-lg-6  col-xl-8">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label text-body font-weight-bold mb-0">Users
                                    </h3>
                                </div>
                                
                            </div>
                            <div class="card-body pt-3">
                                <div id="chart-4">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-6 col-xl-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label text-body font-weight-bold mb-0">Last Update
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="svg-icon">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-three-dots text-body" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <ul class="list-group scrollbar-1" style="height: 300px;">
                                  <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                    <div class="list-left d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-primary text-white me-2">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                              </svg>
                                          </span>
                                      <div class="list-content">
                                        <span class="list-title text-body">Total Products</span>
                                        <small class="text-muted d-block">1.2k New Products</small>
                                      </div>
                                    </div>
                                    <span>10.6k</span>
                                  </li>
                                  <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                    <div class="list-left d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-secondary text-white me-2">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                                              </svg>
                                          </span>
                                      <div class="list-content">
                                        <span class="list-title text-body">Total Sales</span>
                                        <small class="text-muted d-block">39.4k New Sales</small>
                                      </div>
                                    </div>
                                    <span>26M</span>
                                  </li>
                                  <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                    <div class="list-left d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-success text-white me-2">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-credit-card-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4z"/>
                                                <path fill-rule="evenodd" d="M0 7v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H3z"/>
                                              </svg>
                                          </span>
                                      <div class="list-content">
                                        <span class="list-title text-body">Total Revenue</span>
                                        <small class="text-muted d-block">43.5k New Revenue</small>
                                      </div>
                                    </div>
                                    <span>15.89M</span>
                                  </li>
                                  
                                  <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                    <div class="list-left d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-warning text-white me-2">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                              </svg>
                                          </span>
                                      <div class="list-content">
                                        <span class="list-title text-body">Total Users</span>
                                        <small class="text-muted d-block">New Users</small>
                                      </div>
                                    </div>
                                    <span>1.2k</span>
                                  </li>
                                  <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                                    <div class="list-left d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-info text-white me-2">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                              </svg>
                                          </span>
                                      <div class="list-content">
                                        <span class="list-title text-body">Total Visits</span>
                                        <small class="text-muted d-block">New Visits</small>
                                      </div>
                                    </div>
                                    <span>4.6k</span>
                                  </li>
                                </ul>
                              </div>
                          </div>
                    </div>
                </div> --}}

                    {{-- <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label font-weight-bold mb-0 text-body">Activity
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton2"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="svg-icon">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-three-dots text-body" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="timeline timeline-6 mt-3">
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50 ">08:42</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-warning icon-xl"></i>
                                        </div>
                                        <div class="font-weight-mormal timeline-content text-muted ps-3">Outlines keep you honest. And keep structure</div>
                                    </div>
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50">10:00</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-success icon-xl"></i>
                                        </div>
                                        <div class="timeline-content d-flex">
                                            <span class="font-weight-bolder text-body ps-3">AEOL meeting</span>
                                        </div>
                                    </div>
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50 ">14:37</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger icon-xl"></i>
                                        </div>
                                        <div class="timeline-content font-weight-bold text-body ps-3">Make deposit 
                                        <a href="#" class="text-primary">USD 700</a>. to ESL</div>
                                        
                                    </div>
                                    
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50 ">16:50</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-primary icon-xl"></i>
                                        </div>
                                        <div class="timeline-content font-weight-mormal text-muted ps-3">Indulging in poorly driving and keep structure keep great</div>
                                    </div>
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50">21:03</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger icon-xl"></i>
                                        </div>
                                        <div class="timeline-content font-weight-bold text-body ps-3">New order placed 
                                        <a href="#" class="text-primary">#XF-2356</a>.</div>
                                    </div>
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50">23:07</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-info icon-xl"></i>
                                        </div>
                                        <div class="timeline-content font-weight-mormal text-muted ps-3">Outlines keep and you honest. Indulging in poorly driving</div>
                                    </div>
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bold text-black-50">16:50</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-primary icon-xl"></i>
                                        </div>
                                        <div class="timeline-content font-weight-mormal text-muted ps-3">Indulging in poorly driving and keep structure keep great</div>
                                    </div>
                                    
                                    <div class="timeline-item align-items-start">								
                                        <div class="timeline-label font-weight-bold text-black-50">21:03</div>
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger icon-xl"></i>
                                        </div>
                                        <div class="timeline-content font-weight-bold text-body ps-3">New order placed 
                                        <a href="#" class="text-primary">#XF-2356</a>.</div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6 col-xl-8">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label font-weight-bold mb-0 text-body">Weekly Sales
                                    </h3>
                                </div>
                                
                            </div>
                            <div class="card-body pt-3">
                                <div id="chart-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                    {{-- <div class="row">
                    
                    <div class="col-lg-6 col-xl-8">
                        <div class="card card-custom gutter-b bg-white border-0" >
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">New Orders
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="svg-icon">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-three-dots text-body" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton3">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" >
                                <div >
                                    <div class="kt-table-content table-responsive">
                                        <table id="myTable" class="table ">
                                            
                                            <thead class="kt-table-thead text-body">
                                                <tr>
                                                    <th class="kt-table-cell">Order ID</th>
                                                    <th class="kt-table-cell">Customer Name</th>
                                                    <th class="kt-table-cell">Amount</th>
                                                    <th class="kt-table-cell">
                                                        <div class="text-right">Status</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center">
                                                            <span
                                                                class="ms-2">Clayton Bates</span></div>
                                                    </td>
                                                    
                                                    <td class="kt-table-cell">$137.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Gabriel Frazier</span>
                                                        </div>
                                                    </td>
                                                    <td class="kt-table-cell">$322.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center">
                                                            <span
                                                                class="ms-2">Debra Hamilton</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$543.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-info">Pending</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Stacey Ward</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$876.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-danger">Rejected</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Troy Alexander</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$241.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Clayton Bates</span></div>
                                                    </td>
                                                    
                                                    <td class="kt-table-cell">$137.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Gabriel Frazier</span>
                                                        </div>
                                                    </td>
                                                    <td class="kt-table-cell">$322.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Debra Hamilton</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$543.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-info">Pending</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Stacey Ward</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$876.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-danger">Rejected</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Troy Alexander</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$241.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Clayton Bates</span></div>
                                                    </td>
                                                    
                                                    <td class="kt-table-cell">$137.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Gabriel Frazier</span>
                                                        </div>
                                                    </td>
                                                    <td class="kt-table-cell">$322.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Debra Hamilton</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$543.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-info">Pending</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Stacey Ward</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$876.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-danger">Rejected</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell">#12425</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center"><span
                                                                class="ms-2">Troy Alexander</span></div>
                                                    </td>
                                                    <td class="kt-table-cell">$241.00</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">Approved</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                                
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Action Needed
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton4"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="svg-icon">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-three-dots text-body" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton4">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <div class="progress" data-percentage="80">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                        <div class="text-body">
                                            80%<br>
                                            <span>completed</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-0">
                                    <p class="text-center font-weight-normal text-body">Notes: Current sprint requires stakeholders 
                                    <br>to approve newly amended policies</p>
                                    <a href="#" class="btn btn-secondary text-white font-weight-bold w-100 py-3">Generate Report</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-6" style="height: 200; width: 50%;">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <div class="col-md-6" style="height: 200; width: 50%;">
                        <canvas id="myLineChart"></canvas>
                    </div>
                    
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Define labels and data for both charts
    const labels        = @json($product_sale_chart->pluck('product_name')->toArray());
    const quantityData  = @json($product_sale_chart->pluck('quantity_sum')->toArray());
    const totalData     = @json($product_sale_chart->pluck('total_sum')->toArray());

    // Bar Chart Configuration
    const barChartData = {
        labels: labels,
        datasets: [{
            label: 'Quantity Sold',
            data: quantityData, // Quantity data
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const barChartConfig = {
        type: 'bar', // Bar chart
        data: barChartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Product Sales Quantity'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // // Line Chart Configuration
    // const lineChartData = {
    //     labels: labels,
    //     datasets: [
    //         {
    //             label: 'Quantity Sold',
    //             data: quantityData, // Quantity data
    //             borderColor: 'rgba(75, 192, 192, 1)',
    //             backgroundColor: 'rgba(75, 192, 192, 0.2)',
    //             fill: false,
    //             tension: 0.1
    //         },
    //         {
    //             label: 'Total Sales ($)',
    //             data: totalData, // Total sales data
    //             borderColor: 'rgba(153, 102, 255, 1)',
    //             backgroundColor: 'rgba(153, 102, 255, 0.2)',
    //             fill: false,
    //             tension: 0.1
    //         }
    //     ]
    // };

    // const lineChartConfig = {
    //     type: 'line',
    //     data: lineChartData,
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         plugins: {
    //             legend: {
    //                 position: 'top',
    //             },
    //             title: {
    //                 display: true,
    //                 text: 'Product Sales Chart'
    //             }
    //         },
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // };
    const lint_chart_labels = @json($customer_growth_chart->pluck('month')->toArray()); // Month names
    const customerData = @json($customer_growth_chart->pluck('total')->toArray()); // Customer counts

    // Line Chart Configuration
    const customerChartData = {
        labels: lint_chart_labels, // Months
        datasets: [{
            label: 'Customer Growth Trend',
            data: customerData, // Customer data
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            fill: true,
            tension: 0.4 // Smooth curve
        }]
    };

    const lineChartConfig  = {
        type: 'line',
        data: customerChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Customer Growth Over Time'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Customers'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Months'
                    }
                }
            }
        }
    };

    // Render Bar Chart
    const barChartCtx = document.getElementById('myBarChart').getContext('2d');
    new Chart(barChartCtx, barChartConfig);

    // Render Line Chart
    const lineChartCtx = document.getElementById('myLineChart').getContext('2d');
    new Chart(lineChartCtx, lineChartConfig);
</script>

@endsection
