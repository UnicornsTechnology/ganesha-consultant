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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
