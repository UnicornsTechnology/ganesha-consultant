@extends('layouts.web_admin_layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 border-0 border-start border-primary border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Members</p>
                            <h4 class="mb-0 text-primary">{{$data['total_members']}}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                            <i class="bi bi-basket2-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-success border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Grooms</p>
                            <h4 class="mb-0 text-success">{{$data['grooms']}}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-danger border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Brides</p>
                            <h4 class="mb-0 text-danger"> {{$data['brides']}} </h4>
                        </div>
                        <div class="ms-auto widget-icon bg-danger text-white">
                            <i class="bi bi-graph-down-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-warning border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Membership Plans</p>
                            <h4 class="mb-0 text-warning">{{$data['membership_plans']}}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-warning text-dark">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 border-0 border-start border-primary border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Plans Purchased Grooms</p>
                            <h4 class="mb-0 text-primary">{{$data['plan_purchased_grooms']}}/{{$data['grooms']}}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                            <i class="bi bi-basket2-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-success border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Plans Purchased Brides</p>
                            <h4 class="mb-0 text-success">{{$data['plan_purchased_brides']}}/{{$data['grooms']}}   </h4>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-danger border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Monthly Income</p>
                            <h4 class="mb-0 text-danger"> &#8377; {{$data['current_month_earning']}}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-danger text-white">
                            <i class="bi bi-graph-down-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-0 border-start border-warning border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Income</p>
                            <h4 class="mb-0 text-warning">&#8377; {{$data['total_earning']}}</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-warning text-dark">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h2>Recently Purchased Plans Members</h2>
            <br/>
            <div class="customer-table">
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Member Name</th>
                                    <th>Plan Name</th>
                                    <th>Plan Amount</th>
                                    <th>Start Date</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
            
                            <tbody>
                                @foreach ($data['plans'] as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> {{ $item->name }} </td>
                                        <td>{{ $item->plan_name }}</td>
                                        <td> &#8377; {{ $item->price }}</td> 
                                        <td>{{ $item->plan_start_date }}</td>
                                        <td>{{ $item->plan_end_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Recently Joined Members</h2>
            <br/>
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Date Joined</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>View Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($recentlyJoined as $key => $item)
                              <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->city_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->mobile}}</td>
                                <td> <a href="/admin/member/show/{{$item->id}}" class="btn btn-primary btn-sm">View Profile</a> </td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
