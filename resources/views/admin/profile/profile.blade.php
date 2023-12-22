@extends('layouts.web_admin_layout')
@section('title')
    User Profile
@endsection

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
                    <h5>User Profile</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if (auth()->user()->main_profile_pic)
                            <img src="{{ asset("uploads/admin/".auth()->user()->main_profile_pic) }}" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 150px;">
                        @else
                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="210" width="200" class="img-thumbnail">
                        @endif
                    </div>
                    <h4 class="text-center">{{ auth()->user()->name }}</h4>
                    <p class="text-center">{{ auth()->user()->email }}</p>
                    <div class="text-center">
                        <a href="/admin/profile/edit" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
