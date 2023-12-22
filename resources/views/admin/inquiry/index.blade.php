@extends('layouts.web_admin_layout')
@section('title')
    Inquiries List
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('msg'))
                <div class="alert alert-success bg-success text-white">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Inquiries List</h5>
                    
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                
                                <tbody>
                                    @foreach ($inquiry as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->inquriy_name }}</td>
                                            <td>{{ $item->inquriy_email }}</td>
                                            <td>{{ $item->inquriy_phone }}</td>
                                            <td>{{ $item->inquriy_massage }}</td>
                                            <td> <a class="btn btn-sm btn-danger" href="/admin/inquiry/delete/{{$item->inquriy_id}}">Delete</a> </td>
                                            
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
