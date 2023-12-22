@extends('layouts.back.master')
@section('title')
WhatsApp Template Create
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
                                                <h3>Whatsapp Templates List</h3>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                            </div>
                                            @can('/admin/whatsapp-templates')
                                            <div class="p-2 d-flex"> 
                                                <a href="/admin/whatsapp-templates" class="btn btn-primary">View Templates</a>
                                            </div>
                                            @endcan
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
    
                                    <div class="card-body overflow-auto">
                                        <form action="/admin/whatsapp/store-template" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>Template Name </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                            </div>
                                                            <input type="text" name="whatsapp_template_name" class="form-control"
                                                                placeholder="Template Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Template Image URL </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                            </div>
                                                            <input type="text" name="whatsapp_template_image_url" class="form-control"
                                                                placeholder="Template Image URL" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Template Language </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                            </div>
                                                           <select name="whatsapp_template_language" id="" class="form-control">
                                                            <option value="mr">Marathi</option>
                                                            <option value="en">English</option>
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Template File Name </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                            </div>
                                                            <input type="text" name="whatsapp_template_filename" class="form-control"
                                                                placeholder="Template File Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
                                                            <button type="reset" class="btn btn-success">Reset</button>
                                                        </div>
                                                        <!-- /.col-lg-6 -->
                                                        <!-- Repeat Above Code -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>
        </div> </body>
@endsection
