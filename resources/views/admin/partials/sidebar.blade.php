{{-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="./pages/dashboard.html">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.categories.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.brands.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Brands</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.units.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Units</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.suppliers.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Suppliers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.suppliers.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Customers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.products.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.purchases.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Purchases</span>
        </a>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.profile') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.logout') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Logout</span>
        </a>
      </li>

    </ul>
  </div> --}}
  <div class="aside-menu-wrapper flex-column-fluid overflow-auto h-100" id="tc_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="tc_aside_menu" class="aside-menu  mb-5" data-menu-vertical="1" data-menu-scroll="1"
      data-menu-dropdown-timeout="500">
      <!--begin::Menu Nav-->
      <div id="accordion">
      <ul class="nav flex-column">
        <li class="nav-item active">
          <a href="index-2.html" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Dashboard
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.categories.index') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Categories
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.units.index') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Units
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.suppliers.index') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Suppliers
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.products.index') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              products
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.purchases.index') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              purchases
            </span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a  class="nav-link" data-bs-toggle="collapse" href="javascript:void(0)" data-bs-target="#media" role="button"
          aria-expanded="false" aria-controls="media">

            
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-image">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                <polyline points="21 15 16 10 5 21"></polyline>
              </svg>
            </span>
            <span class="nav-text">Media</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>

          </a>
          <div class="collapse nav-collapse" id="media" data-bs-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="media-manage.html" class="nav-link sub-nav-link">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Manage Media</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="media-detail.html" class="nav-link sub-nav-link">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Media Detail</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="media-setting.html" class="nav-link sub-nav-link">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
              
                  <span class="nav-text">Media Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}
  
      </ul>
      </div>
    
      <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
  </div>