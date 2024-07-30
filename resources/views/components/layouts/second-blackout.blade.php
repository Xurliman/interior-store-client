<!-- Second Nav Drop Down List -->
<div class="second-blackout second-nav-drop-down-blackout">
    <div class="container-xxl">
        <div class="second-nav-drop-down">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="drop-down__link nav-link mb-1" href="{{ route('carts.index') }}">
                        Gallery
                    </a>
                </li>

                <li class="nav-item">
                    <a class="drop-down__link nav-link mb-1" href="{{ route('profile.show') }}">
                        Profile
                    </a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="drop-down__link nav-link mb-1" @click.prevent="$root.submit();">
                            {{ __('LogOut') }}
                        </button>
                    </form>
                </li>
                @endauth

                <li class="nav-item">
                    <a class="drop-down__link nav-link mb-1" href="{{ route('faq') }}">
                        FAQ
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="drop-down__link nav-link mb-1" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="drop-down__link nav-link mb-1" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
