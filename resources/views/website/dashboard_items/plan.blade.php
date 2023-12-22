@extends('website.dashboard')
@section('items')
    <div class="row">
        <div class="col-md-4 db-sec-com">
            <h2 class="db-tit">Plan details</h2>
            <div class="db-pro-stat">
                <h6 class="tit-top-curv">Current plan</h6>
                <div class="db-plan-card">
                    <img src="{{ asset('website/images/icon/plan.png') }}" alt="">
                </div>
                <div class="db-plan-detil">
                    <ul>
                        <li>Plan name: <strong>{{ isset($data[0]->plan_name) ? $data[0]->plan_name : '' }}</strong></li>
                        <li>Validity: <strong>{{ isset($data[0]->month) ? $data[0]->month : '' }} Months</strong></li>
                        <li>Valid till: <strong>{{ isset($data[0]->plan_end_date) ? $data[0]->plan_end_date : '' }}</strong>
                        </li>
                        <li><a href="/membership-plans" class="cta-3">Upgrade now</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 db-sec-com">
            <h2 class="db-tit">All invoice</h2>
            @if (session('msg'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="db-invoice">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Plan type</th>
                            <th>Duration</th>
                            <th>Cost</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->plan_name }}</td>
                                <td>{{ $item->month }} Months(From {{ $item->plan_start_date }} to
                                    {{ $item->plan_end_date }})
                                </td>
                                <td>{{ $item->price }}</td>
                                <td><a href="#" class="cta-dark cta-sml" download><span>Download</span></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12 db-sec-com">
            <div class="alert alert-warning db-plan-canc db-plan-canc-app">
                <p>Your plan cancellation request has been successfully received by the admin. Once the admin approves your
                    cancellation, the cost will be sent to you.</p>
            </div>
        </div>
    </div>
@endsection
