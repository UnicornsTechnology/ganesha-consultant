@extends('layouts.back.master')
@section('title')
    List of All Team
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
                                        @can('/admin/team/create')
                                            <a href="/admin/team/create" class="btn btn-success"> Create Employee</a>
                                        @endcan
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Employee Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Email</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($team as $key => $list)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td> {{ $list->name }} </td>
                                                        <td> {{ $list->mobile_number }} </td>
                                                        <td> {{ $list->email }} </td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                @can('/admin/team/edit/{id}')
                                                                    <a href="/admin/team/edit/{{ $list->id }}"
                                                                        class="btn btn-success btn-sm">Edit</a>
                                                                @endcan
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

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
