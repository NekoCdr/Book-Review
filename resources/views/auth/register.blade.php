@extends('layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <form class="card-body" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="card-block">
                <input id="last_name" type="text" class="input-field @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="{{ __('Last name') }}">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <input id="first_name" type="text" class="input-field @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="{{ __('First name') }}">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <input id="login_name" type="text" class="input-field @error('login_name') is-invalid @enderror" name="login_name" value="{{ old('login_name') }}" required autofocus placeholder="{{ __('Login name') }}">
                @error('login_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-mail') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-block">
                <input id="password-confirm" type="password" class="input-field" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
            </div>
            <div class="card-block">
                <button type="submit" class="btn btn-full-width">{{ __('Register') }}</button>
            </div>
            <div class="card-block">
                <a href="{{ route('login.github') }}" class="btn">{{ __('GitHub') }}</a>&nbsp;&nbsp;
                <a href="{{ route('login.google') }}" class="btn">{{ __('Google') }}</a>
            </div>
        </form>
    </div>
@endsection
