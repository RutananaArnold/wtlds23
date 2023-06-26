@extends('layouts.app')

@section('content')
                    <div class="alert alert-info">
                        Devices
                    </div>
             <div class="card">
             <div class="text-right"><a href="/deviceStatus"><button type="button" class="btn btn-success">Device Status</button></a></div>

              <div class="card-header">
                <h3 class="card-title">Installed Devices</h3>

                <div class="card-tools">
                  <form action="{{ route('devices.devices') }}" method ="GET">
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
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Device Name</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Deployment Location</th>
                      <th>Valve Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($devices as $device)
                    <tr>
                        <td>{{ $device->name }}</td>
                        <td>{{ $device->latitude }}</td>
                        <td>{{ $device->longitude }}</td>
                        <td>{{ $device->deploymentLocation }}</td>
                        <td>{{$device->valveStatus}}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           <!-- <div class="text-right"><a href="/addDevice"><button type="button" class="btn btn-info">Add Device</button></a></div> -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
