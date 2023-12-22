@extends('layouts.web_admin_layout')
@section('title')
    Edit Success Story
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
                    <h5>Edit Success Story</h5>
                    <div>
                        <a href="/admin/success-story/list" class="btn btn-sm btn-success">Image Galleries</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/success-story/update' }}" enctype="multipart/form-data">
                        <input type="hidden" name="ss_id" value="{{$successStory->ss_id}}">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="ss_name">Enter Bride & Groom Names</label>
                                        <input type="text" class="form-control" id="ss_name" name="ss_name"
                                            value="{{ $successStory->ss_name }}" placeholder="eg. Bride Name & Groom Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="ss_location">Location</label>
                                        <input type="text" class="form-control" id="ss_location"
                                            value="{{ $successStory->ss_location }}" name="ss_location" placeholder="Enter Location"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="ss_image">Image</label>
                                        <input type="file" class="form-control" id="ss_image" name="ss_image"
                                            value="{{ $successStory->ss_image }}">
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
