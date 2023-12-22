@extends('layouts.front.master')

@section('title')
    Login
@endsection
@section('content')
    <div class="login-area  mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-wrapper shadow-lg">
                        <div class="form-title">
                            <h3>Log In Here!</h3>
                            <span></span>
                            @if (session('msg'))
                                <div class="mb-4 alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <x-jet-validation-errors class="mb-4 text-danger" />
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <form method="post" action="/login">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-inner mb-25">
                                        <label for="email">Email*</label>
                                        <div class="input-area">
                                            <img src="{{ asset('front_assets/images/icon/email-2.svg') }}" alt>
                                            <input type="email" id="email"name="email"
                                                placeholder="info@example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <label for="email">Password*</label>
                                        <input type="password" name="password" id="password" placeholder="Password" />
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                        <div class="form-group">
                                            <input type="checkbox" id="html">
                                            <label for="html">Remember Me</label>
                                        </div>
                                        {{-- <a href="#" class="forgot-pass">Forget Password?</a> --}}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primry-btn-2" type="submit">Log In</button>
                                    </div>
                                </div>
                                <h6>Don’t have an account? <a href="/student/register">Register</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
