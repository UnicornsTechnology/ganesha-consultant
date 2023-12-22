@extends('layouts.web_layout')
@section('title')
    Profile View
@endsection
@section('content')
    <!-- PROFILE -->
    <section>
        <div class="profi-pg profi-ban">
            <div class="">
                <div class="">
                    <div class="profile">
                        <div class="pg-pro-big-im">
                            <div class="s1">
                                <img src="{{ asset('/uploads/profile/' . $data->main_profile_pic) }}" loading="lazy"
                                    class="pro" alt="{{ $data->main_profile_pic }}">
                            </div>
                            <div class="s3">
                                <a href="#!" class="cta fol cta-chat">Chat now</a>
                                <span class="cta cta-sendint" data-bs-toggle="modal" data-bs-target="#sendInter">Send
                                    interest</span>
                            </div>
                        </div>
                    </div>
                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            <div class="pro-pg-intro">
                                <h1>{{ $data->name }}</h1>
                                <div class="pro-info-status">
                                    <span class="stat-1"><b>100</b> viewers</span>
                                </div>
                                <ul>
                                    <li>
                                        <div>
                                            <img src="{{ asset('website/images/icon/pro-city.png') }}" loading="lazy"
                                                alt="">
                                            <span>City: <strong>{{ $data->city_name }}</strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="{{ asset('website/images/icon/pro-age.png') }}" loading="lazy"
                                                alt="">
                                            <span>Age: <strong>{{ $data->age }} Year Old</strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="{{ asset('website/images/icon/pro-city.png') }}" loading="lazy"
                                                alt="">
                                            <span>Height: <strong>{{ $data->height_count }}</strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="{{ asset('website/images/icon/pro-city.png') }}" loading="lazy"
                                                alt="">
                                            <span>Job: <strong>{{ $data->job_type_name }}</strong></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-gal" id="gallery">
                                <h3>Photo gallery</h3>
                                <div id="image-gallery">
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img
                                                    src="{{ asset('/uploads/profile/' . $data->sub_pic_1) }}"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img
                                                    src="{{ asset('/uploads/profile/' . $data->sub_pic_2) }}"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img
                                                    src="{{ asset('/uploads/profile/' . $data->sub_pic_3) }}"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-conta">
                                <h3>Contact info</h3>
                                <ul>
                                    <li><span><i class="fa fa-mobile"
                                                aria-hidden="true"></i><b>Phone:</b>{{ $data->mobile }}</span></li>
                                    <li><span><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i><b>Email:</b>{{ $data->email }}</span>
                                    </li>
                                    <li><span><i class="fa fa fa-map-marker" aria-hidden="true"></i><b>Address:
                                            </b>{{ $data->village }}, {{ $data->taluka }}, {{ $data->district }},
                                            {{ $data->pin_code }}, {{ $data->state_name }}</span></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Personal information</h3>
                                <ul>
                                    <li><b>Name:</b> {{ $data->name }}</li>
                                    <li><b>Father:</b> {{ $data->father_full_name }}</li>
                                    <li><b>Occupation:</b> {{ $data->father_occupation }}</li>
                                    <li><b>mother:</b> {{ $data->mother_full_name }}</li>
                                    <li><b>Occupation:</b> {{ $data->mother_occupation }}</li>
                                    <li><b>Mother Tongue:</b> {{ $data->mother_tongue_name }}</li>
                                    <li><b>Family Type:</b> {{ $data->family_type == 1 ? 'Joint' : 'Neuclear' }}</li>
                                    <li><b>Age:</b> {{ $data->age }}</li>
                                    <li><b>Date of birth:</b> {{ $data->date_of_birth }}</li>
                                    <li><b>Birth Place:</b> {{ $data->birth_place }}</li>
                                    <li><b>Birth Time:</b> {{ $data->birth_time }}</li>
                                    <li><b>Blood Group:</b> {{ $data->blood_group_name }}</li>
                                    <li><b>Body color:</b> {{ $data->color_name }}</li>
                                    <li><b>Body Type:</b> {{ $data->body_type_name }}</li>
                                    <li><b>Height:</b> {{ $data->height_count }}</li>
                                    <li><b>Weight:</b> {{ $data->weight_count }}</li>
                                    <li><b>Education:</b> {{ $data->education }}</li>
                                    <li><b>Religion:</b> {{ $data->religion_name }}</li>
                                    <li><b>Company:</b> {{ $data->company_name }}</li>
                                    <li><b>Salary:</b> {{ $data->salary }}</li>
                                    <li><b>Caste:</b> {{ $data->caste_name }} </li>
                                    <li><b>City:</b> {{ $data->city_name }} </li>
                                    <li><b>Religion:</b> {{ $data->religion_name }} </li>
                                    <li><b>Devak:</b> {{ $data->devak_name }} </li>
                                    <li><b>Nakshatra:</b> {{ $data->nakshatra_name }} </li>
                                    <li><b>Charan:</b> {{ $data->charan_name }} </li>
                                    <li><b>Gan:</b> {{ $data->gan_name }} </li>
                                    <li><b>Raas:</b> {{ $data->raas_name }} </li>
                                    <li><b>Nad:</b> {{ $data->nad_name }} </li>
                                    <li><b>Varg:</b> {{ $data->varg_name }} </li>
                                    <li><b>Kul Devak:</b> {{ $data->kul_devak_name }} </li>
                                    <li><b>Brothers:</b> {{ $data->brothers }} </li>
                                    <li><b>Sisters:</b> {{ $data->sisters }} </li>
                                    <li><b>Mama:</b> {{ $data->mama }} </li>
                                    <li><b>Diet:</b> {{ $data->diet == 1 ? 'Veg' : 'Non-Veg' }} </li>
                                    <li><b>Handicapped:</b> {{ $data->is_handicapped == 1 ? 'No' : 'Yes' }} </li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-hob">
                                <h3>Hobbies</h3>
                                <ul>
                                    @foreach ($hobbies as $item)
                                        <li><span>{{ $item->hobby_name }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                                <h3>Social media</h3>
                                <ul>
                                    <li><a href="{{ $data->facebook }}" target="_blank"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $data->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $data->youtube }}" target="_blank"><i class="fa fa-youtube-play"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $data->instagram }}" target="_blank"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->


                        </div>

                        <!-- PROFILE lHS -->
                        <div class="rhs">
                            <!-- HELP BOX -->
                            <div class="prof-rhs-help">
                                <div class="inn">
                                    <h3>Tell us your Needs</h3>
                                    <p>Tell us what kind of service or experts you are looking.</p>
                                    <a href="sign-up.html">Register for free</a>
                                </div>
                            </div>
                            <!-- END HELP BOX -->
                            <!-- RELATED PROFILES -->
                            <div class="slid-inn pr-bio-c wedd-rel-pro">
                                <h3>Related profiles</h3>
                                <ul class="slider3">
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="{{ asset('website/images/profiles/1.jpg') }}" alt="">
                                                <span class="badge badge-success">21 Years Old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="{{ asset('website/images/profiles/2.jpg') }}" alt="">
                                                <span class="badge badge-success">21 Years Old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="{{ asset('website/images/profiles/3.jpg') }}" alt="">
                                                <span class="badge badge-success">21 Years Old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="{{ asset('website/images/profiles/4.jpg') }}" alt="">
                                                <span class="badge badge-success">21 Years Old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="{{ asset('website/images/profiles/6.jpg') }}" alt="">
                                                <span class="badge badge-success">21 Years Old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END RELATED PROFILES -->
                        </div>
                        <!-- END PROFILE lHS -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROFILE -->

    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to Live Chat
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="{{ asset('/uploads/profile/' . $data->main_profile_pic) }}" alt="aaa"
                                class="intephoto2">
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="SendIntersest({{ $data->id }})">Send
                        interest</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                        id="sldkfjlsdk">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        const SendIntersest = (id) => {
            axios.get(`/send/interest/${id}`)
                .then(function(response) {
                    if (response.data.status == "filed") {
                        showToast("red", "Send Interest Already ??");
                        document.getElementById('sldkfjlsdk').click();
                    } else {
                        showToast("green", "Send Interest Successfully !!");
                        document.getElementById('sldkfjlsdk').click();
                    }

                })
                .catch(function(error) {
                    console.log(error);
                });
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
    <!-- END INTEREST POPUP -->
@endsection
