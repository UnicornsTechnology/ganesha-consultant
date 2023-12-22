<!DOCTYPE html>
<html lang="en" data-bs-theme="light1">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('website/images/fav.ico') }}" type="image/x-icon">

    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- loader-->
    {{-- <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script> --}}
    <!--Styles-->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/icons.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/semi-dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/minimal-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/shadow-theme.css') }}" rel="stylesheet" />
</head>

<body>
    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand justify-content-between">
            <div class="btn-toggle-menu">
                <span class="material-symbols-outlined">menu</span>
            </div>

            <ul class="navbar-nav top-right-menu gap-2">
                <li class="nav-item dark-mode">
                    <a class="nav-link dark-mode-icon" href="javascript:;"><span
                            class="material-symbols-outlined">dark_mode</span></a>
                </li>
            </ul>
        </nav>
    </header>
    <!--end header-->

    <!--start sidebar-->
    <aside class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-img" alt="" />
            </div>
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">Royal Marriage Bureau </h5>
            </div>
            <div class="sidebar-close">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav" data-simplebar="true">
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="/login">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/inquiries">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Inquiries</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/image-gallery/list">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Image Gallery</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/banner/list">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Banner</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/trusted-couples/list">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Trusted Couples</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/success-story/list">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Success Story</div>
                    </a>
                </li>
                <li>
                    <a href="/admin/team/list">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Teams</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <div class="sidebar-bottom dropdown dropup-center dropup">
            <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                    @if (auth()->user()->main_profile_pic)
                        <img src="{{ asset('uploads/admin/' . auth()->user()->main_profile_pic) }}" alt="Profile Image"
                            class="img-fluid rounded-circle" style="max-width: 150px;">
                    @else
                        <img src="{{ asset('default-profile-pic.jpg') }}" alt="..." height="210" width="200"
                            class="img-thumbnail">
                    @endif
                </div>
                <div class="user-info">
                    <h5 class="mb-0 user-name">{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="/admin/profile"><span class="material-symbols-outlined me-2">
                            account_circle </span><span>Profile</span></a>
                </li>
                <li>
                    <div class="dropdown-divider mb-0"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="material-symbols-outlined me-2"> logout </span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!--end sidebar-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!--start main content-->
    <main class="page-content">
        @yield('content')
    </main>
    <!--end main content-->

    <!--start overlay-->
    <div class="overlay btn-toggle-menu"></div>
    <!--end overlay-->
    <!--plugins-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    {{-- summer note links --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>
    <script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>

    <!--BS Scripts-->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src='{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}'></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin/assets/plugins/select2/js/select2-custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,

                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $('#plan_feature').summernote();
        });
    </script>


</body>

</html>
