@extends('layouts.web_admin_layout')
@section('title')
    Matches Found
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('msg'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card p-3 text-center">
                <h6>Showing Results for : {{ $user->name }}</h6>
                ({{count($members)}} Results Found )
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Members List </h5>
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
                                   
                                    <h6> Name : {{$item['currentMember']['name']}}</h6>
                                   
                                    <h6>Matri ID : {{$item['currentMember']['id']}} - <span class="badge @if($item['currentMember']['lock_status'] == "Locked") bg-danger @else bg-success @endif ml-3">{{$item['currentMember']['lock_status']}}</span>
                                        <span class="badge @if($item['currentMember']['user_status'] == "Deactivated") bg-danger @else bg-success @endif ml-3">{{$item['currentMember']['user_status']}}</span>
                                    </h6>
                                </div>
                              <div class="d-flex" style="height: 30px">

                                <span> Matched {{ round(count($item['matches']) / 5 * 100) }} % : &nbsp;&nbsp;&nbsp; </span> <div style="width: 250px">
                                    <div class="progress mt-1 ml-2">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ round(count($item['matches']) / 5 * 100) }}%;" aria-valuenow="{{ round(count($item['matches']) / 5 * 100) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($item['matches']) / 5 * 100) }}%</div>
                                       </div>
                                </div>
                              </div>
                              Matching Criteria : @foreach ($item['matches'] as $matchCriteriaItem)
                              <span class="badge bg-success">{{$matchCriteriaItem}}</span>
                              @endforeach
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
                                        <p><b>Religion  :</b>  {{$item['currentMember']['religion_name'] ?? "Not Assigned"}}</p>
                                        <p><b>Education  :</b>  {{$item['currentMember']['education'] ?? "Not Assigned"}}</p>
                                        <p><b>Email  :</b>  {{$item['currentMember']['email'] ?? "Not Assigned"}}</p>
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
                                        <p><b>Caste  :</b>  {{$item['currentMember']['caste_name'] ?? "Not Assigned"}}</p>
                                        <p><b>Subcaste  :</b>  {{$item['currentMember']['subcaste_name'] ?? "Not Assigned"}}</p>
                                        <p><b>Occupation  :</b>  {{$item['currentMember']['occupation'] ?? "Not Assigned"}}</p>
                                        <p><b>Mobile  :</b>  {{$item['currentMember']['mobile'] ?? "Not Assigned"}}</p>
                                        <p><b>Height  :</b>  {{$item['currentMember']['height_count'] ?? "Not Assigned"}}</p>
                                        <p><b>Weight  :</b>  {{$item['currentMember']['weight_count'] ?? "Not Assigned"}}</p>
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
@endsection
