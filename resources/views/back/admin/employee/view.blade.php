<!-- Input addon -->
@extends('layouts.back.master')
@section('title')
    View Employee
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $blog->emp_name }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Author:</strong> Admin </p>
                        <p><strong>Created At:</strong> {{ $blog->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $blog->updated_at }}</p>
                        <hr>
                        <p><strong>Image:</strong></p>
                        <img src="{{ asset('uploads/employee_images/' . $blog->emp_img) }}" alt="employee Image"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>



    <!--/.col (left) -->
    </div>
    <!-- /.row -->
    </div>









    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
