@extends('layouts.web_admin_layout')
@section('title')
    Image Banner
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
                    <h5>Banner</h5>
                        <a href="/admin/banner/create" class="btn btn-success btn-sm">Add Banner</a>
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
                                    @foreach ($banner as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> <img src="{{asset('uploads/banner/'. $item->banner_image)}}" bannerht="50" width="50"> </td>
                                            <td>{{ $item->banner_name }}</td>
                                            <td>{{ $item->banner_tagline }}</td>
                                            <td>
                                                <span class="badge
                                                @if ($item->is_active == "Active")
                                                    bg-success
                                                @else
                                                    bg-danger
                                                @endif
                                                " >{{$item->is_active}}</span>
                                            </td>
                                            <td> <a class="btn btn-sm btn-primary" href="/admin/banner/edit/{{$item->banner_id}}">Edit</a> </td>
                                            <td> <a class="btn btn-sm btn-danger" href="/admin/banner/trash/{{$item->banner_id}}">Delete</a> </td>
                                             
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
