@extends('layouts.back.master')
@section('title')
    Application List | istepup job-portal
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
                                        <h3 class="card-title mt-1"> Application List</h3>

                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Company Name</th>
                                                    <th>Job Title</th>
                                                    <th>Candidate Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                @foreach ($applications as $key => $application)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $application->cname }}</td>
                                                        <td>{{ $application->jtitle }}</td>
                                                        <td>{{ $application->fname }} {{ $application->lname }}</td>
                                                        <td>{{ $application->created_at }}</td>
                                                        <td>
                                                            <span
                                                                class="badge
                                                                @if ($application->isApproved === 0) 
                                                                bg-primary
                                                                "> Pending 
                                                                @elseif($application->isApproved === 1)
                                                                bg-success
                                                                "> Approved 
                                                                @else 
                                                                bg-danger
                                                                "> Rejected
                                                                @endif
                                                            </span>
                                                        </td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a href="/candidate/applications/show/{{ $application->user_id }}/{{ $application->job_id }}"
                                                            class="btn btn-primary">View</a>
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
