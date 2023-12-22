@extends('layouts.web_admin_layout')
@section('title')
    Membership Plan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Plan Create </h5>
                    <div>
                        <a href="/admin/membership/plans-list" class="btn btn-sm btn-success">Plan View</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/membership/plans-store' }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="plan_name">Plan Name</label>
                                        <input type="text" class="form-control" id="plan_name"
                                            value="{{ old('plan_name') }}" name="plan_name" placeholder="Enter Plan Name"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="plan_massage">Plan Massage</label>
                                        <input type="text" class="form-control" id="plan_massage" name="plan_massage"
                                            value="{{ old('plan_massage') }}" placeholder="Enter Plan Massage" required>
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
