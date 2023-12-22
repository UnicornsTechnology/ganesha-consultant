@extends('layouts.web_layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <section>
        <div class="db">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="db-nav">
                            <div class="db-nav-pro">
                                @if (isset(Auth::user()->main_profile_pic))
                                    <img src="{{ asset('/uploads/profile/' . Auth::user()->main_profile_pic) }}"
                                        class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/default-profile-pic.jpg') }}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="db-nav-list">
                                <ul>
                                    <li><a href="/users/dashboard"
                                            class="{{ request()->is('users/dashboard') ? 'act' : '' }}"><i
                                                class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                                    <li><a href="/users/profile/edit"
                                            class="{{ request()->is('users/profile/edit') ? 'act' : '' }}"><i
                                                class="fa fa-user" aria-hidden="true"></i>Profile Edit</a></li>
                                    <li><a href="/users/profile/partner/preference"
                                            class="{{ request()->is('users/profile/partner/preference') ? 'act' : '' }}"><i
                                                class="fa fa-users" aria-hidden="true"></i>Partner Preference</a></li>
                                    <li><a href="/users/interests"
                                            class="{{ request()->is('users/interests') ? 'act' : '' }}"><i
                                                class="fa fa-handshake-o" aria-hidden="true"></i>Interests</a></li>
                                    <li><a href="/users/chat-list"
                                            class="{{ request()->is('users/chat-list') ? 'act' : '' }}"><i
                                                class="fa fa-commenting-o" aria-hidden="true"></i>Chat
                                            list</a></li>
                                    <li><a href="/users/plan" class="{{ request()->is('users/plan') ? 'act' : '' }}"><i
                                                class="fa fa-money" aria-hidden="true"></i>Plan</a></li>
                                    <li><a href="/users/update/password"
                                            class="{{ request()->is('users/update/password') ? 'act' : '' }}"><i
                                                class="fa fa-file" aria-hidden="true"></i>Update Password</a></li>
                                    <li><a href="/users/profile-view"
                                            class="{{ request()->is('users/profile-view') ? 'act' : '' }}"><i
                                                class="fa fa-file" aria-hidden="true"></i>Visited Profiles</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        @yield('items')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CHAT CONVERSATION BOX START -->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn" id="slkdflsdkjfls">
            {{-- get in funtion ok?? --}}
        </div>
    </div>
    <script>
        let IDS = ""
        const GetOBJ = (obj) => {
            IDS = obj.id
            document.getElementById('slkdflsdkjfls').innerHTML = `
            <f name="new_chat_form">
                <div class="s1">
                    <img src="${obj.main_profile_pic?'/uploads/profile/'+obj.main_profile_pic:'/default-profile-pic.jpg'}" class="intephoto2" alt="">
                    <h4><b class="intename2">${obj.name}</b>,</h4>
                    <span class="avlsta avilyes">Available online</span>
                </div>
                <div class="s2 chat-box-messages">
                    <span class="chat-wel">Start a new chat!!! now</span>
                    <div class="chat-con" id="dsldjkflskdfjs">
                       hii
                    </div>
                    <!--<span>Start A New Chat!!! Now</span>-->
                </div>
                <div class="s3">
                    <input type="text" name="chat_message" placeholder="Type a message here.." id="msg_msg">
                    <button id="chat_send1" name="chat_send" onclick="FireEvent(${obj.id})">Send <i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i>
                    </button>
                </div>
            </f>`;
            GetChat(obj.id, {{ Auth::id() }})
        }
        const GetChat = (resiver_id, sender_id) => {
            document.getElementById('dsldjkflskdfjs').innerHTML = " ";
            axios.get(`/get/chat/${resiver_id}/${sender_id}`)
                .then(function(response) {
                    var MSG = document.getElementById('dsldjkflskdfjs');
                    response.data.forEach(element => {
                        if ({{ Auth::id() }} == element.sender_id) {
                            MSG.innerHTML += `
                    <div class="row">
                        <div class="col mt-1">
                            <div class="chat-rhs">${element.message}</div>
                        </div>
                    </div>
                    `
                        } else if ({{ Auth::id() }} == element.receiver_id) {
                            MSG.innerHTML += `
                <div class="row">
                        <div class="col mt-1">
                            <div class="chat-lhs">${element.message}</div>
                        </div>
                </div>`
                        } else {}
                    });

                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
    <!-- END -->
@endsection
