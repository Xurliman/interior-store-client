<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="./style/faq.css" />

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

    <!-- FAQ -->
    <div class="faq">
        <div class="container-xxl">
            <h2 class="faq__title h2 mb-5">FAQ</h2>

            <div class="faq__section mb-4 d-flex flex-column">
                <h4 class="faq__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
                </h4>
                <p class="faq__section_desc">
                    Lorem ipsum dolor sit amet consectetur. Risus enim
                    etiam viverra leo pretium. Rhoncus nunc integer
                    consequat ac molestie id nibh ullamcorper diam. Sit
                    eu in sagittis turpis ac proin dolor mauris amet.
                </p>
            </div>

            <div class="faq__section mb-4 d-flex flex-column">
                <h4 class="faq__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
                </h4>
                <p class="faq__section_desc">
                    Lorem ipsum dolor sit amet consectetur. Odio sed
                    velit lorem et. Risus in diam sed pellentesque non
                    ut placerat massa. Nunc donec diam phasellus in
                    pulvinar facilisis cras. Hac commodo quisque
                    dignissim nascetur rhoncus ac habitant diam. Augue
                    scelerisque consequat fusce cum.
                </p>
            </div>

            <div class="faq__section mb-4 d-flex flex-column">
                <h4 class="faq__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
                </h4>
                <p class="faq__section_desc">
                    Lorem ipsum dolor sit amet consectetur. Ut et urna a
                    amet at mattis odio. Nec non ultricies velit donec
                    libero viverra urna.
                </p>
            </div>

            <div class="faq__section mb-4 d-flex flex-column">
                <h4 class="faq__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
                </h4>
                <p class="faq__section_desc">
                    Lorem ipsum dolor sit amet consectetur. Sed etiam
                    egestas phasellus in gravida. Varius fermentum non
                    accumsan duis tellus. Volutpat nunc donec leo odio
                    in tellus integer. Habitant mauris diam et lectus
                    at. Facilisis lacus dui magna ornare enim in massa.
                    Porta lorem enim eu turpis viverra ultrices
                    malesuada diam. Elementum tincidunt aliquet blandit
                    convallis.
                </p>
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
<script src="./js/user.js"></script>
</body>
</html>