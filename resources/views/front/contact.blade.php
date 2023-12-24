@extends('layouts.front.master')

@section('title')
    Contact Us
@endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="banner-content text-center">
                        <h1>Contact</h1>
                        <span></span>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Contact
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>


    <div class="contact-support-area mb-120">
        <div class="container">
            @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif

            <div class="row g-lg-4 gy-5">

                <div class="col-lg-6">
                    <div class="contect-content">
                        <h4>Need Any Help? Contact Us</h4>
                        <div class="support">
                            <div class="icon">
                                <img src="{{ asset('front_assets/images/icon/footer-support-icon.svg') }}" alt />
                            </div>
                            <div class="content">
                                <h5>Support Line:</h5>
                                <a href="tel:+9588491969
                                9209914441">+9588491969 /
                                    9209914441</a>
                            </div>
                        </div>
                        <div class="">
                            <span class="fw-bold">Email</span>
                            <p>
                                ganesha.consultant22@gmail.com
                            </p>
                            <span class="fw-bold">Address</span>
                            <p>
                                Near Z P School, Chincholi, Daund, Pune, 413130
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-form form-wrapper">
                        <form action="/admin/contact/store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-inner mb-25">
                                        <label for="name">Your Name*</label>
                                        <div class="input-area">
                                            <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt />
                                            <input type="text" id="name" name="name"
                                                placeholder="Enter Your Name" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-inner mb-25">
                                        <label for="phonenumber">Mobile No*</label>
                                        <div class="input-area">
                                            <img src="{{ asset('front_assets/images/icon/phone-2.svg') }}" alt />
                                            <input type="text" id="mobile_no" name="mobile_no"
                                                placeholder="Enter Your Mobile Number" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner mb-25">
                                        <label for="email">Email*</label>
                                        <div class="input-area">
                                            <img src="{{ asset('front_assets/images/icon/email-2.svg') }}" alt />
                                            <input type="text" id="email" name="email"
                                                placeholder="Enter Your Email" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-inner mb-40">
                                        <label for="description">Message</label>
                                        <textarea name="message" id="message" placeholder="Write Your Message..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        <button class="primry-btn-2 lg-btn w-unset" type="submit">
                                            Send Message
                                        </button>
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
