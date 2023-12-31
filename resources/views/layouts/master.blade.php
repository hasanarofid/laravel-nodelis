<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@php
    $profile = App\Models\Profilesistem::find(1);
@endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')  | {{ $profile->title }} </title>


    <!-- Styles -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>


     <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('paneladmin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('paneladmin//assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('paneladmin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('paneladmin/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
   

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

</head>
<body class="g-sidenav-show   bg-gray-100">

  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="card card-profile">
      <img src="{{ asset('paneladmin/assets/img/bg-profile.jpg') }}" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-4 col-lg-4 order-lg-2">
          <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
            <a href="javascript:;">
              <img src="{{ asset('userdefault.jpg') }}" class="rounded-circle img-fluid border border-2 border-white">
            </a>
          </div>
        </div>
      </div>
   
    </div>


    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" {{ route('admin') }} " target="_blank">
       <span class="ms-1 font-weight-bold">{{ Auth::user()->role }}</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
     <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  {{ (request()->is('dashboard')) ? 'active' : '' }}"  href="{{ route('admin') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @if (Auth::user()->role == 'Admin')
          <li class="nav-item">
            <a class="nav-link   {{ (request()->is('admin/testdata*')) ? 'active' : '' }}" href="{{ route('testdata.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Test Data</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link  {{ (request()->is('admin/pasien*')) ? 'active' : '' }} " href="{{ route('pasien.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pasien</span>
            </a>
          </li>

            <li class="nav-item">
            <a class="nav-link  {{ (request()->is('admin/dokter*')) ? 'active' : '' }}" href="{{ route('dokter.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-user-md text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dokter</span>
            </a>
          </li>
{{-- 
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/mastertindakan*')) ? 'active' : '' }}" href="{{ route('mastertindakan.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-solid fa-flask text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Master Tindakan</span>
            </a>
          </li> --}}



            <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/inventory*')) ? 'active' : '' }}" href="{{ route('inventory.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-solid fa-book text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Inventory</span>
            </a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/order*')) ? 'active' : '' }}" href="{{ route('order.list') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Order</span>
            </a>
          </li>
          

       
             

        
          <li class="nav-item">   
            <a class="nav-link  {{ (request()->is('admin/laporan*')) ? 'active' : '' }}" href="{{ route('laporan.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Laporan</span>
            </a>
          </li>


<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="masterTindakanDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-solid fa-flask text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Master Tindakan</span>
    </a>
    <!-- Sub-menu -->
    <div  class="dropdown-menu" aria-labelledby="masterTindakanDropdown">
        <a class="dropdown-item" href="{{ route('paket.index') }}">
            Paket
        </a>
        <a class="dropdown-item" href="{{ route('master-test.index') }}">
            Test
        </a>
        <a class="dropdown-item" href="{{ route('master.index') }}">
            Master
        </a>
        <!-- Add more sub-menu items as needed -->
    </div>
</li>
        @endif

        

      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
                      <p class="text-xs font-weight-bold mb-0">Anda Login sebagai</p>
            <h6 class="mb-0">{{ Auth::user()->role }}</h6>

          </div>
        </div>
      </div>
      <a class="btn btn-dark btn-sm w-100 mb-3" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

    </div>
  </aside>

  {{-- end menu samping --}}
   <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            @yield('breadcrumbs')
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">@yield('subjudul') </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"> {{ Auth::user()->name }}</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            
           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    @yield('content')
  </main>


  <!--   Core JS Files   -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  <script src="{{ asset('paneladmin/assets/js/core/popper.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/core/bootstrap.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/plugins/perfect-scrollbar.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/plugins/smooth-scrollbar.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/plugins/chartjs.min.js') }} "></script>


       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>
<script>

const dropdownMenus = document.querySelectorAll('.nav-item.dropdown');

    // Loop through each dropdown menu
    dropdownMenus.forEach((menu) => {
        // Find the dropdown toggle link within the menu
        const dropdownToggle = menu.querySelector('.nav-link.dropdown-toggle');
        // Find the dropdown menu itself
        const dropdownMenu = menu.querySelector('.dropdown-menu');

        // Add a mouseenter event listener to the dropdown toggle link
        dropdownToggle.addEventListener('mouseenter', () => {
            // Display the dropdown menu
            dropdownMenu.style.display = 'block';
        });

        // Add a mouseleave event listener to the dropdown menu
        dropdownMenu.addEventListener('mouseleave', () => {
            // Hide the dropdown menu
            dropdownMenu.style.display = 'none';
        });
    });

  $.noConflict();
  // Your jQuery code using jQuery directly with "jQuery" instead of "$"
  jQuery(document).ready(function($) {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
   
     
  });
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('paneladmin//assets/js/argon-dashboard.min.js?v=2.0.4') }} "></script>
@yield('js')
    @stack('javascript')


</body>


</html>

