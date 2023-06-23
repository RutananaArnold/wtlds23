@extends('layouts.app')

@section('content')
                    <div class="alert alert-info">
                        Notifications
                    </div>
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Notifications</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- the notification display for valveadded -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>

        // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

        var pusher = new Pusher('9415bf58dce0534cffcc', {
         cluster: 'ap2'
        });

    var channel = pusher.subscribe('popup-channel');
    channel.bind('user-register', function(data) {
    toastr.warning(JSON.stringify(data)+'device detected incident');
      
    });
  </script>


              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Message</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->id }}</td>
                        <td>{{ $notification->title }}</td>
                        <td>{{ $notification->message }}</td>
                        <td>{{ $notification->date }}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <div class="text-right"><a href="/addNotification"><button type="button" class="btn btn-info">Add Notification</button></a></div>
            <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
