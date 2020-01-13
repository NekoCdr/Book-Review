@extends('layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <form class="card-body" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="card-block">
                <input id="login_name" type="text" class="input-field @error('login_name') is-invalid @enderror" name="login_name" value="{{ old('login_name') }}" required autofocus placeholder="{{ __('Login name') }}">
                @error('login_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <button type="submit" class="btn">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="label forgot-password" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>
            <div class="card-block">
                <a href="{{ route('login.github') }}" class="btn">{{ __('GitHub') }}</a>&nbsp;&nbsp;
                <a href="{{ route('login.google') }}" class="btn">{{ __('Google') }}</a>
            </div>
        </form>
    </div>
@endsection
