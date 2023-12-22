@extends('layouts.web_layout')
@section('title')
    Login
@endsection
@section('content')
    <!-- LOGIN -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find <br> your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="{{ asset('website/images/login-couple.png') }}" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Start for free</h4>
                                    <h1>Sign in to Matrimony</h1>
                                    <p>Not a member? <a href="/users/register">Sign up now</a></p>
                                    <x-validation-errors class="mb-4 text-danger" />
                                    @if (session('msg'))
                                        <div class="alert alert-success bg-success text-white">
                                            {{ session('msg') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <x-input id="email" class="form-control" id="inputEmailAddress"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username" placeholder="Enter Email" />

                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Password:</label>
                                            <x-input id="password" class="form-control" type="password" name="password"
                                                required autocomplete="current-password" placeholder="Enter Password" />
                                        </div>
                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="agree"> Remember
                                                me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
