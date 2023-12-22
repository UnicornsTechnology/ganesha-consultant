<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

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
                <li class="nav-item dropdown dropdown-app">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                        href="javascript:;"><span class="material-symbols-outlined"> apps </span></a>
                    <div class="dropdown-menu dropdown-menu-end mt-lg-2 p-0">
                        <div class="app-container p-2 my-2">
                            <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/slack.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Slack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/behance.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Behance</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/google-drive.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Dribble</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/outlook.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Outlook</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/github.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">GitHub</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/stack-overflow.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Stack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/figma.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Stack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/twitter.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Twitter</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/google-calendar.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Calendar</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/spotify.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Spotify</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/google-photos.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Photos</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/pinterest.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Photos</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/linkedin.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">linkedin</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/dribble.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Dribble</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/youtube.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">YouTube</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/google.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">News</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/envato.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Envato</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="{{ asset('admin/assets/images/icons/safari.png') }}"
                                                    width="30" alt="" />
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Safari</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </li>
                <!-- Add this inside your Blade template -->

                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="position-relative">
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span class="notify-badge">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                            <span class="material-symbols-outlined">
                                notifications_none
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <p class="msg-header-title">Notifications</p>
                                <p class="msg-header-clear ms-auto">
                                    <a href="/admin/mark-all-as-read">Mark All As read</a>
                                </p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                                <a class="dropdown-item" href="/admin/mark-as-read/{{ $notification->id }}">
                                    <div class="d-flex align-items-center">
                                        <div class="notify text-{{ $notification->data['type'] }} border">
                                            <span class="material-symbols-outlined">
                                                notifications
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                {{ $notification->data['message'] }}
                                                <span
                                                    class="msg-time float-end">{{ $notification->created_at->diffForHumans() }}</span>
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center mt-3">No notifications</div>
                            @endforelse
                        </div>

                    </div>
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
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">shopping_cart</span>
                        </div>
                        <div class="menu-title">Members</div>
                    </a>
                    <ul>
                        <li>
                            <a href="/admin/all-members"><span class="material-symbols-outlined">arrow_right</span>All
                                Members</a>
                        </li>
                        <li>
                            <a href="/admin/all-brides"><span class="material-symbols-outlined">arrow_right</span>
                                Brides</a>
                        </li>
                        <li>
                            <a href="/admin/all-grooms"><span class="material-symbols-outlined">arrow_right</span>
                                Grooms</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="/admin/match-making">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Profile Match Making</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">shopping_cart</span>
                        </div>
                        <div class="menu-title">Membership Plans</div>
                    </a>
                    <ul>
                        <li>
                            <a href="/admin/membership/plans-list"><span
                                    class="material-symbols-outlined">arrow_right</span>Plans List</a>
                        </li>
                        <li>
                            <a href="/admin/membership/plans-purchased-list"><span
                                    class="material-symbols-outlined">arrow_right</span>Purchase Plans</a>
                        </li>
                    </ul>
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
                        <img src="{{ asset('uploads/admin/' . auth()->user()->main_profile_pic) }}"
                            alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 150px;">
                    @else
                        <img src="{{ asset('default-profile-pic.jpg') }}" alt="..." height="210"
                            width="200" class="img-thumbnail">
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
