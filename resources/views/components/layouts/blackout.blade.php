<div>
    <ul class="second-nav__list">
        <li class="second-nav__item">
            <a class="open-about-window second-nav__link" href="{{ route('about') }}">
                About us
            </a>
        </li>

        <li class="second-nav__item">
            <a class="open-contact-window second-nav__link" href="{{ route('contact') }}">
                Contact us
            </a>
        </li>

        <li class="second-nav__item">
            @auth
                <button class="second-nav__link second-nav-btn">
                    {{ auth()->user()->name }}
                </button>
            @endauth
            @guest
                <button class="second-nav__link second-nav-btn">
                    Guest
                </button>
            @endguest
        </li>
    </ul>
</div>
