<header class="header">
    <!-- Second Navbar -->
    <div class="second-nav">
        <div class="container-xxl second-nav-container">
            <div class="d-flex align-items-center">
                <a href="/">
                    <img
                        class="second-nav__icon"
                        src="{{asset('img/icons/go-back.svg')}}"
                        alt=""
                    />
                </a>

                <a class="second-nav__logo" href="/">
                    <x-logo.application-logo />
                </a>
            </div>

            <ul class="second-nav__list">
                <li class="second-nav__item">
                    <a class="second-nav__link" href="{{ route('about') }}">
                        About us
                    </a>
                </li>

                <li class="second-nav__item">
                    <a class="second-nav__link" href="{{ route('contact') }}">
                        Contact Us
                    </a>
                </li>

                <li class="second-nav__item">
                    <button class="second-nav__link second-nav-btn">
                        @auth
                            {{ auth()->user()->name }}
                        @endauth
                        @guest
                            User info
                        @endguest
                    </button>
                </li>
            </ul>
        </div>
    </div>
</header>
