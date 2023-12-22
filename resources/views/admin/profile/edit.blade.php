<!-- resources/views/admin/edit_profile.blade.php -->@extends('layouts.web_admin_layout')
@section('title', 'Edit Admin Profile')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('msg'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5>Edit Admin Profile</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/profile/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="profile">Profile Image</label>
                            <input type="file" id="profile" name="profile_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
