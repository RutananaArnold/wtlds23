@extends('layouts.app')

@section('content')
    <div class="card-body">
        <p class="login-box-msg">{{ __('Register a Monitoring Personnel') }}</p>

        <form method="POST" action="{{ route('addUser') }}">
            @csrf

            <div class="input-group mb-3">
            <select name="role" id="role" class="form-control">
                        <option value="">Select Role</option>
                        <option value="admin">administrator</option>
                        <option value="Monitoring Personnel">Monitoring Personnel</option>
            </select>
                @error('role')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{ __('Email') }}" required autocomplete="email">
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                       placeholder="{{ __('Contact') }}" required autocomplete="contact" autofocus>
                @error('contact')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                       placeholder="{{ __('First Name') }}" required autocomplete="fname" autofocus>
                @error('fname')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                       placeholder="{{ __('Last Name') }}" required autocomplete="lname" autofocus>
                @error('lname')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="{{ __('Password') }}" required autocomplete="new-password">
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="row">
                <div class="text-right">
                    <button type="submit"
                            class="btn btn-info">{{ __('Register Agent') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
