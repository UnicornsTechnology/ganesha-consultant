<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>@yield('title') | Job Portal </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{ asset('back_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('back_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('back_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('back_assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back_assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('back_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('back_assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('back_assets/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('back_assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('back_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"
        integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/b-2.1.1/b-html5-2.1.1/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>


            </ul>

            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav ml-auto">
                    <li class=" nav-item d-none d-sm-inline-block btn btn-space">

                        <a href="/" class="btn btn-primary">Home <i class="fas fa-home"></i></a>

                    </li>

                </ul>
                <li class="nav-item btn btn-space">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="btn btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                              this.closest('form').submit();">
                            Logout <i class="fas fa-sign-out-alt"></i>
                        </a>


                    </form>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class=" mt-3 pb-3 mb-3 ">
                    <div class="image">
                            <img src="{{ asset('logo.png') }}" alt="User Image" height="80px" width="230px">
                    </div>

                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (Gate::check('/admin/settings/job-categories/list'))
                            @can('/admin/settings/job-categories/list')
                                <li class="nav-item">
                                    <a href="/admin/settings/job-categories/list" class="nav-link">
                                        <i class=" nav-icon fas fa-infinity"></i>
                                        <p>
                                            Job Categories
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        @endif
                        @if (Gate::check('/admin/jobs/list') || Gate::check('/admin/job/create'))
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fa fas fa-address-card"></i>
                                    <p>
                                        Jobs Create
                                        <i class="fas fa-angle-left right"></i>

                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('/admin/jobs/list')
                                        <li class="nav-item">
                                            <a href="/admin/jobs/list" class="nav-link">
                                                <p>&#8594; Jobs List</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/job/create')
                                        <li class="nav-item">
                                            <a href="/admin/job/create" class="nav-link">
                                                <p>&#8594; Job Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif
                        @if (Gate::check('/admin/settings/job-title/list') ||
                                Gate::check('/admin/settings/experience/list') ||
                                Gate::check('/admin/settings/skills/list') ||
                                Gate::check('/admin/settings/locations/list') ||
                                Gate::check('/admin/settings/company-name/list') ||
                                Gate::check('/admin/settings/education/list') ||
                                Gate::check('/admin/settings/job-type/list'))
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class=" nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Settings
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('/admin/settings/job-title/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/job-title/list" class="nav-link">
                                                <p>&#8594; Job Titles</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('/admin/settings/experience/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/experience/list" class="nav-link">
                                                <p>&#8594; Experiences</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/settings/skills/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/skills/list" class="nav-link">
                                                <p>&#8594; Skills</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/settings/locations/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/locations/list" class="nav-link">
                                                <p>&#8594 Locations</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/settings/company-name/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/company-name/list" class="nav-link">
                                                <p>&#8594 Company Names</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/settings/education/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/education/list" class="nav-link">
                                                <p>&#8594 Education </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/settings/job-type/list')
                                        <li class="nav-item">
                                            <a href="/admin/settings/job-type/list" class="nav-link">
                                                <p>&#8594 Job Type </p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif

                        @if (Gate::check('/admin/inquiry/list'))
                            @can('/admin/inquiry/list')
                                <li class="nav-item">
                                    <a href="/admin/inquiry/list" class="nav-link">
                                        <i class=" nav-icon fas fa-infinity"></i>
                                        <p>
                                            Inquiry
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        @endif
                        @if (Gate::check('/admin/students/list/{type}'))
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class=" nav-icon fas fa-users"></i>
                                    <p>
                                        Candidate
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('/admin/students/list/{type}')
                                        <li class="nav-item">
                                            <a href="/admin/students/list/All" class="nav-link">
                                                <p>&#8594; Candidate List</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endif

                        @if (Gate::check('/admin/employee/list'))
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class=" nav-icon fas fa-vest"></i>
                                    <p>
                                        Get Jobs Employees
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('/admin/employee/list')
                                        <li class="nav-item">
                                            <a href="/admin/employee/list" class="nav-link">
                                                <p>&#8594; List Employees</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif
                        @if (Gate::check('/admin/team/index') || Gate::check('/admin/roles'))
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class=" nav-icon fas fa-user-plus"></i>
                                    <p>
                                        Team
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('/admin/team/index')
                                        <li class="nav-item">
                                            <a href="/admin/team/index" class="nav-link">
                                                <p>&#8594; List Team</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('/admin/roles')
                                        <li class="nav-item">
                                            <a href="/admin/roles" class="nav-link">
                                                <p>&#8594; Roles &
                                                    Permissions</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif
                        @if (Gate::check('/admin/most_view/job'))
                            @can('/admin/most_view/job')
                                <li class="nav-item">
                                    <a href="/admin/most_view/job" class="nav-link">
                                        <i class=" nav-icon fas fa-infinity"></i>
                                        <p>
                                            Report
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        @endif

                        <li class="nav-item">
                            <a href="/admin/career-at-gc" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Career At GC
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/job-provider" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Job Provider
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/job-seeker" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Job Seeker
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="/admin/profile" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <br><br><br>
                        <!-- /.sidebar -->
        </aside>


        @yield('content')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright © 2023 <a href="/" target="_blank">Ganesha Consultant</a>.</strong>
            All
            rights
            reserved.
            &nbsp; &nbsp; &nbsp;
            Designed by <a href="https://unicornstechnology.com/" target="_blank">Unicorns Technology</a>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="{{ asset('back_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('back_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('back_assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('back_assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('back_assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('back_assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('back_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('back_assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('back_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('back_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('back_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('back_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back_assets/dist/js/adminlte.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('back_assets/dist/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('back_assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/b-2.1.1/b-html5-2.1.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    {{-- dropdon menu --}}

    <script src="{{ asset('back_assets/docs/script.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
</body>

</html>
