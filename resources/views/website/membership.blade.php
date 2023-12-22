@extends('layouts.web_layout')
@section('title')
    Membership Plans
@endsection
@section('content')
    <!-- PRICING PLANS -->
    <section>
        <div class="plans-ban">
            <div class="container">
                <div class="row">
                    <span class="pri">Pricing</span>
                    <h1>Get Started <br> Pick your Plan Now</h1>
                    <p>The World's No.1 Matrimonial Service </p>
                    <p>Select from our multiple membership plan and find your best life partner with membership benefits..
                    </p>
                    <span class="nocre"> Accepet All Card & UPI Paymets</span>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- PRICING PLANS -->
    <section>
        <div class="plans-main">
            <div class="container">
                <div class="row">
                    <ul>
                        @foreach ($mainArray as $item)
                            <li>
                                <div class="pri-box">
                                    <h2>{{ $item->plan_name }}</h2>
                                    <p>{{ $item->plan_massage }}</p>
                                    @auth
                                        <a href="#" class="cta" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            onclick="GetSelectValue({{ $item->membership_plan_id }})">Get Started</a>
                                    @else
                                        <a href="/users/login" class="cta">Get Started</a>
                                    @endauth

                                    <span class="pri-cou"><b>{{ $item->pricesList[0]->price }}</b>/Month</span>
                                    <ol>
                                        {!! $item->pricesList[0]->price_feature !!}
                                    </ol>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/purchase/plan/now" method="post">
                    @csrf
                    <div class="modal-header d-flex justify-content-center">
                        <h1 class="modal-title fs-5 text-bold" id="staticBackdropLabel">Select Plan</h1>
                    </div>
                    <div class="modal-body">
                        <div class="col-12  d-flex justify-content-center my-3" id="sldkfhlsd">
                            <div class="spinner-border  text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="container " id="sldhfskdaa">
                            <div class="row">
                                <div class="col form-group">
                                    <label class="lb">Profile Created For:</label>
                                    <select class="form-select chosen-select" name="pan_id" id="send_Plan"
                                        onchange="getvalue(this.value);">
                                    </select>
                                    <div class="mt-2 text-center">
                                        <h1 id="sldkfjlsdk"></h1>
                                        <span id="slkdfjlskd"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Processed</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelled</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- END -->
    <script>
        const GetSelectValue = (id) => {
            document.getElementById('sldhfskdaa').classList.add('d-none');
            document.getElementById('sldkfhlsd').classList.remove('d-none');
            document.getElementById('send_Plan').innerHTML = ""
            fetch(`/get/price/plan/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const arryas = document.getElementById('send_Plan');
                    getvalue(data[0].price_plan_id);
                    data.forEach(element => {
                        arryas.innerHTML +=
                            `<option value="${element.price_plan_id}">${element.month} /Month</option>`
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        const getvalue = (id) => {
            fetch(`/get/price/plans/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('sldkfjlsdk').innerHTML = `&#8377; ${data.price} /-`
                    document.getElementById('slkdfjlskd').innerHTML = data.price_feature;
                    document.getElementById('sldhfskdaa').classList.remove('d-none');
                    document.getElementById('sldkfhlsd').classList.add('d-none');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
@endsection
