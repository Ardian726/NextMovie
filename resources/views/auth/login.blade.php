@extends('layouts.lores')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/">
            <h1>
                NextMovie<span class="text-danger">.</span>
            </h1>
        </a>
        <p class="h4 mb-3 fw-normal">Please sign in</p>

        <div class="form-floating mb-1">
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="floatingInput">Email address</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">
            <label for="floatingPassword">Password</label>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-check my-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2 mb-4" type="submit" fdprocessedid="mowjkq">Sign in</button>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        <hr>
        <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
    </form>
@endsection
