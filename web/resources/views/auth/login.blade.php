@extends('layouts.app')

@section('title', 'Log In')

@section('content')
    <div class="container py-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Log In</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-upworde">Log In</button>
            </div>
        </form>
    </div>
@endsection
