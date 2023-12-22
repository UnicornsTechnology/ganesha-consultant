@extends('layouts.back.master')
@section('title')
    Employee List
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
                                        <h3 class="card-title mt-1">Employee List</h3>
                                        <a href="/admin/employee/create" class="btn btn-success"> Add New Employee Recoed</a>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Employee Name</th>
                                                    <th>Working Potion</th>
                                                    <th>Package Amount</th>
                                                    <th>View</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employee as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->emp_name }}</td>
                                                        <td>{{ $item->working_potion }}</td>
                                                        <td>{{ $item->package_amount }}</td>

                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/employee/view/{{ $item->employee_id }}"
                                                                    class="btn btn-primary btn-sm">View</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                <a href="/admin/employee/edit/{{ $item->employee_id }}"
                                                                    class="btn btn-success btn-sm">Edit</a>
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
