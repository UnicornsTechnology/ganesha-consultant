@extends('layouts.back.master')
@section('title')
    View Company Profile | Job-Poratal
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->

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

                        <!-- Breadcrumb -->
                        <div class="card">

                            <div class="card-header text-right">
                                <h3 class="card-title mt-1">View Company profile </h3>

                                @if ($isExist >= 1)
                                    <a href="/company/profile/edit/{{ Auth::id() }}" class="btn btn-success mx-3"><i
                                            class="fa fa-eye" aria-hidden="true"></i> Edit Company profile
                                    </a>

                                @else
                                    <a href="/company/profile/create/{{ Auth::id() }}" class="btn btn-success mx-3"><i
                                            class="fa fa-eye" aria-hidden="true"></i> Create Company profile
                                    </a>
                                @endif

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- /Breadcrumb -->
                            @if ($isExist >= 1)
                                <div class="row gutters-sm mt-3">
                                    <div class="col-md-4 mb-3 ">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">


                                                    <img src="{{ asset('/uploads/logo/' . $company[0]->logo) }}"
                                                        alt="{{ $company[0]->logo }}" class="rounded-circle" width="150">
                                                    <div class="mt-3">

                                                        <p class="text-secondary mb-1"> {{ $company[0]->phone }}</p>
                                                        <button class="btn btn-primary">Follow</button>
                                                        <button class="btn btn-outline-primary">Message</button>
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
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"><i class="fas fa-globe"></i>

                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                                            <path
                                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                            </path>
                                                        </svg>Website</h6>
                                                    <span class="text-secondary"><a
                                                            href="{{ $company[0]->website }}">{{ $company[0]->website }}</a></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"> <i class="fab fa-linkedin-in"></i>
                                                            <path
                                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                            </path>
                                                        </svg>Linkedin</h6>
                                                    <span class="text-secondary"><a
                                                            href="{{ $company[0]->linkin }}">{{ $company[0]->linkin }}</a></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"> <i class="fab fa-google-plus-g"></i>
                                                            <path
                                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                            </path>
                                                        </svg>Google</h6>
                                                    <span class="text-secondary"><a
                                                            href="{{ $company[0]->google }}">{{ $company[0]->google }}</a></span>
                                                </li>

                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"><i class="fab fa-facebook"></i>


                                                            <path
                                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                            </path>
                                                        </svg>Facebook</h6>
                                                    <span class="text-secondary"><a
                                                            href="{{ $company[0]->facebook }}">{{ $company[0]->facebook }}</a></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"><i class="fas fa-mobile"></i>
                                                            <path
                                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                            </path>
                                                        </svg>Mobile</h6>
                                                    <span class="text-secondary"><a
                                                            href="{{ $company[0]->mobaile }}">{{ $company[0]->mobaile }}</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Company Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->name }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->email }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">company CEO</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->ceo }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Industry</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->industry }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Ownership</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->ownership }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Company Details</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {!! $company[0]->company_details !!}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Location</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->location }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Map</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->map }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">No of Offices</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->officies }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Employee</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->employee }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Years</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->years }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Country</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->country }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">State</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->state }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">City</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->city }}
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Package</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $company[0]->package }}

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        @endif
                        <!-- Input addon -->

                        <!--/.col (left) -->

                        <!-- /.row -->

                    </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
