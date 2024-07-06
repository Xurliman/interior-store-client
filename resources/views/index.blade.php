<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @yield('styles')
    <title>@yield('title')</title>
</head>

<body>
<!-- Header -->
    <x-layouts.header />
    <!-- Main -->
    <main class="main">
        <!-- Blackout -->
        <div class="blackout-white"></div>

        <!-- Drop Down List -->
        <x-layouts.blackout />

        <!-- Second Nav Drop Down List -->
        <x-layouts.second-blackout />

        <!-- Content -->
        @yield('content')

        <!-- Sign In-->
        <x-auth.login />

        <!-- Chat Modal-->
        <x-layouts.chat-modal />
    </main>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    @yield('js')
</body>
</html>
