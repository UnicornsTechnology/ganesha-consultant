@extends('layouts.back.master')
@section('title')
    Employee Create
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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
                    <form action="/admin/team/create" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @if (session('msg'))
                                        <div class="alert alert-success">
                                            {{ session('msg') }}
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="card-header text-right">
                                            <h3 class="card-title mt-1">Create Employee</h3>
                                            <a href="/admin/team/index" class="btn btn-success">Employee List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-sm-6 mt-3">
                                                        <label>Employee Name</label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label> Mobile No</label>
                                                        <input type="text" class="form-control" name="mobile_no"
                                                            required>
                                                    </div>


                                                    <div class="col-sm-6 mt-3">
                                                        <label> Email ID </label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Enter Email ID">
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label> Password </label>
                                                        <input type="text" name="password" class="form-control"
                                                            placeholder="Enter Password">
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Role </label>
                                                        <select name="roles" class="js-example-basic-single col-sm-12">
                                                            @foreach ($roles as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    </body>
@endsection
