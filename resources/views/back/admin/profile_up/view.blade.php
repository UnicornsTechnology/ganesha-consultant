<!-- Input addon -->
@extends('layouts.back.master')
@section('title')
    Profile View
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
        <form action="/admin/profile/updated" method="post">
            @csrf
            <div class="container ">
                <div class="col-md-10">
                    <div class="card card-secondary">
                        <div class="card-header text-right">
                            <h3 class="card-title">Profile</h3>

                        </div>
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" name="name"
                                    value="{{ Auth::user()->name }}" placeholder="Name">
                            </div>
                            <div class="form-floating">
                                <label for="Email_ID">Email ID</label>
                                <input type="text" class="form-control" id="Email_ID" name="email"
                                    value="{{ Auth::user()->email }}" placeholder="Email ID">
                            </div>
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                            <div class="form-floating">
                                <label for="Password">Password</label>
                                <input type="text" class="form-control" id="Password" name="password" value=""
                                    placeholder="Password">
                            </div>
                        </div>
                        <button class="btn btn-success"> Updated</button>
                    </div>
                </div>
            </div>
        </form>
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
