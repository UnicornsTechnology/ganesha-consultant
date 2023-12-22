@extends('layouts.web_admin_layout')
@section('title')
    Success Stories
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
                    <h5>Success Stories</h5>
                        <a href="/admin/success-story/create" class="btn btn-success btn-sm">New Success Storyy</a>
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
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                
                                <tbody>
                                    @foreach ($successStory as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> <img src="{{asset('uploads/success_story/'. $item->ss_image)}}" height="50" width="50"> </td>
                                            <td>{{ $item->ss_name }}</td>
                                            <td>{{ $item->ss_location }}</td>
                                            <td>
                                                <span class="badge
                                                @if ($item->is_active == "Active")
                                                    bg-success
                                                @else
                                                    bg-danger
                                                @endif
                                                " >{{$item->is_active}}</span>
                                            </td>
                                            <td> <a class="btn btn-sm btn-primary" href="/admin/success-story/edit/{{$item->ss_id}}">Edit</a> </td>
                                            <td> <a class="btn btn-sm btn-danger" href="/admin/success-story/trash/{{$item->ss_id}}">Delete</a> </td>
                                            
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
