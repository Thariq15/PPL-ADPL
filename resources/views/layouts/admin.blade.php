<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - {{ Auth::user()->position }} | Ngopi Sedoyo</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("/assets/img/favicon/favicon.ico") }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset("/assets/vendor/fonts/boxicons.css") }}" />
    <link rel="stylesheet" href="{{ asset("/assets/vendor/css/core.css") }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset("/assets/vendor/css/theme-default.css") }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset("/assets/css/demo.css") }}" />
    <link rel="stylesheet" href="{{ asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}" />

    <link rel="stylesheet" href="{{ asset("/assets/vendor/libs/apex-charts/apex-charts.css") }}" />
    <script src="{{ asset("/assets/vendor/js/helpers.js") }}"></script>
    <script src="{{ asset("/assets/js/config.js") }}"></script>
    <!-- Scripts -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  



  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/dashboard" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">NgopSe</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            @if (Auth::user()->position == 'Karyawan')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Kasir</span></li>

              <!-- Dashboard -->
              <li class="menu-item">
                <a href="{{ route('menu') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Menu</div>
                </a>
              </li>

              <!-- Dashboard -->
              <li class="menu-item">
                <a href="{{ route('kasir') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Pesanan</div>
                </a>
              </li>

              <!-- Dashboard -->
              <li class="menu-item">
                <a href="{{ route('menu') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Riwayat Pesanan</div>
                </a>
              </li>
            @endif

            @if (Auth::user()->position != 'Karyawan')                
              <!-- Components -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Product</span></li>

              <!-- Layouts -->
              @if (Auth::user()->position == 'Admin Caffe')  
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Menu</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('menu') }}" class="menu-link">
                        <div data-i18n="Without menu">Semua Menu</div>
                      </a>
                    </li>
                  </ul>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('menu.add') }}" class="menu-link">
                        <div data-i18n="Without menu">Tambah Menu</div>
                      </a>
                    </li>
                  </ul>
                </li>
              @endif
              

              @if (Auth::user()->position == 'Admin Kopi')  
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Produk</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('product') }}" class="menu-link">
                        <div data-i18n="Without menu">Semua Produk</div>
                      </a>
                    </li>
                  </ul>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('product.add') }}" class="menu-link">
                        <div data-i18n="Without menu">Tambah Produk</div>
                      </a>
                    </li>
                  </ul>
                </li>
              @endif
            @endif

            @if(Auth::user()->position == "Admin Caffe")
              <!-- Components -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Supplier</span></li>
              <li class="menu-item">
                <a href="/dashboard" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Supply</div>
                </a>
              </li>
            @endif
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset(Auth::user()->profile) }}" alt class="w-px-40 h-px-40 rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset(Auth::user()->profile) }}" alt class="w-px-40 h-px-40 rounded-circle " />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                            <small class="text-muted">{{ Auth::user()->position }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                              <i class="bx bx-power-off me-2"></i>
                              <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">PPL</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>


    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset("/assets/vendor/libs/jquery/jquery.js") }}"></script>
    <script src="{{ asset("/assets/vendor/libs/popper/popper.js") }}"></script>
    <script src="{{ asset("/assets/vendor/js/bootstrap.js") }}"></script>
    <script src="{{ asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>

    <script src="{{ asset("/assets/vendor/js/menu.js") }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset("/assets/vendor/libs/apex-charts/apexcharts.js") }}"></script>

    <!-- Main JS -->
    <script src="{{ asset("/assets/js/main.js") }}"></script>

    <!-- Page JS -->
    <script src="{{ asset("/assets/js/dashboards-analytics.js") }}"></script>
    <!-- Page JS -->
    <script src="{{ asset("/assets/js/ui-modals.js")}}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    @yield("scripts")

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
