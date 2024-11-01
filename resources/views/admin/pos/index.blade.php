<!DOCTYPE html>
<!--
   Template Name: Kundol Admin - Bootstrap 4 HTML Admin Dashboard Theme
   Author: Themes-coder
   Website: https://themes-coder.com/
   Contact: sales@themes-coder.com
   License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
   -->
<html lang="en">
   <!--begin::Head-->
   <!-- Mirrored from kundol.themes-coder.net/admin-demo/pos.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2024 18:19:23 GMT -->
   <head>
      <meta charset="utf-8" />
      <title>Admin | Dashboard</title>
      <meta name="description" content="Updates and statistics" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link href="{{ asset('assets/css/stylec619.css?v=1.0') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('assets/css/pos.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('assets/api/pace/pace-theme-flat-top.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"
         type="text/css" />
      <link href="{{ asset('assets/api/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
      <link rel="shortcut icon" href="assets/media/logos/favicon.html" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
      integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
      @livewireStyles
   </head>
   <style>
      .table-contentpos .table-datapos1 {
    padding: 1.25rem;
    padding-top: 0;
    height: 153px;
    overflow: hidden;
    overflow-x: hidden;
    overflow-y: auto;
}
    /* input[type=number] {
        -moz-appearance: textfield; 
    }

    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0; 
    } */
      </style>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
      <!-- Paste this code after body tag -->
      <div class="se-pre-con">
         <div class="pre-loader">
            <img class="img-fluid" src="{{ asset('assets/images/loadergif.gif') }}" alt="loading">
         </div>
      </div>
      <!-- pos header -->
      <header class="pos-header bg-white">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="greeting-text">
                     <h3 class="card-label mb-0 font-weight-bold text-primary">WELCOME
                     </h3>
                     <h3 class="card-label mb-0 ">
                        
                     </h3>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-5 col-md-6  clock-main">
                  <div class="clock">
                     <div class="datetime-content">
                        <ul>
                           <li id="hours"></li>
                           <li id="point1">:</li>
                           <li id="min"></li>
                           <li id="point">:</li>
                           <li id="sec"></li>
                        </ul>
                     </div>
                     <div class="datetime-content">
                        <div id="Date" class=""></div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-3 col-md-12  order-lg-last order-second">
                  <div class="topbar justify-content-end">
                     <div class="dropdown mega-dropdown">
                        <div id="id2" class="topbar-item " data-bs-toggle="dropdown" data-display="static">
                           <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0 me-3">
                              <span class="symbol symbol-35 symbol-light-success">
                                 <span class="symbol-label bg-primary  font-size-h5 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                       fill="#fff" class="bi bi-calculator-fill" viewBox="0 0 16 16">
                                       <path
                                          d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z" />
                                    </svg>
                                 </span>
                              </span>
                           </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right calu" style="min-width: 248px;">
                           <div class="calculator">
                              <div class="input" id="input"></div>
                              <div class="buttons">
                                 <div class="operators">
                                    <div>+</div>
                                    <div>-</div>
                                    <div>&times;</div>
                                    <div>&divide;</div>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                    <div class="leftPanel">
                                       <div class="numbers">
                                          <div>7</div>
                                          <div>8</div>
                                          <div>9</div>
                                       </div>
                                       <div class="numbers">
                                          <div>4</div>
                                          <div>5</div>
                                          <div>6</div>
                                       </div>
                                       <div class="numbers">
                                          <div>1</div>
                                          <div>2</div>
                                          <div>3</div>
                                       </div>
                                       <div class="numbers">
                                          <div>0</div>
                                          <div>.</div>
                                          <div id="clear">C</div>
                                       </div>
                                    </div>
                                    <div class="equal" id="result">=</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="topbar-item folder-data">
                        <div class="btn btn-icon  w-auto h-auto btn-clean d-flex align-items-center py-0 me-3"
                           data-bs-toggle="modal" data-bs-target="#folderpop">
                           <span class="badge badge-pill badge-primary">5</span>
                           <span class="symbol symbol-35  symbol-light-success">
                              <span class="symbol-label bg-warning font-size-h5 ">
                                 <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg"
                                    fill="#ffff" viewBox="0 0 16 16">
                                    <path
                                       d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z">
                                    </path>
                                 </svg>
                              </span>
                           </span>
                        </div>
                     </div>
                     <div class="dropdown">
                        <div class="topbar-item" data-bs-toggle="dropdown" data-display="static">
                           <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0">
                              <span class="symbol symbol-35 symbol-light-success">
                                 <span class="symbol-label font-size-h5 ">
                                    <svg width="20px" height="20px" viewBox="0 0 16 16"
                                       class="bi bi-person-fill" fill="currentColor"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd"
                                          d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                       </path>
                                    </svg>
                                 </span>
                              </span>
                           </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">
                           <a href="#" class="dropdown-item">
                              <span class="svg-icon svg-icon-xl svg-icon-primary me-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-power">
                                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                    <line x1="12" y1="2" x2="12" y2="12">
                                    </line>
                                 </svg>
                              </span>
                              Logout
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="contentPOS">
         @livewire('pos-component')
      <div class="modal fade text-left" id="shippingpop" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg"
            role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel12">Add Shipping Address</h3>
                  <button type="button"
                     class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                     data-bs-dismiss="modal" aria-label="Close">
                     <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                     </svg>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Country</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent  p-0 border-0"
                                 name="state">
                                 <option value="AL">USA</option>
                                 <option value="WY">UK</option>
                              </select>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">State</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter State ">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">City</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                 name="state">
                                 <option value="AL">Bahreen</option>
                                 <option value="WY">Dubai</option>
                              </select>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Postal Code</label>
                           <fieldset class="form-group mb-3">
                              <input type="number" name="text" class="form-control"
                                 placeholder="Enter Postal code">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Address</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter Address">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Phone Number</label>
                           <fieldset class="form-group mb-3">
                              <input type="number" name="text" class="form-control"
                                 placeholder="Enter Phone Number">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row justify-content-end mb-0">
                        <div class="col-md-6  text-end">
                           <a href="#" class="btn btn-primary">Add Address</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade text-left" id="choosecustomer" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel13" style="display: none;" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg "
            role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel13">Add Customer</h3>
                  <button type="button"
                     class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                     data-bs-dismiss="modal" aria-label="Close">
                     <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                     </svg>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Customer Group</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                 name="state">
                                 <option value="AL">General</option>
                                 <option value="WY">Partial</option>
                              </select>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Customer Name</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter Customer Name">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Company Name</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter Company Name">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Tax Number</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter Tax">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Email</label>
                           <fieldset class="form-group mb-3">
                              <input type="email" name="text" class="form-control"
                                 placeholder="Enter Mail">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Phone Number</label>
                           <fieldset class="form-group mb-3">
                              <input type="email" name="text" class="form-control"
                                 placeholder="Enter Phone Number">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Country</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                 name="state">
                                 <option value="AL">USA</option>
                                 <option value="WY">UK</option>
                              </select>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">State</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter State">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">City</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                 name="state">
                                 <option value="AL">Dubai</option>
                                 <option value="WY">Bahreen</option>
                              </select>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Postal Code</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter Postal Code">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-6">
                           <label class="text-body">Address</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control "
                                 placeholder="Enter Address">
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row justify-content-end mb-0">
                        <div class="col-md-6  text-end">
                           <a href="#" class="btn btn-primary">Add Customer</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade text-left" id="folderpop" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel14" style="display: none;" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg "
            role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel14">Draft Orders</h3>
                  <button type="button"
                     class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                     data-bs-dismiss="modal" aria-label="Close">
                     <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                     </svg>
                  </button>
               </div>
               <div class="modal-body pos-ordermain">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="pos-order">
                           <h3 class="pos-order-title">Order 1</h3>
                           <div class="orderdetail-pos">
                              <p>
                                 <strong>Customer Name</strong>
                                 Sophia Hale
                              </p>
                              <p>
                                 <strong>Address</strong>
                                 9825 Johnsaon Dr.Columbo,MD21044
                              </p>
                              <p>
                                 <strong>Payment Status</strong>
                                 Pending
                              </p>
                              <p>
                                 <strong>Total Items</strong>
                                 10
                              </p>
                              <p>
                                 <strong>Amount to Pay</strong>
                                 $722
                              </p>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-edit"></i></a>
                              <a href="#" class="confirm-delete ms-3"
                                 title="Delete"><i class="fas fa-trash-alt"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer border-0">
                  <div class="row">
                     <div class="col-12 px-4">
                        <a href="#" class="btn btn-primary">Submit</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade text-left" id="discountpop" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel122" style="display: none;" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg"
            role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel122">Add Discount</h3>
                  <button type="button"
                     class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                     data-bs-dismiss="modal" aria-label="Close">
                     <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                     </svg>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-12 px-4">
                        <label class="text-body">Discount</label>
                        <fieldset class="form-group mb-3 d-flex">
                           <input type="text" name="text"
                              class="form-control bg-white" placeholder="Enter Discount">
                           <a href="javascript:void(0)"
                              class="btn-secondary btn ms-2 white pt-1 pb-1 d-flex align-items-center justify-content-center">Apply</a>
                        </fieldset>
                        <div
                           class="p-3 bg-light-dark d-flex justify-content-between border-bottom">
                           <h5 class="font-size-bold mb-0">Discount Applied of:</h5>
                           <h5 class="font-size-bold mb-0">$20</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade text-left" id="shippingcost" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel1444" style="display: none;" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg"
            role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1444">Add Shipping Cost</h3>
                  <button type="button"
                     class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0"
                     data-bs-dismiss="modal" aria-label="Close">
                     <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                           d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                     </svg>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Customer</label>
                           <fieldset class="form-group mb-3">
                              <input type="text" name="text" class="form-control"
                                 placeholder="Enter Customer " value="David Jones"
                                 disabled>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Shipping Address</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                 name="state">
                                 <option value="AL">928 Johnsaon Dr Columbo,MD 21044
                                 </option>
                                 <option value="WY">933 Johnsaon Dr Columbo,MD 21044
                                 </option>
                              </select>
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="text-body">Shipping Charges</label>
                           <fieldset class="form-group mb-3">
                              <input type="number" name="text" class="form-control"
                                 placeholder="Enter Shipping Charges">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <label class="text-body">Shipping Status</label>
                           <fieldset class="form-group mb-3">
                              <select
                                 class="js-example-basic-single js-states form-control bg-transparent p-0 border-0"
                                 name="state">
                                 <option value="AL">Packed</option>
                                 <option value="WY">Open</option>
                              </select>
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="text-body">Shipping Charges</label>
                           <fieldset class="form-label-group ">
                              <textarea class="form-control fixed-size" rows="5" placeholder="Textarea"></textarea>
                           </fieldset>
                        </div>
                     </div>
                     <div class="form-group row justify-content-end mb-0">
                        <div class="col-md-6  text-end">
                           <a href="#" class="btn btn-primary">Update Order</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
         integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>

      {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
      {{-- <script src="{{ asset('assets/js/plugin.bundle.min.js') }}"></script> --}}
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      {{-- <script src="{{ asset('assets/api/jqueryvalidate/jquery.validate.min.js') }}"></script> --}}
      {{-- <script src="{{ asset('assets/api/pace/pace.js') }}"></script> --}}
      {{-- <script src="{{ asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script> --}}
      {{-- <script src="{{ asset('assets/api/quill/quill.min.js') }}"></script> --}}
      {{-- <script src="{{ asset('assets/api/datatable/jquery.dataTables.min.js') }}"></script> --}}
      {{-- <script src="{{ asset('assets/js/script.bundle.js') }}"></script> --}}
      {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script> --}}
      {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script> --}}
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      @livewireScripts
      <script>
         //  jQuery(function() {
         //      jQuery('.arabic-select').multipleSelect({
         //          filter: true,
         //          filterAcceptOnEnter: true
         //      })
         //  });
         //  jQuery(function() {
         //      jQuery('.js-example-basic-single').multipleSelect({
         //          filter: true,
         //          filterAcceptOnEnter: true
         //      })
         //  });
         //  jQuery(document).ready(function() {
         //      jQuery('#orderTable').DataTable({
         
         //          "info": false,
         //          "paging": false,
         //          "searching": false,
         
         //          "columnDefs": [{
         //              "targets": 'no-sort',
         //              "orderable": false,
         //          }]
         //      });
         //  });
         jQuery(window).on('load', function(){ 
         // Animate loader off screen
         jQuery('.se-pre-con').fadeOut("slow");
         });
      </script>
   </body>
   <!--end::Body-->
   <!-- Mirrored from kundol.themes-coder.net/admin-demo/pos.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2024 18:19:38 GMT -->
</html>