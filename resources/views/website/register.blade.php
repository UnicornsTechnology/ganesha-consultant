@extends('layouts.web_layout')
@section('title')
    Register
@endsection
@section('content')
    <!-- REGISTER -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="{{ asset('website/images/login-couple.png') }}" alt="">
                            </div>
                            <div class="im mt-4">
                                <img src="{{ asset('website/images/login-couple.png') }}" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Start for free</h4>
                                    <h1>Sign up to Matrimony</h1>
                                    <p>Already a member? <a href="/users/login">Login</a></p>
                                </div>
                                <div class="form-login">
                                    <form onsubmit="FormSubmit(event)">
                                        <div class="form-group">
                                            <label class="lb">Full Name:</label>
                                            <input type="text" class="form-control" placeholder="Enter your full name"
                                                name="name" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control" id="phone"
                                                placeholder="Enter phone number" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Gender:</label>
                                            <select class="form-select chosen-select" id="gender"
                                                data-placeholder="Select your Gender">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Martial Status:</label>
                                            <select class="form-select chosen-select" data-placeholder="Select your Martial"
                                                id="martisal_status">
                                                <option value="1">Unmarried</option>
                                                <option value="2">Married</option>
                                                <option value="3">Divorced</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Profile Created For:</label>
                                            <select class="form-select chosen-select"
                                                data-placeholder="Select your Profile Created For" id="profile_created">
                                                <option value="1">Self</option>
                                                <option value="2">Sun/Dauther</option>
                                                <option value="3">Father/Mother</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Password:</label>
                                            <input type="password" class="form-control" placeholder="Enter password"
                                                name="pswd" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Confirm Password:</label>
                                            <input type="password" class="form-control" id="c_password"
                                                placeholder="Enter password" name="pswd">
                                        </div>
                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="agree" required>
                                                Creating
                                                an account means you’re okay with our <a href="/terms-conditions"
                                                    class="text-danger">Terms of
                                                    Service</a>,
                                                Privacy Policy, and our default Notification Settings.
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" id="askldfklsdjhf" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>
    <style>
        .title {
            max-width: 400px;
            margin: auto;
            text-align: center;
            font-family: "Poppins", sans-serif;
        }

        .title h3 {
            font-weight: bold;
        }

        .title p {
            font-size: 12px;
            color: #118a44;
        }

        .title p.msg {
            color: initial;
            text-align: initial;
            font-weight: bold;
        }

        .otp-input-fields {
            margin: auto;
            background-color: white;
            box-shadow: 0px 0px 8px 0px #02025044;
            max-width: 400px;
            width: auto;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 40px;
        }

        .otp-input-fields input {
            height: 40px;
            width: 40px;
            background-color: transparent;
            border-radius: 4px;
            border: 1px solid #2f8f1f;
            text-align: center;
            outline: none;
            font-size: 16px;
        }

        .otp-input-fields input::-webkit-outer-spin-button,
        .otp-input-fields input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .otp-input-fields input[type=number] {
            -moz-appearance: textfield;
        }

        .otp-input-fields input:focus {
            border-width: 2px;
            border-color: darken(#2f8f1f, 5%);
            font-size: 20px;
        }

        .result {
            max-width: 400px;
            margin: auto;
            text-align: center;
        }

        .result p {
            font-size: 24px;
            font-family: 'Antonio', sans-serif;
            opacity: 1;
            transition: color 0.5s ease;
        }

        .result p._ok {
            color: green;
        }

        .result p._notok {
            color: red;
            border-radius: 3px;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-5 text-bold" id="staticBackdropLabel">OTP VERIFICATION</h1>
                </div>
                <div class="modal-body">
                    <form onsubmit="Verify(event)" class="otp-form" name="otp-form">
                        <div class="title">
                            <p class="msg">Please enter OTP to verify</p>
                        </div>
                        <div class="otp-input-fields">
                            <input type="number" class="otp__digit otp__field__1">
                            <input type="number" class="otp__digit otp__field__2">
                            <input type="number" class="otp__digit otp__field__3">
                            <input type="number" class="otp__digit otp__field__4">
                            <input type="number" class="otp__digit otp__field__5">
                            <input type="number" class="otp__digit otp__field__6">
                        </div>
                        <div class="text-end me-4">
                            <button href="#" class="text-danger" id="resendLink" onclick="resendOTP()">Resend
                                OTP...</button>
                        </div>
                        <div class="result">
                            <p id="_otp" class="_notok"></p>
                            <button class="btn btn-success">Verify</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var otp_inputs = document.querySelectorAll(".otp__digit")
        var mykey = "0123456789".split("")
        otp_inputs.forEach((_) => {
            _.addEventListener("keyup", handle_next_input)
        })

        function handle_next_input(event) {
            let current = event.target
            let index = parseInt(current.classList[1].split("__")[2])
            current.value = event.key

            if (event.keyCode == 8 && index > 1) {
                current.previousElementSibling.focus()
            }
            if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
                var next = current.nextElementSibling;
                next.focus()
            }
            var _finalKey = ""
            for (let {
                    value
                }
                of otp_inputs) {
                _finalKey += value
            }
            if (_finalKey.length == 6) {
                document.querySelector("#_otp").classList.replace("_notok", "_ok")
                document.querySelector("#_otp").innerText = _finalKey
            } else {
                document.querySelector("#_otp").classList.replace("_ok", "_notok")
                document.querySelector("#_otp").innerText = _finalKey
            }
        }

        function resendOTP() {
            var resendLink = document.getElementById('resendLink');
            var count = 120;

            resendLink.disabled = true;
            resendLink.innerHTML = "Resend in " + count + "s";
            var countdownInterval = setInterval(function() {
                count--;

                if (count <= 0) {
                    clearInterval(countdownInterval);
                    resendLink.disabled = false;
                    resendLink.innerHTML = "Resend OTP...";
                } else {
                    resendLink.innerHTML = "Resend in " + count + "s";
                }
            }, 1000);
            fetch('/users/otp/create')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    localStorage.setItem("SDFSDFSDFSD", data);
                    showToast("green", "OTP Send Successfully !!")
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        }
        const FormSubmit = (event) => {
            event.preventDefault();
            // STORE LOCAL STOREAGE VALUE AND SEND OTP
            const password = document.getElementById('password').value;
            const c_password = document.getElementById('c_password').value;
            if (password == c_password) {
                fetch('/users/otp/create')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        localStorage.setItem("SDFSDFSDFSD", data);
                        document.getElementById('askldfklsdjhf').click();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                showToast("red", "Password And Confirm Password Not Match ??")
            }


        }
        const Verify = (event) => {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const gender = document.getElementById('gender').value;
            const martisal_status = document.getElementById('martisal_status').value;
            const profile_created = document.getElementById('profile_created').value;
            const password = document.getElementById('password').value;
            const c_password = document.getElementById('c_password').value;
            const postData = {
                name: name,
                email: email,
                phone: phone,
                gender: gender,
                martisal_status: martisal_status,
                profile_created: profile_created,
                password: password,
                c_password: c_password,
            }
            const storedData = localStorage.getItem("SDFSDFSDFSD");
            if (document.getElementById('_otp').innerHTML == storedData) {
                fetch('/web/users/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(postData),
                    })
                    .then(response => {
                        console.log(response);
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        showToast("green", "User Register Successfully !!")
                        setTimeout(() => {
                            window.location.href = `/users/login`;
                        }, 2000);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                showToast("red", "Please Enter Invalid OTP")
            }
        }

        function showToast(colors, mag) {
            Toastify({
                text: mag,
                duration: 3000, // Duration in milliseconds
                newWindow: true, // Open link in a new window/tab
                close: true, // Show close button
                gravity: "top", // Display position (top, bottom, left, right)
                position: "right", // Position (top-left, top-center, top-right, etc.)
                backgroundColor: colors,
            }).showToast();
        }
    </script>
@endsection
