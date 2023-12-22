@extends('layouts.web_admin_layout')
@section('title')
    Purchased Plans List
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('msg'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Purchased Plans List</h5>
                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
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
                                    @foreach ($data as $key => $item)
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
        </div>
    </div>
@endsection
