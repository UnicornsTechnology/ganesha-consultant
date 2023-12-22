@extends('layouts.web_admin_layout')
@section('title')
    All Plans
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
                    <h5>Plan List </h5>
                    <div>
                        <a href="/admin/membership/plans-create" class="btn btn-sm btn-success">Add Plan</a>
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
                                        <th>Status</th>
                                        <th>View Prices</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membership_plan as $key => $item)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->plan_name }}</td>
                                            <td> <a href="/admin/membership/plans-trash/{{ $item->membership_plan_id }}"><span
                                                        class="badge @if ($item->plan_status == 'active') bg-success @else bg-danger @endif">
                                                        {{ $item->plan_status }} </span></a> </td>
                                            <td><a href="/admin/membership/prices/{{ $item->membership_plan_id }}"
                                                    class="btn-sm btn btn-primary">View Prices</a></td>
                                            <td>
                                                <a href="/admin/membership/plans-edit/{{ $item->membership_plan_id }}"
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
