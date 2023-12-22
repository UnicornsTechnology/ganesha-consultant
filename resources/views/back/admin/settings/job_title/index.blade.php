@extends('layouts.back.master')
@section('title')
    Job Titles List
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
                                        <h3 class="card-title mt-1">Job Titles List</h3>
                                        <a href="/admin/settings/job-titles/create" class="btn btn-success">Create New
                                            Job Titles</a>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Job Titles </th>
                                                    <th>Edit</th>
                                                    <th>View</th>
                                                    <th>Trash</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($job_titles as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->job_title_name }}</td>

                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/job-titles/edit/{{ $item->job_title_id }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/job-titles/view/{{ $item->job_title_id }}"
                                                                    class="btn btn-success btn-sm">View</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/job-titles/move-to-trash/{{ $item->job_title_id }}"
                                                                    class="btn btn-danger btn-sm">Move To Trash</a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mx-auto">
                                        {!! $job_titles->links() !!}
                                    </div>
                                    <!-- /.card-body -->

                                    <hr />
                                    <h2 class="text-center">Inactive Job Titles</h2>
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Job Titles </th>
                                                    <th>Edit</th>
                                                    <th>Restore</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($job_titles_trashed as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->job_title_name }}</td>

                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/job-titles/edit/{{ $item->job_title_id }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/job-titles/restore-from-trash/{{ $item->job_title_id }}"
                                                                    class="btn btn-success btn-sm">Restore From Trash</a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mx-auto">
                                        {!! $job_titles_trashed->links() !!}
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

    </body>
@endsection
