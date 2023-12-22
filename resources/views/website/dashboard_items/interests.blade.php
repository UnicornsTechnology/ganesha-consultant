@extends('website.dashboard')
@section('items')
    <div class="row">
        <div class="col-md-12 db-sec-com">
            <h2 class="db-tit">Interest request</h2>
            <div class="db-pro-stat">
                <div class="db-inte-main">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home">New requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu1">Accept request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu2">Denay request</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <div class="db-inte-prof-list">
                                <ul>
                                    @forelse ($pending as $item)
                                        <li>
                                            <div class="db-int-pro-1"> <img
                                                    src="{{ asset('uploads/profile/' . $item->main_profile_pic) }}"
                                                    alt="">
                                            </div>
                                            <div class="db-int-pro-2">
                                                <h5>{{ $item->name }}</h5>
                                                <ol class="poi">
                                                    <li>City: <strong>{{ $item->city_name }}</strong></li>
                                                    <li>Age: <strong>
                                                            {{ \Carbon\Carbon::parse($item->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }}</strong>
                                                    </li>
                                                    <li>Height: <strong>{{ $item->height_count }}</strong></li>
                                                    <li>Job: <strong>{{ $item->job_type_name }}</strong></li>
                                                </ol>
                                                <ol class="poi poi-date">
                                                    <li>Request on:
                                                        {{ \Carbon\Carbon::parse($item->date_time)->setTimezone('Asia/Kolkata')->format('h:i A, d F Y') }}
                                                    </li>
                                                </ol>
                                                <a href="/users/profile/details/{{ $item->id }}" class="cta-5"
                                                    target="_blank">View full
                                                    profile</a>
                                            </div>
                                            <div class="db-int-pro-3">
                                                <button type="button" class="btn btn-success btn-sm"><a
                                                        href="/send/ststus/{{ $item->interest_id }}/accept"
                                                        class="text-white">Accept</a></button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"><a
                                                        href="/send/ststus/{{ $item->interest_id }}/deny"
                                                        class="text-danger">Denay</a></button>
                                            </div>
                                        </li>
                                    @empty
                                        <h1 style="text-align: center">
                                            No Records Found
                                        </h1>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <div class="db-inte-prof-list">
                                <ul>
                                    @forelse ($accept as $item)
                                        <li>
                                            <div class="db-int-pro-1"> <img
                                                    src="{{ asset('uploads/profile/' . $item->main_profile_pic) }}"
                                                    alt="">
                                            </div>
                                            <div class="db-int-pro-2">
                                                <h5>{{ $item->name }}</h5>
                                                <ol class="poi">
                                                    <li>City: <strong>{{ $item->city_name }}</strong></li>
                                                    <li>Age: <strong>
                                                            {{ \Carbon\Carbon::parse($item->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }}</strong>
                                                    </li>
                                                    <li>Height: <strong>{{ $item->height_count }}</strong></li>
                                                    <li>Job: <strong>{{ $item->job_type_name }}</strong></li>
                                                </ol>
                                                <ol class="poi poi-date">
                                                    <li>Request on:
                                                        {{ \Carbon\Carbon::parse($item->date_time)->setTimezone('Asia/Kolkata')->format('h:i A, d F Y') }}
                                                    </li>
                                                </ol>
                                                <a href="/users/profile/details/{{ $item->id }}" class="cta-5"
                                                    target="_blank">View full
                                                    profile</a>
                                            </div>
                                            <div class="db-int-pro-3">
                                                <button type="button" class="btn btn-outline-danger btn-sm"><a
                                                        href="/send/ststus/{{ $item->interest_id }}/deny"
                                                        class="text-danger">Denay</a></button>
                                            </div>
                                        </li>
                                    @empty
                                        <h1 style="text-align: center">
                                            No Records Found
                                        </h1>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <div class="db-inte-prof-list">
                                <ul>
                                    @forelse ($reject as $item)
                                        <li>
                                            <div class="db-int-pro-1"> <img
                                                    src="{{ asset('uploads/profile/' . $item->main_profile_pic) }}"
                                                    alt="">
                                            </div>
                                            <div class="db-int-pro-2">
                                                <h5>{{ $item->name }}</h5>
                                                <ol class="poi">
                                                    <li>City: <strong>{{ $item->city_name }}</strong></li>
                                                    <li>Age: <strong>
                                                            {{ \Carbon\Carbon::parse($item->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }}</strong>
                                                    </li>
                                                    <li>Height: <strong>{{ $item->height_count }}</strong></li>
                                                    <li>Job: <strong>{{ $item->job_type_name }}</strong></li>
                                                </ol>
                                                <ol class="poi poi-date">
                                                    <li>Request on:
                                                        {{ \Carbon\Carbon::parse($item->date_time)->setTimezone('Asia/Kolkata')->format('h:i A, d F Y') }}
                                                    </li>
                                                </ol>
                                                <a href="/users/profile/details/{{ $item->id }}" class="cta-5"
                                                    target="_blank">View full
                                                    profile</a>
                                            </div>
                                            <div class="db-int-pro-3">
                                                <button type="button" class="btn btn-success btn-sm"><a
                                                        href="/send/ststus/{{ $item->interest_id }}/accept"
                                                        class="text-white">Accept</a></button>
                                            </div>
                                        </li>
                                    @empty
                                        <h1 style="text-align: center">
                                            No Records Found
                                        </h1>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
