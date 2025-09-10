<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <meta name="keywords" content="smart register" />
  <meta name="description" content="Step to a Brighter Future in ICT" />
  <meta name="author" content="UCSH" />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="Smart Register" />
  <meta property="og:description" content="Step to a Brighter Future in ICT" />
  <meta property="og:image" content="{{ asset('user/images/logo.png') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="Smart Register" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Smart Register" />
  <meta name="twitter:description" content="Step to a Brighter Future in ICT" />
  <meta name="twitter:image" content="{{ asset('user/images/logo.png') }}" />
  <meta name="twitter:site" content="@yourtwitterhandle" />
  <meta name="twitter:creator" content="@yourtwitterhandle" />

  <meta itemprop="name" content="Smart Register" />
  <meta itemprop="description" content="Step to a Brighter Future in ICT" />
  <meta itemprop="image" content="{{ asset('user/images/logo.png') }}" />



  <!-- Telegram -->
  <meta name="telegram:title" content="Smart Register" />
  <meta name="telegram:description" content="Step to a Brighter Future in ICT" />
  <meta name="telegram:image" content="{{ asset('user/images/logo.png') }}" />

  <!-- Additional SEO -->
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <link rel="shortcut icon" href="{{ asset('user/images/favicon.png') }}" type="">

  <title>Smart Register</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.css') }}" />

  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- Owl Carousel stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- Font Awesome style -->
  <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />
  <!-- Responsive style -->
  <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.min.css">
   <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Css/paper-bootstrap-wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/themify-icons.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <style>
    /* body {
      background-color: rgb(61, 141, 168);
    } */

    .pcolor {
      color: rgb(8, 59, 77);
    }

    .content {
      padding-top: 80px; /* Adjust this value if needed */
    }

    .navbar {
       /* Transparent blue background */
      backdrop-filter: blur(5px);
      padding: 20px;
      border-bottom: 1px solid rgb(7, 85, 90);
    }

    .nav-item.active a {
      color: #ffffff; /* White color for active nav link */
      font-weight: bold; /* Bold font for active nav link */
    }
    .custom-table {
        background-color: transparent;
        width: 100%;
    }

    .custom-table td, .custom-table th {
        border-bottom: 1px solid #0a5c70; /* Add bottom border to each td and th */
        padding: 10px; /* Add padding for cell content */
    }

    .header_section {
      padding: 0;
    }
      @media (max-width: 991.98px) {
        .navbar-brand span {
          font-size: 0.9rem;
        }
        .navbar-nav .nav-link {
          padding-left: 1rem;
          padding-right: 1rem;
          text-align: left;
        }
        .navbar-nav .dropdown-menu {
          position: static !important;
          float: none;
        }
        .navbar-nav .nav-item {
          width: 100%;
        }
        .navbar-nav .dropdown-toggle .d-lg-inline {
          display: inline !important;
        }
      }
      @media (max-width: 575.98px) {
        .navbar-brand span {
          font-size: 0.8rem;
        }
        .navbar-brand img {
          height: 32px !important;
          width: 32px !important;
        }
        .navbar-nav .nav-link {
          font-size: 0.95rem;
        }
      }
  </style>
  @stack('css')
</head>

<body>

@php
  use App\Helper\Facades\File;
@endphp

  <div class="hero_area" style="background: none !important;">
    <div class="hero_bg_box">

    </div>

    <!-- Header section starts -->
<header class="header_section fixed-top">
  <div class="container-fluid" style="background-color: rgb(14, 98, 131);">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="{{ route('ui.home') }}">
        <span style="font-size: 1.3rem;">Smart Register UCSH</span>
      </a>

      <!-- Mobile toggle -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto align-items-lg-center">
          <li class="nav-item mx-1 {{ request()->routeIs('ui.home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ui.home') }}">ပင်မစာမျက်နှာ</a>
          </li>
          <li class="nav-item mx-1 {{ request()->routeIs('ui.noticeAll') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ui.noticeAll') }}">အသိပေးစာများ</a>
          </li>
          <li class="nav-item mx-1 {{ request()->routeIs('ui.contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ui.contact') }}">ဆက်သွယ်ရန်</a>
          </li>
          {{-- <li class="nav-item mx-1 {{ request()->routeIs('fresher.register') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fresher.register') }}">ဝင်ခွင့်လျှောက်ရန်</a>
          </li> --}}

          @if(Auth::check())
            @if(Auth::user()->role=="user")
              <li class="nav-item {{ request()->routeIs('stu.reg') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('stu.reg') }}">ကျောင်းအပ်ရန်</a>
              </li>
              <li class="nav-item {{ request()->routeIs('history') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('history') }}">History</a>
              </li>
            @endif
          @else
            {{-- <li class="nav-item {{ request()->routeIs('ui.login') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('ui.login') }}">အကောင့်၀င်ရန်</a>
            </li> --}}
          @endif

          @if(Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset(File::GetStudentDataPath() . Auth::user()->image) }}"
                  class="rounded-circle mr-2" style="width: 30px; height: 30px;" alt="User">
                <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                @if(Auth::user()->role == 'admin')
                  <a href="{{route('admin.index')}}" class="dropdown-item mt-2">Admin DashBoard</a>
                @endif
                <a href="#" class="dropdown-item mt-2" id="logout-link">အကောင့်ထွက်ရန်</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <script>
                  document.getElementById('logout-link').addEventListener('click', function(e) {
                  e.preventDefault();
                  Swal.fire({
                    title: '<span style="font-size:16px;">လော့ခ်အောက် ထွက်ရန်သေချာပါသလား</span>',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<span style="font-size:13px; padding:2px 10px;">ထွက်ရန်</span>',
                    cancelButtonText: '<span style="font-size:13px; padding:2px 10px;">မထွက်တော့ပါ</span>',
                    icon: null,
                    width: 300,
                    customClass: {
                        confirmButton: 'py-1 px-2',
                        cancelButton: 'py-1 px-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('logout') }}';
                    }
                });
                  });
                </script>
              </div>
            </li>
          @endif

        </ul>
      </div>
    </nav>
  </div>
</header>

    <!-- End header section -->

    <!-- Image Preview Modal -->
      <div class="modal fade mt-5" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="imageModalLabel">Preview</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid rounded" alt="Preview" style="max-height: 70vh; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>

    <!-- Slider section -->
    <div class="content" style="min-height: 700px;">
      @yield('content')
    </div>

    <section class="footer_section fixed-bottom" style="background-color: rgb(14, 98, 131)">
      <div class="container">
        <p class="text-white">
            © {{ date('Y') }} UCSH. All Rights Reserved
        </p>
      </div>
    </section>
    <!-- End about section -->
  </div>


  <script type="text/javascript" src="{{ asset('user/js/jquery-3.4.1.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script type="text/javascript" src="{{ asset('user/js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script type="text/javascript" src="{{ asset('user/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
  <script src="{{ asset('js/jquery.bootstrap.wizard.js') }}"></script>
  <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('js/paper-bootstrap-wizard.js') }}"></script>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
      }
    });

    // Display success message if session success exists
    @if (session('success'))
    Toast.fire({
      icon: 'success',
      title: "{{ session('success') }}"
    });
    @endif

    // Add active class to nav items based on current URL
    $(document).ready(function () {
      const currentUrl = window.location.href;

      $('.nav-item').each(function () {
        const route = $(this).data('route');
        if (currentUrl.startsWith(route)) {
          $(this).addClass('active');
        }
      });
    });

    @if (session('error'))
    Toast.fire({
      icon: 'error',
      title: "{{ session('error') }}"
    });
    @endif
  </script>

  @stack('scripts')
</body>
</html>
