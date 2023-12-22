@extends('layouts.front.master')

@section('title')
    Blogs
@endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content text-center">
                        <h1>Blog</h1>
                        <span></span>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Blog
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-grid-area pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">


                @foreach ($blogs as $key => $item)
                    <div class="col-lg-4 col-md-6 col-sm-10 mb-20">
                        <div class="recent-article-wrap">
                            <div class="recent-article-img">
                                <img height="250px" width="250px"
                                    src="{{ asset('uploads/blog_images/' . $item->blog_image) }}" alt="Blog Image"
                                    class="img-fluid">
                            </div>
                            <div class="recent-article-content">
                                <div class="recent-article-meta">
                                    <div class="publish-area">
                                        <a href=""><span>New</span></a>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="/blog-details/{{ $item->blog_name_slug }}"><img
                                                    src="{{ asset('front_assets/images/icon/user.svg') }}"
                                                    alt />{{ $item->blog_date }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4>
                                    <a href="/blog-details/{{ $item->blog_name_slug }}">{{ $item->blog_name }}</a>
                                </h4>
                                <div class="explore-btn">
                                    <a href="/blog-details/{{ $item->blog_name_slug }}"><span><img
                                                src="{{ asset('front_assets/images/icon/explore-elliose.svg') }}"
                                                alt /></span>
                                        Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-12 d-flex justify-content-center pt-20">
                    <div class="pagination-area">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"></a>
                                </li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">01</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">02</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">03</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#"></a></li>
                            </ul>
                        </nav>
                    </div>
                </div> --}}


                <div class="col-lg-12 d-flex justify-content-center pt-20">
                    <div class="pagination-area">
                        {{ $blogs->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
