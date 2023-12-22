@extends('layouts.web_admin_layout')
@section('title')
    Create Image Gallery
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
                    <h5>Create Image Gallery</h5>
                    <div>
                        <a href="/admin/image-gallery/list" class="btn btn-sm btn-success">Image Galleries</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/image-gallery/store' }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="ig_tagline">Tagline</label>
                                        <input type="text" class="form-control" id="ig_tagline"
                                            value="{{ old('ig_tagline') }}" name="ig_tagline" placeholder="Enter Tagline"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="ig_name">Enter Bride & Groom Names</label>
                                        <input type="text" class="form-control" id="ig_name" name="ig_name"
                                            value="{{ old('ig_name') }}" placeholder="eg. Bride Name & Groom Name" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="ig_image">Image</label>
                                        <input type="file" class="form-control" id="ig_image" name="ig_image"
                                            value="{{ old('ig_image') }}"  required>
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
