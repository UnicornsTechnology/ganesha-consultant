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
                    <h1>Post A Jobs</h1>
                    <span></span>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post A Jobs</li>
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
                    <form method="POST" action="/job-seeker/store" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="name">Name*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/user-2.svg') }}" alt="">
                                        <input type="text" id="name" value="{{ old('name') }}" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="email">Email*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/email-2.svg') }}" alt="">
                                        <input type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="mobile_number">Mobile No.*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/mobile-2.svg') }}" alt="">
                                        <input type="tel" id="mobile_number" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="xxxx-xx-xxxx" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="whatsapp_number">Whatsapp No.*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/whatsapp.svg') }}" alt="">
                                        <input type="tel" id="whatsapp_number" value="{{ old('whatsapp_number') }}" name="whatsapp_number" placeholder="xxxx-xx-xxxx" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="date_of_birth">Date of Birth*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/calendar-2.svg') }}" alt="">
                                        <input type="date" id="date_of_birth" value="{{ old('date_of_birth') }}" name="date_of_birth" placeholder="dd/mm/yyyy" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="industry">Industry*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/industry.svg') }}" alt="">
                                        <input type="text" id="industry" value="{{ old('industry') }}" name="industry" placeholder="Industry" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="job_title">Job Title*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/job-title.svg') }}" alt="">
                                        <input type="text" id="job_title" value="{{ old('job_title') }}" name="job_title" placeholder="Job Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="total_experience">Total Experience*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/experience.svg') }}" alt="">
                                        <input type="text" id="total_experience" value="{{ old('total_experience') }}" name="total_experience" placeholder="Total Experience" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="highest_qualification">Highest Qualification*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/education-2.svg') }}" alt="">
                                        <input type="text" id="highest_qualification" value="{{ old('highest_qualification') }}" name="highest_qualification" placeholder="Highest Qualification" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="current_salary">Current Salary/Month*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/salary-2.svg') }}" alt="">
                                        <input type="text" id="current_salary" value="{{ old('current_salary') }}" name="current_salary" placeholder="Current Salary/Month" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="country">Country*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/country.svg') }}" alt="">
                                        <input type="text" id="country" value="{{ old('country') }}" name="country" placeholder="Country" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="state">State*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/state.svg') }}" alt="">
                                        <input type="text" id="state" value="{{ old('state') }}" name="state" placeholder="State" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="city">City*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/city.svg') }}" alt="">
                                        <input type="text" id="city" value="{{ old('city') }}" name="city" placeholder="City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="complete_address">Complete Address*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/location-2.svg') }}" alt="">
                                        <input type="text" id="complete_address" value="{{ old('complete_address') }}" name="complete_address" placeholder="Complete Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="upload_resume">Upload Resume*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/upload.svg') }}" alt="">
                                        <input type="file" class="form-control" id="upload_resume" name="upload_resume" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="upload_aadhar">Upload Aadhar*</label>
                                    <div class="input-area">
                                        <img src="{{ asset('front_asset/images/icon/upload.svg') }}" alt="">
                                        <input type="file" id="upload_aadhar" class="form-control" name="upload_aadhar" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <button class="primry-btn-2 lg-btn w-unset" type="submit">Submit</button>
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