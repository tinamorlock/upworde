@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container py-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Create an Account</h2>
        <em>Sign-up for a trial account to claim your free sample edit.</em><br /><br />

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                       name="username" value="{{ old('username') }}" required autofocus>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- First Name -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                       name="first_name" value="{{ old('first_name') }}" required>
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                       name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control"
                       name="password_confirmation" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-upworde">Register</button>
            </div>
        </form>
    </div>
@endsection
