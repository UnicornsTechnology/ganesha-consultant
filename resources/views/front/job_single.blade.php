@extends('layouts.front.master')

@section('title')
    Job Details
@endsection
@section('content')
    <?php
    function ago($timestamp)
    {
        $elapsed = time() - strtotime($timestamp);
    
        if ($elapsed <= 0) {
            return 'just now';
        }
    
        $times = [
            31104000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second',
        ];
    
        foreach ($times as $seconds => $unit) {
            $count = floor($elapsed / $seconds);
    
            if ($count != 0) {
                break;
            }
        }
    
        $suffix = $count == 1 ? '' : 's';
    
        return $count . ' ' . $unit . $suffix . ' ago';
    }
    
    ?>


    <div class="job-details-pages pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    <div class="job-details-content">
                        <div class="job-list-content">
                            <div class="company-area">

                                <div class="company-details">
                                    <div class="name-location">
                                        <h5><a href="#">{{ $jobDetails->job_title_name }}</a></h5>
                                        <p> {{ $jobDetails->company_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-discription">
                                <ul class="one">
                                    <li>
                                        <img src="assets/images/icon/map-2.svg" alt="">
                                        <p><span class="title">Location:</span> {{ $jobDetails->location_name }}</p>
                                    </li>
                                    <li>
                                        <img src="assets/images/icon/category-2.svg" alt="">
                                        <p><span class="title">Posting Date:</span>
                                            {{ ago($jobDetails->job_posting_date) }}</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <img src="assets/images/icon/company-2.svg" alt="">
                                        <p><span class="title">Job Type:</span> {{ $jobDetails->job_type_name }}</p>
                                    </li>
                                    <li>
                                        <img src="assets/images/icon/salary-2.svg" alt="">
                                        <p><span class="title">Salary:</span>{{ $jobDetails->job_package }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p><span>Job Description:</span>
                        <h2> {!! $jobDetails->job_description !!}</h2>
                        </p>
                        <br>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job-details-sidebar mb-120">
                        <div class="save-apply-btn d-flex justify-content-end mb-50">
                            <ul>
                                <li>
                                    @auth
                                        <a class="save-btn" href="/student/add/bookmark/{{ encrypt($jobDetails->job_id) }}">Save
                                            Job <span><i class="bi bi-bookmark-fill"></i></span></a>
                                    @else
                                        <a class="save-btn" href="/student/login">Save
                                            Job <span><i class="bi bi-bookmark-fill"></i></span></a>
                                    @endauth

                                </li>
                                <li>

                                    @auth
                                        <a class="primry-btn-2 lg-btn"
                                            href="/student/apply-now/{{ encrypt($jobDetails->job_id) }}" target="_blank">Apply
                                            Position</a>
                                    @else
                                        <a class="primry-btn-2 lg-btn" href="/student/login">Apply
                                            Position</a>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                        <div class="job-summary-area mb-50">
                            <div class="job-summary-title">
                                <h6>Job Summary:</h6>
                            </div>
                            <ul>
                                <li>
                                    <p><span class="title">Job Posted:</span> {{ $jobDetails->job_posting_date }}</p>
                                </li>
                                <li>
                                    <p><span class="title">Expiration:</span>{{ $jobDetails->job_expiry_date }}</p>
                                </li>
                                <li>
                                    <p><span class="title">Location:</span>{{ $jobDetails->location_name }}</p>
                                </li>


                            </ul>
                        </div>

                        <div class="job-share-area mb-50">
                            <h6>Job Link Share:</h6>
                            <ul>
                                <li><a href="#"><i class="bx bx-link"></i></a></li>
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram-alt"></i></a></li>
                            </ul>
                        </div>
                        <div class="job-summary-area mb-50">
                            <div class="job-summary-title">
                                <h6>Job Skills:</h6>
                            </div>
                            <ul>
                                @foreach ($skills as $skill)
                                    <li><a href="#">{{ $skill->skill_name }}</a></li>
                                @endforeach



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">

                <div class="col-lg-12">
                    <div class="related-jobs">
                        <div class="section-title mb-40">
                            <h3>Related Jobs:</h3>
                            <div class="swiper-btn1 d-flex align-items-center">
                                <div class="left-btn prev-4" tabindex="0" role="button" aria-label="Previous slide"
                                    aria-controls="swiper-wrapper-cd25aaa0121957b3">
                                    <img src="assets/images/icon/explore-elliose.svg" alt="">
                                </div>
                                <div class="right-btn next-4" tabindex="0" role="button" aria-label="Next slide"
                                    aria-controls="swiper-wrapper-cd25aaa0121957b3">
                                    <img src="assets/images/icon/explore-elliose.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper related-job-slider swiper-initialized swiper-horizontal swiper-pointer-events">
                            <div class="swiper-wrapper" id="swiper-wrapper-cd25aaa0121957b3" aria-live="off"
                                style="transform: translate3d(-1911.67px, 0px, 0px); transition-duration: 0ms;">

                                @foreach ($relatedJobs as $item)
                                    <div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="1 / 3"
                                        style="width: 352.333px; margin-right: 30px;" data-swiper-slide-index="0">
                                        <div class="feature-card">
                                            <div class="company-area">
                                                <div class="logo">
                                                    <img src="assets/images/bg/company-logo/company-02.png" alt="">
                                                </div>
                                                <div class="company-details">
                                                    <div class="name-location">
                                                        <h5><a href="job-details.html">Assistant Laboratorist</a></h5>
                                                        <p>Full Time, Part Time</p>
                                                    </div>
                                                    <div class="bookmark">
                                                        <i class="bi bi-bookmark"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-discription">
                                                <ul>
                                                    <li>
                                                        <img src="assets/images/icon/arrow2.svg" alt="">
                                                        <p><span class="title">Salary:</span> $30-$40 / <span
                                                                class="time">Per month</span></p>
                                                    </li>
                                                    <li>
                                                        <img src="assets/images/icon/arrow2.svg" alt="">
                                                        <p><span class="title">Vacancy:</span> <span> 05 Person
                                                                (Both)</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <img src="assets/images/icon/arrow2.svg" alt="">
                                                        <p><span class="title">Deadline:</span> <span> 02 March, 2023
                                                            </span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="job-type-apply">
                                                <div class="apply-btn">
                                                    <a href="job-details.html"><span><img
                                                                src="assets/images/icon/apply-ellipse.svg"
                                                                alt=""></span>Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const filterJobs = () => {
            // job types
            const jobTypesArray = document.getElementById("job_types")
            let jobTypes = [];
            jobTypes = [];
            for (let i = 0; i < jobTypesArray.children.length; i++) {
                const element = jobTypesArray.children[i].children[0].children[0].checked;
                if (element == true) {
                    jobTypes.push(jobTypesArray.children[i].children[0].children[0].value)
                }
            }

            //  Job locations
            const locationsArray = document.getElementById("locations")
            let locations = [];
            locations = [];
            for (let i = 0; i < locationsArray.children.length; i++) {
                const element = locationsArray.children[i].children[0].children[0].checked;
                if (element == true) {
                    locations.push(locationsArray.children[i].children[0].children[0].value)
                }
            }

            //  Job Exp
            const experiencesArray = document.getElementById("experiences")
            let experiences = [];
            experiences = [];
            for (let i = 0; i < experiencesArray.children.length; i++) {
                const element = experiencesArray.children[i].children[0].children[0].checked;
                if (element == true) {
                    experiences.push(experiencesArray.children[i].children[0].children[0].value)
                }
            }

            // categories posted
            const categoriesArray = document.getElementById("categories")
            let categories = [];
            categories = [];
            for (let i = 0; i < categoriesArray.children.length; i++) {
                const element = categoriesArray.children[i].children[0].children[0].checked;
                if (element == true) {
                    categories.push(categoriesArray.children[i].children[0].children[0].value)
                }
            }

            function timeAgo(dateString) {
                const date = new Date(dateString);
                const seconds = Math.floor((new Date() - date) / 1000);

                let interval = Math.floor(seconds / 31536000);

                if (interval >= 1) {
                    return interval + " year" + (interval > 1 ? "s" : "") + " ago";
                }
                interval = Math.floor(seconds / 2592000);
                if (interval >= 1) {
                    return interval + " month" + (interval > 1 ? "s" : "") + " ago";
                }
                interval = Math.floor(seconds / 604800);
                if (interval >= 1) {
                    return interval + " week" + (interval > 1 ? "s" : "") + " ago";
                }
                interval = Math.floor(seconds / 86400);
                if (interval >= 1) {
                    return interval + " day" + (interval > 1 ? "s" : "") + " ago";
                }
                interval = Math.floor(seconds / 3600);
                if (interval >= 1) {
                    return interval + " hour" + (interval > 1 ? "s" : "") + " ago";
                }
                interval = Math.floor(seconds / 60);
                if (interval >= 1) {
                    return interval + " minute" + (interval > 1 ? "s" : "") + " ago";
                }
                return Math.floor(seconds) + " second" + (seconds > 1 ? "s" : "") + " ago";
            }
            axios.post("/filter/jobs", {
                    jobTypes,
                    categories,
                    locations,
                    experiences
                })
                .then(response => {
                    console.log(response);
                    const jobHTML = document.getElementById("list_").innerHTML = ``
                    document.getElementById("pgntn").innerHTML = ``
                    if (response.data.data.length > 0) {
                        response.data.data.forEach((data) => {
                            let time = timeAgo(data.job_posting_date)
                            document.getElementById("list_").innerHTML += `
                        <div class="col-lg-12 mb-30">
                                    <div class="job-listing-card">
                                        <div class="job-top">
                                            <div class="job-list-content">
                                                <div class="company-area">
                                                    <div class="company-details">
                                                        <div class="name-location">
                                                            <h5><a href="/job-details/${data.job_title_slug}/${data.job_id}">${data.job_title_name}</a>
                                                            </h5>

                                                            <p><a href="/job-details/${data.job_title_slug}/${data.job_id}">${data.company_name}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-discription">
                                                    <ul>
                                                        <li>
                                                            <p><span class="title">Salary:</span> - ${data.job_package}
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p><span class="title">location:</span>
                                                                ${data.location_name}
                                                            </p>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                            <a href="/student/add/bookmark/${data.job_id}" class="bookmark-btn"><span class="bi bi-bookmark-fill"></span></a>
                                            </div>
                                        </div>
                                        <div class="job-type-apply">
                                            <div class="job-type">
                                                <span class="light-green">0 To 3 Year</span>
                                                <span class="light-purple">Full Time</span>
                                                <p class="mt-3"> 2 months ago</p>
                                            </div>
                                            <div class="apply-btn"><a href="/job-details/${data.job_title_slug}/${data.job_id}"><span><img src="assets/images/icon/apply-ellipse.svg" alt=""></span>Apply Now</a>
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
                    `
                        })
                    } else {
                        document.getElementById("list_").innerHTML =
                            `<div class="text-center mt-3"><h1>No Data Found</h1></div>`

                    }

                    // showing pagination

                }).catch((error) => console.log(error))
        }
    </script>
@endsection
