@extends('layouts.back.master')
@section('title')
    Update Compnay Name
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
                    <form action="/admin/settings/company-name/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="company_name_id" value="{{ $company_name->company_name_id }}">
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
                                            <h3 class="card-title mt-1">Edit Company Name </h3>
                                            <a href="/admin/settings/company-name/list" class="btn btn-success">View location List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Company Name : </label>
                                                        <input type="text" class="form-control" name="company_name"
                                                            value="{{ $company_name->company_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                             <div class="form-group col-sm-12">
                                    <label for="exampleInputFile">Company Logo :</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <div class="input-group-prepend">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>


    </body>
@endsection
