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
              <form action="" method="post">
               @csrf
                <div class="card-body">
                    <!-- Default checked -->
                    <div class="custom-control custom-switch mt-4 text-center mb-4">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label " for="customSwitch1">Open Valve</label>
                    </div>
              </form>
            </div>
            <!-- /.card -->
@endsection
