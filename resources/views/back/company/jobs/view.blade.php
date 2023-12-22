<!-- Input addon -->
@extends('layouts.back.master')
@section('title')
    View Jobs | Job portal
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
                                <h3 class="card-title mt-1">View Jobs </h3>
                                <a href="/dashboard/company/jobs" class="btn btn-info mx-3"><i class="fa fa-eye"
                                        aria-hidden="true"></i> View All
                                    Jobs </a>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="container">
                                <div class="main-body">



                                    <div class="row gutters-sm">

                                        <div class="col-md-12">
                                            <div class="card mb-3 mt-4">
                                                <div class="card-body">
                                                    

                                                    
                                                        
                                    
                                                    <div class="row">

                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Company Name  :
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->cname }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Title :
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->jtitle }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Description  :
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {!! $jobpost->jdec!!}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Category  :
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {!! $jobpost->category!!}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Country :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->country }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">State :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->state }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">City :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->city }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Salary Form :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->salaryf }}
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Salary To :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->salaryto }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Salary Period :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->salaryper }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Functional Area :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->farea }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Type
                                                                 :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->jtype }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Gender :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->gender }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Required Degree Level
                                                                 :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->rdegree }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Required job experience

                                                                 :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobpost->rjobexp }}
                                                        </div>
                                                    </div>
                                                    <hr>
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
