@extends('layouts.app')

@section('content')

@if(Session::has('reports_and_analytics.addReading'))
   <span>{{Session::get('reports_and_analytics.addReading')}}</span>
@endif

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Reading</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('addReading') }}" method="post">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Sensor 1 Reading</label>
                    <input type="float" class="form-control" id="sensor1Reading" placeholder="Sensor 1 Reading" name="sensor1Reading">
                  </div>

                  <div class="form-group">
                    <label for="message">Sensor 2 Reading</label>
                    <input type="float" class="form-control" id="sensor1Reading" placeholder="Sensor 1 Reading" name="sensor2Reading">
                  </div>

                  <div class="form-group">
                    <label for="longitude">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="date" name="date">
                  </div>

                  <div class="form-group">
                    <label for="longitude">Time</label>
                    <input type="time" class="form-control" id="time" placeholder="time" name="time">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
@endsection
