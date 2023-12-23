@extends('layouts.front.master')

@section('title')
    Career At GC
@endsection
@section('content')
<div class="inner-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>Career At GC</h1>
                    <span></span>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Career At GC</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="job-post-area pt-120 mb-120">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-wrapper">
                    @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
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
                    <form method="POST" action="/career-at-gc/store">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title2">
                                    <h5>Personal Information:</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="name">Your Name*</label>
                                    <div class="input-area">
                                        <img src="assets/images/icon/user-2.svg" alt="">
                                        <input type="text" id="name" value="{{old('name')}}" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="email">Email*</label>
                                    <div class="input-area">
                                        <img src="assets/images/icon/email-2.svg" alt="">
                                        <input type="email" id="email" value="{{old('email')}}" name="email" placeholder="your@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="mobile">Your Mobile No.*</label>
                                    <div class="input-area">
                                        <img src="assets/images/icon/mobile-2.svg" alt="">
                                        <input type="tel" id="mobile" value="{{old('mobile')}}" name="mobile" placeholder="xxxx-xx-xxxx">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="address">Address*</label>
                                    <div class="input-area">
                                        <img src="assets/images/icon/location-2.svg" alt="">
                                        <input type="text" id="address" value="{{old('address')}}" name="address" placeholder="Your Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="gender">Gender*</label>
                                    <div class="input-area">
                                        <img src="assets/images/icon/gender-2.svg" alt="">
                                        <select class="select1" id="gender" value="{{old('gender')}}" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="dob">Date of Birth*</label>
                                    <div class="input-area">
                                        <img src="assets/images/icon/calendar-2.svg" alt="">
                                        <input type="date" id="dob" value="{{old('dob')}}" name="dob" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <button class="primry-btn-2 lg-btn w-unset" type="submit">Post Now</button>
                                </div>
                            </div>                 
                        </div>
                    </form>
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection