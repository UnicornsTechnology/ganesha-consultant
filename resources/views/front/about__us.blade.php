@extends('layouts.front.master')

@section('title')
    Abouts Us
@endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content text-center">
                        <h1>About US</h1>
                        <span></span>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    About US
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-details-area pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="col-lg-12">
                    <div class="blog-details-wrap">
                        <div class="recent-article-img">
                            <img class="img-fluid" src="{{ asset('front_assets/images/blog/blog-dt-img.png') }}" alt />
                            <div class="publish-area d-xl-none d-flex">
                                <a href="#"><span>12</span>June</a>
                            </div>
                        </div>
                        <div class="recent-article-content">

                            <h2>
                                About Hire Top Skills Job Portal
                            </h2>
                            <div class="for-devider"></div>
                            <p>
                                Hire Top Skills Job Portal is a platform dedicated to helping job seekers find their ideal
                                careers and employers find the right talent. Our mission is to create a seamless and
                                efficient process for both job seekers and employers by connecting them through our
                                platform.

                                We believe that finding a job should be a positive and stress-free experience, and that's
                                why we've made it our goal to create a user-friendly platform that is accessible to
                                everyone. Our platform is designed to make it easy for job seekers to find job openings that
                                match their skills and interests, and for employers to find the right candidates for their
                                open positions. At Hire Top Skills, we're committed to providing the best possible service
                                to both job seekers and employers. We continually update our platform with the latest job
                                listings and provide valuable resources and support to help job seekers succeed in their job
                                search.

                                Whether you're just starting your job search or are a seasoned professional looking for a
                                new opportunity, Hire Top Skills Job Portal is here to help. Join our growing community
                                today and take the first step towards finding your dream job!
                            </p>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
