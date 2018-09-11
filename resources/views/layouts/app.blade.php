<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/thesaas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('acss/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <title>@yield('title') | E-Learning</title>

    @yield('scripts')
</head>

<body>
<div id="app">
    <!-- Topbar -->

    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
        <div class="container">

            <div class="topbar-left">
                <button class="topbar-toggler">&#9776;</button>
                <a class="topbar-brand" href="/" style="color: white;">
                    E-Learning
                </a>
            </div>

            <div class="topbar-right">
                <ul class="topbar-nav nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    @auth
                    <li class="nav-item"><a href="" class="nav-link">All series</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Create series</a></li>
                    @else

                        <li class="nav-item">
                            <a class="nav-link"
                               href="">Hey</a>
                        </li>

                        @endauth
                        <li class="nav-item">
                            <a href="" class="nav-link">All series</a>
                        </li>

                        @guest
                        <li class="nav-item">
                            <a href="" class="nav-link">All series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;" data-toggle="modal"
                               data-target="#loginModal">Login</a>
                        </li>
                        @endguest
                </ul>
            </div>

        </div>
    </nav>
    <!-- END Topbar -->
    <!-- Header -->
    @yield('header')
    <!-- END Header -->
    <!-- Main container -->
    <main class="main-content">

        @yield('content')

    </main>
    <!-- END Main container -->

@guest
@endguest
    <login></login>
<!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row gap-y justify-content-center">
                <div class="col-12 col-lg-6">
                    <ul class="nav nav-primary nav-hero">
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link" href="/">E-Learning</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/core.min.js') }}"></script>
<script src="{{ asset('assets/js/thesaas.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>