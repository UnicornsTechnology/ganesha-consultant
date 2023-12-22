@extends('layouts.web_admin_layout')
@section('title')
    Match Making
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('msg'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Members List </h5>
                    <div>
                        {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModalDefault">Fillter</button> --}}
                        <a href="/admin/member/create" class="btn btn-sm btn-success">Add New Member</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 row mt-3">
                        @if (count($members) == 0)
                            <h1 class="text-center my-3">No Results Found !</h1>
                        @else
                        @foreach ($members as $item)
                        <div class="col-12 mx-3">
                        <div class="card">
                            <div class="card-header"> 
                                <div class="d-md-flex justify-content-between">
                                   
                                    <h6> Name : {{$item['currentMember']['name']}} : <span class="badge bg-primary">Matched Profiles - {{count($item['matches']) }}</span></h6>
                                    
                                    <h6>Matri ID : {{$item['currentMember']['id']}} - <span class="badge @if($item['currentMember']['lock_status'] == "Locked") bg-danger @else bg-success @endif ml-3">{{$item['currentMember']['lock_status']}}</span>
                                        <span class="badge @if($item['currentMember']['user_status'] == "Deactivated") bg-danger @else bg-success @endif ml-3">{{$item['currentMember']['user_status']}}</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-4 mx-auto my-auto text-center">
                                        @if($item['currentMember']['main_profile_pic'] != NULL)
                                        <img src="{{asset('uploads/profile/'. $item['currentMember']['main_profile_pic'])}}" alt="..." height="210" width="200" class="img-thumbnail">
                                        @else
                                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="210" width="200" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="col-12 col-sm-4 mx-auto my-auto mt-3">
                                        <p><b>Gender  :</b>  @if ($item['currentMember']['gender'] == 1)
                                            Male
                                        @else
                                            Female
                                        @endif </p>
                                        <p><b>Religion  :</b>  {{$item['currentMember']['religion_name']}}</p>
                                        <p><b>Education  :</b>  {{$item['currentMember']['education']}}</p>
                                        <p><b>Email  :</b>  {{$item['currentMember']['email']}}</p>
                                        <p><b>Date Of Birth:</b> {{ $item['currentMember']['date_of_birth'] ? \Carbon\Carbon::parse($item['currentMember']['date_of_birth'])->format('d-m-Y') : 'N/A' }}</p>
                                       <p><b>Age  :</b>  @if ($item['currentMember']['date_of_birth'])
                                            {{ \Carbon\Carbon::parse($item['currentMember']['date_of_birth'])->diffInYears(\Carbon\Carbon::now()) }} Years Old
                                        @else
                                            (Date of birth not provided)
                                        @endif</p>
                                    </div>

                                    <div class="col-12 col-sm-4 mx-auto my-auto">
                                        <p><b>Marital Status  :</b>  @if ($item['currentMember']['marital_status'] == 1)
                                            Unmarried
                                        @elseif($item['currentMember']['marital_status'] == 2)
                                            Married
                                            @else 
                                            Divorced
                                        @endif</p>
                                        <p><b>Caste  :</b>  {{$item['currentMember']['caste_name']}}</p>
                                        <p><b>Subcaste  :</b>  {{$item['currentMember']['subcaste_name']}}</p>
                                        <p><b>Occupation  :</b>  {{$item['currentMember']['occupation']}}</p>
                                        <p><b>Mobile  :</b>  {{$item['currentMember']['mobile']}}</p>
                                        <p><b>Height  :</b>  {{$item['currentMember']['height_count']}}</p>
                                        <p><b>Weight  :</b>  {{$item['currentMember']['weight_count']}}</p>
                                    </div>
                                </div>
                                <hr/>
                                <div class="text-center">
                                    <a href="/admin/member/edit/{{$item['currentMember']['id']}}" class="btn btn-sm btn-success mx-2 my-2">Edit</a>
                                    <a href="/admin/member/show/{{$item['currentMember']['id']}}" class="btn btn-sm btn-primary mx-2 my-2">Show</a>
                                    <a href="/admin/member/biodata/{{$item['currentMember']['id']}}" class="btn btn-sm btn-secondary mx-2 my-2">Bio Data</a>
                                    <a href="/admin/member/lock-status/{{$item['currentMember']['id']}}" class="btn btn-sm btn-danger mx-2 my-2">@if($item['currentMember']['lock_status'] == "Locked") Unlock @else Lock @endif</a>
                                    <a href="/admin/member/activation/{{$item['currentMember']['id']}}" class="btn btn-sm btn-danger mx-2 my-2">@if($item['currentMember']['user_status'] == "Activated") Deactivate @else Activate @endif</a>
                                    <a href="/admin/member/matches/{{$item['currentMember']['id']}}" class="btn btn-sm btn-primary mx-2 my-2">View Matches</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-center" >
                        {!! $members->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModalDefault" tabindex="-1">
        <div class="modal-dialog">
            <form action="/admin/member/filter">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Fillter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="caste">Caste</label>
                                <select class="form-select single-select-field" id="caste" name="caste">
                                    @foreach ($data['caste'] as $item)
                                    <option value="{{$item['currentMember']['caste_id']}}" >{{$item['currentMember']['caste_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="job_type">Job Type</label>
                                <select class="form-select single-select-field"  name="job_type">
                                    @foreach ($data['jobType'] as $item)
                                    <option value="{{$item['currentMember']['job_type_id']}}">{{$item['currentMember']['job_type_name']}}</option>
                                @endforeach
                                   </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="village">City</label>
                                <select class="form-select single-select-field"  name="city">
                                    @foreach ($data['city'] as $item)
                                    <option value="{{$item['currentMember']['city_id']}}" >{{$item['currentMember']['city_name']}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="activation">Activation</label>
                                <select class="form-control" id="activation" name="activation">
                                    <option value="Activated">Activated</option>
                                    <option value="Deactivatd">Deactivatd</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="lock">Profile Status</label>
                                <select class="form-control" id="lock" name="lock">
                                    <option value="Unlocked">Unlocked</option>
                                    <option value="Locked">Locked</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            </div>
        </div>
    </div> --}}
@endsection
