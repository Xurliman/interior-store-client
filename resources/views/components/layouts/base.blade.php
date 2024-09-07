<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="max-image-preview:large">
    <link
        href="{{ asset('css/inline.css') }}"
        id="wp-emoji-styles-inline-css"
        rel="stylesheet">
    <link
        href="{{ asset('css/dist/block-library/style.min.css') }}"
        rel="stylesheet"
        id="wp-block-library-css"
        type="text/css"
        media="all">
    <link
        href="{{ asset('css/themes/styles.css') }}"
        rel="stylesheet"
        id="main-css-css"
        type="text/css"
        media="all">
    <link
        href="{{ asset('css/base.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('css/formstyler.css') }}"
        rel="stylesheet"
        id="formstyler-css-css"
        type="text/css"
        media="all">
    <link
        href="{{ asset('css/jquery.fancybox.min.css') }}"
        rel="stylesheet"
        id="fancybox-css-css"
        type="text/css"
        media="all">
    <link
        href="{{ asset('css/bootstrap/bootstrap.min.css') }}"
        rel="stylesheet"/>
    <link rel="icon" href="{{ asset('img/icons/cropped-android-chrome-512x512-1-32x32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('img/icons/cropped-android-chrome-512x512-1-192x192.png') }}" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ asset('img/icons/cropped-android-chrome-512x512-1-180x180.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/icons/cropped-android-chrome-512x512-1-270x270.png') }}">
    <script
        src="{{ asset('js/jquery/jquery.min.js') }}"
        type="text/javascript"
        id="jquery-core-js">
    </script>
    <script
        src="{{ asset('js/jquery/jquery-migrate.min.js') }}"
        type="text/javascript"
        id="jquery-migrate-js">
    </script>
    @yield('styles')
</head>
<body class="post-template post-template-template-configurator post-template-template-configuratortemplate-configurator-php single single-post postid-503 single-format-standard">
    <div class="nav-wrapper">
        <div class="nav-wrapper2">
            <nav>
                <div class="burger-wrapper">
                    <img src="{{ asset('img/icons/menu-burger.svg') }}" alt="menu">
                </div>
                <a href="/" class="top-logo-wrapper">
                    <img src="{{
                        \Illuminate\Support\Facades\Storage::url(
                            \App\Models\Setting::first()
                                ->load('images')
                                ->getMainLogo()?->path)
                    }}" alt="mainlogo">
                </a>
                <div class="lang-wrapper ">
                    <select>
                        <option value="EN">EN</option>
                        <option value="RU">RU</option>
                    </select>
                </div>
            </nav>
        </div>
        <div class="menu-block">
            <div class="inner-block">
                <div class="wrapper">
                    <img src="{{
                        \Illuminate\Support\Facades\Storage::url(
                            \App\Models\Setting::first()
                                ->load('images')
                                ->getMainLogo()?->path)
                    }}" alt="">
                    <ul>
                        <li id="menu-item-252" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-252"><a href="/">Home page</a></li>
                        <li id="menu-item-256" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-256"><a href="/">Services</a></li>
                        <li id="menu-item-254" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"><a href="/">About us</a></li>
                        <li id="menu-item-253" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-253"><a href="/">Blog</a></li>
                        <li id="menu-item-255" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-255"><a href="/">Contact</a></li>
                    </ul>
                </div>
                <span class="close">×</span>
            </div>
            <div class="black-overlay"></div>
        </div>
    </div>
    <div style="position: relative; margin-top: 94px;">
        <style>

            * {
                -ms-overflow-style: none;
            }

            * {
                scrollbar-width: none;
            }

            *::-webkit-scrollbar {
                display: none;
            }

        </style>

        <!-- Navbar -->
        <nav class="my-nav margin">
            <div class="second-nav-container">
                <div x-data="{ logoToggle : false }">
                    <button
                        x-on:click="logoToggle = true; "
                        :style="logoToggle ? '' : 'display:none'"
                        class="open-main-window">
                        <div
                            id="shapeToggle"
                            :class="{ 'hide' : logoToggle }"
                            class="back-btn arrow hide">

                        </div>
                        <span class="second-nav__logo">Logo</span>
                    </button>

                    <button
                        x-on:click="logoToggle = false; window.location.href='/'"
                        id="close-button"
                        class="close-scene-window hide">
                        <div
                            id="shapeToggle"
                            class="back-btn arrow">

                        </div>
                    </button>
                </div>

                <x-layouts.blackout />
            </div>

            <!-- Drop Down List -->
            <x-layouts.second-blackout />
        </nav>

        <!-- Content -->
        <div class="main">
            <!-- Blackout -->
            <div class="blackout-white"></div>

            <!-- Main Window -->
            <div class="main-window">
                @yield('main-window-content')
            </div>
            @yield('main-content')
            @yield('loading-modal')
            <x-auth.login />
            <x-layouts.chat-modal />
        </div>
    </div>
    <x-layouts.footer />
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js')
</body>
</html>
