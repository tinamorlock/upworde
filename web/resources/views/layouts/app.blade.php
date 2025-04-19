<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Looking for an affordable editor? Sign up for our subscription!">
    <meta name="keywords" content="proofread, proofreading, editing, edit, editor, editorial, subscription">
    <meta name="author" content="Tina Morlock">

    <title>@yield('title', 'upworde')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upworde.css') }}">
    <link rel="icon" href="{{ asset('images/iconu.jpg') }}" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light upworde-light-bg fixed-top border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/upworde-logo-creambg.jpg') }}" alt="Upworde Logo" style="max-height: 40px;">
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarTop">
            <ul class="navbar-nav">
                @auth
                    <!-- Dashboard button (desktop) -->
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('dashboard') }}" class="btn btn-upworde me-2">Dashboard</a>
                    </li>

                    <!-- Dashboard text link (mobile) -->
                    <li class="nav-item d-md-none">
                        <a href="{{ route('dashboard') }}" class="nav-link text-contrast">Dashboard</a>
                    </li>

                    <!-- Logout button (desktop) -->
                    <li class="nav-item d-none d-md-block">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-upworde-outline" type="submit">Logout</button>
                        </form>
                    </li>

                    <!-- Logout text link (mobile) -->
                    <li class="nav-item d-md-none">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-contrast p-0 m-0" style="text-decoration: none;">Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<div class="pt-5 mt-3"></div>

<header class="container py-5 text-center">
    <h1 class="h3">Your words, professionally upworded.</h1>
</header>

@yield('content')
<div class="mb-5"></div> {{-- Spacer to prevent footer overlap --}}
<footer class="footer text-center py-3 fixed-bottom upworde-light-text">
    <small>&copy; <span id="year"></span> Upworde. All rights reserved.</small>
</footer>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
