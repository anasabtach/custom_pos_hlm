<div id="tc_header" class="header header-fixed">
  <!--begin::Container-->
  <div class="container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::Header Menu Wrapper-->
    <div class="header-menu-wrapper header-menu-wrapper-left" id="tc_header_menu_wrapper">
      <!--begin::Header Menu-->
      <div id="tc_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
        <!--begin::Header Nav-->
        <ul class="menu-nav">

            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active p-0"
            data-menu-toggle="click" aria-haspopup="true">
            <!--begin::Toggle-->
            <div class="btn  btn-clean btn-dropdown mr-0 p-0" id="tc_aside_toggle">
              <span class="svg-icon svg-icon-xl svg-icon-primary">

                <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-list"
                  fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
              </span>
            </div>
            <!--end::Toolbar-->
          </li>

        </ul>
        <!--end::Header Nav-->
      </div>
      <!--end::Header Menu-->
    </div>
    <!--end::Header Menu Wrapper-->
    <!--begin::Topbar-->
    <div class="topbar">
      <div class="posicon d-lg-block d-none">
        <a href="{{ route('admin.pos.index') }}" class="btn btn-primary white me-2">POS</a>
      </div>




      <!--begin::Quick panel-->
      {{-- <div class="topbar-item">
        <div class="btn btn-icon btn-clean  me-1" id="tc_quick_panel_toggle">
          <span class="svg-icon svg-icon-xl svg-icon-primary">

            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-people"
              fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
            </svg>
          </span>
          <span class="badge badge-pill badge-secondary">5</span>
        </div>
      </div> --}}
      <!--end::Quick panel-->


      <!--begin::Notifications-->
      <div class="dropdown">

        {{-- <div class="topbar-item" data-bs-toggle="dropdown" data-display="static">
          <div class="btn btn-icon btn-clean btn-dropdown me-1">
            <div class="svg-icon svg-icon-xl svg-icon-primary" title="Notification">

              <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-bell"
                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                <path fill-rule="evenodd"
                  d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
              </svg>
              <div class="lds-ripple">
                <div></div>
                <div></div>
              </div>
            </div>
            <span class="badge badge-pill badge-primary">5</span>
          </div>
        </div> --}}

        <div class="dropdown-menu p-0 m-0 dropdown-menu-right w-300px">
          <form>

            <div class="d-flex flex-column p-3 border-bottom rounded-top">

              <h4
                class="d-flex justify-content-between align-items-center mb-0 rounded-top">
                <span class="font-size-h5 ">Notifications</span>
                <a href="#" class="btn btn-sm btn-primary-hover py-1 px-2">
                  Clear
                </a>
              </h4>

            </div>

            <div class="nav nav-hover scrollbar-1 ">

              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-cog text-primary"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-archive text-secondary"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-plane text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-plane text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-plane text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-plane text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-plane text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-plane text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="nav-item border-bottom">
                <div class="nav-link">
                  <div class="nav-icon me-3">
                    <i class="fas fa-daimond text-success"></i>
                  </div>
                  <div class="nav-text">
                    <div class="font-weight-bold">New report has been received</div>
                    <div class="text-muted">23 hrs ago</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="d-flex flex-column p-3 rounded-top">

              <h4 class="d-flex justify-content-center mb-0  rounded-top">
                <a href="#" class="font-size-base text-primary">View All</a>

              </h4>

            </div>

          </form>
        </div>

      </div>
      <!--end::Notifications-->



      <!--begin::user-->
      <div class="dropdown">

        <div class="topbar-item" data-bs-toggle="dropdown" data-display="static">
          <div class="btn btn-icon w-auto btn-clean d-flex align-items-center pr-1 ps-3">
            <span class="text-dark-50 font-size-base d-none d-xl-inline me-3">{{ auth()->user()->full_name }}</span>
            <span class="symbol symbol-35 symbol-light-success">
              <span class="symbol-label font-size-h5 ">
                <img src="{{ getImage(auth()->user()->profileImage->filename) ?? null }}" class="rounded1" alt="" height="50px" width="50px">
                {{-- <svg width="20px" height="20px" viewBox="0 0 16 16"
                  class="bi bi-person-fill" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
              </span> --}}
            </span>
          </div>
        </div>

        <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">

          <a href="{{ route('admin.profile') }}" class="dropdown-item">
            <span class="svg-icon svg-icon-xl svg-icon-primary me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </span>
            Edit Profile
          </a>

          <a href="{{ route('admin.logout') }}" class="dropdown-item">
            <span class="svg-icon svg-icon-xl svg-icon-primary me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-power">
                <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                <line x1="12" y1="2" x2="12" y2="12"></line>
              </svg>
            </span>
            Logout
          </a>
        </div>

      </div>
      <!--end::user-->


    </div>
    <!--end::Topbar-->
  </div>
  <!--end::Container-->
</div>