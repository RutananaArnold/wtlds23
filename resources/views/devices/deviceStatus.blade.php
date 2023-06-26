@extends('layouts.app')

@section('content')
                    <div class="alert alert-info">
                        Devices
                    </div>
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Device Status</h3>

                <div class="card-tools">
                <form action="{{ route('devices.deviceStatus') }}" method ="GET">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- <div class="text-right mt-3 mb-4"><a href="/addDeviceStatus"><button type="button" class="btn btn-success">Update Status</button></a></div> -->
              <div class="card-body table-responsive p-0" style="height: 300px;">

                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Device Name</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($statuses as $status)
                    <tr>
                        <td>{{ $status->device_id }}</td>
                        <td>{{ $status->date }}</td>
                        <td>{{ $status->time }}</td>
                        <td>{{ $status->status }}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           <div class="text-right mb-4"><a href="ViewOnMap"><button type="button" class="btn btn-info">View On Map</button></a></div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
