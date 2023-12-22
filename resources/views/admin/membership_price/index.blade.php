@extends('layouts.web_admin_layout')
@section('title')
    Membership Plan Create
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
                    <h5>Price List </h5>
                    <div>
                        <a href="/admin/membership/price-create/{{$plan->membership_plan_id}}" class="btn btn-sm btn-success">Add price</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center" role="row">
                                        <th>Sr.No</th>
                                        <th>Plan Name</th>
                                        <th>Months</th>
                                        <th>Prices</th>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prices as $key => $item)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $plan->plan_name }}</td>
                                            <td>{{ $item->month }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td> <a href="/admin/membership/price-trash/{{ $item->price_plan_id }}"><span
                                                        class="badge @if ($item->price_status == 'active') bg-success @else bg-danger @endif">
                                                        {{ $item->price_status }} </span></a> </td>
                                            <td>
                                                <a href="/admin/membership/price-edit/{{ $item->price_plan_id }}"
                                                    class="btn-sm btn btn-success">Edit</a>

                                            </td>

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
