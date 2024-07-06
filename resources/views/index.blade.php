<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Style Base -->
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />

    <!-- Swiper CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />

    <title>3D Configurator</title>
</head>

<body>
<!-- Header -->
<header class="header">
    <!-- Second Navbar -->
    <div class="second-nav">
        <div class="container-xxl second-nav-container">
            <div class="d-flex align-items-center">
                <a href="/">
                    <img
                        class="second-nav__icon"
                        src="./img/icons/go-back.svg"
                        alt=""
                    />
                </a>

                <a class="second-nav__logo" href="/">Logo</a>
            </div>

            <ul class="second-nav__list">
                <li class="second-nav__item">
                    <a class="second-nav__link" href="{{ route('about') }}"
                    >About us</a
                    >
                </li>

                <li class="second-nav__item">
                    <a class="second-nav__link" href="{{ route('contact') }}"
                    >Contact Us</a
                    >
                </li>

                <li class="second-nav__item">
                    <button class="second-nav__link second-nav-btn">
                        User info
                    </button>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Main -->
<main class="main">
    <!-- Blackout -->
    <div class="blackout-white"></div>

    <!-- Second Nav Drop Down List -->
    <div class="second-blackout second-nav-drop-down-blackout">
        <div class="container-xxl">
            <div class="second-nav-drop-down">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="{{ route('gallery') }}"
                        >My gallery</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="{{ route('profile') }}"
                        >Profile</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="{{ route('faq') }}"
                        >FAQ</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="{{ route('signup') }}"
                        >Log out</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div class="carousel swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="main-cont">
                    <h1
                        class="carousel__title carousel__title-mobile h1"
                    >
                        Black Kitchen
                    </h1>

                    <a
                        class="kitchen-scene"
                        href="{{ route('scene') }}"
                    >
                        <picture>
                            <source
                                data-scene="kitchen-black"
                                srcset="./img/main-black-mobile.jpg"
                                media="(max-width: 540px)"
                            />
                            <img
                                data-scene="kitchen-black"
                                class="carousel__img"
                                src="./img/kitchen-black/View1/Jpeg/Final.jpg"
                                alt="kitchen-black"
                            />
                        </picture>
                    </a>

                    <div class="container-xxl">
                        <h1 class="carousel__title h1">
                            Black Kitchen
                        </h1>
                        <button
                            class="carousel__btn carousel__btn-start kitchen-scene"
                            data-scene="kitchen-black"
                        >
                            Get started
                        </button>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="main-cont">
                    <h1
                        class="carousel__title carousel__title-mobile h1"
                    >
                        Red Kitchen
                    </h1>

                    <a
                        class="kitchen-scene"
                        href="./scene-configurator.html"
                    >
                        <picture>
                            <source
                                data-scene="kitchen-red"
                                srcset="./img/main-red-mobile.jpg"
                                media="(max-width: 540px)"
                            />
                            <img
                                data-scene="kitchen-red"
                                class="carousel__img"
                                src="./img/kitchen-red/View1/Jpeg/Final.jpg"
                                alt="kitchen-red"
                            />
                        </picture>
                    </a>

                    <div class="container-xxl">
                        <h1 class="carousel__title h1">Red Kitchen</h1>
                        <button
                            class="carousel__btn carousel__btn-start kitchen-scene"
                            data-scene="kitchen-red"
                        >
                            Get started
                        </button>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="main-cont">
                    <h1
                        class="carousel__title carousel__title-mobile h1"
                    >
                        White Kitchen
                    </h1>

                    <a
                        class="kitchen-scene"
                        href="{{ route('scene') }}"
                    >
                        <picture>
                            <source
                                data-scene="kitchen-white"
                                srcset="./img/main-white-mobile.jpg"
                                media="(max-width: 540px)"
                            />
                            <img
                                data-scene="kitchen-white"
                                class="carousel__img"
                                src="{{ asset('img/kitchen-red/View1/Jpeg/Final.jpg') }}"
                                alt="kitchen-gray"
                            />
                        </picture>
                    </a>

                    <div class="container-xxl">
                        <h1 class="carousel__title h1">
                            White Kitchen
                        </h1>
                        <button
                            class="carousel__btn carousel__btn-start kitchen-scene"
                            data-scene="kitchen-white"
                        >
                            Get started
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Sign In-->
    <div class="blackout">
        <div class="signin">
            <button class="sign-in-close ms-auto mb-auto">
                <img src="{{ asset('img/icons/Cancel.svg') }}" alt="close" />
            </button>

            <div
                class="signin__content d-flex flex-column align-items-center mb-auto"
            >
                <h4 class="signin__title h4 mb-5">Sign In</h4>

                <form class="signin__form d-flex flex-column mb-4">
                    <input
                        class="signin__form_input sign-in-email mb-2"
                        type="text"
                        required
                        placeholder="Email or phone number"
                    />
                    <input
                        class="signin__form_input sign-in-password mb-3"
                        type="password"
                        required
                        placeholder="Password"
                    />
                    <button class="signin__form_btn sign-in-submit">
                        Log In
                    </button>
                </form>

                <span class="signin__form_signup">
                            New user?
                            <a
                                href="./signup.html"
                                class="signin__form_signup-link"
                            >Sign up</a
                            >
                        </span>
            </div>
        </div>
    </div>

    <!-- Chat Modal-->
    <div class="container-xxl">
        <img
            class="open-chat-btn"
            src="./img/icons/Support chat.png"
            alt="Open Chat"
        />

        <div class="chat-popup">
            <form class="chat-popup__container">
                <div
                    class="chat-popup__top d-flex justify-content-between align-items-center"
                >
                    <div>
                        <img
                            class="chat-popup__img me-3"
                            src="./img/chat-img.png"
                            alt=""
                        />
                        <span>Alice</span>
                    </div>

                    <button class="chat-popup-btn-close">
                        <img
                            class="chat-popup-btn"
                            src="./img/icons/chat-cancel.svg"
                            alt=""
                        />
                    </button>
                </div>

                <div class="chat-popup__messages">
                            <span class="chat-popup__message_txt mb-2"
                            >Hello. How can I help you?</span
                            >
                </div>

                <div class="chat-popup__text">
                    <input
                        class="chat-popup__text_input"
                        type="text"
                        placeholder="Message"
                    />

                    <button class="chat-popup-send-btn">
                        <img
                            class="chat-popup__text_icon"
                            src="./img/icons/Send.svg"
                            alt="Send"
                        />
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

<!-- JS -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
