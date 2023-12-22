@extends('layouts.back.master')
@section('title')
    Admin Dashboard
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <!-- Main row -->
                <br>
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($jobAddedToday) }}</h3>
                                    <p>Added Today</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3> {{ $jobAddedLastWeek }}</h3>
                                    <p>Added Last Week</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $jobAddedLastMonth }}</h3>
                                    <p>Added Last Month</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $allJobsAdded }}</h3>
                                    <p>All Jobs</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->

                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="card">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div>

                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        const ctx = document.getElementById('myChart');

        // Formatting the data from the Laravel code array
        var data = {!! json_encode($data) !!};

        // Extracting labels and data from the formatted data
        var labels = data.map(item => item.job_category_name);
        var counts = data.map(item => item.count);

        // Setting up the chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'All Category Growth',
                    data: counts,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- /.content-wrapper -->
@endsection
