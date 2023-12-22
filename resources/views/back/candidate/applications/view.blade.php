@extends('layouts.back.master')
@section('title')
    View Application | Job portal
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
                                <h3 class="card-title mt-1">Job Application </h3>
                                <span
                                    class="btn rounded-0
                                @if ($job->isApproved === 0) 
                                bg-primary
                                ">
                                    Pending
                                @elseif($job->isApproved === 1)
                                    bg-success
                                    "> Approved
                                @else
                                    bg-danger
                                    "> Rejected
                                    @endif
                                </span>
                                <a href="/dashboard/candidate/applications" class="btn btn-info mx-3"><i
                                        class="fa fa-eye" aria-hidden="true"></i> View All Applications </a>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <br>
                            <div class="container">
                                <div class="main-body">


                                    <!-- /Breadcrumb -->
                                    <div class="row gutters-sm">
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="{{ asset('uploads/logo/' . $company->logo) }}"
                                                            alt="Admin" class="rounded-circle" width="150">
                                                        <div class="mt-3">
                                                            <h4>
                                                            </h4>
                                                            <p class="text-secondary mb-1"> {{ $company->name }} </p>
                                                            <p class="text-secondary mb-1"> {{ $company->ceo }} </p>
                                                            <p class="text-muted font-size-sm"> {{ $company->email }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt-3">
                                                <ul class="list-group list-group-flush">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fab fa-facebook-square"></i>
                                                        </h6>
                                                        <span class="text-secondary"><a
                                                                href="{{ $company->facebook }}">{{ $company->facebook }}</a></span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><i class="fab fa-linkedin"></i></h6>
                                                        <span class="text-secondary"> <a
                                                                href="{{ $company->linkin }}">{{ $company->linkin }}</a></span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Application For </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $job->jtitle }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Industry</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $company->industry }}
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0"> Ownership </h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $company->ownership }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Mobile</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $company->mobaile }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Country</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $company->country }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">State</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $company->state }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">City</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{ $company->city }}
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
@endsection
