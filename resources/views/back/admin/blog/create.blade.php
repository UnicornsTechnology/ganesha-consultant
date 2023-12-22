@extends('layouts.back.master')
@section('title')
    Blog Create
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
                    <form action="/admin/blog/store" method="post" enctype="multipart/form-data">
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
                                            <h3 class="card-title mt-1">Admin Blog Create</h3>
                                            <a href="/admin/blog/list" class="btn btn-success">Blog List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-3 mt-3">
                                                        <label>Posting Date:</label>
                                                        <input type="date" class="form-control" name="blog_date"
                                                            required>
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label>Blog Name : </label>
                                                        <input type="text" class="form-control" name="blog_name"
                                                            required>
                                                    </div>
                                                    <div class="form-group col-sm-3 mt-3">
                                                        <label for="exampleInputFile">Blog Image :</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <div class="input-group-prepend">
                                                                    <input type="file" name="image"
                                                                        class="custom-file-input" id="exampleInputFile"
                                                                        required>
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Blog Description:</label>
                                                        <textarea id="summernote" name="description" required></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Create Blog</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    </body>
@endsection
