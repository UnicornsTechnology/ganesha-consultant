@extends('layouts.student.master')
@section('title')
    Applied Jobs
@endsection
@section('content')
    <!-- Dashboard -->
    <div class="col-lg-9">
        <div class="applied-job-area">
            <div class="table-wrapper">
                <div class="table-title-filter">
                    <div class="section-title">
                        <h5>Applied Jobs:</h5>
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
                        @foreach ($list as $item)
                            <tr>
                                <td data-label="Job Title">
                                    <div class="company-info">
                                        {{ $item->job_title_name }}
                                    </div>
                                </td>
                                <td data-label="Company"><a class="view-btn">
                                        {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    </a>
                                </td>
                                <td data-label="Apply Job">{{ $item->location_name }} </td>
                                <td data-label="Status"><a
                                        href="/job-details/{{ $item->job_title_slug }}/{{ $item->job_id }}"
                                        class="eg-btn purple-btn">Viewed</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12 d-flex justify-content-center pt-20">
                    <div class="pagination-area">
                        {{ $list->onEachSide(-1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard -->
@endsection
