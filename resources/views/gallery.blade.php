<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="./style/gallery.css" />

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

    <!-- Gallery -->
    <div class="gallery">
        <div class="container-xxl">
            <h2 class="gallery__title h2 mb-4">My Gallery</h2>

            <div class="gallery__grid">
                <div class="gallery__item">
                    <img
                        class="gallery__img mb-2"
                        src="./img/galarry1.jpg"
                        alt="Bath"
                    />

                    <div class="gallery__cont">
                        <h3 class="gallery__item_title mb-3">Bath</h3>

                        <div class="gallery__desc d-flex flex-column">
                                    <span class="gallery__accessors"
                                    >1x something</span
                                    >
                            <span class="gallery__accessors"
                            >2x something</span
                            >
                            <span class="gallery__accessors"
                            >1x something + light</span
                            >
                        </div>

                        <button class="gallery__btn">Check out</button>
                    </div>
                </div>
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
<script src="./js/bootstrap/bootstrap.min.js"></script>

<!-- JS -->
<script src="./js/gallery.js"></script>
</body>
</html>
