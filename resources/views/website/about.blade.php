 @extends('layouts.web_layout')
 @section('title')
     About Us 
 @endsection
 @section('content')
     <!-- BANNER -->
     <section>
         <div class="str">
             <div class="ban-inn ab-ban">
                 <div class="container">
                     <div class="row">
                         <div class="hom-ban">
                             <div class="ban-tit">
                                 <span><i class="no1"></i> The World's No.1 Matrimonial Service</span>
                                 <h1>About us</h1>
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
                             <div>
                                 <img src="{{ asset('website/images/icon/prize.png') }}" alt="">
                                 <h4>Genuine profiles</h4>
                                 <p>The most trusted wedding matrimony brand</p>
                             </div>
                         </li>
                         <li>
                             <div>
                                 <img src="{{ asset('website/images/icon/trust.png') }}" alt="">
                                 <h4>Most trusted</h4>
                                 <p>The most trusted wedding Royal Marriage Bureau</p>
                             </div>
                         </li>
                         <li>
                             <div>
                                 <img src="{{ asset('website/images/icon/rings.png') }}" alt="">
                                 <h4>2000+ weddings</h4>
                                 <p>The most trusted wedding matrimony brand</p>
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
                            <img src="{{ asset('website/images/couples/25.jpg') }}" alt="" loading="lazy"
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
                                <p>A marriage bureau is helps people find suitable matches for marriage. This can be done through online services or by matching people based on their preferences and interests.</p>
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

     <!-- START -->
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
                                     <span>Registered users</span>
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

     {{-- <!-- RECENT COUPLES -->
     <section>
         <div class="hom-partners abo-partners" id="testimonials">
             <div class="container">
                 <div class="row">
                     <!-- SUB TITLE -->
                     <div class="sub-tit-caps">
                         <h2>Customer <span class="animate animate__animated" data-ani="animate__flipInX"
                                 data-dely="0.1">Testimonials</span></h2>
                         <p>Fusce imperdiet ullamcorper fringilla.</p>
                     </div>

                     <!-- TESTMONIAL BACKGROUND SHAPES -->
                     <div class="wedd-shap">
                         <span class="abo-shap-1"></span>
                         <span class="abo-shap-3"></span>
                     </div>

                     <!-- SLIDER START -->
                     <div id="demo" class="carousel slide" data-ride="carousel">
                         <!-- Wrapper for slides -->
                         <div class="carousel-inner">
                             <div class="carousel-item active">
                                 <ul>
                                     <li>
                                         <div class="ab-testmo">
                                             <div class="ab-test-rat">
                                                 <div class="ab-test-star">
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                     <span>(50 Reviews)</span>
                                                 </div>
                                                 <div class="ab-test-conte">
                                                     <p>It is a long established fact that a reader will be distracted by
                                                         the readable content of a page when looking at its layout.</p>
                                                 </div>
                                             </div>
                                             <div class="ab-rat-user">
                                                 <img src="{{ asset('website/images/profiles/1.jpg') }}" alt="">
                                                 <div>
                                                     <h4>John Smith</h4>
                                                     <span>IT Profession</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="ab-testmo">
                                             <div class="ab-test-rat">
                                                 <div class="ab-test-star">
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star-o" aria-hidden="true"></i>
                                                     <span>(50 Reviews)</span>
                                                 </div>
                                                 <div class="ab-test-conte">
                                                     <p>It is a long established fact that a reader will be distracted by
                                                         the readable content of a page when looking at its layout.</p>
                                                 </div>
                                             </div>
                                             <div class="ab-rat-user">
                                                 <img src="{{ asset('website/images/profiles/6.jpg') }}" alt="">
                                                 <div>
                                                     <h4>Julia Ann</h4>
                                                     <span>Teacher</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="ab-testmo">
                                             <div class="ab-test-rat">
                                                 <div class="ab-test-star">
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                     <span>(50 Reviews)</span>
                                                 </div>
                                                 <div class="ab-test-conte">
                                                     <p>It is a long established fact that a reader will be distracted by
                                                         the readable content of a page when looking at its layout.</p>
                                                 </div>
                                             </div>
                                             <div class="ab-rat-user">
                                                 <img src="{{ asset('website/images/profiles/7.jpg') }}" alt="">
                                                 <div>
                                                     <h4>William Son</h4>
                                                     <span>Government Staff</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                             <div class="carousel-item">
                                 <ul>
                                     <li>
                                         <div class="ab-testmo">
                                             <div class="ab-test-rat">
                                                 <div class="ab-test-star">
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star-o" aria-hidden="true"></i>
                                                     <span>(50 Reviews)</span>
                                                 </div>
                                                 <div class="ab-test-conte">
                                                     <p>It is a long established fact that a reader will be distracted by
                                                         the readable content of a page when looking at its layout.</p>
                                                 </div>
                                             </div>
                                             <div class="ab-rat-user">
                                                 <img src="{{ asset('website/images/profiles/1.jpg') }}" alt="">
                                                 <div>
                                                     <h4>John Smith</h4>
                                                     <span>IT Profession</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="ab-testmo">
                                             <div class="ab-test-rat">
                                                 <div class="ab-test-star">
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star-o" aria-hidden="true"></i>
                                                     <span>(50 Reviews)</span>
                                                 </div>
                                                 <div class="ab-test-conte">
                                                     <p>It is a long established fact that a reader will be distracted by
                                                         the readable content of a page when looking at its layout.</p>
                                                 </div>
                                             </div>
                                             <div class="ab-rat-user">
                                                 <img src="{{ asset('website/images/profiles/6.jpg') }}" alt="">
                                                 <div>
                                                     <h4>Julia Ann</h4>
                                                     <span>Teacher</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="ab-testmo">
                                             <div class="ab-test-rat">
                                                 <div class="ab-test-star">
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                     <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                     <span>(50 Reviews)</span>
                                                 </div>
                                                 <div class="ab-test-conte">
                                                     <p>It is a long established fact that a reader will be distracted by
                                                         the readable content of a page when looking at its layout.</p>
                                                 </div>
                                             </div>
                                             <div class="ab-rat-user">
                                                 <img src="{{ asset('website/images/profiles/7.jpg') }}" alt="">
                                                 <div>
                                                     <h4>William Son</h4>
                                                     <span>Government Staff</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                         <!-- Left and right controls -->
                         <a class="carousel-control-prev" href="#demo" data-slide="prev">
                             <span class="carousel-control-prev-icon"></span>
                         </a>
                         <a class="carousel-control-next" href="#demo" data-slide="next">
                             <span class="carousel-control-next-icon"></span>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- END --> --}}


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
                                <img src="{{ asset('uploads/team/'. $item->team_image) }}" alt="" loading="lazy">
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
 @endsection
