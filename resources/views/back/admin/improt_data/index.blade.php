@extends('layouts.back.master')
@section('title')
    Improt List
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
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header text-right">
                                        <h3 class="card-title mt-1">Improt Data List</h3>
                                        @can('/admin/improt/create')
                                            <a href="/admin/improt/create" class="btn btn-success">New Improt</a>
                                        @endcan
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Candidate Name</th>
                                                    <th>Mob No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->improt_name }}</td>
                                                        <td>{{ $item->improt_number }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="mx-auto">
                                        {!! $data->links() !!}
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
