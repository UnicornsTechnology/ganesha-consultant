@extends('layouts.back.master')
@section('title')
    Create Job Category
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
                    <form action="/admin/settings/job-categories/store" method="post">
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
                                            <h3 class="card-title mt-1">Create Job Category </h3>
                                            <a href="/admin/settings/job-title/list" class="btn btn-success">View Job
                                                Categories</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-12 my-3">
                                                        <label>Job Category Name : </label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Job Category Name" required>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Job Titles : </label>
                                                        <div class="form-group">
                                                            <select class="select2" multiple="multiple"
                                                                name="job_titles_id[]" id="job_titles_id"
                                                                data-placeholder="Select Category" style="width: 100%;"
                                                                required>
                                                                @foreach ($job_titles as $item)
                                                                    <option value="{{ $item->job_title_id }}">
                                                                        {{ $item->job_title_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Create Job Category</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>


    </body>
@endsection
