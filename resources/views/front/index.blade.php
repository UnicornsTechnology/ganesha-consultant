@extends('layouts.front.master')
@section('title')
    Job Portal
@endsection
@section('content')
    <?php
    function ago($timestamp)
    {
        $elapsed = time() - strtotime($timestamp);
    
        if ($elapsed <= 0) {
            return 'just now';
        }
    
        $times = [
            31104000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second',
        ];
    
        foreach ($times as $seconds => $unit) {
            $count = floor($elapsed / $seconds);
    
            if ($count != 0) {
                break;
            }
        }
    
        $suffix = $count == 1 ? '' : 's';
    
        return $count . ' ' . $unit . $suffix . ' ago';
    }
    
    ?>
    <div class="hero1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <h1>Your Career’s <span>Opportunity.</span></h1>
                        <p><span>2400</span> Peoples are daily search in this portal, <span> 100+</span> user added job
                            portal!</p>
                        <div class="counter-area">
                            <div class="row g-lg-4 g-md-5 gy-5 justify-content-center">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="counter-single">
                                        <div class="counter-icon">
                                            <img src="{{ asset('front_assets/images/icon/job2.svg') }}" alt="image">
                                        </div>
                                        <div class="coundown">
                                            <p>Live Jobs</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="odometer">
                                                    5581
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="counter-single">
                                        <div class="counter-icon">
                                            <img src="{{ asset('front_assets/images/icon/companies.svg') }}" alt="image">
                                        </div>
                                        <div class="coundown">
                                            <p>Companies</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="odometer">
                                                    804
                                                </h3>
                                                <span>+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="counter-single">
                                        <div class="counter-icon">
                                            <img src="{{ asset('front_assets/images/icon/candidates.svg') }}"
                                                alt="image">
                                        </div>
                                        <div class="coundown">
                                            <p>Candidates</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="odometer">
                                                    500
                                                </h3>
                                                <span>+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="counter-single">
                                        <div class="counter-icon">
                                            <img src="{{ asset('front_assets/images/icon/new-jobs.svg') }}" alt="image">
                                        </div>
                                        <div class="coundown">
                                            <p>New Jobs</p>
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="odometer">
                                                    155
                                                </h3>
                                                <span>+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-search-area">
                            <form method="get" action="/job/search/list">
                                <div class="form-inner job-title">
                                    <input type="text" name="key" placeholder="Job title, keywords"
                                        list="job-options">
                                    <datalist id="job-options">
                                        @foreach ($recentlyAdded as $item)
                                            <option value="{{ $item->job_title_name }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="form-inner category">
                                    <select class="select1" name="location">
                                        <option>Select Location</option>
                                        @foreach ($cities as $item)
                                            <option>{{ $item->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inner">
                                    <button type="submit" class="primry-btn-2 "><img
                                            src="{{ asset('front_assets/images/icon/search-icon.svg') }}" alt>
                                        Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="home1-category pt-120 mb-120">
        <div class="container">
            <div class="row mb-60">
                <div class="col-12 d-flex flex-wrap align-items-end justify-content-md-between justify-content-start gap-3">
                    <div class="section-title1">
                        <h2>Trending Jobs <span>Category</span></h2>
                        <p>To choose your trending job dream & to make future bright.</p>
                    </div>

                </div>
            </div>
            <div
                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 cf justify-content-center">
                @foreach ($categories as $item)
                    <div class="col">
                        <div class="single-category shadow">
                            <div class="category-top">
                                <div class="icon">
                                    <img src="{{ asset('front_assets/images/categoey.webp') }}" width="140px"
                                        height="60px" alt>
                                </div>

                            </div>
                            <div class="category-content">
                                <h5><a href="#">{{ $item->job_category_name }}</a></h5>
                                <a href="#" style="color: darkgreen">Check Now <span></span></a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="home1-featured-area mb-120">
        <div class="container">
            <div class="row mb-60">
                <div class="col-12 d-flex flex-wrap align-items-end justify-content-md-between justify-content-start gap-3">
                    <div class="section-title1">
                        <h2>Latest <span>Featured</span> Jobs</h2>
                        <p>To choose your trending job dream & to make future bright.</p>
                    </div>
                    <div class="explore-btn">
                        <a href="/jobs-list">Explore More <span><img
                                    src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}" alt></span></a>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($featuredJobs as $item)
                    <div class="col-xl-4 col-lg-6">
                        <div class="feature-card shadow">
                            <div class="company-area">
                                <div class="logo">
                                    @if ($item->company_logo)
                                        <img src="{{ asset('uploads/company_logo/' . $item->company_logo) }}"
                                            alt="">
                                    @else
                                        {{-- <img src="{{ asset('front_assets/images/bg/company-logo/company-01.png') }}" alt> --}}
                                    @endif
                                </div>
                                <div class="company-details">
                                    <div class="name-location">
                                        <h5>
                                            @auth
                                                <a
                                                    href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">{{ $item->job_title_name }}</a>
                                            @else
                                                <a href="/student/login">{{ $item->job_title_name }}</a>
                                            @endauth
                                        </h5>
                                        <p>{{ $item->experiences_name }} , {{ $item->job_type_name }} </p>
                                    </div>
                                    <div class="bookmark">
                                        @auth
                                            <a href="/student/add/bookmark/{{ $item->job_id }}" class="bookmark-btn"><i
                                                    class="bi bi-bookmark"></i></a>
                                        @else
                                            <a href="/student/login" class="bookmark-btn"><i class="bi bi-bookmark"></i></a>
                                        @endauth

                                    </div>
                                </div>
                            </div>
                            <div class="job-discription">
                                <ul>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p>
                                            <span class="title">Company:</span>
                                            {{ \Illuminate\Support\Str::limit($item->company_name, $limit = 18, $end = '...') }}

                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p>
                                            <span class="title">Salary:</span> {{ $item->job_package }} /-
                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Location:</span> <span> {{ $item->location_name }}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Deadline:</span> <span>
                                                {{ ago($item->job_posting_date) }}</span></p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Experience:</span> <span>
                                                {{ $item->experiences_name }}</span></p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Job Type:</span> <span>
                                                {{ $item->job_type_name }}</span></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-type-apply">
                                @auth

                                    <div class="apply-btn">
                                        <a href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}"><span><img
                                                    src="{{ asset('front_assets/images/icon/apply-ellipse.svg') }}"
                                                    alt></span>Apply Now</a>
                                    </div>
                                @else
                                    <div class="apply-btn">
                                        <a href="/student/login"><span><img
                                                    src="{{ asset('front_assets/images/icon/apply-ellipse.svg') }}"
                                                    alt></span>Apply Now</a>
                                    </div>
                                @endauth

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 d-flex justify-content-center pt-20">
                <div class="pagination-area">
                    {{ $featuredJobs->onEachSide(-1)->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="home1-work-process mb-120">
        <div class="container">
            <div class="row mb-60">
                <div class="col-12 d-flex justify-content-center">
                    <div class="section-title1 text-center">
                        <h2>JOBS Working <span>Process</span></h2>
                        <p>To choose your trending job dream & to make future bright.</p>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="single-work-process one text-center">
                        <div class="icon">
                            <img src="{{ asset('front_assets/images/icon/account-create.svg') }}" alt>
                        </div>
                        <div class="work-content">
                            <h5><a href="/student/register">Account Create</a></h5>
                            <p>To create your account be confident & safely.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="single-work-process two text-center">
                        <div class="icon">
                            <img src="{{ asset('front_assets/images/icon/job-find.svg') }}" alt>
                        </div>
                        <div class="work-content">
                            <h5><a href="/jobs-list">Find Jobs </a></h5>
                            <p>TSimple and Stress-Free" We simplify form filling for you with our user-friendly platform.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="single-work-process one text-center">
                        <div class="icon">
                            <img src="{{ asset('front_assets/images/icon/job-apply.svg') }}" alt>
                        </div>
                        <div class="work-content">
                            <h5><a href="/jobs-list">Apply Jobs</a></h5>
                            <p>Match Made in Heaven" Find your dream job with ease using our job fit scoring system.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="home1-featured-area mb-120">
        <div class="container">
            <div class="row mb-60">
                <div
                    class="col-12 d-flex flex-wrap align-items-end justify-content-md-between justify-content-start gap-3">
                    <div class="section-title1">
                        <h2>Portal <span>Recent</span> Article</h2>
                        <p>To choose your trending job dream & to make future bright.</p>
                    </div>
                    <div class="explore-btn">
                        <a href="/jobs-list">Explore More <span><img
                                    src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}" alt></span></a>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($recentlyAdded as $item)
                    <div class="col-xl-4 col-lg-6">
                        <div class="feature-card shadow">
                            <div class="company-area">
                                <div class="logo">
                                    {{-- @if ($item->company_logo)
                                        <img src="{{ asset('uploads/company_logo/' . $item->company_logo) }}"
                                            alt="">
                                    @else
                                        <img src="{{ asset('front_assets/images/bg/company-logo/company-01.png') }}" alt>
                                    @endif --}}
                                </div>
                                <div class="company-details">
                                    <div class="name-location">
                                        <h5>
                                            @auth
                                                <a
                                                    href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">{{ $item->job_title_name }}</a>
                                            @else
                                                <a href="/student/login">{{ $item->job_title_name }}</a>
                                            @endauth
                                        </h5>
                                        <p>{{ $item->experiences_name }} , {{ $item->job_type_name }} </p>
                                    </div>
                                    <div class="bookmark">
                                        @auth
                                            <a href="/student/add/bookmark/{{ $item->job_id }}" class="bookmark-btn"><i
                                                    class="bi bi-bookmark"></i></a>
                                        @else
                                            <a href="/student/login" class="bookmark-btn"><i class="bi bi-bookmark"></i></a>
                                        @endauth

                                    </div>
                                </div>
                            </div>
                            <div class="job-discription">
                                <ul>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p>
                                            <span class="title">Company:</span>
                                            {{ \Illuminate\Support\Str::limit($item->company_name, $limit = 18, $end = '...') }}

                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p>
                                            <span class="title">Salary:</span> {{ $item->job_package }} /-
                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Location:</span> <span> {{ $item->location_name }}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Deadline:</span> <span>
                                                {{ ago($item->job_posting_date) }}</span></p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Experience:</span> <span>
                                                {{ $item->experiences_name }}</span></p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                        <p><span class="title">Job Type:</span> <span>
                                                {{ $item->job_type_name }}</span></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-type-apply">
                                @auth
                                    <div class="apply-btn">
                                        <a href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}"><span><img
                                                    src="{{ asset('front_assets/images/icon/apply-ellipse.svg') }}"
                                                    alt></span>Apply Now</a>
                                    </div>
                                    <div class="apply-btn">
                                        <a href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}"><span><img
                                                    src="{{ asset('front_assets/images/icon/apply-ellipse.svg') }}"
                                                    alt></span>Apply Now</a>
                                    </div>
                                @else
                                    <div class="apply-btn">
                                        <a href="/student/login"><span><img
                                                    src="{{ asset('front_assets/images/icon/apply-ellipse.svg') }}"
                                                    alt></span>Apply Now</a>
                                    </div>
                                    <div class="apply-btn">
                                        <a href="/student/login"><span><img
                                                    src="{{ asset('front_assets/images/icon/apply-ellipse.svg') }}"
                                                    alt></span>Apply Now</a>
                                    </div>
                                @endauth

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 d-flex justify-content-center pt-20">
                <div class="pagination-area">
                    {{ $recentlyAdded->onEachSide(-1)->links() }}
                </div>
            </div>
        </div>
    </div>



    <div class="home1-review-area mb-120">
        <div class="container">
            <div class="row mb-60">
                <div
                    class="col-12 d-flex flex-wrap align-items-end justify-content-md-between justify-content-start gap-3">
                    <div class="section-title1">
                        <h2>Trusted User <span>Reviews</span></h2>
                        <p>To choose your trending job dream & to make future bright.</p>
                    </div>
                    <div class="swiper-btn1 d-flex align-items-center">
                        <div class="left-btn prev-2">
                            <img src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}" alt>
                        </div>
                        <div class="right-btn next-2">
                            <img src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}" alt>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper testimonial-slider1">
                    <div class="swiper-wrapper">
                        @foreach ($emp as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="author-img">
                                        <img src="{{ asset('uploads/employee_images/' . $item->emp_img) }}" alt>
                                        <div class="quat-icon">
                                            <img src="{{ asset('front_assets/images/icon/quat-icon.svg') }}" alt>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="author-review-area">
                                            <div class="author-area">
                                                <h5>{{ $item->emp_name }}</h5>
                                                <span>{{ $item->working_potion }}</span>
                                            </div>
                                            <ul>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-fill"></i></li>
                                                <li><i class="bi bi-star-half"></i></li>
                                            </ul>
                                        </div>
                                        <p>{!! \Illuminate\Support\Str::limit($item->description, $limit = 100, $end = '...') !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="home1-trusted-company mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5>Our Trusted Company</h5>
                    </div>
                    <div class="swiper trusted-company-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="company-logo">
                                    <img src="{{ asset('front_assets/images/bg/company-logo/trusted-company-01.png') }}"
                                        alt>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="company-logo">
                                    <img src="{{ asset('front_assets/images/bg/company-logo/trusted-company-02.png') }}"
                                        alt>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="company-logo">
                                    <img src="{{ asset('front_assets/images/bg/company-logo/trusted-company-03.png') }}"
                                        alt>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="company-logo">
                                    <img src="{{ asset('front_assets/images/bg/company-logo/trusted-company-04.png') }}"
                                        alt>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="company-logo">
                                    <img src="{{ asset('front_assets/images/bg/company-logo/trusted-company-05.png') }}"
                                        alt>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="company-logo">
                                    <img src="{{ asset('front_assets/images/bg/company-logo/trusted-company-06.png') }}"
                                        alt>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home1-location-area mb-120">
        <div class="container">
            <div class="row mb-60">
                <div
                    class="col-12 d-flex flex-wrap align-items-end justify-content-md-between justify-content-start gap-3">
                    <div class="section-title1">
                        <h2>Get Dream With <span>Location</span></h2>
                        <p>To choose your trending job dream & to make future bright.</p>
                    </div>
                    <div class="swiper-btn1 d-flex align-items-center">
                        <div class="left-btn prev-1">
                            <img src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}" alt>
                        </div>
                        <div class="right-btn next-1">
                            <img src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}" alt>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper location-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="location-card">
                                <div class="location-img">
                                    <img class="img-fluid" src="{{ asset('front_assets/images/bg/dhaka1.png') }}" alt>
                                </div>
                                <div class="location-content text-center">
                                    <h5><a href="job-listing1.html"><img
                                                src="{{ asset('front_assets/images/icon/location.svg') }}" alt>
                                            Bangladesh</a></h5>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="location-card">
                                <div class="location-img">
                                    <img class="img-fluid" src="{{ asset('front_assets/images/bg/newyork1.png') }}" alt>
                                </div>
                                <div class="location-content text-center">
                                    <h5><a href="job-listing1.html"><img
                                                src="{{ asset('front_assets/images/icon/location.svg') }}" alt>
                                            USA</a></h5>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="location-card">
                                <div class="location-img">
                                    <img class="img-fluid" src="{{ asset('front_assets/images/bg/chicago.png') }}" alt>
                                </div>
                                <div class="location-content text-center">
                                    <h5><a href="job-listing1.html"><img
                                                src="{{ asset('front_assets/images/icon/location.svg') }}" alt>
                                            Australia</a></h5>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="location-card">
                                <div class="location-img">
                                    <img class="img-fluid" src="{{ asset('front_assets/images/bg/sylhet.png') }}" alt>
                                </div>
                                <div class="location-content text-center">
                                    <h5><a href="job-listing1.html"><img
                                                src="{{ asset('front_assets/images/icon/location.svg') }}" alt>India
                                        </a></h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
