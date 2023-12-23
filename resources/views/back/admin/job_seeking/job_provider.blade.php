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
                                                    <th>Owner Name</th>
                                                    <th>Job Role</th>
                                                    <th>Job Category</th>
                                                    <th>Institute Name</th>
                                                    <th>Qualification Needed</th>
                                                    <th>Experience Needed</th>
                                                    <th>Monthly Salary</th>
                                                    <th>Selection Process</th>
                                                    <th>Job Location</th>
                                                    <th>Mobile Number</th>
                                                    <th>Requirement</th>
                                                    <th>Description</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobProvider as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->owner_name }}</td>
                                                    <td>{{ $item->job_role }}</td>
                                                    <td>{{ $item->job_category }}</td>
                                                    <td>{{ $item->institute_name }}</td>
                                                    <td>{{ $item->qualification_needed }}</td>
                                                    <td>{{ $item->experience_needed }}</td>
                                                    <td>{{ $item->monthly_salary }}</td>
                                                    <td>{{ $item->selection_process }}</td>
                                                    <td>{{ $item->job_location }}</td>
                                                    <td>{{ $item->mobile_number }}</td>
                                                    <td>{{ $item->requirement }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>
                                                        <a href="/career/delete/{{ $item->job_provider_id }}" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
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
