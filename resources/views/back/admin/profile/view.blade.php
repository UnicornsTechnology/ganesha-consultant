@extends('layouts.back.master')
@section('title')
    View Profile | Job portal
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
                                    <h3 class="card-title mt-1">View  admin profile  </h3>
                                    <!-- <a href="/admin/profile/view" class="btn btn-info mx-3"><i class="fa fa-plus"
                                            aria-hidden="true"></i> View All Candidate </a> -->
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
                      <h6 class="mb-0">Name :-</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email :-</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->email }}
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

                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Current Salary</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->csalary }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Expected salary </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $candi->esalary}}
                    </div>
                  </div>
                  <hr> -->
                  
                  
                
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

