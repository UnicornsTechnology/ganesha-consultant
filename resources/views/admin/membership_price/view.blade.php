@extends('layouts.web_admin_layout')
@section('title')
    Membership price View
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>price View</h5>
                    <div>
                        <a href="/admin/membership/price-list" class="btn btn-sm btn-success">Plan View</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/membership/price-update' }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="tbl_plan_id">Plan Name</label>
                                    <select class="form-control" id="tbl_plan_id" name="tbl_plan_id">
                                        @foreach ($plan as $item)
                                            <option value="{{ $item->membership_plan_id }}"
                                                {{ $price->tbl_plan_id == $item->membership_plan_id ? 'selected' : '' }}>
                                                {{ $item->plan_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="month">Monts</label>
                                    <input type="number" class="form-control" id="month" name="month"
                                        value="{{ $price->month }}" placeholder="Enter Plan Amount" required>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $price->price }}" placeholder="Enter Plan Amount" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
