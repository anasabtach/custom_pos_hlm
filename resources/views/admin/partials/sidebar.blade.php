<div class="aside-menu-wrapper flex-column-fluid overflow-auto h-100" id="tc_aside_menu_wrapper">
  <!--begin::Menu Container-->
  <div id="tc_aside_menu" class="aside-menu mb-5" data-menu-vertical="1" data-menu-scroll="1"
      data-menu-dropdown-timeout="500">
      <!--begin::Menu Nav-->
      <div id="accordion">
          <ul class="nav flex-column">
              <li class="nav-item {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                  <a href="{{ route('admin.dashboards.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                      </span>
                      <span class="nav-text">Dashboard</span>
                  </a>
              </li>

              @can('view-brand')
              <li class="nav-item {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.brands.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Brands</span>
                  </a>
              </li>
              @endcan
              @can('view-category')
              <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.categories.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M3 3h18v2H3V3zm0 4h18v2H3V7zm0 4h18v2H3v-2zm0 4h18v2H3v-2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Categories</span>
                  </a>
              </li>
              @endcan
              @can('view-unit')
              <li class="nav-item {{ request()->routeIs('admin.units.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.units.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M3 12h18m-9 9h9m-9-9H3"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Units</span>
                  </a>
              </li>
              @endcan
              @can('view-supplier')
              <li class="nav-item {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.suppliers.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M3 3h18v18H3V3z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Suppliers</span>
                  </a>
              </li>
              @endcan
              @can('view-customer')
              <li class="nav-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.customers.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M16 21v-2a4 4 0 0 0-8 0v2"></path>
                              <path d="M12 12c2.21 0 4-2.01 4-4S14.21 4 12 4 8 6.01 8 8s1.79 4 4 4z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Customers</span>
                  </a>
              </li>
              @endcan
              @can('view-product')
              <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.products.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M12 2L2 7v15h20V7l-10-5zm0 15h-2v-2h2v2zm0-4h-2v-2h2v2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Products</span>
                  </a>
              </li>
              @endcan
              @can('view-purchase')
              <li class="nav-item {{ request()->routeIs('admin.purchases.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.purchases.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Purchases</span>
                  </a>
              </li>
              @endcan
              @can('view-sale')
              <li class="nav-item {{ request()->routeIs('admin.sales.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.sales.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Sales</span>
                  </a>
              </li>
              @endcan
              @can('view-role')
              <li class="nav-item {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.roles.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Role</span>
                  </a>
              </li>
              @endcan
              @can('view-staff')
              <li class="nav-item {{ request()->routeIs('admin.staffs.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.staffs.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                          </svg>
                      </span>
                      <span class="nav-text">Staff</span>
                  </a>
              </li>
              @endcan
          </ul>
      </div>
      <!--end::Menu Nav-->
  </div>
  <!--end::Menu Container-->
</div>
