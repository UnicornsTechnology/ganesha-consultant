@extends('layouts.back.master')
@section('title')
    View  candidate Profile | Job portal
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
                                    <h3 class="card-title mt-1">View  Candidate profile  </h3>
                                    @if ($isExist === 1)
                                    <a href="/candidate/edit/{{Auth::id()}}" class="btn btn-success mx-3"><i class="fa fa-eye"
                                        aria-hidden="true"></i> Edit Candidate profile
                                    </a> 
    
                                    @else
                                    <a href="/candidate/create/{{Auth::id()}}" class="btn btn-success mx-3"><i class="fa fa-eye"
                                        aria-hidden="true"></i> Create Candidate profile
                                    </a> 
                                    @endif
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <div class="container">
               <div class="main-body">
    
          <!-- Breadcrumb -->
          @if ($isExist === 1)
          
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3 mt-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('uploads/profile_photos/'.$candi->image)}}" alt="{{$candi->image}}" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ $candi->fname }}  {{ $candi->mname }}  {{ $candi->lname }}  </h4>
                      <p class="text-secondary mb-1"> {{ $candi->phone }}</p>
                      <p class="text-secondary mb-1"> {{ $candi->email}}</p>
                      <p class="text-muted font-size-sm"> {{ $candi->address }}</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 ">
                <ul class="list-group list-group-flush">
                  
                         <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <i class="fab fa-linkedin"></i><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></h6>
                    <span class="text-secondary"><a href="{{ $candi->linkedin }}">LinkedIn</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><i class="fab fa-google"></i><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></h6>
                    <span class="text-secondary"> <a href="{{ $candi->google }}">Google</a></span>
                  </li>
                </ul>
              </div>
              <div class="card mt-3 p-3">
                <div class="card-body text-center">
                    @if($candi->resume)
                    <a href="{{asset('uploads/resumes'. $candi->resume)}}" class="btn btn-primary" download >Download Resume</a>
                    @else 
                    <h2>Resume not uploaded</h2>
                    @endif
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3 mt-4">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->gender }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Marrital Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->mstatus }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->country}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->state}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->city }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nationality</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->nationality }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birth Date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->bdate }}
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->mobile }}
                    </div>
                  </div>
                  <hr>
                                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Job Experience</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {!! $candi->jobexp !!}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Career Level</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->clevel }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Industry</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->industry }}
                    </div>
                  </div>
                  <hr>
                 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Functional Area </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->farea }}
                    </div>
                  </div>
                </div>
              </div>

          @endif

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

