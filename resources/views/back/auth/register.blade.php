@extends('layouts.front.master')

@section('title')
    Register
@endsection
@section('content')
    {{-- Phone number cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!-- Info Section -->
    <div class="register-area  mb-180">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-wrapper">
                        <div class="form-title">
                            <h3>Register Account</h3>
                            <span></span>
                            <x-jet-validation-errors class="mb-4 text-danger" />
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active shadow-lg" role="tabpanel">
                                <form method="post" action="/student/register">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <label for="firstname1">Full Name*</label>
                                                <div class="input-area">
                                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                                    <input type="text" id="firstname1" name="full_name"
                                                        placeholder="Full Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="lastname1"><b>Mobile Number*</b> </label>
                                            <div class="form-floating  mb-25">

                                                <div class="input-area">
                                                    <input type="tel" class="form-control"
                                                        style="width: 100% !important" id="phone"
                                                        placeholder="Enter Mobile Number" onkeyup="Phone_Number()" required>
                                                    <input type="hidden" name="mobile_number" id="sdjkfhkasjdfh">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <label for="lastname1">Education*</label>
                                                <div class="input-area">
                                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                                    <input type="text" id="lastname1" name="education"
                                                        placeholder="Education">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <label for="username">City</label>
                                                <div class="input-area">
                                                    <img src="{{ asset('front_assets/images/icon/user-2.svg') }}" alt>
                                                    <input type="text" id="username" name="city" placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <label for="username">Select Category</label>
                                                <select name="job_category_id" id="username" class="form-control"
                                                    style="line-height:2.5">
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->job_category_id }}">
                                                            {{ $item->job_category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <label for="email">Email*</label>
                                                <div class="input-area">
                                                    <img src="{{ asset('front_assets/images/icon/email-2.svg') }}" alt>
                                                    <input type="email" name="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <label for="password">Password*</label>
                                                <input type="password" id="password" name="password" placeholder="Password"
                                                    required />
                                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner">
                                                <label for="password_confirmation">Confirm Password*</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" placeholder="Confirm Password" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                                <div class="form-group two">
                                                    <input type="checkbox" id="html1">
                                                    <label for="html1">Here, I will agree company terms &
                                                        conditions.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-inner">
                                                <button class="primry-btn-2" type="submit">Register</button>
                                            </div>
                                        </div>
                                        <h6>Already have an account? <a href="/student/login"> Login Here</a> </h6>
                                        <div class="login-difarent-way">
                                            {{-- <div class="row g-4">
                                                <div class="col-md-6">
                                                    <a href="https://myaccount.google.com/"><img
                                                            src="{{ asset('front_assets/images/icon/google1.svg') }}"
                                                            alt>Log in with
                                                        Google</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="https://www.facebook.com/"><img
                                                            src="{{ asset('front_assets/images/icon/facebook1.svg') }}"
                                                            alt>Log in with
                                                        Facebook</a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- moblie number --}}
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["ae", "us", "in", "de"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        function Phone_Number() {
            const phoneNumber = phoneInput.getNumber();
            const countryCode = phoneInput.getSelectedCountryData().iso2;
            document.getElementById('sdjkfhkasjdfh').value = phoneNumber;
        };
    </script>
    {{-- select to --}}
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('countries') // id
    </script>
    <!-- End Info Section -->
    <script>
        const passwordInput = document.getElementById('password');
        const passwordStrengthLabel = document.createElement('span');
        passwordStrengthLabel.id = 'password-strength';

        // Add the password strength label after the password input field
        passwordInput.parentNode.insertBefore(passwordStrengthLabel, passwordInput.nextSibling);

        // Event listener to check the password strength on input
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const strength = calculatePasswordStrength(password);
            updatePasswordStrengthLabel(strength);
        });

        // Function to calculate password strength
        function calculatePasswordStrength(password) {
            // Add your own password strength calculation logic here
            // This can include checking length, complexity, and other factors
            // Assign a score or level to the password based on its strength
            // Return the strength level or score

            // Example: Simple check for password length
            if (password.length < 6) {
                return 'Weak';
            } else if (password.length < 10) {
                return 'Medium';
            } else {
                return 'Strong';
            }
        }

        // Function to update the password strength label
        function updatePasswordStrengthLabel(strength) {
            passwordStrengthLabel.textContent = 'Password Strength: ' + strength;
        }
    </script>
@endsection
