@extends('layouts.app')

@section('content')

@if(Session::has('devices.addDeviceStatus'))
   <span>{{Session::get('devices.addDeviceStatus')}}</span>
@endif

<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Device Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('addDeviceStatus') }}" method="post">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="datw">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="date" name="date">
                  </div>

                  <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" placeholder="time" name="time">
                  </div>

                  <div class="form-group">
                    <label for="status">status</label>
                    <select name="status" id="" class="form-control">
                        <option value="" disabled>select device status</option>
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
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
