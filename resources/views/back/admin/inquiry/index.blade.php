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
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($inquiry as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->mobile_no }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->message }}</td>


                                                        <td>
                                                            <a href="/inquiry/delete/{{ $item->inq_id }}"
                                                                class="btn btn-danger btn-sm">
                                                                Delete</i>
                                                            </a>
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
