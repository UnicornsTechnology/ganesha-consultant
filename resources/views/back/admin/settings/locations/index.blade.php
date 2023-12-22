@extends('layouts.back.master')
@section('title')
    Locations List
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
                                        <h3 class="card-title mt-1">Locations List</h3>
                                        <a href="/admin/settings/locations/create" class="btn btn-success">Create New
                                            Experience</a>
                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Locations </th>
                                                    <th>Edit</th>
                                                    <th>Trash</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($locations as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->location_name }}</td>

                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/locations/edit/{{ $item->location_id }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/locations/move-to-trash/{{ $item->location_id }}"
                                                                    class="btn btn-danger btn-sm">Move To Trash</a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mx-auto">
                                        {!! $locations->links() !!}
                                    </div>

                                    <hr />
                                    <h2 class="text-center">Inactive Locations</h2>
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Locations </th>
                                                    <th>Edit</th>
                                                    <th>Restore</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($locations_trashed as $key => $item)
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td>{{ $item->location_name }}</td>

                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/locations/edit/{{ $item->location_id }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="/admin/settings/locations/restore-from-trash/{{ $item->location_id }}"
                                                                    class="btn btn-success btn-sm">Restore From Trash</a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mx-auto">
                                        {!! $locations_trashed->links() !!}
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
