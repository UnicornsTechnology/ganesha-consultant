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
                    <form method="POST" action="/job-provider/store">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title2">
                                    <h5>Job Information:</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="owner_name">Owner Name*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">   
                                        <input type="text" id="owner_name" value="{{ old('owner_name') }}" name="owner_name" placeholder="Owner Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="job_role">Job Role*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/category.svg')}}" alt="">
                                        <input type="text" id="job_role" value="{{ old('job_role') }}" name="job_role" placeholder="Job Role" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="job_category">Job Category*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/category-2.svg')}}" alt="">
                                        <select name="job_category" id="" class=" select1">
                                            @foreach ($categories as $item)
                                                <option value="{{$item->job_category_id}}">{{$item->job_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="institute_name">Name of Institute*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="text" id="institute_name" value="{{ old('institute_name') }}" name="institute_name" placeholder="Name of Institute" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="qualification_needed">Qualification Needed*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="text" id="qualification_needed" value="{{ old('qualification_needed') }}" name="qualification_needed" placeholder="Qualification Needed" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="experience_needed">Experience Needed*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="text" id="experience_needed" value="{{ old('experience_needed') }}" name="experience_needed" placeholder="Experience Needed" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="monthly_salary">Monthly Salary*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="text" id="monthly_salary" value="{{ old('monthly_salary') }}" name="monthly_salary" placeholder="Monthly Salary" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="selection_process">Process of Selections*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="text" id="selection_process" value="{{ old('selection_process') }}" name="selection_process" placeholder="Selection Process" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="job_location">Job Location*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="text" id="job_location" value="{{ old('job_location') }}" name="job_location" placeholder="Job Location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inner mb-25">
                                    <label for="mobile_number">Your Mobile No.*</label>
                                    <div class="input-area">
                                        <img src="{{asset('front_assets/images/icon/company-2.svg')}}" alt="">
                                        <input type="tel" id="mobile_number" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="xxxx-xx-xxxx" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner mb-30">
                                    <label for="requirement">Requirement*</label>
                                    <textarea name="requirement" id="requirement" placeholder="Greeting from TKL Consultancy! Put your requirement over here please." required>{{ old('requirement') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner mb-30">
                                    <label for="description">Description*</label>
                                    <textarea name="description" id="description" placeholder="Description" required>{{ old('description') }}</textarea>
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