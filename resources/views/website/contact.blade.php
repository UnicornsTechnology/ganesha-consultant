 @extends('layouts.web_layout')
 @section('title')
     Contact Us
 @endsection
 @section('content')
     <!-- BANNER -->
     <section>
         <div class="str">
             <div class="ban-inn ab-ban pg-cont">
                 <div class="container">
                     <div class="row">
                         <div class="hom-ban">
                             <div class="ban-tit">
                                 <span>We are here to assist you.</span>
                                 <h1>Contact us</h1>
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
         <div class="ab-sec2 pg-cont">
             <div class="container">
                 <div class="row">
                     <ul>
                        <li>
                            <div class="we-cont">
                                <img src="{{ asset('website/images/icon/trust.png') }}" alt="">
                                <h4>Customer Relations</h4>
                                <p>Most Trusted and premium Matrimony Service in the World.</p>
                                <a href="#!" class="cta-rou-line">Get Support</a>
                            </div>
                        </li>
                         <li>
                             <div class="we-here">
                                 <h3>Our office</h3>
                                 <p>Most Trusted and premium Matrimony Service in the World.</p>
                                 <span><i class="fa fa-phone" aria-hidden="true"></i> +91 7020403671</span>
                                 <span><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                     md.royalmarriagebureau@gmail.com</span>
                                 <span><i class="fa fa-map-marker" aria-hidden="true"></i>Rui pati, MIDC, Baramati.</span>
                             </div>
                         </li>
                        
                         <li>
                             <div class="we-cont">
                                 <img src="{{ asset('website/images/icon/telephone.png') }}" alt="">
                                 <h4>WhatsApp Support</h4>
                                 <p>Most Trusted and premium Matrimony Service in the World.</p>
                                 <a href="#!" class="cta-rou-line">Talk to sales</a>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </section>
     <!-- END -->

     <!-- REGISTER -->
     <section>
         <div class="login pg-cont">
             <div class="container">
                 <div class="row">

                     <div class="inn">
                         <div class="lhs">
                             <div class="tit">
                                 <h2>Now <b>Contact to us</b> Easy and fast.</h2>
                             </div>
                             <div class="im">
                                 <img src="{{ asset('website/images/login-couple.png') }}" alt="">
                             </div>
                             <div class="log-bg">&nbsp;</div>
                         </div>
                         <div class="rhs">
                             <div>
                                 <div class="form-tit">
                                     <h4>Let's talk</h4>
                                     <h1>Send your enquiry now </h1>
                                     @if (session('msg'))
                                         <div class="alert alert-success bg-success text-white">
                                             {{ session('msg') }}
                                         </div>
                                     @endif
                                 </div>
                                 <div class="form-login">
                                     <form class="cform fvali" method="post" action="/web/users/inquriy">
                                         @csrf
                                         <div class="alert alert-success cmessage" style="display: none" role="alert">
                                             Your message was sent successfully.
                                         </div>
                                         <div class="form-group">
                                             <label class="lb">Name:</label>
                                             <input type="text" id="name" class="form-control"
                                                 placeholder="Enter your full name" name="inquriy_name" required>
                                         </div>
                                         <div class="form-group">
                                             <label class="lb">Email:</label>
                                             <input type="email" class="form-control" id="email"
                                                 placeholder="Enter email" name="inquriy_email" required>
                                         </div>
                                         <div class="form-group">
                                             <label class="lb">Phone:</label>
                                             <input type="number" class="form-control" id="phone"
                                                 placeholder="Enter phone number" name="inquriy_phone" required>
                                         </div>
                                         <div class="form-group">
                                             <label class="lb">Message:</label>
                                             <textarea name="inquriy_massage" class="form-control" id="message" placeholder="Enter message" required></textarea>
                                         </div>
                                         <button type="submit" class="btn btn-primary">Send Enquiry</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </section>
     <!-- END -->

    
 @endsection
