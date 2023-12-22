@extends('layouts.back.master')
@section('title')
    Blog List
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
                                        <h3 class="card-title mt-1">Blog List</h3>
                                        @can('/admin/blog/create')
                                            <a href="/admin/blog/create" class="btn btn-success"> Create New Blog</a>
                                        @endcan
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Blog Name</th>
                                                    <th>Date</th>
                                                    <th>View</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blogs as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->blog_name }}</td>
                                                        <td>{{ $item->blog_date }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                @can('/admin/blog/view/{id}')
                                                                    <a href="/admin/blog/view/{{ $item->blog_id }}"
                                                                        class="btn btn-primary btn-sm">View</a>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-around">
                                                                @can('/admin/blog/edit/{id}')
                                                                    <a href="/admin/blog/edit/{{ $item->blog_id }}"
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
                                        {!! $blogs->links() !!}
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
