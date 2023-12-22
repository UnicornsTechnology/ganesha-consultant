@extends('layouts.web_admin_layout')
@section('title')
    Edit Trusted Couple
@endsection

@section('content')
    <div class="row">
        @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
@endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Trusted Couples</h5>
                    <div>
                        <a href="/admin/trusted-couples/list" class="btn btn-sm btn-success">List</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/trusted-couples/update' }}" enctype="multipart/form-data">
                        <input type="hidden" value="{{$trustedCouple->tc_id}}" name="tc_id">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row"> 
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="tc_name">Name</label>
                                        <input type="text" class="form-control" id="tc_name" name="tc_name"
                                            value="{{ $trustedCouple->tc_name }}" placeholder="Name" >
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="tc_location">Location</label>
                                        <input type="text" class="form-control" id="tc_location"
                                            value="{{ $trustedCouple->tc_location }}" name="tc_location" placeholder="Enter Location"
                                            >
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="tc_review">Review</label>
                                        <textarea name="tc_review" id="tc_review" cols="3" rows="10" class="form-control">{{$trustedCouple->tc_review}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="tc_image">Image</label>
                                        <input type="file" class="form-control" id="tc_image" name="tc_image"
                                            value="{{ $trustedCouple->tc_image }}">
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
