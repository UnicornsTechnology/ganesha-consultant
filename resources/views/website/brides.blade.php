@extends('layouts.web_layout')
@section('title')
    Brides
@endsection
@section('content')
    <!-- SUB-HEADING -->
    <section>
        <div class="all-pro-head">
            <div class="container">
                <div class="row">
                    <h1>Lakhs of Happy Marriages</h1>
                    <h1>Brides Profiles</h1>
                    <a href="/users/register">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!--FILTER ON MOBILE VIEW-->
        <div class="fil-mob fil-mob-act">
            <h4>Profile filters <i class="fa fa-filter" aria-hidden="true"></i> </h4>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="all-weddpro all-jobs all-serexp chosenini">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <span class="filter-clo">+</span>
                        <!-- START -->
                        <form action="/grooms" method="GET">
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-search" aria-hidden="true"></i> Cast</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="cast">
                                        @foreach ($caste as $item)
                                            <option value="{{ $item->caste_id }}"
                                                {{ request('cast') == $item->caste_id ? 'selected' : '' }}>
                                                {{ $item->caste_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Marital Status</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="marital_status">
                                        <option value="0" {{ request('marital_status') == 0 ? 'selected' : '' }}>Not
                                            Assign
                                        </option>
                                        <option value="1" {{ request('marital_status') == 1 ? 'selected' : '' }}>
                                            Unmarried
                                        </option>
                                        <option value="2" {{ request('marital_status') == 2 ? 'selected' : '' }}>
                                            Married
                                        </option>
                                        <option value="3" {{ request('marital_status') == 3 ? 'selected' : '' }}>
                                            Divorced
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->

                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-search" aria-hidden="true"></i> Job Type</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="job_type">
                                        @foreach ($job_type as $item)
                                            <option value="{{ $item->job_type_id }}"
                                                {{ request('job_type') == $item->job_type_id ? 'selected' : '' }}>
                                                {{ $item->job_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-clock-o" aria-hidden="true"></i>Age</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="age">
                                        <option value="0" {{ request('age') == 2 ? 'selected' : '' }}>Select age
                                        </option>
                                        <option value="[18,30]" {{ request('age') == '[18,30]' ? 'selected' : '' }}>18 to
                                            30
                                        </option>
                                        <option value="[31,40]" {{ request('age') == '[31,40]' ? 'selected' : '' }}>31 to
                                            40
                                        </option>
                                        <option value="[41,50]" {{ request('age') == '[41,50]' ? 'selected' : '' }}>41 to
                                            50
                                        </option>
                                        <option value="[51,60]" {{ request('age') == '[51,60]' ? 'selected' : '' }}>51 to
                                            60
                                        </option>
                                        <option value="[61,70]" {{ request('age') == '[61,70]' ? 'selected' : '' }}>61 to
                                            70
                                        </option>
                                        <option value="[71,80]" {{ request('age') == '[71,80]' ? 'selected' : '' }}>71 to
                                            80
                                        </option>
                                        <option value="[81,90]" {{ request('age') == '[81,90]' ? 'selected' : '' }}>81 to
                                            90
                                        </option>
                                        <option value="[91,100]" {{ request('age') == '[91,100]' ? 'selected' : '' }}>91 to
                                            100
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-bell-o" aria-hidden="true"></i>Mother Tongue</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="mother_tongue">
                                        @foreach ($mother_tongue as $item)
                                            <option value="{{ $item->mother_tongue_id }}"
                                                {{ request('mother_tongue') == $item->mother_tongue_id ? 'selected' : '' }}>
                                                {{ $item->mother_tongue_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-bell-o" aria-hidden="true"></i>Select Religion</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="religin">
                                        @foreach ($religion as $item)
                                            <option value="{{ $item->religion_id }}"
                                                {{ request('religin') == $item->religion_id ? 'selected' : '' }}>
                                                {{ $item->religion_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>City</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="city">
                                        @foreach ($city as $item)
                                            <option value="{{ $item->city_id }}"
                                                {{ request('city') == $item->city_id ? 'selected' : '' }}>
                                                {{ $item->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-rati lhs-ver lhs-cate text-center">
                                <Button class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i> Find
                                    Partner</Button>
                            </div>
                            <!-- END -->
                        </form>
                        <!-- START -->
                        <div class="filt-com filt-send-query">
                            <div class="send-query">
                                <h5>What are you looking for?</h5>
                                <p>We will help you to arrage the best match to you.</p>
                                <a href="/contact-us" data-toggle="modal" data-target="#expfrm">Send your queries</a>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                    <div class="col-md-9">
                        <div class="all-list-sh view-grid mt-3">
                            <ul>
                                @forelse ($grooms as $item)
                                    <li>
                                        <div class="all-pro-box user-avil-onli" data-useravil="avilyes"
                                            data-aviltxt="Available online">
                                            <!--PROFILE IMAGE-->
                                            <div class="pro-img">
                                                @if ($item->main_profile_pic)
                                                    <a href="/users/profile/details/{{ $item->id }}">
                                                        <img src="{{ asset('uploads/profile/' . $item->main_profile_pic) }}"
                                                            alt="" />
                                                    </a>
                                                @else
                                                    <a href="/users/profile/details/{{ $item->id }}">
                                                        <img src="{{ asset('default-profile-pic.jpg') }}" alt="" />
                                                    </a>
                                                @endif

                                            </div>
                                            <!--END PROFILE IMAGE-->

                                            <!--PROFILE NAME-->
                                            <div class="pro-detail">
                                                <h4><a
                                                        href="/users/profile/details/{{ $item->id }}">{{ $item->name }}</a>
                                                </h4>
                                                <div class="pro-bio">
                                                    <span>{{ $item->education }}</span>
                                                    <span>{{ $item->job_type_name }}</span>
                                                    @if ($item->date_of_birth)
                                                        <span>{{ $item->age }}Years Old</span>
                                                    @else
                                                        <span>Not Provided</span>
                                                    @endif
                                                    <span>{{ $item->height_count }}</span>
                                                </div>
                                                @auth
                                                    <div class="links">
                                                        <a href="#!" class="cta cta-sendint">Caste :
                                                            {{ $item->caste_name }}</a>
                                                        <a href="#!" class="cta cta-sendint">Sub Caste :
                                                            {{ $item->subcate_name }}</a>
                                                        <a href="#!" class="cta cta-sendint">Sub Caste :
                                                            {{ $item->subcate_name }}</a>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="/users/profile/details/{{ $item->id }}"
                                                            class="btn btn-danger btn-sm w-100">View Profile</a>
                                                    </div>
                                                @else
                                                    <div class="links">

                                                        <a href="/user/login">More detaiils</a>
                                                    </div>
                                                @endauth
                                            </div>
                                            <!--END PROFILE NAME-->
                                            <!--SAVE-->
                                            <span class="enq-sav" data-toggle="tooltip"
                                                title="Click to save this provile."></span>
                                            <!--END SAVE-->
                                        </div>
                                    </li>
                                @empty
                                    <h1 class="mt-2 mx-4">Data Not Found</h1>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <div class="row">
        <div class="col d-flex justify-content-center" style="margin-top:-52px">
            {!! $grooms->links() !!}
        </div>
    </div>
@endsection
