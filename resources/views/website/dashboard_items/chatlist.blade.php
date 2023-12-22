@extends('website.dashboard')
@section('items')
    <div class="row">
        <div class="col-md-12 db-sec-com">
            <h2 class="db-tit">Chat list</h2>
            <div class="db-pro-stat">
                <div class="db-chat">
                    <ul>
                        @foreach ($list as $item)
                            <li class="db-chat-trig" onclick="GetOBJ({{ $item }})">
                                <div class="db-chat-pro">
                                    @if ($item->main_profile_pic)
                                        <img src="{{ asset('/uploads/profile/' . $item->main_profile_pic) }}"
                                            alt="{{ $item->main_profile_pic }}">
                                    @else
                                        <img src="{{ asset('/default-profile-pic.jpg') }}" alt="default img">
                                    @endif
                                </div>
                                <div class="db-chat-bio">
                                    <h5>{{ $item->name }}</h5>
                                    <span>Click To chat Your Partner</span>
                                </div>
                                <div class="db-chat-info">
                                    <div class="time new">
                                        <span class="timer">9:00 PM</span>
                                        <span class="cont">3</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
