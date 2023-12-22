@extends('layouts.back.master')
@section('title')
    Roles List
@endsection

@section('content')
    <style>
    </style>

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
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="mr-auto p-2 bd-highlight">
                                                <h3>Roles List</h3>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                            </div>
                                            <div class="p-2 d-flex">
                                                @can('/admin/roles/create')
                                                    <a href="/admin/roles/create" class="btn btn-primary">Add Roles</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body overflow-auto">
                                        <table id="table_id" data-paging='false'
                                            class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Sr.No</th>
                                                    <th>Roles Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $key => $item)
                                                    <tr class="text-center">
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td class="text-center">
                                                            @can('/admin/roles/edit/{id}')
                                                                <a href="/admin/roles/edit/{{ $item->id }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class=" fas fa-edit"></i></a>
                                                            @endcan
                                                            {{-- @can('/admin/roles/trash/{id}')
                                                        <a href="/admin/roles/trash/{{ $item->id }}"
                                                                    class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you really want to Delete This Role ?')">
                                                          <i class="fas fa-trash"></i> </a> 
                                                          @endcan       --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="pagination mx-auto">
                                                {!! $roles->appends(Request::all())->links() !!}
                                            </div>
                                        </div>
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
