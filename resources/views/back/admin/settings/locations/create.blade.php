@extends('layouts.back.master')
@section('title')
    Create Locations
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
                    <form action="/admin/settings/locations/store" method="post">
                        @csrf
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
                                            <h3 class="card-title mt-1">Locations Create</h3>
                                            <a href="/admin/settings/locations/list" class="btn btn-success">View 
                                                Location List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Locations : </label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Create Locations</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>


    </body>
@endsection
