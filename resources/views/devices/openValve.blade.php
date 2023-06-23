@extends('layouts.app')

@section('content')

@if(Session::has('devices.addDeviceStatus'))
   <span>{{Session::get('devices.addDeviceStatus')}}</span>
@endif

<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Open Valve</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Device Name</th>
                      <th>Deployment Location</th>
                      <th>Valve Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($devices as $device)
                    <tr>
                        <td>{{ $device->id }}</td>
                        <td>{{ $device->name }}</td>
                        <td>{{ $device->deploymentLocation }}</td>
                        <td>{{$device->valveStatus}}</td>
                        <td>
                          <form action="{{ route('devices.update', $device->id) }}" method="POST">
                            @csrf
                            <button type="submit">
                            <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                              <label class="custom-control-label " for="customSwitch2">Open Valve</label>
                          </div>
                            </button>
                          </form>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card -->
@endsection
