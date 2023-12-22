<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="{{ asset('website/images/fav.ico') }}" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/js/tost/toastify.min.css') }}">
    <script src="{{ asset('website/js/tost/toastify.js') }}"></script>
</head>

<body>
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="{{ asset('website/images/loder/1.png') }}" alt=""
                    loading="lazy"></span>
            <span class="lod2"><img src="{{ asset('website/images/loder/2.png') }}" alt=""
                    loading="lazy"></span>
            <span class="lod3"><img src="{{ asset('website/images/loder/3.png') }}" alt=""
                    loading="lazy"></span>
        </div>
    </div>
    <div class="pop-bg"></div>
    <!-- END PRELOADER -->

    <!-- TOP MENU -->
    <div class="head-top">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=100090053242512" target="_blank"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/royalmarriagebureau042/?igshid=NTA5ZTk1NTc%3D"
                                target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/i/flow/login?redirect_after_login=%2Froyal_m_bureau"
                                target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/@royalmarriagebureau9076" target="_blank"><i
                                    class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="rhs">
                    <ul>
                        <li>
                            <div id="google_translate_element"></div>
                        </li>
                        <li><a href="tel:+9704462944"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+91
                                7020403671</a></li>
                        <li><a href="mailto:md.royalmarriagebureau@gmail.com"><i class="fa fa-envelope-o"
                                    aria-hidden="true"></i>&nbsp;
                                md.royalmarriagebureau@gmail.com</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- CONTACT EXPERT -->
    @auth
        <div class="menu-pop menu-pop2">
            <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
            <div class="inn">
                <div class="menu-pop-help">
                    <h2 class="text-center">Wel-<span class="text-primary">Come</span></h2>
                    <div class="user-pro">
                        @if (Auth::user()->main_profile_pic)
                            <img src="{{ asset('/uploads/profile/' . Auth::user()->main_profile_pic) }}" alt=""
                                loading="lazy">
                        @else
                            <img src="{{ asset('/default-profile-pic.jpg') }}" alt="" loading="lazy">
                        @endif

                    </div>
                    <div class="user-bio">
                        <h5 class="text-white">{{ Auth::user()->name }}</h5>
                        {{-- <span>Senior personal advisor</span> --}}
                        <br>
                        <a href="/users/dashboard" class="btn btn-danger btn-sm bg-success">Go Dashboard</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-danger btn-sm bg-danger">Logout</a>
                    </div>
                </div>
                <div class="menu-pop-soci">
                    <ul>
                        <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                        <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endauth
    <!-- END -->

    <!-- MAIN MENU -->
    <div class="hom-top">
        <div class="container-fluid mx-2">
            <div class="row">
                <div class="hom-nav">
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="/" class="logo-brand"><img src="{{ asset('website/images/logo-b.png') }}"
                                height="50px" width="80px" style="object-fit:cover" alt="logo"
                                class="pp" loading="lazy"></a>
                    </div>

                    <!-- EXPLORE MENU -->
                    <div class="bl">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About</a></li>
                            <li><a href="/grooms">grooms</a></li>
                            <li><a href="/brides">brides</a></li>
                            <li><a href="/membership-plans">Membership Plan</a></li>
                            <li><a href="/contact-us">contact</a></li>
                            @auth
                                <li><a href="/users/dashboard">Dashboard</a></li>
                                <li><a href="/users/notifications">Notifications
                                        @if (auth()->user()->unreadNotifications->count() > 0)
                                            <span class="badge bg-danger">
                                                {{ auth()->user()->unreadNotifications->count() }}
                                            </span>
                                        @endif
                                    </a></li>
                            @endauth
                        </ul>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <!-- USER PROFILE -->
                    @auth
                        <div class="al">
                            <div class="head-pro">
                                @if (Auth::user()->main_profile_pic)
                                    <img src="{{ asset('/uploads/profile/' . Auth::user()->main_profile_pic) }}"
                                        alt="" loading="lazy">
                                @else
                                    <img src="{{ asset('/default-profile-pic.jpg') }}" alt="" loading="lazy">
                                @endif
                                <b>Wel-Come</b><br>
                                <h4>{{ Auth::user()->name }}</h4>
                                <span class="fclick"></span>
                            </div>
                        </div>
                    @else
                        <div class="al">
                            <div class="head-pros mt-2" style="width: 230px">
                                <a href="/users/register" class="btn btn-danger btn-sm"
                                    style="background:linear-gradient(45deg, rgb(205, 0, 152), rgb(225, 77, 97) 80%); border: none">Register</a>
                                <a href="/users/login" class="btn btn-success btn-sm">Login</a>
                            </div>
                        </div>
                    @endauth
                    <!--MOBILE MENU-->
                    <div class="mob-menu">
                        <div class="mob-me-ic">
                            <span class="mobile-menu" data-mob="mobile">
                                <img src="{{ asset('website/images/icon/menu.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                    <!--END MOBILE MENU-->
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- EXPLORE MENU POPUP -->
    <div class="mob-me-all mobile_menu">
        <div class="mob-me-clo">
            <img src="{{ asset('website/images/icon/close.svg') }}" alt="">
        </div>
        <div class="mv-bus">
            <h4>
                @if (isset(Auth::user()->main_profile_pic))
                    <img src="{{ asset('/uploads/profile/' . Auth::user()->main_profile_pic) }}" alt="pic">
                    <h3 class="text-center">{{ Auth::user()->name }}</h3>
                @else
                    <img src="{{ asset('/default-profile-pic.jpg') }}" alt="">
                @endif
            </h4>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about-us">About</a></li>
                <li><a href="/grooms">grooms</a></li>
                <li><a href="/brides">brides</a></li>
                <li><a href="/membership-plans">Membership Plan</a></li>
                <li><a href="/contact-us">contact</a></li>
                @auth
                    <li><a href="/users/dashboard">Dashboard</a></li>
                    <li><a href="/users/notifications">Notifications
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge bg-danger">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </a></li>
                @else
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">login</a></li>
                @endauth

            </ul>
            <div class="menu-pop-soci">
                <ul>
                    <li><a href="https://www.facebook.com/profile.php?id=100090053242512" target="_blank"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/i/flow/login?redirect_after_login=%2Froyal_m_bureau"
                            target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/royalmarriagebureau042/?igshid=NTA5ZTk1NTc%3D"
                            target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/@royalmarriagebureau9076" target="_blank"><i
                                class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="prof-rhs-help">
                <div class="inn">
                    <h3>Tell us your Needs</h3>
                    <p>Tell us what kind of service you are looking for.</p>
                    <a href="/">Register for free</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END MOBILE MENU POPUP -->

    @yield('content')

    <!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <div class="row foot-supp">
                <h2><span>Free support:</span> +91 7020403671 &nbsp;&nbsp;|&nbsp;&nbsp; <span>Email:</span>
                    md.royalmarriagebureau@gmail.com</h2>
            </div>
            <div class="row wed-foot-link wed-foot-link-1">
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p>Address: Baramati, Suryanagari, MIDC</p>
                    <p>Phone: <a href="tel:+917020403671">+</a>91 7020403671</p>
                    <p>Email: <a href="mailto:md.royalmarriagebureau@gmail.com">md.royalmarriagebureau@gmail.com</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>HELP &amp; SUPPORT</h4>
                    <ul>
                        <li><a href="/about-us">About company</a>
                        </li>
                        <li><a href="/contact-us">Contact us</a>
                        </li>
                        <li><a href="/privacy-policy">Privacy Policy</a>
                        </li>
                        <li><a href="/terms-conditions">Terms Conditions</a>
                        </li>
                        <li><a href="/refund-policy">Refund Policy</a>
                        </li>
                        <li><a href="/shipping-policy"> Shipping Policy</a></li>
                        <li><a href="/">FAQs</a>
                        </li>
                        <li><a href="/membership-plans">Membership Plans</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 fot-soc">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><a href="#!"><img src="{{ asset('website/images/social/3.png') }}" alt=""
                                    loading="lazy"></a></li>
                        <li><a href="#!"><img src="{{ asset('website/images/social/Instagram.webp') }}"
                                    alt="" loading="lazy"></a></li>
                        <li><a href="#!"><img src="{{ asset('website/images/social/2.png') }}" alt=""
                                    loading="lazy"></a></li>

                        <li><a href="#!"><img src="{{ asset('website/images/social/5.png') }}" alt=""
                                    loading="lazy"></a></li>
                        <li><a href="#!"><img src="{{ asset('website/images/social/blog.png') }}"
                                    alt="" loading="lazy"></a></li>
                    </ul>
                    <p>Royal Marriage Bureau: Your trusted online matchmaker in Baramati. We specialize in bringing
                        together like-minded individuals for lasting connections. Find your perfect match with us today!
                    </p>
                </div>
            </div>
            <div class="row foot-count">
                <p>Design By <a href="https://unicornstechnology.com" class="btn btn-primary btn-sm" target="_blank">
                        Unicorns Technology</a></p>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- COPYRIGHTS -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright © <span id="cry">2023</span> <a href="#!" target="_blank">Royal Marriage
                            Bureau</a>
                        All
                        rights reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    @vite('resources/js/app.js')
    <script type="text/javascript" src="{{ asset('website/google/translate_a.js') }}"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: "en,mr,hi",
            }, 'google_translate_element');
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('website/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/js/select-opt.js') }}"></script>
    <script src="{{ asset('website/js/popper.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('website/js/mail.js') }}"></script>
    <script src="{{ asset('website/js/slick.js') }}"></script>
    <script src="{{ asset('website/js/custom.js') }}"></script>

    <script>
        //COMMON SLIDER
        $('.slider').slick({
            infinite: false,
            slidesToShow: 5,
            arrows: false,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: false
                }
            }]

        });

        $('.count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        $(".db-chat-trig").on('click', function() {
            $(".chatbox").addClass("open")
        });
    </script>

    <script>
        setTimeout(() => {
            window.Echo.channel('chat_message').listen('chat', (data) => {
                if ({{ Auth::id() ? Auth::id() : 0 }} == data.sender_id && IDS == data.resiver_id) {
                    document.getElementById('dsldjkflskdfjs').innerHTML += `
                        <div class="row">
                            <div class="col mt-1">
                                <div class="chat-rhs">${data.message}</div>
                            </div>
                        </div>
                        `
                } else if ({{ Auth::id() ? Auth::id() : 0 }} == data.resiver_id && IDS == data
                    .sender_id) {
                    document.getElementById('dsldjkflskdfjs').innerHTML += `
                    <div class="row">
                            <div class="col mt-1">
                                <div class="chat-lhs">${data.message}</div>
                            </div>
                    </div>`
                } else {}
            })
        }, 200);

        const FireEvent = (id) => {
            if (document.getElementById('msg_msg').value == "") {
                showToast('red', "Please Enter The Message...")
            } else {
                const data = {
                    msg: document.getElementById('msg_msg').value,
                    sender_id: {{ Auth::id() ? Auth::id() : 0 }},
                    resiver_id: id,
                }
                axios.post('/borcast', data, {
                        headers: {
                            "X-CSRF-TOKEN": '{{ csrf_token() }}'
                        }
                    })
                    .then(function(response) {
                        document.getElementById('msg_msg').value = ""
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        }

        function showToast(colors, mag) {
            Toastify({
                text: mag,
                duration: 3000, // Duration in milliseconds
                newWindow: true, // Open link in a new window/tab
                close: true, // Show close button
                gravity: "top", // Display position (top, bottom, left, right)
                position: "right", // Position (top-left, top-center, top-right, etc.)
                backgroundColor: colors,
            }).showToast();
        }
    </script>
</body>

</html>
