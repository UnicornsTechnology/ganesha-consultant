@extends('layouts.web_admin_layout')
@section('title')
    Edit Banner
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
                    <h5>Edit Banner</h5>
                    <div>
                        <a href="/admin/banner/list" class="btn btn-sm btn-success">Banners List</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/banner/update' }}" enctype="multipart/form-data">
                        <input type="hidden" name="banner_id" value="{{$id}}">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">  
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="banner_name">Enter Banner Title ( Optional )</label>
                                        <input type="text" class="form-control" id="banner_name" name="banner_name"
                                            value="{{ $banner->banner_name }}" placeholder="Enter Banner Title" >
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="banner_tagline">Enter Banner Description ( Optional )</label>
                                        <input type="text" class="form-control" id="banner_tagline"
                                            value="{{ $banner->banner_tagline }}" name="banner_tagline" 
                                            >
                                    </div>
                                </div>

                              

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="banner_image">Image</label>
                                        <input type="file" class="form-control" id="banner_image" name="banner_image"
                                            value="{{ $banner->banner_image }}"  >
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
