<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="./style/signup.css" />

    <!-- Style Base -->
    <link rel="stylesheet" href="./style/base.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./style/bootstrap/bootstrap.min.css" />

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
                    <a class="second-nav__link" href="./about.html"
                    >About us</a
                    >
                </li>

                <li class="second-nav__item">
                    <a class="second-nav__link" href="./contact.html"
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
<main class="main wrapper">
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
                            href="./gallery.html"
                        >My gallery</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="./profile.html"
                        >Profile</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="./faq.html"
                        >FAQ</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="drop-down__link nav-link mb-1"
                            href="./logout.html"
                        >Log out</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sign Up -->
    <div class="signup">
        <form class="signup d-flex flex-column mb-4">
            <input
                class="signup__input mb-3"
                type="text"
                required
                placeholder="Email or phone number"
            />
            <button class="signup__btn">Next</button>
        </form>

        <span class="signup__txt">
                    Already have an account?
                    <a href="./index.html" class="signup__txt-link">Sign in</a>
                </span>
    </div>

    <!-- Confirmation -->
    <div class="confirmation">
        <h1 class="confirmation__title h1 text-center mb-3">
            We sent an confirmation code to your email
        </h1>
        <h3 class="confirmation__subtitle h3">
            Please, confirm your registration
        </h3>
    </div>
</main>

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

<!-- Bootstrap JS -->
<script src="./js/bootstrap/bootstrap.min.js"></script>

<!-- JS -->
<script src="./js/signup.js"></script>
</body>
</html>
