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
    <link rel="stylesheet" href="{{asset("../assets/vendor/fonts/boxicons.css")}}" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="{{ asset("/assets/vendor/css/core.css") }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset("/assets/vendor/css/theme-default.css") }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset("/assets/css/demo.css") }}" />
    <link rel="stylesheet" href="{{ asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}" />

    <link rel="stylesheet" href="{{ asset("/assets/vendor/libs/apex-charts/apex-charts.css") }}" />
    <script src="{{ asset("/assets/vendor/js/helpers.js") }}"></script>
    <script src="{{ asset("/assets/js/config.js") }}"></script>
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
    <!-- Form Validation -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
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
              <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            @if (Auth::user()->position == 'Karyawan')
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Produk</span></li>

              <!-- Dashboard -->
              <li class="menu-item">
                <a href="{{ route('menu') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Produk</div>
                </a>
              </li>

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Working</span></li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Absensi</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('absensi.add') }}" class="menu-link">
                      <div data-i18n="Without menu">Menambah Absensi</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('absensi') }}" class="menu-link">
                      <div data-i18n="Without menu">Melihat Absensi</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Shift Kerja</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('shift') }}" class="menu-link">
                      <div data-i18n="Without menu">Melihat Absensi</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Kasir</span></li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Kasir</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('kasir.add') }}" class="menu-link">
                      <div data-i18n="Without menu">Menambah Data Pesanan</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('kasir') }}" class="menu-link">
                      <div data-i18n="Without menu">Melihat Data pesanan</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('kasir.riwayat') }}" class="menu-link">
                      <div data-i18n="Without menu">Riwayat Data pesanan</div>
                    </a>
                  </li>
                </ul>
              </li>

            @endif

             
              <!-- Components -->
              
              <!-- Layouts -->
            @if (Auth::user()->position == 'Admin Caffe')  
              {{-- DONE --}}
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Product</span></li>
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

              {{-- DONE --}}
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Supply</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('supply') }}" class="menu-link">
                      <div data-i18n="Without menu">Semua Suplier</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('supply.add') }}" class="menu-link">
                      <div data-i18n="Without menu">Tambah Suplier</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuangan</span></li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Manajemen Keuangan</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('keuangan') }}" class="menu-link">
                      <div data-i18n="Without menu">Semua Keuangan</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('keuangan.add') }}" class="menu-link">
                      <div data-i18n="Without menu">Tambah Rekap Keuangan</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Karyawan</span></li>
              {{-- DOING --}}
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Shift Kerja</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('shift') }}" class="menu-link">
                      <div data-i18n="Without menu">Semua Shift Kerja</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('shift.add') }}" class="menu-link">
                      <div data-i18n="Without menu">Tambah Shift Kerja</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Absensi</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('absensi') }}" class="menu-link">
                      <div data-i18n="Without menu">Semua Absensi</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Penggajian</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('gaji') }}" class="menu-link">
                      <div data-i18n="Without menu">Semua Penggajian</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('gaji.add') }}" class="menu-link">
                      <div data-i18n="Without menu">Tambah Penggajian</div>
                    </a>
                  </li>
                </ul>
              </li>
            @endif

              

              @if (Auth::user()->position == 'Admin Kopi')  
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Produk</span></li>

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


                <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuangan</span></li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Manajemen Keuangan</div>
                  </a>
  
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('keuangan') }}" class="menu-link">
                        <div data-i18n="Without menu">Semua Keuangan</div>
                      </a>
                    </li>
                  </ul>
  
                  {{-- <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('keuangan.add') }}" class="menu-link">
                        <div data-i18n="Without menu">Rekap Keuangan</div>
                      </a>
                    </li>
                  </ul> --}}
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Transaksi</div>
                  </a>
  
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('transaksi') }}" class="menu-link">
                        <div data-i18n="Without menu">Semua Transaksi</div>
                      </a>
                    </li>
                  </ul>
  
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('transaksi.riwayat') }}" class="menu-link">
                        <div data-i18n="Without menu">Riwayat Transaksi</div>
                      </a>
                    </li>
                  </ul>
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

      <!-- Vendors JS -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
      <!-- Page JS -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/tables-datatables-basic.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->
    @yield("scripts")

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
