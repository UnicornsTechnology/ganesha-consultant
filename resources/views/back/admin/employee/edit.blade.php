@extends('layouts.back.master')
@section('title')
    Update Employee
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
                    <form action="/admin/employee/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $emp->employee_id }}">
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
                                            <h3 class="card-title mt-1">Edit Employee </h3>
                                            <a href="/admin/employee/list" class="btn btn-success">Employee List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                            <div class="row">
                                                    
                                                    <div class="col-sm-6 mt-3">
                                                        <label>Employee Name : </label>
                                                        <input type="text" class="form-control" name="emp_name"
                                                            value="{{$emp->emp_name}}">
                                                    </div>
                                                    <div class="col-sm-6 mt-3">
                                                        <label> Working Potion : </label>
                                                        <input type="text" class="form-control" name="working_potion"
                                                            value="{{$emp->working_potion}}">
                                                    </div>
                                                     <div class="col-sm-6 mt-3">
                                                        <label> Package Amount  : </label>
                                                        <input type="text" class="form-control" name="package_amount"
                                                            value="{{$emp->package_amount   }}">
                                                    </div>
                                                       <div class="col-sm-6 mt-3">
                                                        <label> Location  : </label>
                                                        <input type="text" class="form-control" name="location"
                                                            value="{{$emp->location}}">
                                                    </div>
                                                     <div class="col-sm-6 mt-3">
                                                        <label> Education  : </label>
                                                        <input type="text" class="form-control" name="education"
                                                            value="{{$emp->education}}">
                                                    </div>
                                                    <div class="form-group col-sm-3 mt-3">
                                                        <label for="exampleInputFile">Employee Image :</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <div class="input-group-prepend">
                                                                    <input type="file" name="emp_img"
                                                                        class="custom-file-input" id="exampleInputFile"
                                                                        value="">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Blog Description:</label>
                                                        <textarea id="summernote" name="description" value="">{{$emp->description}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Update Blog</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>
            async function addData(key, value, route, idName) {
                try {
                    const name = document.getElementById(idName).value
                    if (!value || value == "" || value == null) {
                        return alert("This field is ")
                    }
                    const response = await axios.post(route, {
                        key: value
                    });
                    document.getElementById(idName).value = "";
                    console.log(response.data);
                    alert(response.data.message)
                } catch (error) {
                    console.log(error.response);
                }
            }
        </script>
    </body>
@endsection
