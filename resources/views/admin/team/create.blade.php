@extends('layouts.web_admin_layout')
@section('title')
    Create Team
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
                    <h5>Create Team</h5>
                    <div>
                        <a href="/admin/team/list" class="btn btn-sm btn-success">Image Galleries</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ '/admin/team/store' }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="team_name">Team / Employee Name</label>
                                        <input type="text" class="form-control" id="team_name" name="team_name"
                                            value="{{ old('team_name') }}" placeholder="Team / Employee Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="team_role">Role</label>
                                        <input type="text" class="form-control" id="team_role"
                                            value="{{ old('team_role') }}" name="team_role" placeholder="Role"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="team_image">Image</label>
                                        <input type="file" class="form-control" id="team_image" name="team_image"
                                            value="{{ old('team_image') }}"  required>
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
