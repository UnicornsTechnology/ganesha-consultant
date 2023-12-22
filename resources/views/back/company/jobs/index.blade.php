@extends('layouts.back.master')
@section('title')
    Jobs List | istepup job-portal
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
                                        <h3 class="card-title mt-1"> Company Jobs List</h3>
                                        <a href="/company/jobs/create" class="btn btn-primary mx-3"><i
                                                class="fa fa-plus" aria-hidden="true"></i> Add New Jobs</a>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>

                                                    <th>Company Name</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Country</th>
                                                    <th>State</th>
                                                    <th>City</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    

                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($jobpost as $key => $jobpost)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>

                                                        <td>{{ $jobpost->cname }}</td>
                                                        <td>{{ $jobpost->jtitle }}</td>
                                                        <td>{!! $jobpost->jdec !!}</td>
                                                        <td>{{ $jobpost->country }}</td>
                                                        <td>{{ $jobpost->state }}</td>
                                                        <td>{{ $jobpost->city }}</td>
                                                        <td>
                                                            <span
                                                                class="badge
                                                                @if ($jobpost->active === 1) 
                                                                bg-primary
                                                                ">
                                                                Active
                                                            @else
                                                                bg-danger
                                                                "> Inactive
                                                @endif
                                                </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a href="/company/jobs/show/{{ $jobpost->id }}"
                                                            class="btn btn-primary">View</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a href="/company/jobs/edit/{{ $jobpost->id }}"
                                                            class="btn btn-success">Edit</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-around">
                                                            <a href="/company/jobs/delete/{{ $jobpost->id }}"
                                                                class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </td>
                                                    

                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
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
