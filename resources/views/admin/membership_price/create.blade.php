@extends('layouts.web_admin_layout')
@section('title')
    Membership Plan Price Create
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Price Create </h5>
                    <div>
                        <a href="/admin/membership/prices/{{ $id }}" class="btn btn-sm btn-success">price
                            View</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/membership/price-store' }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tbl_plan_id" value="{{ $id }}">
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="month">Months</label>
                                        <input type="number" class="form-control" id="months" name="month"
                                            value="{{ old('month') }}" placeholder="Enter Month" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            value="{{ old('price') }}" placeholder="Enter Plan Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="view_profile">view profile</label>
                                        <input type="number" class="form-control" id="view_profiles" name="view_profile"
                                            value="{{ old('view_profile') }}" placeholder="Enter view_profile" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="price_feature">Plan Feature</label>
                                        <textarea type="text" class="form-control" id="plan_feature" name="price_feature" placeholder="Enter Plan Feature">{{ old('price_feature') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
