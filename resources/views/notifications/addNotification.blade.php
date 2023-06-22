@extends('layouts.app')

@section('content')

    @if(Session::has('notifications.addNotification'))
        <span>{{Session::get('notifications.addNotification')}}</span>
    @endif

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add Notification</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('addNotification') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" cols="20" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="longitude">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="date" name="date">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
