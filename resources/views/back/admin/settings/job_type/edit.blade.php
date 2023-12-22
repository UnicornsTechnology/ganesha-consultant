@extends('layouts.back.master')
@section('title')
    Update Job Type
@endsection

@section('content')

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
                    <form action="/admin/settings/job-type/update" method="post">
                        @csrf
                        <input type="hidden" name="job_type_id" value="{{ $job_type->job_type_id }}">
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
                                            <h3 class="card-title mt-1">Edit Job Type</h3>
                                            <a href="/admin/settings/job-type/list" class="btn btn-success"> Job Type List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Job Type : </label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $job_type->job_type_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Update Job Type</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>


    </body>
@endsection
