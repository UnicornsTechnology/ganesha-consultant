@extends('website.dashboard')
@section('items')
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
            <h2 class="db-tit">Profiles status</h2>
            <div class="db-pro-stat">
                <h6>Profile completion</h6>
                <div class="db-pro-pgog">
                    <span><b class="count">{{ $percentage }}</b>%</span>
                </div>
                <div class="pro-stat-ic mt-5">
                    You profile is not 100% completed. Click here to update...
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
            <h2 class="db-tit">Plan details</h2>
            <div class="db-pro-stat">
                <h6 class="tit-top-curv">Current plan</h6>
                <div class="db-plan-card">
                    <img src="{{ asset('website/images/icon/plan.png') }}" alt="">
                </div>
                <div class="db-plan-detil">
                    <ul>
                        <li>Plan name: <strong>{{ isset($plans->plan_name) ? $plans->plan_name : '' }}</strong></li>
                        <li>Validity: <strong>{{ isset($plans->month) ? $plans->month : '' }} Months</strong></li>
                        <li>Valid till:
                            <strong>{{ isset($plans->plan_end_date) ? $plans->plan_end_date : '' }}</strong>
                        </li>
                        <li><a href="/membership-plans" class="cta-3">Upgrade now</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 db-sec-com">
            <h2 class="db-tit">Recent chat list</h2>
            <div class="db-pro-stat">
                <div class="db-inte-prof-list db-inte-prof-chat">
                    <ul>
                        @foreach ($list as $item)
                            <li>
                                <div class="db-int-pro-1">
                                    @if ($item->main_profile_pic)
                                        <img src="{{ asset('/uploads/profile/' . $item->main_profile_pic) }}"
                                            alt="{{ $item->main_profile_pic }}">
                                    @else
                                        <img src="{{ asset('/default-profile-pic.jpg') }}" alt="default img">
                                    @endif
                                </div>
                                <div class="db-int-pro-2">
                                    <h5>{{ $item->name }}</h5> <span> {{ $item->taluka }},{{ $item->district }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 db-sec-com db-new-pro-main">
        <h2 class="db-tit">New Profiles Matches</h2>
        <ul class="slider">
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/16.jpg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <div class="pro-ave" title="User currently available">
                        <span class="pro-ave-yes"></span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/2.jpg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/3.jpg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/4.jpg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/5.jpeg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/6.jpg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <div class="pro-ave" title="User currently available">
                        <span class="pro-ave-yes"></span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
            <li>
                <div class="db-new-pro">
                    <img src="{{ asset('website/images/profiles/14.jpg') }}" alt="" class="profile">
                    <div>
                        <h5>Julia ann</h5>
                        <span class="city">New york</span>
                        <span class="age">22 Years Old</span>
                    </div>
                    <div class="pro-ave" title="User currently available">
                        <span class="pro-ave-yes"></span>
                    </div>
                    <a href="profile-details.html" class="fclick" target="_blank">&nbsp;</a>
                </div>
            </li>
        </ul>
    </div>
@endsection
