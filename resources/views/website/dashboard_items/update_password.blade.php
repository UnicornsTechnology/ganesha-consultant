@extends('website.dashboard')
@section('items')
    <div class="card p-4">
        <div class="row">
            <div class="inn">
                <div class="rhs">
                    <div class="form-login">
                        <form method="POST" action="/users/update/password" enctype="multipart/form-data">
                            <!--PROFILE BIO-->
                            @csrf
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    @if (session('msg'))
                                        <div class="alert alert-success bg-success text-white">
                                            {{ session('msg') }}
                                        </div>
                                    @endif
                                    @if (session('msgs'))
                                        <div class="alert alert-danger bg-danger text-white">
                                            {{ session('msgs') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <h1>Update Password</h1>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                                            name="email" value="{{ $users->email }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Mobile Number:</label>
                                        <input type="number" class="form-control" id="mobile"
                                            placeholder="Enter mobile number" name="mobile" value="{{ $users->mobile }}"
                                            required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Old Password:</label>
                                        <input type="password" class="form-control" id="pwd"
                                            placeholder="Enter Old password" name="old_password">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="lb">New Password:</label>
                                        <input type="password" class="form-control" id="pswd"
                                            placeholder="Confirm New Password" name="new_password">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
