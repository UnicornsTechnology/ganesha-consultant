@extends('website.dashboard')
@section('items')
    <div class="row">
        <div class="col-md-12 db-sec-com">
            <h2 class="db-tit">Profile Views</h2>
            <div class="db-pro-stat">
                <div class="db-inte-main">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home">Viewed By Me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu1">Viewed By Others</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <div class="db-inte-prof-list">
                                <ul>
                                    @forelse ($profileViews as $item)
                                        <li>
                                            <div class="db-int-pro-1"> <img
                                                    src="{{ asset('uploads/profile/' . $item->main_profile_pic) }}"
                                                    alt=""> </div>
                                            <div class="db-int-pro-2">
                                                <h5>{{ $item->name }}</h5>
                                                <ol class="poi">
                                                    <li>City: <strong>{{ $item->city_name }}</strong></li>
                                                    <li>Age: <strong>
                                                            {{ \Carbon\Carbon::parse($item->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }}</strong>
                                                    </li>
                                                    <li>Height: <strong>{{ $item->height_count }}</strong></li>
                                                    <li>View: <strong>{{ $item->pv_viewing_count }}</strong></li>
                                                </ol>
                                                <a href="/users/profile/details/{{ $item->id }}" class="cta-5">View
                                                    full
                                                    profile</a>
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
                                    @forelse ($profileViewedByOthers as $item)
                                        <li>
                                            <div class="db-int-pro-1"> <img
                                                    src="{{ asset('uploads/profile/' . $item->main_profile_pic) }}"
                                                    alt=""> </div>
                                            <div class="db-int-pro-2">
                                                <h5>{{ $item->name }}</h5>
                                                <ol class="poi">
                                                    <li>City: <strong>{{ $item->city_name }}</strong></li>
                                                    <li>Age: <strong>
                                                            {{ \Carbon\Carbon::parse($item->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }}</strong>
                                                    </li>
                                                    <li>Height: <strong>{{ $item->height_count }}</strong></li>
                                                    <li>View: <strong>{{ $item->pv_viewing_count }}</strong></li>
                                                </ol>
                                                <a href="/users/profile/details/{{ $item->id }}" class="cta-5">View
                                                    full
                                                    profile</a>
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
