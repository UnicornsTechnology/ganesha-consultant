@extends('layouts.back.master')
@section('title')
    Update Job Category
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
                    <form id="my-form" action="/admin/settings/job-categories/update" method="post">
                        @csrf
                        <input type="hidden" name="job_category_id" value="{{ $job_category->job_category_id }}">
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
                                            <h3 class="card-title mt-1">Edit Category</h3>
                                            <a href="/admin/settings/job-title/list" class="btn btn-success">View
                                                Job Category</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Job Category Name : </label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $job_category->job_category_name }}">
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
                                        <div class="text-center mb-3 d-flex justify-content-around">
                                            <button type="submit" id="add-job-title-btn" class="btn btn-success">Update (If
                                                new Job title is
                                                Added)</button>
                                            <button type="submit" class="btn btn-danger" id="remove-job-title-btn">Update
                                                (If job title is removed
                                                )</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>
    </body>
    <script>
        const form = document.querySelector('#my-form');
        const addJobTitleBtn = document.querySelector('#add-job-title-btn');
        const removeJobTitleBtn = document.querySelector('#remove-job-title-btn');
        // j
        addJobTitleBtn.addEventListener('click', () => {
            form.action = '/admin/settings/job-categories/add-job-titles';
            form.submit();
        });

        removeJobTitleBtn.addEventListener('click', () => {
            form.action = '/admin/settings/job-categories/remove-job-titles';
            form.submit();
        });
    </script>
    <script>
        @if ($jobTitlesList !== null)
            $("#job_titles_id").val({{ json_encode(array_map('intval', $jobTitlesList)) }}).trigger('change');
        @endif
    </script>
@endsection
