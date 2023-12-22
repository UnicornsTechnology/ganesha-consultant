@extends('layouts.back.master')
@section('title')
    Student Details
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
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <!-- Input addon -->
                        <div class="card ">
                            <div class="card-header text-right">
                                <h3 class="card-title mt-1">Student Details</h3>
                                <a href="/admin/students/list/All" class="btn btn-success mx-3"> View All Students </a>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <br>
                            <div class="container">
                                <div class="main-body">

                                    <div class="row gutters-sm">

                                        <div class="col-md-12">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Student Name :-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $studentDetails->name }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Education :-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $studentDetails->education }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email :-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $studentDetails->email }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Mobile No. :-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $studentDetails->mobile_number }}
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">City :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $studentDetails->city }}
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Activation Status :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            @if ($studentDetails->activation_status == 'Approved')
                                                                <span
                                                                    class="badge badge-success">{{ $studentDetails->activation_status }}</span>
                                                            @elseif($studentDetails->activation_status == 'Rejected')
                                                                <span
                                                                    class="badge badge-danger">{{ $studentDetails->activation_status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-primary">{{ $studentDetails->activation_status }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Profile Created At :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ date('d-m-Y', strtotime($studentDetails->created_at)) }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Profile Updated At :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ date('d-m-Y', strtotime($studentDetails->updated_at)) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </div>









            </div><!-- /.container-fluid -->
        </section>
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
