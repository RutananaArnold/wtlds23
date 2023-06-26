@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Reports and Analytics') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Reports and Analytics
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Sensor 1 Reading</th>
                      <th>Sensor 2 Reading</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach ($readings as $reading)
                    <tr>
                        <td>{{ $reading->id }}</td>
                        <td>{{ $reading->sensor1Reading }}</td>
                        <td>{{ $reading->sensor2Reading }}</td>
                        <td>{{ $reading->date }}</td>
                        <td>{{ $reading->time }}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                

              </div>
              <!-- <div class="text-right"><a href="/addReading"><button type="button" class="btn btn-info">Add Reading</button></a></div> -->



                    {{-- 1st graph row --}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Device flow rates</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-muted">Real time Flow rate</span>
                                        </p>
                                    </div>
                                    <!-- /.d-flex -->

                                    <div class="position-relative mb-4">
                                    <canvas id="flowRateChart" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('flowRateChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [
                {
                    label: 'Sensor 1',
                    data: @json($sensor1Data),
                    borderColor: '#0077F7',
                    fill: false
                },
                {
                    label: 'Sensor 2',
                    data: @json($sensor2Data),
                    borderColor: 'gray',
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Time'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Flow Rate'
                    }
                }
            }
        }
    });
</script>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-md-6 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Incidents Detected</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-muted">Past Week</span>
                                        </p>
                                    </div>
                                    <!-- /.d-flex -->

                                    <div class="position-relative mb-4">
                                        <canvas id="incidentChart" height="200"></canvas>

                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('incidentChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                        label: 'Incidents',
                        data: @json($counts),
                        backgroundColor: '#0077F7',
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Incident Count'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>

                    

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    
@endsection
