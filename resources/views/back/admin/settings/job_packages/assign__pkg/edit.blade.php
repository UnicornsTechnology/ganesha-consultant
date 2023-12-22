@extends('layouts.back.master')
@section('title')
    Edit An Assigned Package
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        .select2-container--default .select2-selection--single {
            height: calc(2.25rem + 2px);
        }
    </style>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->

                <section class="content">
                    <form action="/admin/assign-packages/update" method="post">
                        <input type="hidden" name="student_package_id" value="{{ $packageDetails->student_package_id }}">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Assign Package</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group d-flex">
                                                <div class="col-md-6">
                                                    <label for="studentSelect">Select Student</label>
                                                    <select class="form-control select2" id="studentSelect"
                                                        name="student_id" style="width: 100%;">
                                                        <option selected="selected">Select Student</option>
                                                        @foreach ($studentsList as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($packageDetails->student_package_student_id == $item->id) selected @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="packageSelect">Select Package</label>
                                                    <select class="form-control select2" id="packageSelect"
                                                        name="package_id" style="width: 100%;">
                                                        <option selected="selected">Select Package</option>
                                                        @foreach ($packagesList as $item)
                                                            <option value="{{ $item->package_id }}"
                                                                @if ($packageDetails->student_package_package_id == $item->package_id) selected @endif>
                                                                {{ $item->package_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Package</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
            </div>
        </div>
        </div>
        </form>
        </section>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    </body>
@endsection
