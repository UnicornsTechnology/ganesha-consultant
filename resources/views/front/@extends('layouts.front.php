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
<!-- Banner Section-->
<section class="banner-section-two">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp">
                    <div class="title-box">
                        <h3>Find Your Perfect Job <br>Match</h3>
                        <div class="text">Find Jobs, Employment & Career Opportunities</div>
                    </div>

                    <!-- Job Search Form -->
                    <div class="job-search-form">
                        <form method="get" action="/job/search/list">
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <span class="icon flaticon-search-1"></span>
                                    <input type="text" name="key" placeholder="Job title, keywords, or company">
                                </div>

                                <!-- Form Group -->
                                <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                                    <span class="icon flaticon-map"></span>
                                    <select class="chosen-select" name="location" style="z-index:100">
                                        <option value="">Select Location</option>
                                        @foreach ($cities as $item)
                                        <option>{{ $item->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-3 col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Find
                                            Jobs</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Search Form -->

                    <!-- Popular Search -->
                    <div class="popular-searches">
                        <span class="title">Popular Searches : </span>
                        <a href="#">Full Stack Developer</a>,
                        <a href="#">Front End Developer</a>,
                        <a href="#">Mobile App Developer</a>,
                        <a href="#">Software Testing</a>,
                    </div>
                    <!-- End Popular Search -->

                    <div class="bottom-box">
                        <div class="count-employers">
                            <span class="title">10k+ Candidates</span>
                            <img src="{{ asset('front_assets/images/resource/multi-peoples.png') }}" alt="">
                        </div>
                        <div class="btn btn-success">
                            <a href="/student/register" class="upload-cv"><span class="btn-success"></span> Register
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="image-column col-lg-5 col-md-12">
                <div class="image-box">
                    <figure class="main-image anm" data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2"><img src="{{ asset('front_assets/images/resource/banner-img-2.png') }}" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section-->

<!-- Work Section -->
<section class="work-section">
    <div class="auto-container">
        @if (Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <div class="sec-title text-center">
            <h2>How It Works?</h2>
            <div class="text">Job for anyone, anywhere</div>
        </div>

        <div class="row wow fadeInUp">
            <!-- Work Block -->
            <div class="work-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image"><img src="{{ asset('front_assets/images/resource/work-1.png') }}" alt=""></figure>
                    <h5>Form Filling </h5>
                    <p>Simple and Stress-Free"
                        We simplify form filling for you with our user-friendly platform. Navigate with ease and enjoy a
                        streamlined experience with helpful prompts.</p>
                </div>
            </div>

            <!-- Work Block -->
            <div class="work-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image"><img src="{{ asset('front_assets/images/resource/work-2.png') }}" alt=""></figure>
                    <h5>Job Fit Scoring</h5>
                    <p>Match Made in Heaven"
                        Find your dream job with ease using our job fit scoring system. Our algorithm matches your
                        skills, experience, and career goals to the perfect job.</p>
                </div>
            </div>

            <!-- Work Block -->
            <div class="work-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image"><img src="{{ asset('front_assets/images/resource/work-3.png') }}" alt=""></figure>
                    <h5>Help Every Step of the Way</h5>
                    <p>We're here to help with any questions or guidance you may need. Reach out to our dedicated team
                        for support every step of the way.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Work Section -->

<!-- Job Section -->
<section class="job-section-two">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Featured Jobs</h1>
            <div class="text">Know your worth and find the job that qualify your life</div>
        </div>

        <div class="row wow fadeInUp">
            @foreach ($featuredJobs as $item)
            <div class="job-block-two col-lg-6">
                <div class="inner-box">
                    <div class="content">
                        <span class="company-logo"><img src="{{ asset('uploads/company_logo/' . $item->company_logo) }}" alt=""></span>
                        <h4> @auth
                            <a href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">{{ $item->job_title_name }}</a>
                            @else
                            <a href="/student/login">{{ $item->job_title_name }}</a>
                            @endauth
                        </h4>
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-briefcase mx-1"></span>
                                {{ $item->company_name }}
                            </div>
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-map-locator mx-1"></span>
                                {{ $item->location_name }}
                            </div>
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-clock-3 mx-1"></span>
                                {{ ago($item->job_posting_date) }}
                            </div>
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-money mx-1"></span> {{ $item->job_package }}
                            </div>

                        </div>
                        <li class="privacy">
                            <ul class="job-other-info">
                                <li class="required mt-3">{{ $item->experiences_name }}</li>
                                <li class="privacy mt-3">{{ $item->job_type_name }}</li>
                            </ul>
                        </li>
                    </div>

                    @auth
                    <a href="/student/add/bookmark/{{ $item->job_id }}" class="bookmark-btn"><span class="flaticon-bookmark"></span></a>
                    @else
                    <a href="/student/login" class="bookmark-btn"><span class="flaticon-bookmark"></span></a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12">
        <nav class="ls-pagination" id="pgntn">
            <ul>
                {{ $featuredJobs->links() }}
            </ul>
        </nav>
        </div>
    </div>
</section>
<!-- End Job Section -->

<!-- Job Section -->
<section class="job-section-two">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Recently Added</h1>
            <div class="text">Know your worth and find the job that qualify your life</div>
        </div>

        <div class="row wow fadeInUp">
            @foreach ($recentlyAdded as $item)
            <div class="job-block-two col-lg-6">
                <div class="inner-box">
                    <div class="content">
                        <span class="company-logo"><img src="{{ asset('uploads/company_logo/' . $item->company_logo) }}" alt=""></span>
                        <h4> @auth
                            <a href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">{{ $item->job_title_name }}</a>
                            @else
                            <a href="/student/login">{{ $item->job_title_name }}</a>
                            @endauth
                        </h4>
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-briefcase mx-1"></span>
                                {{ $item->company_name }}
                            </div>
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-map-locator mx-1"></span>
                                {{ $item->location_name }}
                            </div>
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-clock-3 mx-1"></span>
                                {{ ago($item->job_posting_date) }}
                            </div>
                            <div class="col-6 col-sm-6">
                                <span class="icon flaticon-money mx-1"></span> {{ $item->job_package }}
                            </div>

                        </div>
                        <li class="privacy">
                            <ul class="job-other-info">
                                <li class="required mt-3">{{ $item->experiences_name }}</li>
                                <li class="privacy mt-3">{{ $item->job_type_name }}</li>
                            </ul>
                        </li>
                    </div>

                    @auth
                    <a href="/student/add/bookmark/{{ $item->job_id }}" class="bookmark-btn"><span class="flaticon-bookmark"></span></a>
                    @else
                    <a href="/student/login" class="bookmark-btn"><span class="flaticon-bookmark"></span></a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
        <nav class="ls-pagination" id="pgntn">
            <ul>
                {{ $featuredJobs->links() }}
            </ul>
        </nav>

    </div>
</section>
<!-- End Job Section -->

<!-- Features Section -->
<section class="features-section">
    <div class="auto-container">
        <div class="sec-title">
            <h2>Featured Cities</h2>
        </div>

        <div class="row wow fadeInUp">
            <div class="column col-lg-4 col-md-6 col-sm-12">
                <!-- Feature Block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('front_assets/images/resource/featured-1.png') }}" alt=""></figure>
                        <div class="overlay-box">
                            <div class="content">
                                <h5>Hyderabad</h5>
                                <span class="total-jobs">Jobs Opning</span>
                                <a href="#" class="overlay-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column col-lg-4 col-md-6 col-sm-12">
                <!-- Feature Block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('front_assets/images/resource/featured-2.png') }}" alt=""></figure>
                        <div class="overlay-box">
                            <div class="content">
                                <h5>Pune</h5>
                                <span class="total-jobs"> Jobs Opning</span>
                                <a href="#" class="overlay-link"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('front_assets/images/resource/featured-4.png') }}" alt=""></figure>
                        <div class="overlay-box">
                            <div class="content">
                                <h5>Mumbai</h5>
                                <span class="total-jobs"> Jobs Opning</span>
                                <a href="#" class="overlay-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="feature-block col-lg-4 col-md-6 col-sm-12">

                <!-- Feature Block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('front_assets/images/resource/featured-3.png') }}" alt=""></figure>
                        <div class="overlay-box">
                            <div class="content">
                                <h5>Noida</h5>
                                <span class="total-jobs"> Jobs Opning</span>
                                <a href="#" class="overlay-link"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('front_assets/images/resource/featured-5.png') }}" alt=""></figure>
                        <div class="overlay-box">
                            <div class="content">
                                <h5>Rajasthan </h5>
                                <span class="total-jobs"> Jobs Opning</span>
                                <a href="#" class="overlay-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Section -->

<!-- Call To Action Two -->
<section class="call-to-action-two" style="background-image: url(front_assets/images/background/1.jpg);">
    <div class="auto-container wow fadeInUp">
        <div class="sec-title light text-center">
            <h2>Your Dream Jobs Are Waiting</h2>
            <div class="text">Over 1 million interactions, 50,000 success stories Make yours now.</div>
        </div>

        <div class="btn-box">
            <a href="/jobs-list" target="_blank" class="theme-btn btn-style-three">Search Job</a>
            <a href="/student/login" target="_blank" class="theme-btn btn-style-two">Apply Job Now</a>
        </div>
    </div>
</section>
<!-- End Call To Action -->

<!-- Candidates Section -->
<section class="candidates-section">
    <div class="auto-container">
        <div class="sec-title">
            <h2>Featured Candidates</h2>
            <div class="text"> Providing opportunities for employees to learn new skills, take on new challenges, and
                grow in their careers can increase job satisfaction.</div>
        </div>

        <div class="carousel-outer wow fadeInUp">
            <div class="candidates-carousel owl-carousel owl-theme default-dots">
                <!-- Candidate Block -->
                @foreach ($emp as $item)
                <div class="candidate-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('uploads/employee_images/' . $item->emp_img) }}" alt="employee image"></figure>
                        <h4 class="name">{{ $item->emp_name }}</h4>
                        <span class="designation">{{ $item->working_potion }}</span>
                        <div class="location"><i class="flaticon-map-locator"></i>{{ $item->location }}</div>
                        <a href="/employee/profile/{{ $item->employee_id }}" class="theme-btn btn-style-one"><span class="btn-title">View
                                Profile</span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Candidates Section -->
<!-- Call To Action Three -->
<section class="call-to-action-three">
    <div class="auto-container">
        <div class="outer-box">
            <div class="sec-title">
                <h2>Let's Find The Job For you ...</h2>
                <div class="text">The goal is to match the individual's skills, interests, and experience with a job
                    that fits their qualifications and aspirations.</div>
            </div>

            <div class="btn-box">
                <a href="/jobs-list" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Search
                        Job</span></a>
            </div>
        </div>
    </div>
</section>
<!-- End Call To Action -->
@endsection