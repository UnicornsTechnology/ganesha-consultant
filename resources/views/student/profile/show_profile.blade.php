@extends('layouts.student.master')
@section('title')
    Profile
@endsection
@section('content')
    <!-- Dashboard -->
    <div class="col-lg-9">
        @if (Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <div class="my-profile-inner">
            <div class="form-wrapper mb-60">
                <div class="section-title">
                    <h5>My Profile</h5>
                </div>
                <form class="profile-form" method="POST" action="/student/profile/update">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Full Name*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="full_name"
                                        value="{{ isset($user->name) ? $user->name : '' }}"
                                        placeholder="First Name">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Mobile Number*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/phone-2.svg') }}" alt>
                                    <input type="text" name="mobile_number"
                                        value="{{ isset($user->mobile_number) ? $user->mobile_number : '' }}"
                                        placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Education</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/qualification-2.svg') }}" alt>
                                    <input type="text" name="education"
                                        value="{{ isset($user->education) ? $user->education : '' }}"
                                        placeholder="Education">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>City*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/website-2.svg') }}" alt>
                                    <input type="text" name="city"
                                        value="{{ isset($user->city) ? $user->city : '' }}" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label for="username">Select Category</label>
                                <select name="job_category_id" id="username" class="form-control"
                                    style="line-height:2.5">
                                    @foreach ($categories as $item)
                                      @if ($item->job_category_id == $user->job_category__id)
                                      <option value="{{ $item->job_category_id }}" selected> 
                                        {{ $item->job_category_name }}</option>
                                      @else
                                      <option value="{{ $item->job_category_id }}" > 
                                        {{ $item->job_category_name }}</option>
                                      @endif
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Email*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/email-2.svg') }}" alt>
                                    <input type="text" name="email"
                                        value="{{ isset($user->email) ? $user->email : '' }}"
                                        placeholder="Email address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Password*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="password"
                                        {{-- value="{{ isset($user->password) ? $user->password : '' }}" --}}
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Confirm Password*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="password"
                                        {{-- value="{{ isset($user->password) ? $user->password : '' }}" --}}
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-inner">
                            <button class="primry-btn-2 lg-btn w-unset" type="submit">Update Profile</button>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>First Name*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="dp_firstname"
                                        value="{{ isset($student->dp_firstname) ? $student->dp_firstname : '' }}"
                                        placeholder="First Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Middle Name*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="dp_middlename"
                                        value="{{ isset($student->dp_middlename) ? $student->dp_middlename : '' }}"
                                        placeholder="Middle Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Last Name*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="dp_lastname"
                                        value="{{ isset($student->dp_lastname) ? $student->dp_lastname : '' }}"
                                        placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Phone Number*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/phone-2.svg') }}" alt>
                                    <input type="text" name="dp_mobile_number"
                                        value="{{ isset($student->dp_mobile_number) ? $student->dp_mobile_number : '' }}"
                                        placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Mobile Number Alt*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/phone-2.svg') }}" alt>
                                    <input type="text" name="dp_mobile_number_alt"
                                        value="{{ isset($student->dp_mobile_number_alt) ? $student->dp_mobile_number_alt : '' }}"
                                        placeholder="Mobile Number Alt">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Email*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/email-2.svg') }}" alt>
                                    <input type="text" name="dp_email"
                                        value="{{ isset($student->dp_email) ? $student->dp_email : '' }}"
                                        placeholder="Email address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Email Address Alt*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/email-2.svg') }}" alt>
                                    <input type="text" name="dp_email_alt"
                                        value="{{ isset($student->dp_email_alt) ? $student->dp_email_alt : '' }}"
                                        placeholder="Email Address Alt">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Website Link*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/website-2.svg') }}" alt>
                                    <input type="text" name="name" placeholder="Website" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Current Salary($)</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="dp_current_salary"
                                        value="{{ isset($student->dp_current_salary) ? $student->dp_current_salary : '' }}"
                                        placeholder="Current Salary($)">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Expected Salary($)</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                    <input type="text" name="dp_expected_salary"
                                        value="{{ isset($student->dp_expected_salary) ? $student->dp_expected_salary : '' }}"
                                        placeholder="Expected Salary($)">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Experience</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/qualification-2.svg') }}" alt>
                                    <input type="text" name="dp_experience"
                                        value="{{ isset($student->dp_experience) ? $student->dp_experience : '' }}"
                                        placeholder="Experience">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Your Age*</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/clock-2.svg') }}" alt>
                                    <input type="text" name="dp_age"
                                        value="{{ isset($student->dp_age) ? $student->dp_age : '' }}" placeholder="Age">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Education</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/qualification-2.svg') }}" alt>
                                    <input type="text" name="dp_education"
                                        value="{{ isset($student->dp_education) ? $student->dp_education : '' }}"
                                        placeholder="Education">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Language</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/language-2.svg') }}" alt>
                                    <input type="text" name="dp_languages"
                                        value="{{ isset($student->dp_languages) ? $student->dp_languages : '' }}"
                                        placeholder="English, Marathi, Hindi">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-inner mb-50">
                                <label>Description*</label>
                                <textarea placeholder="Description" name="dp_description">{{ isset($student->dp_description) ? $student->dp_description : '' }}</textarea>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="section-title">
                        <h5 class="text-info">Social Network:</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Facebook</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/facebook-2.svg') }}" alt>
                                    <input type="text" name="dp_facebook_url"
                                        value="{{ isset($student->dp_facebook_url) ? $student->dp_facebook_url : '' }}"
                                        placeholder="www.facebook.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>LinkedIn</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/linkedin-2.svg') }}" alt>
                                    <input type="text" name="dp_linkedin_url"
                                        value="{{ isset($student->dp_linkedin_url) ? $student->dp_linkedin_url : '' }}"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-50">
                                <label>Github</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/dribble-2.svg') }}" alt>
                                    <input type="text" name="dp_github_url"
                                        value="{{ isset($student->dp_github_url) ? $student->dp_github_url : '' }}"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-title mb-3">
                        <h4 class="text-info">Contact Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Country</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/map-2.svg') }}" alt>
                                    <input type="text" name="dp_country"
                                        value="{{ isset($student->dp_country) ? $student->dp_country : '' }}"
                                        placeholder="Country">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>State</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/map-2.svg') }}" alt>
                                    <input type="text" name="dp_state"
                                        value="{{ isset($student->dp_state) ? $student->dp_state : '' }}"
                                        placeholder="State">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>District</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/map-2.svg') }}" alt>
                                    <input type="text" name="dp_district"
                                        value="{{ isset($student->dp_district) ? $student->dp_district : '' }}"
                                        placeholder="District">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Taluka</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/map-2.svg') }}" alt>
                                    <input type="text" name="dp_taluka"
                                        value="{{ isset($student->dp_taluka) ? $student->dp_taluka : '' }}"
                                        placeholder="Taluka">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>City/Village</label>
                                <div class="input-area">
                                    <img src="{{ asset('front_assets/images/icon/map-2.svg') }}" alt>
                                    <input type="text" name="dp_city_village"
                                        value="{{ isset($student->dp_city_village) ? $student->dp_city_village : '' }}"
                                        placeholder="City/Village">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-inner">
                                <button class="primry-btn-2 lg-btn w-unset" type="submit">Edit</button>
                            </div>
                        </div>
                    </div> --}}


                </form>
            </div>
        </div>
    </div>
    <!-- End Dashboard -->
@endsection
