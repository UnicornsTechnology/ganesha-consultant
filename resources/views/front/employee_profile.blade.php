@extends('layouts.front.master')
@section('title')
      Employees Profile
@endsection
@section('content')
  <section class="candidate-detail-section">
      <div class="candidate-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <!-- Candidate block Five -->
              <div class="candidate-block-five">
                <div class="inner-box">
                  <div class="content">
                    <figure class="image"><img src="" alt=""></figure>
                    <h4 class="name"><a href="#"></a></h4>
                    <ul class="candidate-info">
                      <li class="designation"></li>
                     
                    </ul>
                    <ul class="post-tags">
                      <li><a href="#">App</a></li>
                      <li><a href="#">Design</a></li>
                      <li><a href="#">Digital</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-detail">
                <h4>Candidates Massage</h4>
                <p>{!!$emp[0]->description!!}</p>


                <!-- Portfolio -->
                <div class="portfolio-outer">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-1.jpg" class="lightbox-image"><img src="images/resource/portfolio-1.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-2.jpg" class="lightbox-image"><img src="images/resource/portfolio-2.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-3.jpg" class="lightbox-image"><img src="images/resource/portfolio-3.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                      <figure class="image">
                        <a href="images/resource/portfolio-4.jpg" class="lightbox-image"><img src="images/resource/portfolio-4.jpg" alt=""></a>
                        <span class="icon flaticon-plus"></span>
                      </figure>
                    </div>
                  </div>
                </div>

              

                <!-- Video Box -->
                <div class="video-outer">
                  <h4>iStepUp About</h4>
                  <div class="video-box">
                    <figure class="image">
                    <iframe width="850" height="515" src="https://www.youtube.com/embed/-uElxTdinug" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      </a>
                    </figure>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">

              

                <div class="sidebar-widget">
                  <div class="widget-content">
                    <ul class="job-overview">
                      <li>
                        <i class="icon icon-calendar"></i>
                        <h5>Experience:</h5>
                        <span>0-2 Years</span>
                      </li>

                      <li>
                        <i class="icon icon-rate"></i>
                        <h5> Salary:</h5>
                        <span>{{$emp[0]->package_amount	}}</span>
                      </li>

                     
                      <li>
                        <i class="icon icon-language"></i>
                        <h5>Wroking Postion:</h5>
                        <span>{{$emp[0]->working_potion	}}</span>
                      </li>
<li>
                        <i class="icon icon-language"></i>
                        <h5>Location :</h5>
                        <span>{{$emp[0]->location	}}</span>
                      </li>
                      <li>
                        <i class="icon icon-degree"></i>
                        <h5>Education Level:</h5>
                        <span>{{$emp[0]->education	}}</span>
                      </li>

                    </ul>
                  </div>

                </div>
                <div class="sidebar-widget contact-widget">
                  <h4 class="widget-title">Contact Us</h4>
                  <div class="widget-content">
                    <!-- Comment Form -->
                    <div class="default-form">
                      <!--Comment Form-->
                      <form action="/admin/contact/store" method="post">
                         @csrf
                        <div class="row clearfix">
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="text" name="name" placeholder="Your Name" required="">
                          </div>
                           <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="number" name="mobile_no" placeholder="Mobile Number" required="">
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email Address" required="">
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea class="darma" name="message" placeholder="Message"></textarea>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
