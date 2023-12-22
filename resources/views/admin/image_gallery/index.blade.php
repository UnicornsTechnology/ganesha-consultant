@extends('layouts.web_admin_layout')
@section('title')
    Image Galleries
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Image Galleries</h5>
                        <a href="/admin/image-gallery/create" class="btn btn-success btn-sm">Add Image Gallery</a>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Tagline</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                
                                <tbody>
                                    @foreach ($imageGalleries as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> <img src="{{asset('uploads/image_gallery/'. $item->ig_image)}}" height="50" width="50"> </td>
                                            <td>{{ $item->ig_name }}</td>
                                            <td>{{ $item->ig_tagline }}</td>
                                            <td>
                                                <span class="badge
                                                @if ($item->is_active == "Active")
                                                    bg-success
                                                @else
                                                    bg-danger
                                                @endif
                                                " >{{$item->is_active}}</span>
                                            </td>
                                            <td> <a class="btn btn-sm btn-primary" href="/admin/image-gallery/edit/{{$item->ig_id}}">Edit</a> </td>
                                            <td> <a class="btn btn-sm btn-danger" href="/admin/image-gallery/trash/{{$item->ig_id}}">Delete</a> </td>
                                            
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
