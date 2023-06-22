@extends('layouts.guest')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Register') }}</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group mb-3">
            <select name="role" id="role" class="form-control">
                        <option value="" disabled>select device status</option>
                        <option value="admin">administrator</option>
                        <option value="Monitoring Personnel">Monitoring Personnel</option>
            </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('role')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{ __('Email') }}" required autocomplete="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                       placeholder="{{ __('Contact') }}" required autocomplete="contact" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('contact')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                       placeholder="{{ __('First Name') }}" required autocomplete="fname" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('fname')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                       placeholder="{{ __('Last Name') }}" required autocomplete="lname" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('lname')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span> 
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="{{ __('Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit"
                            class="btn btn-info">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
