@extends('layouts.back.master')
@section('title')
    Candidate List
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
                                        <h3 class="card-title mt-1"> Candidate List</h3>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                                Filter <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu p-2" role="menu">
                                                <li>
                                                    <a href="/admin/students/list/All" class="badge badge-warning"
                                                        data-filter="all">All Candidate</a>
                                                </li>
                                                <li><a href="/admin/students/list/Pending" class="badge badge-primary"
                                                        data-filter="pending">Pending</a></li>
                                                <li><a href="/admin/students/list/Approved" class="badge badge-success"
                                                        data-filter="approved">Approved</a></li>
                                                <li><a href="/admin/students/list/Rejected" class="badge badge-danger"
                                                        data-filter="rejected">Rejected</a></li>

                                            </ul>
                                        </div>

                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <h2 class="text-center">Showing Results For Candidate : {{ $type }} List
                                        </h2>
                                        <table id="table_id" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.NO</th>
                                                    <th>Candidate Name</th>
                                                    <th>Job Category</th>
                                                    {{-- <th>Email</th> --}}
                                                    <th>Active Status</th>
                                                    <th>Profile</th>
                                                    <th>Applied Jobs</th>
                                                    <th>Bookmarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $key => $studentDetails)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $studentDetails->name }}</td>
                                                        <td>{{ $studentDetails->job_category_name }}</td>
                                                        {{-- <td>{{ $studentDetails->email }}</td> --}}
                                                        <td class="text-center">
                                                            @if ($studentDetails->activation_status == 'Approved')
                                                                <span
                                                                    class="badge badge-success">{{ $studentDetails->activation_status }}</span>
                                                            @elseif($studentDetails->activation_status == 'Rejected')
                                                                <span
                                                                    class="badge badge-danger">{{ $studentDetails->activation_status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-primary">{{ $studentDetails->activation_status }}</span>
                                                            @endif
                                                            <div class="btn-group">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="badge badge-success dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu px-2 py-3">
                                                                        <li><a href="/admin/student/activation-status/{{ $studentDetails->id }}/Approved"
                                                                                class="badge badge-primary">Approve</a></li>
                                                                        <li><a href="/admin/student/activation-status/{{ $studentDetails->id }}/Rejected"
                                                                                class="badge badge-danger">Reject</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/student/details/{{ $studentDetails->id }}"
                                                                    class="btn btn-primary btn-sm">Profile</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/student/applied-jobs/{{ $studentDetails->id }}"
                                                                    class="btn btn-success btn-sm">Applied Jobs</a>
                                                            </div>
                                                        </td>

                                                        {{-- <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/student/packages/{{ $studentDetails->id }}"
                                                                    class="btn btn-info btn-sm">Packages</a>
                                                            </div>
                                                        </td> --}}
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/student/bookmarks/{{ $studentDetails->id }}"
                                                                    class="btn btn-danger btn-sm">Bookmarks</a>
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
