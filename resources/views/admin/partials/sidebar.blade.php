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

              @can('brands')
              <li class="nav-item {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.brands.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M12 2L2 7v6c0 5.5 3.8 10.7 10 13 6.2-2.3 10-7.5 10-13V7l-10-5z"/>
                            </svg>
                      </span>
                      <span class="nav-text">Brands</span>
                  </a>
              </li>
              @endcan
              @can('colors')
              <li class="nav-item {{ request()->routeIs('admin.colors.*') ? 'active' : '' }}">
                <a href="{{ route('admin.colors.index') }}" class="nav-link">
                    <span class="svg-icon nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Colors</span>
                </a>
            </li>
            @endcan
              @can('categories')
              <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.categories.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M20 6H10l-2-2H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2z"></path> <!-- Folder icon -->
                            </svg>
                      </span>
                      <span class="nav-text">Categories</span>
                  </a>
              </li>
              @endcan
              @can('units')
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
              @can('suppliers')
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
              @can('customers')
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
              @can('products')
              <li class="nav-item {{ request()->routeIs('admin.products.index', 'admin.products.create') ? 'active' : '' }}">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M4 2H20a2 2 0 0 1 2 2v18a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"></path> <!-- Box shape -->
                            </svg>
                      </span>
                      <span class="nav-text">Products</span>
                  </a>
              </li>
              @endcan
              @can('deleted-products')
              <li class="nav-item {{ request()->routeIs('admin.products.deleted_products') ? 'active' : '' }}">
                  <a href="{{ route('admin.products.deleted_products') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M6 2L4 6h16l-2-4h-8zm12 4H6l1 14h10l1-14z"></path> <!-- Shopping bag icon -->
                          </svg>
                      </span>
                      <span class="nav-text">Deleted Products</span>
                  </a>
              </li>
              @endcan
              @can('purchases')
              <li class="nav-item {{ request()->routeIs('admin.purchases.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.purchases.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M6 6h12l-1.5 9H7.5z"></path> <!-- Cart Body -->
                              <circle cx="9" cy="19" r="2"></circle> <!-- Left Wheel -->
                              <circle cx="15" cy="19" r="2"></circle> <!-- Right Wheel -->
                            </svg>
                      </span>
                      <span class="nav-text">Purchases</span>
                  </a>
              </li>
              @endcan
              @can('sales')
              <li class="nav-item {{ request()->routeIs('admin.sales.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.sales.index') }}" class="nav-link">
                      <span class="svg-icon nav-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M12 2v20M5 12h14"></path> <!-- Cross Shape -->
                              <circle cx="12" cy="12" r="8" /> <!-- Circle Around Dollar -->
                              <path d="M12 9c-1.5 0-2 1-2 2s0 2 2 2c1 0 2-.5 2-2s-1-2-2-2z"></path> <!-- Dollar Sign Shape -->
                          </svg>
                      </span>
                      <span class="nav-text">Sales</span>
                  </a>
              </li>
              @endcan
              @can('roles')
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
              @can('staff')
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
              @can('logs')
              <li class="nav-item {{ request()->routeIs('admin.logs.*') ? 'active' : '' }}">
                <a href="{{ route('admin.logs.index') }}" class="nav-link">
                    <span class="svg-icon nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Logs</span>
                </a>
            </li>
            @endcan
            @can('material-requistions')
              <li class="nav-item {{ request()->routeIs('admin.material_requisitions.index', 'admin.material_requisitions.create') ? 'active' : '' }}">
                <a href="{{ route('admin.material_requisitions.index') }}" class="nav-link">
                    <span class="svg-icon nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Material Requisition</span>
                </a>
            </li>
            @endcan
            @can('material-requistions')
              <li class="nav-item {{ request()->routeIs('admin.material_requisitions.all') ? 'active' : '' }}">
                <a href="{{ route('admin.material_requisitions.all') }}" class="nav-link">
                    <span class="svg-icon nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">All Material Requisition</span>
                </a>
            </li>
            @endcan
            @can('lpo')
              <li class="nav-item {{ request()->routeIs('admin.material_requisitions.lpo') ? 'active' : '' }}">
                <a href="{{ route('admin.material_requisitions.lpo') }}" class="nav-link">
                    <span class="svg-icon nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">LPO</span>
                </a>
            </li>
            @endcan
          </ul>
      </div>
      <!--end::Menu Nav-->
  </div>
  <!--end::Menu Container-->
</div>
