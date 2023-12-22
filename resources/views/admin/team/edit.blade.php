@extends('layouts.web_admin_layout')
@section('title')
    Update Team
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
                    <h5>Update Team</h5>
                    <div>
                        <a href="/admin/team/list" class="btn btn-sm btn-success">Image Galleries</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="/admin/team/update" enctype="multipart/form-data">
                        <input type="hidden" name="team_id" value="{{$team->team_id}}">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="team_name">Team / Employee Name</label>
                                        <input type="text" class="form-control" id="team_name" name="team_name"
                                            value="{{ $team->team_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="team_role">Role</label>
                                        <input type="text" class="form-control" id="team_role"
                                            value="{{ $team->team_role }}" name="team_role" placeholder="Role"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="team_image">Image</label>
                                        <input type="file" class="form-control" id="team_image" name="team_image"
                                            value="{{ $team->team_image }}"  >
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
