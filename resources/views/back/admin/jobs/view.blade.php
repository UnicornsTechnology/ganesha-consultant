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
                                <a href="/admin/jobs/list" class="btn btn-success mx-3"> View All
                                    Jobs </a>
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
                                                            <h6 class="mb-0">Company Name :-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobDetails->company_name }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Title:-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobDetails->job_title_name }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Description :-
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {!! $jobDetails->job_description !!}
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Location :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobDetails->location_name }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Experience :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $jobDetails->experiences_name }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Education :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            @foreach ($structedEducationsData as $item)
                                                                <div class="badge badge-dark">{{ $item->education_name }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Skills :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            @foreach ($structedSkillsData as $item)
                                                                <div class="badge badge-dark">{{ $item->skill_name }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Post Date :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ \Carbon\Carbon::parse($jobDetails->job_posting_date)->format('d-m-Y') }}

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Expiry Date :-</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ \Carbon\Carbon::parse($jobDetails->job_expiry_date)->format('d-m-Y') }}
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
