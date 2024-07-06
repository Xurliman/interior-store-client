<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />

    <!-- Style Base -->
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />

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
                        src="{{ asset('img/icons/go-back.svg') }}"
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

    <!-- Drop Down List -->
    <div class="blackout drop-down-blackout">
        <div class="mynav-drop-down">
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

    <!-- Contact -->
    <div class="contact">
        <div class="container-xxl">
            <h2 class="contact__title h2 mb-5">Contacts us</h2>

            <form class="contact__form">
                <div class="contact__form_top d-flex flex-column mb-4">
                    <label class="contact__form_label mb-2"
                    >Title</label
                    >
                    <input
                        class="contact__form_input"
                        type="text"
                        placeholder="Title"
                    />
                </div>

                <div
                    class="contact__form_center d-flex flex-column mb-4"
                >
                    <label class="contact__form_label mb-2"
                    >Question</label
                    >
                    <textarea
                        class="contact__form_textarea"
                        cols="10"
                        rows="10"
                        placeholder="How can i..."
                    ></textarea>
                </div>

                <div
                    class="contact__form_center d-flex flex-column mb-5"
                >
                    <label class="contact__form_label mb-2"
                    >Contacts</label
                    >
                    <input
                        class="contact__form_input"
                        type="number"
                        placeholder="+1"
                    />
                </div>

                <div class="contact__form_bottom d-flex">
                    <button
                        class="contact__form_btn contact-form-send-btn"
                    >
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Request is sent -->
    <div class="request-blackout">
        <div class="request">
            <button class="request-close-btn ms-auto mb-auto">
                <img src="{{ asset('img/icons/Cancel.svg') }}" alt="cansel" />
            </button>

            <div
                class="request__cont d-flex flex-column align-items-center"
            >
                <h4 class="request__title h4 mb-4">
                    Your request is sent
                </h4>
                <button class="request__btn request-close-btn">
                    Got it
                </button>
            </div>
        </div>
    </div>

    <!-- Chat Modal-->
    <div class="container-xxl">
        <img
            class="open-chat-btn"
            src="{{ asset('img/icons/Support chat.png') }}"
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
                            src="{{ asset('img/chat-img.png') }}"
                            alt=""
                        />
                        <span>Alice</span>
                    </div>

                    <button class="chat-popup-btn-close">
                        <img
                            class="chat-popup-btn"
                            src="{{ asset('img/icons/chat-cancel.svg') }}"
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
                            src="{{ asset('img/icons/Send.svg') }}"
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
<script src="{{ asset('js/contact.js') }}"></script>
<script src="{{ asset('js/user.js') }}"></script>
</body>
</html>
