@extends('layouts.app')

@section('content')
@if(Session::has('users.index'))
   <span>{{Session::get('users.index')}}</span>
@endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
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
                        <!-- /.card-body -->

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Users</h3>

                <div class="card-tools">
                <form action="{{ route('users.index') }}" method ="GET">
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
                      <th>Name</th>
                      <th>Role</th>
                      <th>Email</th>
                      <th>Contact</th>
                   </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>

            <div class="text-right"><a href="/addUser"><button type="button" class="btn btn-info">Register a Monitoring Personnel</button></a></div>

            <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
