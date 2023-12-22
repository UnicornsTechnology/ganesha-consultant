@extends('website.dashboard')
@section('title') Notifications @endsection
@section('items')
<div class="col-md-12 col-lg-12">
    <div class="row">
        <div class="col-md-12 db-sec-com">
            <h2 class="db-tit">Notifications</h2>
            <div class="db-pro-stat">
                <div class="db-chat">
                    <ul class="list-unstyled">
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <li>
                                <div>
                                      <h5> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                                      </svg> 
                                      <a href="/users/mark-as-read/{{$notification->id}}">{{ $notification->data['message'] }}</a>
                                    </h5>
                                </div>
                                <div>
                                    <div style="width:200px; font-size:12px">
                                        <span class="timer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                                <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z"/>
                                                <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3"/>
                                              </svg>
                                            {{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="db-chat-trig">
                                <div class="db-chat-bio">
                                    <h5>No Notifications</h5>
                                    <span>You have no unread notifications.</span>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
