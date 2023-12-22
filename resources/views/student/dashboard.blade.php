@extends('layouts.student.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Dashboard -->
    <div class="col-lg-9">
        @if (Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <div class="dashboard-inner">
            <div class="author-area">
                <div class="author-img">
                    <img src="{{ asset('front_assets/images/user.png') }}" alt="image" height="100px" width="100px" alt>
                </div>
                <div class="author-content">
                    <span>Hello, I’m</span>
                    <h4>{{ Auth::user()->name }},</h4>
                </div>
            </div>
            <div class="counter-area">
                <div class="row g-lg-4 g-md-5 gy-5 justify-content-center">
                    <div class="col-lg-6 col-sm-6">
                        <div class="counter-single">
                            <div class="counter-icon">
                                <img src="{{ asset('front_assets/images/icon/tt-applied.svg') }}" alt="image">
                            </div>
                            <div class="coundown">
                                <p>Total Applied</p>
                                <div class="d-flex align-items-center">
                                    <h3 class="odometer">
                                        {{ $counts->appliedJobsCount }}
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-sm-6">
                        <div class="counter-single two">
                            <div class="counter-icon">
                                <img src="{{ asset('front_assets/images/icon/save-job.svg') }}" alt="image">
                            </div>
                            <div class="coundown">
                                <p>Packages</p>
                                <div class="d-flex align-items-center">
                                    <h3 class="odometer">
                                        {{ $counts->packagesCount }}
                                    </h3>
                                   
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6 col-sm-6">
                        <div class="counter-single two">
                            <div class="counter-icon">
                                <img src="{{ asset('front_assets/images/icon/cv-review.svg') }}" alt="image">
                            </div>
                            <div class="coundown">
                                <p>BookMarks</p>
                                <div class="d-flex align-items-center">
                                    <h3 class="odometer">
                                        {{ $counts->bookmarksCount }}
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-wrapper">
                <h5 class="title">Jobs Applied Recently:</h5>
                <div class="scroll-table">
                    <table class="eg-table table category-table mb-0">
                        <thead>
                            <tr>
                                <th>Job Tittle</th>
                                <th>Apply Date</th>
                                <th>Company</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentlyAppliedJobs as $item)
                                <tr>
                                    <td data-label="Job Title">
                                        <div class="company-info">
                                            {{-- <div class="logo">
                                                <img src="{{ asset('uploads/company_logo/' . $item->company_logo) }}" alt>
                                            </div> --}}
                                            <div class="company-details">
                                                <div class="top">
                                                    <h6><a
                                                            href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}">
                                                            {{ $item->job_title_name }}</a>
                                                    </h6>
                                                    <span><img src="{{ asset('front_assets/images/icon/calender2.svg') }}"
                                                            alt>
                                                        {{ $item->created_at->diffForHumans() }}</span>
                                                </div>
                                                <ul>
                                                    <li><img src="{{ asset('front_assets/images/icon/location.svg') }}"
                                                            alt>{{ $item->location_name }}</li>
                                                    <li>
                                                        <img src="{{ asset('front_assets/images/icon/arrow2.svg') }}" alt>
                                                        <p><span class="title">Salary:</span> {{ $item->job_package }} /
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Apply Job"> {{ $item->created_at->format('Y-m-d') }}</td>
                                    <td data-label="Company"><a class="view-btn">
                                            {{ $item->company_name }}
                                        </a></td>
                                    <td data-label="Status">
                                        @auth
                                            <a href="/student/add/bookmark/{{ $item->job_id }}"
                                                class="eg-btn purple-btn">bookmark</a>
                                        @else
                                            <a href="/student/login" class="eg-btn purple-btn">bookmark</a>
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard -->
@endsection
