@extends('layouts.back.master')
@section('title')
    Inquiry List
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
                                        <h3 class="card-title mt-1">Inquiry List</h3>
                                        {{-- <a href="/admin/blog/create" class="btn btn-success"> Create New Blog</a> --}}
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                    <th>WhatsApp Number</th>
                                                    <th>Date of Birth</th>
                                                    <th>Industry</th>
                                                    <th>Job Title</th>
                                                    <th>Total Experience</th>
                                                    <th>Highest Qualification</th>
                                                    <th>Current Salary</th>
                                                    <th>Country</th>
                                                    <th>State</th>
                                                    <th>City</th>
                                                    <th>Complete Address</th>
                                                    <th>Resume</th>
                                                    <th>Aadhar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobSeeker as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->mobile_number }}</td>
                                                <td>{{ $item->whatsapp_number }}</td>
                                                <td>{{ $item->date_of_birth }}</td>
                                                <td>{{ $item->industry }}</td>
                                                <td>{{ $item->job_title }}</td>
                                                <td>{{ $item->total_experience }}</td>
                                                <td>{{ $item->highest_qualification }}</td>
                                                <td>{{ $item->current_salary }}</td>
                                                <td>{{ $item->country }}</td>
                                                <td>{{ $item->state }}</td>
                                                <td>{{ $item->city }}</td>
                                                <td>{{ $item->complete_address }}</td>
                                                <td>
                                                    <a href="/storage/{{$item->upload_resume}}" target="_blank">
                                                        <span class="badge badge-primary">View</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="/storage/{{$item->upload_aadhar}}" target="_blank">
                                                        <span class="badge badge-primary">View</span>
                                                    </a>
                                                </td>
                                                
                                                <td> <a href="/admin/delete/job-seeker/{{$item->job_seeker_id}}" class="btn btn-danger btn-sm">Delete</a> </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
                                    {{-- <div class="mx-auto">
                                        {!! $inquiry->links() !!}
                                    </div> --}}

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
