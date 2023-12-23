@extends('layouts.front.master')

@section('title')
    Blog Details
@endsection
@section('content')
    <!-- Blog Single -->
    {{-- <section class="blog-single">
        <div class="auto-container">
            <div class="upper-box">
                <h3>{{ $blog->blog_name }}</h3>
                <ul class="post-info">
                    <li><span><img src="{{ asset('uploads/blog_images/' . $blog->blog_image) }}" alt="" height="200px"
                                width="200px"></span>
                    </li>
                    <li>{{ date('d-m-Y', strtotime($blog->blog_date)) }}</li>
                    <li>By Admin</li>
                </ul>
            </div>
        </div>
        <figure class="main-image"><img src="{{ asset('images/resource/blog-single.jpg') }}" alt=""></figure>
        <div class="auto-container">
            <h4>Blog Description</h4>
            {!! $blog->description !!}

            <!-- Other Options -->
            <div class="other-options">
                <div class="social-share">
                    <h5>Share this post</h5>
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                </div>

            </div>

            <!-- Post Control -->
            <div class="post-control">
                @if ($previousBlog)
                    <div class="prev-post">
                        <span class="icon flaticon-back"></span>
                        <span class="title">Previous Post</span>
                        <h5><a href="/blog-details/{{ $previousBlog->blog_name_slug }}">{{ $previousBlog->blog_name }}</a>
                        </h5>
                    </div>
                @endif
                @if ($nextBlog)
                    <div class="next-post">
                        <span class="icon flaticon-back"></span>
                        <span class="title">Previous Post</span>
                        <h5><a href="/blog-details/{{ $nextBlog->blog_name_slug }}">{{ $nextBlog->blog_name }}</a></h5>
                    </div>
                @endif
            </div>

        </div>
    </section> --}}
    <!-- End Blog Single -->

    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content text-center">
                        <h1>Blog Details</h1>
                        <span></span>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Blog Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="company-details-area pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="post-thumb">
                        {{-- <img class="img-fluid" src="{{ asset('front_assets/images/bg/blog-dt-img.png') }}" alt /> --}}
                        <img src="{{ asset('uploads/blog_images/' . $blog->blog_image) }}" alt="Blog Image"
                            class="img-fluid">
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="company-details-content">
                                <h5>{{ $blog->blog_name }}</h5>
                                <h5>Date : {{ $blog->blog_date }}</h5>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="company-details-content">
                                <h5>{!! $blog->description !!}</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
