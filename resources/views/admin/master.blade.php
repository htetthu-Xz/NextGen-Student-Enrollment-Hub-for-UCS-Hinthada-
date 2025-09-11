<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Student Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">

    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('admin-assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .pcolor{
            color: #0a5c70;
            font-weight: bold;
        }
        .profileimg {
            width: 50%;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 3px 3px 3px rgb(156, 255, 27);
        }

        .wbtn {
            background-color: rgb(61, 141, 168);
        }

        .custom-table {
            background-color: transparent;
            width: 100%;
        }

        .custom-table td, .custom-table th {
            border-bottom: 1px solid #0a5c70;
            padding: 10px;
        }
    </style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav wbtn sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('user/images/logo.png') }}" class="mt-5" style="height: 100px;width:100px">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0 mt-4">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a class="nav-link" href="">
                @if (auth()->user()->image)
                    <img class="img-profile rounded-circle object-fit-cover" style="height: 40px; width: 40px"
                         src="{{ asset('storage/images/' . Auth::user()->uuid . '/' . Auth::user()->image) }}">
                @endif
                <span>{{ Auth::user()->name }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-tachometer-alt"></i>
                <span>ပင်မ စာမျက်နှာ</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('notice.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('notice.list')}}">
                <i class="fas fa-users"></i>
                <span>အသိပေးစာ</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.acedimcList') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin.acedimcList')}}">
                <i class="fas fa-users"></i>
                <span>သင်တန်းနှစ်</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('years.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('years.index')}}">
                <i class="fas fa-users"></i>
                <span>ပညာသင်နှစ်</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.list') }}">
                <i class="fas fa-users"></i>
                <span>Student Mail</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.stu.reg.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin.stu.reg.list')}}">
                <i class="fab fa-imdb"></i>
                <span>ကျောင်းအပ်သူများ</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.stu.reg.accept.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.stu.reg.accept.list') }}">
                <i class="fab fa-imdb"></i>
                <span>ကျောင်းအပ်လက်ခံထားမှု</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('fresher.reg.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fresher.reg.list') }}">
                <i class="fab fa-imdb"></i>
                <span>ဝင်ခွင့်လျှောက်ထားမှု</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('students.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('students.list')}}">
                <i class="fas fa-users"></i>
                <span>ကျောင်းသားအားလုံးကြည့်ရန်</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('stop.stu') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('stop.stu')}}">
                <i class="fas fa-users"></i>
                <span>ရပ်နားကျောင်းသားများ</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('transfer.stu') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('transfer.stu')}}">
                <i class="fas fa-users"></i>
                <span>ရွှေ့ပြောင်းကျောင်းသားများ</span>
            </a>
        </li>

        {{-- <li class="nav-item {{ request()->routeIs('admin.get.semester') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin.get.semester')}}">
                <i class="fas fa-users"></i>
                <span>Student Grading</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item {{ request()->routeIs('user.get.calculationForm') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('user.get.calculationForm')}}">
                <i class="fas fa-users"></i>
                <span>Add student Grading</span>
            </a>
        </li> --}}




        <li class="nav-item {{ request()->routeIs('ui.home') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('ui.home')}}">
                <i class="fas fa-users"></i>
                <span>NewFeed</span>
            </a>
        </li>
 <li class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin.profile')}}">
                <i class="fas fa-users"></i>
                <span>မိမိ့အကောင့်</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('logout') ? 'active' : '' }}">
            <a class="nav-link" href="#" onclick="confirmLogout(event)">
                <i class="fab fa-imdb"></i>
                <span>အကောင့်ထွက်ရန်</span>
            </a>
        </li>

        <script>
            function confirmLogout(event) {
                event.preventDefault();
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
            }
        </script>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="height: 100vh !important;">

        <!-- Main Content -->
        <div id="content">
            <div class="bgbg">
                @yield('content')
            </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                     &copy; 2025 UCSH. All Right Reserved
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ asset('admin-assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('admin-assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin-assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin-assets/js/demo/chart-pie-demo.js') }}"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // SweetAlert toast
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    // Show success message
    @if (session('success'))
    Toast.fire({
        icon: 'success',
        title: "{{ session('success') }}"
    });
    @endif

    // Highlight active nav-item
    $(document).ready(function () {
        const currentUrl = window.location.href;

        $('.nav-item').each(function () {
            const route = $(this).data('route');
            if (currentUrl.startsWith(route)) {
                $(this).addClass('active');
            }
        });
    });

    // Show error message
    @if (session('error'))
    Toast.fire({
        icon: 'error',
        title: "{{ session('error') }}"
    });
    @endif
</script>
<script src="{{ asset('plugins/Jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>

    @stack('scripts')


</body>
</html>
