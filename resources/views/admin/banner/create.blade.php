@extends('layouts.web_admin_layout')
@section('title')
    Create Banner
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
                    <h5>Create Banner</h5>
                    <div>
                        <a href="/admin/banner/list" class="btn btn-sm btn-success">Image Galleries</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/banner/store' }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row"> 
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="banner_name">Enter Banner Title ( Optional )</label>
                                        <input type="text" class="form-control" id="banner_name" name="banner_name"
                                            value="{{ old('banner_name') }}" placeholder="Enter Banner Title" >
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="banner_tagline">Enter Description ( Optional )</label>
                                        <input type="text" class="form-control" id="banner_tagline"
                                            value="{{ old('banner_tagline') }}" name="banner_tagline" placeholder="Enter Description "
                                            >
                                    </div>
                                </div>

                               

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="banner_image">Image</label>
                                        <input type="file" class="form-control" id="banner_image" name="banner_image"
                                            value="{{ old('banner_image') }}"  required>
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
