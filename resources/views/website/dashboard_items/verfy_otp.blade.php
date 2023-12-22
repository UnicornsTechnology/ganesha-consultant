@extends('website.dashboard')
@section('items')
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
    <div class="card p-4">
        <div class="row">
            <div class="inn">
                <div class="rhs">
                    <div class="form-login">
                        <div class="edit-pro-parti">
                            <div class="form-tit">
                                @if (session('msgs'))
                                    <div class="alert alert-danger bg-danger text-white">
                                        {{ session('msgs') }}
                                    </div>
                                @endif
                                <h1>Enter Otp</h1>
                            </div>
                            <div class="row">
                                <form action="/users/update/otp/verify" method="POST" class="otp-form" name="otp-form">
                                    @csrf
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
                                    <input type="hidden" name="otp" id="dslkgjlsdjkg">
                                    <input type="hidden" name="old_value" value="{{ $object }}">
                                    <div class="result">
                                        <p id="_otp" class="_notok"></p>
                                        <button class="btn btn-success">Verify</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                document.querySelector("#dslkgjlsdjkg").value = _finalKey
            } else {
                document.querySelector("#_otp").classList.replace("_ok", "_notok")
                document.querySelector("#_otp").innerText = _finalKey
                document.querySelector("#dslkgjlsdjkg").value = _finalKey
            }
        }
    </script>
@endsection
