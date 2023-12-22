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
                                <a href="/dashboard/company/applications" class="btn btn-info mx-3"><i
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
                                                        <img src="{{ asset('uploads/profile_photos/' . $candidate->image) }}"
                                                            alt="Admin" class="rounded-circle" width="150">
                                                        <div class="mt-3">
                                                            <h4>{{ $candidate->fname }} {{ $candidate->mname }}
                                                                {{ $candidate->lname }} </h4>
                                                            <p class="text-secondary mb-1"> {{ $candidate->phone }}</p>
                                                            <p class="text-secondary mb-1"> {{ $candidate->email }}</p>
                                                            <p class="text-muted font-size-sm">
                                                                {{ $candidate->address }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt-3">
                                                <ul class="list-group list-group-flush">

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"> <i
                                                                    class="fab fa-linkedin"></i>
                                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z">
                                                                </path>
                                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                            </svg></h6>
                                                        <span class="text-secondary"><a
                                                                href="{{ $candidate->linkedin }}">LinkedIn</a></span>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"><i
                                                                    class="fab fa-google"></i>
                                                                <path
                                                                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                                </path>
                                                            </svg></h6>
                                                        <span class="text-secondary"> <a
                                                                href="{{ $candidate->google }}">Google</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card mt-3 p-3">
                                                <div class="card-body text-center">
                                                    @if ($candidate->resume)
                                                        <a href="{{ asset('uploads/resumes' . $candidate->resume) }}"
                                                            class="btn btn-primary" download>Download Resume</a>
                                                    @else
                                                        <h2>Resume not uploaded</h2>
                                                    @endif
                                                </div>
                                            </div>
                                        <div class="card mt-3 p-3">
                                            <p class="text-center my-3">Change Status</p>
                                            <form action="/update/job/status" method="POST">
                                                @csrf
                                                <input type="hidden" name="job_id" value={{ $job->id }}>
                                                <select name="isApproved" class="form-control" id="">
                                                    <option value="0">Pending</option>
                                                    <option value="1">Accept</option>
                                                    <option value="2">Reject</option>
                                                </select>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success mt-3">Update
                                                        Status</button>
                                                </div>
                                            </form>
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
                                                        {{ $candidate->industry }}
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"> Functional Area </h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->farea }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->mobile }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Job Experience</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->jobexp }}
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"> Career Level</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->clevel }}
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Gender</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->gender }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Marrital Status</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->mstatus }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Country</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->country }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">State</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->state }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">City</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->city }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Nationality</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->nationality }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Birth Date</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->bdate }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Birth Date</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $candidate->bdate }}
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
