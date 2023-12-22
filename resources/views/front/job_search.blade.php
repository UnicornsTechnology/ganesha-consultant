@extends('layouts.front.master')

@section('title')
    Jobs List
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
    <div class="hero1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="job-search-area">
                            <form method="get" action="/job/search/list">
                                <div class="form-inner job-title">
                                    <input type="text" name="key" placeholder="Job title, keywords"
                                        list="job-options">
                                    <datalist id="job-options">
                                        @foreach ($recentlyAdded as $item)
                                            <option value="{{ $item->job_title_name }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="form-inner category">
                                    <select class="select1" name="location">
                                        <option>Select Location</option>
                                        @foreach ($cities as $item)
                                            <option>{{ $item->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inner">
                                    <button type="submit" class="primry-btn-2 "><img
                                            src="{{ asset('front_assets/images/icon/search-icon.svg') }}" alt>
                                        Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="job-listing-area pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="job-sidebar">
                        <div class="job-widget style-1 mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Job Category</h5>
                                <div class="checkbox-container">
                                    <ul id="categories">
                                        @foreach ($categories as $item)
                                            <li>
                                                <label class="containerss">
                                                    <input type="checkbox" onchange="filterJobs()"
                                                        value="{{ $item->job_category_id }}">
                                                    <span class="checkmark"></span>
                                                    <span class="text">{{ $item->job_category_name }}</span>

                                                </label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Type of Employments</h5>
                                <div class="checkbox-container">
                                    <ul id="job_types">
                                        @foreach ($jobTypes as $item)
                                            <li>
                                                <label class="containerss">
                                                    <input type="checkbox" onchange="filterJobs()"
                                                        value="{{ $item->job_type_id }}">
                                                    <span class="checkmark"></span>
                                                    <span class="text">{{ $item->job_type_name }}</span>
                                                </label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Job Locations</h5>
                                <div class="checkbox-container">
                                    <ul id="locations">
                                        @foreach ($cities as $item)
                                            <li>
                                                <label class="containerss">
                                                    <input type="checkbox" onchange="filterJobs()"
                                                        value="{{ $item->location_id }}">
                                                    <span class="checkmark"></span>
                                                    <span class="text">{{ $item->location_name }}</span>
                                                </label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Job Experiences</h5>
                                <div class="checkbox-container">
                                    <ul id="experiences">
                                        @foreach ($experiences as $item)
                                            <li>
                                                <label class="containerss">
                                                    <input type="checkbox" onchange="filterJobs()"
                                                        value="{{ $item->experiences_id }}">
                                                    <span class="checkmark"></span>
                                                    <span class="text">{{ $item->experiences_name }}</span>
                                                </label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="job-widget-btn">
                            <a class="primry-btn-2 lg-btn text-center" href="/contact-us">Go to Job Alert</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="job-listing-wrrap">

                        <div class="row " id="list_">
                            @foreach ($searchResults as $item)
                                <div class="col-lg-12 mb-30">
                                    <div class="job-listing-card">
                                        <div class="job-top">
                                            <div class="job-list-content">
                                                <div class="company-area">

                                                    <div class="company-details">
                                                        <div class="name-location">
                                                            <h5><a
                                                                    href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">{{ $item->job_title_name }}</a>
                                                            </h5>


                                                            <p><a
                                                                    href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">{{ $item->company_name }}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-discription">
                                                    <ul>
                                                        <li>
                                                            <p><span class="title">Salary:</span> {{ $item->job_package }}
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p><span class="title">location:</span>
                                                                {{ $item->location_name }}
                                                            </p>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bookmark">

                                                @auth
                                                    <a href="/student/add/bookmark/{{ $item->job_id }}"
                                                        class="bookmark-btn"><span class="bi bi-bookmark-fill"></span></a>
                                                @else
                                                    <a href="/student/login" class="bookmark-btn"><span
                                                            class="bi bi-bookmark-fill"></span></a>
                                                @endauth
                                            </div>
                                        </div>
                                        <div class="job-type-apply">
                                            <div class="job-type">
                                                <span class="light-green">{{ $item->experiences_name }}</span>
                                                <span class="light-purple">{{ $item->job_type_name }}</span>
                                                {{-- <p class="mt-3"> {{ timeAgo($item->job_posting_date) }}</p> --}}
                                            </div>
                                            <div class="apply-btn">
                                                @auth
                                                    <a href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}"><span><img
                                                                src="assets/images/icon/apply-ellipse.svg"
                                                                alt=""></span>Apply Now</a>
                                                @else
                                                    <a href="/student/login"><span><img
                                                                src="assets/images/icon/apply-ellipse.svg"
                                                                alt=""></span>Apply Now</a>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="col-lg-12 d-flex justify-content-center pt-20">
                            <div class="pagination-area" id="pgntn">
                                {{ $searchResults->onEachSide(-1)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
