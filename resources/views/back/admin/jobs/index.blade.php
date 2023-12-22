@extends('layouts.back.master')
@section('title')
    Jobs List
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
                                        <h3 class="card-title mt-1">Admin Jobs List</h3>
                                        @can('/admin/job/create')
                                            <a href="/admin/job/create" class="btn btn-success"> Create New Job</a>
                                        @endcan
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.NO</th>
                                                    <th>Company Name</th>
                                                    <th>Title</th>
                                                    <th>Location</th>
                                                    <th>Featured</th>
                                                    <th>View</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobsList as $key => $jobpost)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $jobpost->company_name }}</td>
                                                        <td>{{ $jobpost->job_title_name }}</td>
                                                        <td>{!! $jobpost->location_name !!}</td>
                                                        <td>
                                                            @if ($jobpost->isJobFeatured == 'featured')
                                                                <span class="badge badge-success">Featured</span>
                                                                | <a href="/admin/job/status/update/not_featured/{{ $jobpost->job_id }}"
                                                                    class="badge badge-primary">Update</a>
                                                            @else
                                                                <span class="badge badge-secondary">Not Featured</span>
                                                                | <a href="/admin/job/status/update/featured/{{ $jobpost->job_id }}"
                                                                    class="badge badge-primary">Update</a>
                                                            @endif

                                                        </td>

                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/job/view/{{ $jobpost->job_id }}"
                                                                    class="btn btn-primary btn-sm">View</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                @can('/admin/job/edit/{id}')
                                                                    <a href="/admin/job/edit/{{ $jobpost->job_id }}"
                                                                        class="btn btn-success btn-sm">Edit</a>
                                                                @endcan
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="mx-auto">
                                        {!! $jobsList->links() !!}
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
