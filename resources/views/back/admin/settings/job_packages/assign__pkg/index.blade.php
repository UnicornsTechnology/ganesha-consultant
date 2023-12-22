@extends('layouts.back.master')
@section('title')
    Packages List
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
                                        <h3 class="card-title mt-1">Packages List</h3>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Student Name</th>
                                                    <th>Package Name</th>
                                                    <th>Links</th>
                                                    <th>Price</th>
                                                    <th>Offered Price</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->package_name }}</td>
                                                        <td>{{ $item->package_links_quantity }}</td>
                                                        <td>{{ $item->package_amount }}</td>
                                                        <td>{{ $item->package_amount_offered }}</td>
                                                        <td>
                                                            <div>
                                                                <a href="/admin/assign-packages/edit/{{ $item->student_package_id }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
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
