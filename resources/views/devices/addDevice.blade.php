@extends('layouts.app')

@section('content')

@if(Session::has('devices.addDevice'))
   <span>{{Session::get('devices.addDevice')}}</span>
@endif

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Device</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('addDevice') }}" method="post">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Device Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Device name" name="name">
                  </div>

                  <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="float" class="form-control" id="latitude" placeholder="Latitude" name="latitude">
                  </div>

                  <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="float" class="form-control" id="longitude" placeholder="longitude" name="longitude">
                  </div>

                  <div class="form-group">
                    <label for="deploymentLocation">Deployment Location</label>
                    <input type="text" class="form-control" id="deploymentLocation" placeholder="deploymentLocation" name="deploymentLocation">
                  </div>

                  <div class="form-group">
                    <label for="valveStatus">Valve status</label>
                    <select name="valveStatus" id="" class="form-control">
                        <option value="">select valve status</option>
                        <option value="on">On</option>
                        <option value="off">Off</option>
                    </select>
                    
                  </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
@endsection
