@extends('layouts.web_layout')
@section('title')
    Royal Marriage Bureau
@endsection
@section('content')
    <!-- BANNER & SEARCH -->
    <section>
        <div class="str">
            <div class="hom-head">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <p>The World's No.1 Matrimonial Service</p>
                                <h1>Find your<br><b>Right Match</b> here</h1>
                                <p>Most trusted Matrimony Brand in the World.</p>
                            </div>
                            <div class="ban-search chosenini">
                                <form id="searchForm" method="GET">
                                    <ul>
                                        <li class="sr-look">
                                            <div class="form-group">
                                                <label>I'm looking for</label>
                                                <select id="genderSelect" class="chosen-select"
                                                    onchange="updateFormAction()">
                                                    <option value="0">I'm looking for</option>
                                                    <option value="1">Men</option>
                                                    <option value="2">Women</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-age">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <select class="chosen-select" name="age">
                                                    <option value="0">
                                                        Select age
                                                    </option>
                                                    <option value="[18,30]">18 to
                                                        30
                                                    </option>
                                                    <option value="[31,40]">31 to
                                                        40
                                                    </option>
                                                    <option value="[41,50]">41 to
                                                        50
                                                    </option>
                                                    <option value="[51,60]">51 to
                                                        60
                                                    </option>
                                                    <option value="[61,70]">61 to
                                                        70
                                                    </option>
                                                    <option value="[71,80]">71 to
                                                        80
                                                    </option>
                                                    <option value="[81,90]">81 to
                                                        90
                                                    </option>
                                                    <option value="[91,100]">91 to
                                                        100
                                                    </option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-reli">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="chosen-select" name="religin">
                                                    @foreach ($religion as $item)
                                                        <option value="{{ $item->religion_id }}"
                                                            {{ request('religin') == $item->religion_id ? 'selected' : '' }}>
                                                            {{ $item->religion_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-cit">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="chosen-select" name="city">
                                                    @foreach ($city as $item)
                                                        <option value="{{ $item->city_id }}"
                                                            {{ request('city') == $item->city_id ? 'selected' : '' }}>
                                                            {{ $item->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-btn">
                                            <input type="submit" value="Search">
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER SLIDER -->
    <section>
        <div class="hom-ban-sli">
            <div>
                <ul class="ban-sli">
                    <li>
                        <div class="image">
                            <img src="{{ asset('website/images/ban-bg.jpg') }}" alt="" loading="lazy">
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="{{ asset('website/images/banner2.jpg') }}" alt="" loading="lazy">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- QUICK ACCESS -->
    <section>
        <div class="str home-acces-main">
            <div class="container">
                <div class="row">
                    <!-- BACKGROUND SHAPE -->
                    <div class="wedd-shap">
                        <span class="abo-shap-1"></span>
                        <span class="abo-shap-4"></span>
                    </div>
                    <!-- END BACKGROUND SHAPE -->

                    <div class="home-tit">
                        <p>Quick Access</p>
                        <h2><span>Our Services</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="home-acces">
                        <ul class="hom-qui-acc-sli">
                            <li>
                                <div class="wow fadeInUp hacc hacc1" data-wow-delay="0.1s">
                                    <div class="con">
                                        <img src="{{ asset('website/images/icon/user.png') }}" alt=""
                                            loading="lazy">
                                        <h4>Browse Profiles</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="/about-us">Check About</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc2" data-wow-delay="0.2s">
                                    <div class="con">
                                        <img src="{{ asset('website/images/icon/gate.png') }}" alt=""
                                            loading="lazy">
                                        <h4>Wedding</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="/about-us">Check About</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc3" data-wow-delay="0.3s">
                                    <div class="con">
                                        <img src="{{ asset('website/images/icon/couple.png') }}" alt=""
                                            loading="lazy">
                                        <h4>All Services</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="/about-us">Check About</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc4" data-wow-delay="0.4s">
                                    <div class="con">
                                        <img src="{{ asset('website/images/icon/hall.png') }}" alt=""
                                            loading="lazy">
                                        <h4>Join Now</h4>
                                        <p>Start for free</p>
                                        <a href="/membership-plans">Get started</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc3" data-wow-delay="0.3s">
                                    <div class="con">
                                        <img src="{{ asset('website/images/icon/photo-camera.png') }}" alt=""
                                            loading="lazy">
                                        <h4>Photo gallery</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="/about-us">Check About</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc4" data-wow-delay="0.4s">
                                    <div class="con">
                                        <img src="{{ asset('website/images/icon/cake.png') }}" alt=""
                                            loading="lazy">
                                        <h4>Success Marriages</h4>
                                        <p>1800+ Profiles</p>
                                        <a href="/users/register">Get Register</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- TRUST BRANDS -->
    <section>
        <div class="hom-cus-revi">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2><span>Trust by <b class="num">1500</b>+ Couples</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="slid-inn cus-revi">
                        <ul class="slider3">
                            @foreach ($tcouple as $item)
                                <li>
                                    <div class="cus-revi-box">
                                        <div class="revi-im">
                                            <img src="{{ asset('uploads/trusted-couples/' . $item->tc_image) }}"
                                                alt="" loading="lazy">
                                            <i class="cir-com cir-1"></i>
                                            <i class="cir-com cir-2"></i>
                                            <i class="cir-com cir-3"></i>
                                        </div>
                                        <p>{{ $item->tc_review }} </p>
                                        <h5>{{ $item->tc_name }}</h5>
                                        <span>{{ $item->tc_location }}</span>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="cta-full-wid">
                        <a href="#!" class="cta-dark">Your story is waiting to happen!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ban-home">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span><i class="no1"></i>The World's No.1 Matrimonial Service</span>
                                <h2>Why choose us</h2>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-sec2">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.1">
                                <img src="{{ asset('website/images/icon/prize.png') }}" alt="" loading="lazy">
                                <h4>Genuine profiles</h4>
                                <p>Contact genuine profiles with 100% verified mobile</p>
                            </div>
                        </li>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.3">
                                <img src="{{ asset('website/images/icon/trust.png') }}" alt="" loading="lazy">
                                <h4>Most trusted</h4>
                                <p>The most trusted wedding Royal Marriage Bureau</p>
                            </div>
                        </li>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.6">
                                <img src="{{ asset('website/images/icon/rings.png') }}" alt="" loading="lazy">
                                <h4>2000+ weddings</h4>
                                <p>Lakhs of peoples have found their life partner</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- ABOUT START -->
    <section>
        <div class="ab-wel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ab-wel-lhs">
                            <span class="ab-wel-3"></span>
                            <img src="{{ asset('website/images/about/1.jpg') }}" alt="" loading="lazy"
                                class="ab-wel-1">
                            <img src="{{ asset('website/images/couples/23.jpg') }}" alt="" loading="lazy"
                                class="ab-wel-2">
                            <span class="ab-wel-4"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit">
                                <h2>Download App <em>Royal Marriage Bureau</em></h2>
                                <div class="d-flex justify-content-around">
                                    <img src="{{ asset('website/images/icon/playstore-web.svg') }}" alt="">
                                </div>
                                <p>Download our mobile app & find start searching your life partner in a tap.</p>
                            </div>
                            <div class="ab-wel-tit-1">
                                <p>A marriage bureau is helps people find suitable matches for marriage. This can be done
                                    through online services or by matching people based on their preferences and interests.
                                </p>
                            </div>
                            <div class="ab-wel-tit-2">
                                <ul>
                                    <li>
                                        <div>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <h4>Enquiry <em>+91 7020403671</em></h4>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                            <div class="ab-wel-tit-2">
                                <ul>


                                    <li>
                                        <div>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <h4>Get Support <em> md.royalmarriagebureau@gmail.com</em></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- COUNTS START -->
    <section>
        <div class="ab-cont">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <div>
                                    <h4>2K</h4>
                                    <span>Couples pared</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div>
                                    <h4>4000+</h4>
                                    <span>Registerents</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-male" aria-hidden="true"></i>
                                <div>
                                    <h4>1600+</h4>
                                    <span>Mens</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-female" aria-hidden="true"></i>
                                <div>
                                    <h4>2000+</h4>
                                    <span>Womens</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- MOMENTS START -->
    <section>
        <div class="wedd-tline">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>Moments</p>
                        <h2><span>How it works</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="inn">
                        <ul>
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset('website/images/icon/rings.png') }}" alt=""
                                            loading="lazy">
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>Register</h5>
                                        <p>"🎉 Welcome to Royal Marriage Bureau! 🌟 Exciting journeys begin with a simple
                                            step. Join us now and embark on the path to finding your perfect match. Sign up
                                            in a few clicks, create your profile, and let the magic of love unfold! 💑✨
                                            #StartYourJourney #LoveHappensHere"</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>Find your Match</h5>
                                        <p>💑✨Embark on the journey of a lifetime and discover the joy of companionship.🤝
                                            Our matrimony platform is tailored to help you find that special someone who
                                            completes your story. 💑</p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset('website/images/icon/wedding-2.png') }}" alt=""
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset('website/images/icon/love-birds.png') }}" alt=""
                                            loading="lazy">
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>Send Interest</h5>
                                        <p>💑✨With over 100 community sites, you can find a Match from your community.
                                            Finding a Match based on caste and religion made easy.🤝</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>Get Profile Information</h5>
                                        <p>🎉 To maximize your chances of finding the perfect match, complete your profile
                                            with details about your interests, background, and partner preferences. A
                                            complete profile helps us tailor match suggestions just for you!</p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset('website/images/icon/network.png') }}" alt=""
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset('website/images/icon/chat.png') }}" alt=""
                                            loading="lazy">
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>Start Meetups</h5>
                                        <p>Are you ready to turn virtual connections into real-life moments? 🌈✨ We're
                                            thrilled to introduce our Love Connection Meetups – the perfect way to meet
                                            like-minded individuals in person!</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>Getting Marriage</h5>
                                        <p>🎉"Congratulations! Your love story just got a beautiful new beginning. Best
                                            wishes for a wonderful marriage."💑✨</p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="{{ asset('website/images/icon/wedding-couple.png') }}" alt=""
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- RECENT COUPLES -->
    <section>
        <div class="hom-couples-all">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2><span>Lakhs Of Happy Couples</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                </div>
            </div>
            <div class="hom-coup-test">
                <ul class="couple-sli">
                    @foreach ($scouple as $item)
                        <li>
                            <div class="hom-coup-box">
                                <span class="leaf"></span>
                                <img src="{{ asset('uploads/success_story/' . $item->ss_image) }}" alt=""
                                    loading="lazy">
                                <div class="bx">
                                    <h4>{{ $item->ss_name }} <span>{{ $item->ss_location }}</span></h4>
                                    {{-- <a href="wedding-video.html" class="sml-cta cta-dark">View more</a> --}}
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    <!-- END -->

   @if (count($team) > 1 )
    <!-- TEAM START -->
    <section>
        <div class="ab-team">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>OUR PROFESSIONALS</p>
                        <h2><span>Meet Our Team</span></h2>
                        <span class="leaf1"></span>
                    </div>
                    <ul>
                        @foreach ($team as $item)
                            <li>
                                <div>
                                    <img src="{{ asset('uploads/team/' . $item->team_image) }}" alt=""
                                        loading="lazy">
                                    <h4>{{ $item->team_name }}</h4>
                                    <p>{{ $item->team_role }}</p>
                                    <ul class="social-light">
                                        <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    @endif


    <!-- GALLERY START -->
    <section>
        <div class="wedd-gall home-wedd-gall">
            <div class="">
                <div class="gall-inn">
                    <div class="home-tit">
                        <p>collections</p>
                        <h2><span>Photo gallery</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    @foreach ($gallery as $item)
                        <div class="col-sm-6 col-md-2">
                            <div class="gal-im animate animate__animated animate__slow" data-ani="animate__flipInX">
                                <img src="{{ asset('website/images/gallery/1.jpg') }}" class="gal-siz-1" alt=""
                                    loading="lazy">
                                <div class="txt">
                                    <span>{{ $item->ig_name }}</span>
                                    <h4>{{ $item->ig_tagline }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <script>
        function updateFormAction() {
            var selectedValue = document.getElementById("genderSelect").value;
            var formAction = "";

            if (selectedValue == "1") {
                formAction = "/grooms";
            } else if (selectedValue == "2") {
                formAction = "/brides";
            } else {
                formAction = "/grooms";
            }

            document.getElementById("searchForm").action = formAction;
        }
        updateFormAction();
    </script>
    <!-- END -->
@endsection
