<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><link rel="icon" href="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-180x180.png" />
    <meta name="msapplication-TileImage" content="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-270x270.png" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body>
<!-- Header -->
<x-layouts.header />
@yield('loading-modal')
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
