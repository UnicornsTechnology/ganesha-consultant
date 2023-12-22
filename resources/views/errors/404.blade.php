<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404</title>

    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
    <!--Styles-->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/icons.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="bg-error">

    <!-- Start wrapper-->
    <div class="pt-5">

        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-lg-12">
                    <div class="text-center error-pages">
                        <h1 class="error-title text-primary mb-3">404</h1>
                        <h2 class="error-sub-title text-white">404 NOT FOUND</h2>

                        <p class="error-message text-white text-uppercase">SORRY, AN ERROR HAS OCCURED, REQUESTED PAGE
                            NOT FOUND!</p>

                        <div class="mt-4 d-flex align-items-center justify-content-center gap-3">
                            <a href="{{ url()->previous() }}" class="btn btn-primary rounded-5 px-4"><i
                                    class="bi bi-house-fill me-2"></i>Go To Home</a>
                        </div>

                        <div class="mt-4">
                            <p class="text-light">Copyright © 2022 | All rights reserved.</p>
                        </div>
                        <hr class="border-light border-2">
                        <div class="list-inline contacts-social mt-4">
                            <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i
                                    class="bi bi-twitter"></i></a>
                            <a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i
                                    class="bi bi-google"></i></a>
                            <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>

    </div><!--wrapper-->



</body>

</html>
