@extends('layouts.back.master')
@section('title')
    Create Package
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
                    <form action="/admin/package/store" method="post">
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
                                            <h3 class="card-title mt-1">Admin Package Create</h3>
                                            <a href="/admin/Package/list" class="btn btn-success">Package List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-sm-6 mt-3">
                                                        <label>Package Name : </label>
                                                        <input type="text" class="form-control" name="package_name"
                                                            placeholder="Package Name" required>
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label>Package Links Quantity : </label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Package Links Quantity"
                                                            name="package_links_quantity" required>
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label>Package Amount : </label>
                                                        <input type="text" class="form-control" name="package_amount"
                                                            placeholder="Package Amount" required>
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label>Package Offered Amount : </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Package Amount" name="package_amount_offered"
                                                            required>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Package Description:</label>
                                                        <textarea id="summernote" name="description" required></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Create Package</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    </body>
@endsection
