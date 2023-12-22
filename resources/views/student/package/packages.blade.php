@extends('layouts.student.master')
@section('title')
    Packages
@endsection
@section('content')
    <!-- Dashboard -->
    <div class="col-lg-9">
        @if (Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <div class="applied-job-area">
            <div class="table-wrapper">
                <div class="table-title-filter">
                    <div class="section-title">
                        <h5>My Packages:</h5>
                    </div>
                </div>
                <table class="eg-table table category-table mb-30">
                    <thead>
                        <tr>
                            <th>Package Title</th>
                            <th>Date </th>
                            <th>Links Quantity </th>
                            <th>Amount</th>
                            <th>Offered Amt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $item)
                            <tr>
                                <td data-label="Job Title">
                                    <div class="company-info">
                                        {{ $item->package_name }}
                                    </div>
                                </td>
                                <td data-label="Company"><a class="view-btn">
                                        {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    </a>
                                </td>
                                <td data-label="Apply Job">{{ $item->package_amount }} </td>
                                <td data-label="Apply Job">{{ $item->package_links_quantity }} </td>
                                <td data-label="Apply Job">{{ $item->package_amount_offered }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="col-lg-12 d-flex justify-content-center pt-20">
                    <div class="pagination-area">
                        {{ $list->onEachSide(-1)->links() }}
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Dashboard -->
@endsection
