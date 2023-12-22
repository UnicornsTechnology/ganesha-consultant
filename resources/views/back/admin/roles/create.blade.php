@extends('layouts.back.master')
@section('title')
    Roles List
@endsection

@section('content')
    <style>
    </style>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->

                <section class="content">
                    <div class="container-fluid">
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="mr-auto p-2 bd-highlight">
                                                <h3>Roles List</h3>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                            </div>
                                            <div class="p-2 d-flex">
                                                @can('/admin/roles')
                                                    <a href="/admin/roles" class="btn btn-primary">View List</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card-body overflow-auto">
                                        <form action="/admin/roles/store" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>Roles Name </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-at"></i></span>
                                                            </div>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Roles name" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Jobs </h5><span>Select
                                                                        All <input type="checkbox" class="checkbox"
                                                                            id="Dashboard_id"></span>
                                                                </div>
                                                                @foreach ($dashboard_permission as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox Dashboard_id mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Blogs </h5><span>Select
                                                                        All
                                                                        <input type="checkbox" class="checkbox"
                                                                            id="Roles_id"></span>
                                                                </div>
                                                                @foreach ($rolesPermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox Roles_id mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Get Employee Jobs</h5>
                                                                    <span>Select
                                                                        All <input type="checkbox" class="checkbox"
                                                                            id="sub_user_id"></span>
                                                                </div>
                                                                @foreach ($sub_userPermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox sub_user_id mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Working Team </h5>
                                                                    <span>Select
                                                                        All <input type="checkbox" class="checkbox"
                                                                            id="Source_id"></span>
                                                                </div>
                                                                @foreach ($sourcePermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox Source_id mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Canditate </h5>
                                                                    <span>Select All <input type="checkbox" class="checkbox"
                                                                            id="inquiryforid"></span>
                                                                </div>
                                                                @foreach ($inquiryforPermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox inquiryforid mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Roles &
                                                                        Permissions </h5>
                                                                    <span>Select All
                                                                        <input type="checkbox" class="checkbox"
                                                                            id="idcity"></span>
                                                                </div>
                                                                @foreach ($cityPermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox idcity mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Setting </h5>
                                                                    <span>Select All <input type="checkbox"
                                                                            class="checkbox" id="educationid"></span>
                                                                </div>
                                                                @foreach ($educationPermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox educationid mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold">Advertisement & Inquiry & Reports
                                                                    </h5>
                                                                    <span>Select All <input type="checkbox"
                                                                            class="checkbox" id="idpassing_year"></span>
                                                                </div>
                                                                @foreach ($passing_yearPermissions as $permission)
                                                                    <div class="d-flex">
                                                                        <input class="name checkbox idpassing_year mx-2"
                                                                            name="permission[]" type="checkbox"
                                                                            value="{{ $permission->id }}">
                                                                        {{ $permission->fieldname }}
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <div class="col-4 card card-body text-center"
                                                                style="padding: 0px">
                                                                <div class="d-flex justify-content-between bg-success p-2">
                                                                    <h5 class="font-weight-bold text-danger">Permissions
                                                                        All</h5>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <h1><input type="checkbox" id="check-all"
                                                                            class="ml-3 mr-1"> <span
                                                                            class="text-danger"><b> Check All</b></span>
                                                                    </h1>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                        <!-- /.col-lg-6 -->
                                                        <!-- Repeat Above Code -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>
        </div>
        <script>
            // all check
            const checkAll = document.getElementById('check-all');
            const checkboxes = document.querySelectorAll('.checkbox');
            checkAll.addEventListener('change', () => {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = checkAll.checked;
                });
            });
            // only Dashboard
            const Dashboard_id = document.getElementById('Dashboard_id');
            const Dashboard = document.querySelectorAll('.Dashboard_id');
            Dashboard_id.addEventListener('change', () => {
                Dashboard.forEach(checkbox => {
                    checkbox.checked = Dashboard_id.checked;
                });
            });

            // only Roles
            const Roles_id = document.getElementById('Roles_id');
            const Roles = document.querySelectorAll('.Roles_id');
            Roles_id.addEventListener('change', () => {
                Roles.forEach(checkbox => {
                    checkbox.checked = Roles_id.checked;
                });
            });

            // only sub_user
            const sub_user_id = document.getElementById('sub_user_id');
            const sub_user = document.querySelectorAll('.sub_user_id');
            sub_user_id.addEventListener('change', () => {
                sub_user.forEach(checkbox => {
                    checkbox.checked = sub_user_id.checked;
                });
            });

            // only Source
            const Source_id = document.getElementById('Source_id');
            const Source = document.querySelectorAll('.Source_id');
            Source_id.addEventListener('change', () => {
                Source.forEach(checkbox => {
                    checkbox.checked = Source_id.checked;
                });
            });

            // only inquiryfor
            const inquiryforid = document.getElementById('inquiryforid');
            const inquiryfor = document.querySelectorAll('.inquiryforid');
            inquiryforid.addEventListener('change', () => {
                inquiryfor.forEach(checkbox => {
                    checkbox.checked = inquiryforid.checked;
                });
            });

            // only city
            const idcity = document.getElementById('idcity');
            const city = document.querySelectorAll('.idcity');
            idcity.addEventListener('change', () => {
                city.forEach(checkbox => {
                    checkbox.checked = idcity.checked;
                });
            });
            // only city
            const educationid = document.getElementById('educationid');
            const education = document.querySelectorAll('.educationid');
            educationid.addEventListener('change', () => {
                education.forEach(checkbox => {
                    checkbox.checked = educationid.checked;
                });
            });
            // only city
            const idpassing_year = document.getElementById('idpassing_year');
            const passing_year = document.querySelectorAll('.idpassing_year');
            idpassing_year.addEventListener('change', () => {
                passing_year.forEach(checkbox => {
                    checkbox.checked = idpassing_year.checked;
                });
            });

            // only city
            // const idcourse = document.getElementById('idcourse');
            // const course = document.querySelectorAll('.idcourse');
            // idcourse.addEventListener('change', () => {
            //     course.forEach(checkbox => {
            //         checkbox.checked = idcourse.checked;
            //     });
            // });
            // only inquiry_status
            // const idinquiry_status = document.getElementById('idinquiry_status');
            // const inquiry_status = document.querySelectorAll('.idinquiry_status');
            // idinquiry_status.addEventListener('change', () => {
            //     inquiry_status.forEach(checkbox => {
            //         checkbox.checked = idinquiry_status.checked;
            //     });
            // });
            // only demo_class
            // const demo_classid = document.getElementById('demo_classid');
            // const demo_class = document.querySelectorAll('.demo_classid');
            // demo_classid.addEventListener('change', () => {
            //     demo_class.forEach(checkbox => {
            //         checkbox.checked = demo_classid.checked;
            //     });
            // });

            // only inquiry
            // const inquiryid = document.getElementById('inquiryid');
            // const inquiry = document.querySelectorAll('.inquiryid');
            // inquiryid.addEventListener('change', () => {
            //     inquiry.forEach(checkbox => {
            //         checkbox.checked = inquiryid.checked;
            //     });
            // });

            // only follow_up
            // const idfollow_up = document.getElementById('idfollow_up');
            // const follow_up = document.querySelectorAll('.idfollow_up');
            // idfollow_up.addEventListener('change', () => {
            //     follow_up.forEach(checkbox => {
            //         checkbox.checked = idfollow_up.checked;
            //     });
            // });

            // only demo_class_status
            // const iddemo_class_status = document.getElementById('iddemo_class_status');
            // const demo_class_status = document.querySelectorAll('.iddemo_class_status');
            // iddemo_class_status.addEventListener('change', () => {
            //     demo_class_status.forEach(checkbox => {
            //         checkbox.checked = iddemo_class_status.checked;
            //     });
            // });

            // only profile
            // const idprofile = document.getElementById('idprofile');
            // const profile = document.querySelectorAll('.idprofile');
            // idprofile.addEventListener('change', () => {
            //     profile.forEach(checkbox => {
            //         checkbox.checked = idprofile.checked;
            //     });
            // });

            // // only exprot_import
            // const exprot_importid = document.getElementById('exprot_importid');
            // const exprot_import = document.querySelectorAll('.exprot_importid');
            // exprot_importid.addEventListener('change', () => {
            //     exprot_import.forEach(checkbox => {
            //         checkbox.checked = exprot_importid.checked;
            //     });
            // });

            // // only whatsap
            // const whatsappid = document.getElementById('whatsappid');
            // const whatsap = document.querySelectorAll('.whatsappid');
            // whatsappid.addEventListener('change', () => {
            //     whatsap.forEach(checkbox => {
            //         checkbox.checked = whatsappid.checked;
            //     });
            // });
        </script>
    </body>
@endsection
