<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><link rel="icon" href="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-32x32.png" sizes="32x32" />
        <link rel="icon" href="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-192x192.png" sizes="192x192" />
        <link rel="apple-touch-icon" href="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-180x180.png" />
        <meta name="msapplication-TileImage" content="https://fantomstudio.uz/wp-content/uploads/2023/06/cropped-android-chrome-512x512-1-270x270.png" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Register') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>

        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>

</html>
