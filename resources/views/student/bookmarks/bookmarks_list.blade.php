@extends('layouts.student.master')
@section('title')
    Booksmarks
@endsection
@section('content')
    <!-- Dashboard -->
    <div class="col-lg-9">
        @if (Session::has('msg'))
            <div class="alert alert-danger">{{ Session::get('msg') }}</div>
        @endif
        <div class="applied-job-area">
            <div class="table-wrapper">
                <div class="table-title-filter">
                    <div class="section-title">
                        <h5>My Bookmarks:</h5>
                    </div>
                </div>
                <table class="eg-table table category-table mb-30">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Date Applied</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booksmarks as $item)
                            <tr>
                                <td data-label="Job Title">
                                    <div class="company-info">
                                        {{ $item->job_title_name }}
                                    </div>
                                </td>
                                <td data-label="Apply Job">{{ $item->location_name }} </td>
                                <td data-label="Apply Job">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td data-label="Apply Job"><a onclick="return confirm('Are you sure ?')"
                                        href="/student/delete/bookmarks/{{ $item->sb_id }}"
                                        class="btn btn-danger btn-sm">Remove</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12 d-flex justify-content-center pt-20">
                    <div class="pagination-area">
                        {{ $booksmarks->onEachSide(-1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard -->
@endsection
