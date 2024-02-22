@extends('layouts.lores')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/">
            <h1>
                NextMovie<span class="text-danger">.</span>
            </h1>
        </a>
        <p class="h4 mb-3 fw-normal">Sign Up</p>

        <div class="form-floating mb-1">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
            <label for="floatingInput">Name</label>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating mb-1">
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">
            <label for="floatingPassword">Email Address</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating mb-1">
            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">
            <label for="floatingPassword">Password</label>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
            <label for="floatingPassword">Confirm Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit" fdprocessedid="mowjkq">Sign up</button>
        <hr class="my-4">
        <p class="text-center">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </form>
@endsection
