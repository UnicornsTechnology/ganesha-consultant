@extends('layouts.back.master')
@section('title')
    View Job Title Details
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
                    <input type="hidden" name="job_title_id" value="{{ $job_title->job_title_id }}">
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
                                        <h3 class="card-title mt-1">Job Title View</h3>
                                        <a href="/admin/settings/job-title/list" class="btn btn-success">View
                                            Job Title</a>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12 mt-3">
                                                    <label>Job Title Name : </label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $job_title->job_title_name }}" readonly>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <label>Job Categories : </label>
                                                    <div class="form-group">
                                                        <select class="select2" multiple="multiple"
                                                            name="job_categories_id[]" id="job_categoires_id"
                                                            data-placeholder="Select Category" style="width: 100%;">
                                                            @foreach ($job_categories as $item)
                                                                <option value="{{ $item->job_category_id }}">
                                                                    {{ $item->job_category_name }}
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
                </section>
            </div>
        </div>

        <script>
            window.onload = () => {
                $("#job_categoires_id").val({{ json_encode(array_map('intval', $categoriesArray)) }}).trigger(
                    'change');
            }
        </script>
    </body>
@endsection
