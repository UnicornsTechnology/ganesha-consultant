@extends('layouts.back.master')
@section('title')
    Applied Jobs
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
                                        <h3 class="card-title mt-1">Candidate Apply Jobs List</h3>
                                        {{-- <a href="/admin/job/create" class="btn btn-success"> Create New Job</a> --}}
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
                                                    <th>View</th>
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
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/job/view/{{ $jobpost->job_id }}"
                                                                    class="btn btn-primary btn-sm">View</a>
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
