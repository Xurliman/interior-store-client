<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/scene-configurator.css') }}" />

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

<!-- Loading Modal -->
<div id="loadingModal" class="loading-modal">
    <div class="loader"></div>
    <!-- Здесь ваша анимация загрузки -->
</div>

<!-- Main -->
<main class="main scene-main">
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

    <!-- Scene Configurator -->
    <div class="scene">
        <!-- Camera View -->
        <div class="camera-view">
            <button
                class="camera__item d-flex flex-column"
                data-view="View1"
            >
                <img
                    data-view="View1"
                    class="camera__item_img view1"
                    src=""
                    alt=""
                />
                <span class="camera__item_txt">View 1</span>
            </button>

            <button
                class="camera__item d-flex flex-column"
                data-view="View2"
            >
                <img
                    data-view="View2"
                    class="camera__item_img view2"
                    src=""
                    alt=""
                />
                <span class="camera__item_txt">View 2</span>
            </button>

            <button
                class="camera__item d-flex flex-column"
                data-view="View3"
            >
                <img
                    data-view="View3"
                    class="camera__item_img view3"
                    src=""
                    alt=""
                />
                <span class="camera__item_txt">View 3</span>
            </button>
        </div>

        <!-- Scene Image / Masks / Objects -->
        <div class="view-scene">
            <!-- Popup Notify -->
            <div class="popup-blackout">
                <div class="popup">
                    <button class="close-popup">
                        <img src="{{ asset('img/icons/Cancel.svg') }}" alt="" />
                    </button>

                    <span class="popup-txt">Swipe to move</span>
                    <img src="{{ asset('img/icons/Swipe-Icon.svg') }}" alt="" />
                </div>
            </div>

            <!-- Panzoom / Scene images -->
            <div class="my-cont">
                <div class="f-panzoom">
                    <div class="f-panzoom__content" id="myPanzoom">
                        <img
                            usemap="#image-map"
                            id="scene-img"
                            class="loading-jpg scene__bg"
                            src=""
                        />

                        <!-- Foreground -->
                        <img
                            class="loading-jpg foreground foreground-black"
                            src="{{ asset('img/kitchen-black/View1/Png/Foreground.png') }}"
                            alt=""
                        />
                        <img
                            id="foreground-black-view2"
                            class="loading-jpg foreground foreground-black-view2"
                            src="{{ asset('img/kitchen-black/View2/Png/Foreground.png') }}"
                            alt=""
                        />
                        <img
                            class="loading-jpg foreground foreground-red"
                            src="{{ asset('img/kitchen-red/View1/Png/Table.png') }}"
                            alt=""
                        />

                        <img
                            class="loading-jpg foreground foreground-red-view2"
                            src="{{ asset('img/kitchen-red/View2/Png/Table.png') }}"
                            alt=""
                        />

                        <!-- Object Images -->
                        <div class="object__images">
                            <!-- Floor -->
                            <div class="portuquets">
                                <img
                                    class="loading-jpg portuquet-img"
                                    src=""
                                    data-object="parquet1"
                                    data-product="Parquet 1"
                                    data-price="100"
                                    data-remove="floor"
                                    alt=""
                                />
                                <img
                                    class="loading-jpg portuquet-img"
                                    src=""
                                    data-object="parquet2"
                                    data-product="Parquet 2"
                                    data-price="200"
                                    data-remove="floor"
                                    alt=""
                                />
                                <img
                                    class="loading-jpg portuquet-img"
                                    src=""
                                    data-object="parquet3"
                                    data-product="Parquet 3"
                                    data-price="300"
                                    data-remove="floor"
                                    alt=""
                                />
                                <img
                                    class="loading-jpg portuquet-img"
                                    src=""
                                    data-object="parquet4"
                                    data-product="Parquet 4"
                                    data-price="400"
                                    data-remove="floor"
                                    alt=""
                                />
                                <img
                                    class="loading-jpg portuquet-img"
                                    src=""
                                    data-object="parquet5"
                                    data-product="Parquet 5"
                                    data-price="500"
                                    data-remove="floor"
                                    alt=""
                                />
                            </div>

                            <!-- Wall Patterns -->
                            <div class="fartuks">
                                <img
                                    class="loading-jpg fartuk-img"
                                    data-object="fartuk1"
                                    data-product="Fartuk 1"
                                    data-remove="wall-pattern"
                                    data-price="100"
                                    src=""
                                    alt="Fartuk"
                                />

                                <img
                                    class="loading-jpg fartuk-img"
                                    data-object="fartuk2"
                                    data-product="Fartuk 2"
                                    data-remove="wall-pattern"
                                    data-price="200"
                                    src=""
                                    alt="Fartuk"
                                />

                                <img
                                    class="loading-jpg fartuk-img"
                                    data-object="fartuk3"
                                    data-product="Fartuk 3"
                                    data-remove="wall-patternor"
                                    data-price="300"
                                    src=""
                                    alt="Fartuk"
                                />
                            </div>

                            <!-- Chairs -->
                            <div class="bar-stools">
                                <img
                                    class="loading-jpg bar-stool-img"
                                    data-price="100"
                                    data-product="BarStool1"
                                    data-object="BarStool1"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                                <img
                                    class="loading-jpg bar-stool-img"
                                    data-price="200"
                                    data-product="BarStool2"
                                    data-object="BarStool2"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                                <img
                                    class="loading-jpg bar-stool-img"
                                    data-price="300"
                                    data-product="BarStool3"
                                    data-object="BarStool3"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                                <img
                                    class="loading-jpg bar-stool-img"
                                    data-price="400"
                                    data-product="BarStool4"
                                    data-object="BarStool4"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                                <img
                                    class="loading-jpg bar-stool-img"
                                    data-price="500"
                                    data-product="BarStool5"
                                    data-object="BarStool5"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                                <img
                                    class="loading-jpg bar-stool-img"
                                    data-price="300"
                                    data-product="BarStool6"
                                    data-object="BarStool6"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </div>

                            <!-- Lamps -->
                            <div class="lamps">
                                <img
                                    class="loading-jpg lamp-img"
                                    data-price="100"
                                    data-product="lamp1"
                                    data-object="Lamp1"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                                <img
                                    class="loading-jpg lamp-img"
                                    data-price="200"
                                    data-product="lamp2"
                                    data-object="Lamp2"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                                <img
                                    class="loading-jpg lamp-img"
                                    data-price="300"
                                    data-product="lamp3"
                                    data-object="Lamp3"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                                <img
                                    class="loading-jpg lamp-img"
                                    data-price="400"
                                    data-product="lamp4"
                                    data-object="Lamp4"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                                <img
                                    class="loading-jpg lamp-img kitchen-white-lamp"
                                    data-price="500"
                                    data-product="Lamp5"
                                    data-object="Lamp5"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                                <img
                                    class="loading-jpg lamp-img kitchen-red-lamp"
                                    data-price="600"
                                    data-product="Lamp6"
                                    data-object="Lamp6"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </div>
                        </div>

                        <!-- Masks -->
                        <div class="masks-container">
                            <!-- Kithcen Black -->
                            <div
                                class="kitchen-mask kitchen-black-masks"
                            >
                                <!-- View 1 -->
                                <div class="kitchen-view1 active">
                                    <div
                                        class="mask_btn kitchen-black-view1-wall"
                                        data-mask="wall-pattern"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view1-chairs"
                                        data-mask="chairs"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view1-floor1"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view1-floor2"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view1-lamps"
                                        data-mask="lamps"
                                    ></div>
                                </div>

                                <!-- View 2 -->
                                <div class="kitchen-view2">
                                    <div
                                        class="mask_btn kitchen-black-view2-wall"
                                        data-mask="wall-pattern"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view2-chairs"
                                        data-mask="chairs"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view2-floor1"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view2-floor2"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view2-lamps"
                                        data-mask="lamps"
                                    ></div>
                                </div>

                                <!-- View 3 -->
                                <div class="kitchen-view3">
                                    <div
                                        class="mask_btn kitchen-black-view3-wall"
                                        data-mask="wall-pattern"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view3-chairs"
                                        data-mask="chairs"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-black-view3-lamps"
                                        data-mask="lamps"
                                    ></div>
                                </div>
                            </div>

                            <!-- Kitchen Red -->
                            <div class="kitchen-mask kitchen-red-masks">
                                <!-- View 1 -->
                                <div class="kitchen-view1 active">
                                    <div
                                        class="mask_btn kitchen-red-view1-wall"
                                        data-mask="wall-pattern"
                                    ></div>
                                    >
                                    <div
                                        class="mask_btn kitchen-red-view1-floor1"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-red-view1-lamps"
                                        data-mask="lamps"
                                    ></div>
                                </div>

                                <!-- View 2 -->
                                <div class="kitchen-view2">
                                    <div
                                        class="mask_btn kitchen-red-view2-wall"
                                        data-mask="wall-pattern"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-red-view2-lamps"
                                        data-mask="lamps"
                                    ></div>
                                </div>

                                <!-- View 3 -->
                                <div class="kitchen-view3">
                                    <div
                                        class="mask_btn kitchen-red-view3-wall"
                                        data-mask="wall-pattern"
                                    ></div>
                                </div>
                            </div>

                            <!-- Kitchen White -->
                            <div
                                class="kitchen-mask kitchen-white-masks"
                            >
                                <!-- View 1 -->
                                <div class="kitchen-view1 active">
                                    <div
                                        class="mask_btn kitchen-white-view1-chairs"
                                        data-mask="chairs"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view1-floor1"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view1-floor2"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view1-floor3"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view1-floor4"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view1-lamps"
                                        data-mask="lamps"
                                    ></div>
                                </div>

                                <!-- View 2 -->
                                <div class="kitchen-view2">
                                    <div
                                        class="mask_btn kitchen-white-view2-floor1"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view2-floor2"
                                        data-mask="floor"
                                    ></div>
                                </div>

                                <!-- View 3 -->
                                <div class="kitchen-view3">
                                    <div
                                        class="mask_btn kitchen-white-view3-chairs"
                                        data-mask="chairs"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view3-floor1"
                                        data-mask="floor"
                                    ></div>
                                    <div
                                        class="mask_btn kitchen-white-view3-floor2"
                                        data-mask="floor"
                                    ></div>
                                </div>
                            </div>

                            <!-- Mask Wall panels -->
                            <img
                                class="mask mask-wall-panels"
                                data-mask="wall-pattern"
                                src=""
                                alt="wall-panels"
                            />
                            <!-- Mask Chairs -->
                            <img
                                class="mask mask-chairs"
                                data-mask="chairs"
                                src=""
                                alt="chairs"
                            />
                            <!-- Mask Floor -->
                            <img
                                class="mask mask-floor"
                                data-mask="floor"
                                src=""
                                alt="floor"
                            />
                            <!-- Mask Lamps -->
                            <img
                                class="mask mask-lamps"
                                data-mask="lamps"
                                src=""
                                alt="floor"
                            />
                        </div>
                    </div>
                </div>

                <!-- Order Menu -->
                <div class="container-xxl">
                    <div class="order__container">
                        <div class="order__menu">
                            <button class="move-up">
                                <img
                                    src="{{ asset('img/icons/move-up.svg') }}"
                                    alt="move-up"
                                />
                            </button>

                            <span class="order__count ms-2"
                            >0 item</span
                            >

                            <button class="order__btn">Order</button>
                        </div>

                        <div class="order__list">
                                    <span class="order__list-empty"
                                    >No products yet</span
                                    >
                        </div>
                    </div>

                    <!-- Zoom in / Zoom out -->
                    <div class="slidecontainer">
                        <button class="zoom-btn" id="zoomOutButton">
                            -
                        </button>
                        <button class="zoom-btn" id="zoomInButton">
                            +
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Menu -->
        <div class="custom d-flex align-items-start">
            <button class="custom-btn">
                <img src="./img/icons/Pencil.svg" alt="" />
            </button>

            <div class="custom__items">
                <!-- Wall panels -->
                <div id="wall-pattern" class="custom__block">
                    <!-- Custom Item -->
                    <div class="custom__item">
                        <img
                            class="custom__item_img"
                            src="{{ asset('img/kitchen-black/Detailed/Wall.jpg') }}"
                            alt="Wall panels"
                        />
                        <span class="custom__item_title"
                        >Wall panels</span
                        >

                        <button
                            class="custom-item-btn"
                            data-mask="wall-pattern"
                        >
                            <img
                                data-item="wall-pattern"
                                src="{{ asset('img/icons/open-custom.svg') }}"
                                alt=""
                            />
                        </button>
                    </div>

                    <!-- Custom Drop List -->
                    <div
                        class="custom-drop-list"
                        data-item="wall-pattern"
                        data-mask="wall-pattern"
                    >
                        <button
                            class="custom-item-remove"
                            data-remove="wall-pattern"
                        >
                            Remove
                        </button>

                        <div class="drop-list-container">
                            <button class="load-jpg object-fartuk-btn">
                                <img
                                    class="custom__img custom-fartuk"
                                    data-object="fartuk1"
                                    data-remove="wall-pattern"
                                    src=""
                                    alt="Wall panels"
                                />
                            </button>

                            <button class="load-jpg object-fartuk-btn">
                                <img
                                    class="custom__img custom-fartuk"
                                    data-object="fartuk2"
                                    data-remove="wall-pattern"
                                    src=""
                                    alt="Wall panels"
                                />
                            </button>

                            <button class="load-jpg object-fartuk-btn">
                                <img
                                    class="custom__img custom-fartuk"
                                    data-object="fartuk3"
                                    data-remove="wall-pattern"
                                    src=""
                                    alt="Wall panels"
                                />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Floor covering -->
                <div id="floor" class="custom__block">
                    <!-- Custom Item -->
                    <div class="custom__item">
                        <img
                            class="custom__item_img floor-custom-img"
                            src=""
                            alt=""
                        />
                        <span class="custom__item_title"
                        >Floor covering</span
                        >

                        <button
                            class="custom-item-btn"
                            data-mask="floor"
                        >
                            <img
                                data-item="floor"
                                data-mask="floor"
                                src="{{ asset('img/icons/open-custom.svg') }}"
                                alt=""
                            />
                        </button>
                    </div>

                    <!-- Custom Drop List -->
                    <div
                        class="custom-drop-list"
                        data-item="floor"
                        data-mask="floor"
                    >
                        <button
                            class="custom-item-remove"
                            data-remove="floor"
                        >
                            Remove
                        </button>

                        <div class="drop-list-container">
                            <button class="load-jpg object-parquet-btn">
                                <img
                                    class="custom__img custom-parquet"
                                    data-object="parquet1"
                                    data-remove="floor"
                                    src=""
                                    alt="Floor"
                                />
                            </button>

                            <button class="load-jpg object-parquet-btn">
                                <img
                                    class="custom__img custom-parquet"
                                    data-object="parquet2"
                                    data-remove="floor"
                                    src=""
                                    alt="Floor"
                                />
                            </button>

                            <button class="load-jpg object-parquet-btn">
                                <img
                                    class="custom__img custom-parquet"
                                    data-object="parquet3"
                                    data-remove="floor"
                                    src=""
                                    alt="Floor"
                                />
                            </button>

                            <button class="load-jpg object-parquet-btn">
                                <img
                                    class="custom__img custom-parquet"
                                    data-object="parquet4"
                                    data-remove="floor"
                                    src=""
                                    alt="Floor"
                                />
                            </button>

                            <button class="load-jpg object-parquet-btn">
                                <img
                                    class="custom__img custom-parquet"
                                    data-object="parquet5"
                                    data-remove="floor"
                                    src=""
                                    alt="Floor"
                                />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Chairs -->
                <div id="chair" class="custom__block">
                    <!-- Custom Item -->
                    <div class="custom__item">
                        <img
                            class="custom__item_img custom-chairs-img"
                            src=""
                            alt="Chairs"
                        />
                        <span class="custom__item_title">Chairs</span>

                        <button
                            class="custom-item-btn"
                            data-mask="chairs"
                        >
                            <img
                                data-item="chairs"
                                src="{{ asset('img/icons/open-custom.svg') }}"
                                alt=""
                            />
                        </button>
                    </div>

                    <!-- Objects -->
                    <div
                        class="custom-drop-list"
                        data-item="chairs"
                        data-mask="chairs"
                    >
                        <button
                            class="custom-item-remove"
                            data-remove="chairs"
                        >
                            Remove
                        </button>

                        <div class="drop-list-container">
                            <button
                                class="load-jpg object-bar-stool-btn"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-chair"
                                    data-mask="chairs"
                                    data-object="BarStool1"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </button>

                            <button
                                class="load-jpg object-bar-stool-btn"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-chair"
                                    data-mask="chairs"
                                    data-object="BarStool2"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </button>

                            <button
                                class="load-jpg object-bar-stool-btn"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-chair"
                                    data-mask="chairs"
                                    data-object="BarStool3"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </button>

                            <button
                                class="load-jpg object-bar-stool-btn"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-chair"
                                    data-mask="chairs"
                                    data-object="BarStool4"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </button>

                            <button
                                class="load-jpg object-bar-stool-btn"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-chair"
                                    data-mask="chairs"
                                    data-object="BarStool5"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </button>

                            <button
                                class="load-jpg object-bar-stool-btn"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-chair kitchen-white-chair"
                                    data-mask="chairs"
                                    data-object="BarStool6"
                                    data-remove="chairs"
                                    src=""
                                    alt="Chair"
                                />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lamps -->
                <div id="lamp" class="custom__block">
                    <!-- Custom Item -->
                    <div class="custom__item">
                        <img
                            class="custom__item_img custom-lamps-img"
                            src=""
                            alt=""
                        />
                        <span class="custom__item_title">Lamps</span>

                        <button
                            class="custom-item-btn"
                            data-mask="lamps"
                        >
                            <img
                                data-item="lamps"
                                data-mask="lamps"
                                src="{{ asset('img/icons/open-custom.svg') }}"
                                alt=""
                            />
                        </button>
                    </div>

                    <!-- Objects -->
                    <div
                        class="custom-drop-list"
                        data-item="lamps"
                        data-mask="lamps"
                    >
                        <button
                            class="load-jpg-img custom-item-remove"
                            data-remove="lamps"
                        >
                            Remove
                        </button>

                        <div class="drop-list-container">
                            <button class="load-jpg object-lamp-btn">
                                <img
                                    class="load-jpg-img custom__img custom-lamp"
                                    data-mask="lamps"
                                    data-object="Lamp1"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </button>

                            <button class="load-jpg object-lamp-btn">
                                <img
                                    class="load-jpg-img custom__img custom-lamp"
                                    data-mask="lamps"
                                    data-object="Lamp2"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </button>

                            <button class="load-jpg object-lamp-btn">
                                <img
                                    class="load-jpg-img custom__img custom-lamp"
                                    data-mask="lamps"
                                    data-object="Lamp3"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </button>

                            <button class="load-jpg object-lamp-btn">
                                <img
                                    class="load-jpg-img custom__img custom-lamp"
                                    data-mask="lamps"
                                    data-object="Lamp4"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </button>

                            <button
                                class="load-jpg object-lamp-btn kitchen-white-lamp"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-lamp"
                                    data-mask="lamps"
                                    data-object="Lamp5"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </button>

                            <button
                                class="load-jpg object-lamp-btn kitchen-red-lamp"
                            >
                                <img
                                    class="load-jpg-img custom__img custom-lamp"
                                    data-mask="lamps"
                                    data-object="Lamp6"
                                    data-remove="lamps"
                                    src=""
                                    alt="Lamp"
                                />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Options Desktop -->
        <div class="options">
            <!-- Save -->
            <button
                class="options__btn options-btn-save position-relative"
                data-tip="save"
            >
                <img
                    data-tip="save"
                    class="options__btn-img"
                    src="{{ asset('img/icons/Heart.svg') }}"
                    alt="Save"
                />

                <!-- Tip Save -->
                <div data-tip="save" class="options__tip tip-save">
                    <span>Save</span>
                </div>
            </button>

            <!-- Camera View -->
            <button
                class="options__btn options-btn-3d position-relative"
                data-tip="3d"
            >
                <img
                    data-tip="3d"
                    src="{{ asset('img/icons/Rotation.svg') }}"
                    alt="3D View"
                />

                <!-- Tip 3D View -->
                <div data-tip="3d" class="options__tip tip-3d">
                    <span>Camera view</span>
                </div>
            </button>

            <!-- Download -->
            <button
                class="options__btn options-btn-download position-relative"
                data-tip="download"
            >
                <img
                    data-tip="download"
                    src="{{ asset('img/icons/Download.svg') }}"
                    alt="Download"
                />

                <!-- Tip Download -->
                <div
                    data-tip="download"
                    class="options__tip tip-download"
                >
                    <span>Download</span>
                </div>
            </button>

            <!-- Download Modal -->
            <div class="download-blackout" data-modal="download"></div>
            <div class="download-modal">
                <button
                    class="download-modal__btn download-modal-png me-auto"
                >
                    PNG
                </button>
                <button
                    class="download-modal__btn download-modal-jpg me-auto"
                >
                    PDF
                </button>
            </div>

            <!-- Print -->
            <button
                class="options__btn options-btn-print position-relative"
                data-tip="print"
            >
                <img
                    data-tip="print"
                    src="{{ asset('img/icons/Printer.svg') }}"
                    alt="Print"
                />

                <!-- Tip Print -->
                <div data-tip="print" class="options__tip tip-print">
                    <span>Print</span>
                </div>
            </button>

            <!-- Share -->
            <button
                class="options__btn options-btn-share position-relative"
                data-tip="share"
            >
                <img
                    data-tip="share"
                    src="{{ asset('img/icons/Share.svg') }}"
                    alt="Share"
                />

                <!-- Tip Share -->
                <div data-tip="share" class="options__tip tip-share">
                    <span>Share</span>
                </div>
            </button>
        </div>

        <!-- Options Mobile -->
        <div class="options-container">
            <div class="options-mobile">
                <!-- Save -->
                <button
                    class="options__btn options-btn-save position-relative"
                    data-tip="save"
                >
                    <img
                        data-tip="save"
                        class="options__btn-img"
                        src="{{ asset('img/icons/Heart.svg') }}"
                        alt="Save"
                    />

                    <!-- Tip Save -->
                    <div data-tip="save" class="options__tip tip-save">
                        <span>Save</span>
                    </div>
                </button>

                <!-- Camera View -->
                <button
                    class="options__btn options-btn-3d position-relative"
                    data-tip="3d"
                >
                    <img
                        data-tip="3d"
                        src="{{ asset('img/icons/Rotation.svg') }}"
                        alt="3D View"
                    />

                    <!-- Tip 3D View -->
                    <div data-tip="3d" class="options__tip tip-3d">
                        <span>Camera view</span>
                    </div>
                </button>

                <!-- Download -->
                <button
                    class="options__btn options-btn-download position-relative"
                    data-tip="download"
                >
                    <img
                        data-tip="download"
                        src="{{ asset('img/icons/Download.svg') }}"
                        alt="Download"
                    />

                    <!-- Tip Download -->
                    <div
                        data-tip="download"
                        class="options__tip tip-download"
                    >
                        <span>Download</span>
                    </div>
                </button>

                <!-- Download Modal -->
                <div
                    class="download-blackout"
                    data-modal="download"
                ></div>
                <div class="download-modal">
                    <button
                        class="download-modal__btn download-modal-png me-auto"
                    >
                        PNG
                    </button>
                    <button
                        class="download-modal__btn download-modal-jpg me-auto"
                    >
                        PDF
                    </button>
                </div>

                <!-- Print -->
                <button
                    class="options__btn options-btn-print position-relative"
                    data-tip="print"
                >
                    <img
                        data-tip="print"
                        src="{{ asset('img/icons/Printer.svg') }}"
                        alt="Print"
                    />

                    <!-- Tip Print -->
                    <div
                        data-tip="print"
                        class="options__tip tip-print"
                    >
                        <span>Print</span>
                    </div>
                </button>

                <!-- Share -->
                <button
                    class="options__btn options-btn-share position-relative"
                    data-tip="share"
                >
                    <img
                        data-tip="share"
                        src="{{ asset('img/icons/Share.svg') }}"
                        alt="Share"
                    />

                    <!-- Tip Share -->
                    <div
                        data-tip="share"
                        class="options__tip tip-share"
                    >
                        <span>Share</span>
                    </div>
                </button>
            </div>

            <button class="open-options-btn">
                <img src="./img/icons/open-options-btn.svg" alt="" />
            </button>
        </div>

        <!-- Saved Modal -->
        <div class="saved-blackout" data-modal="saved">
            <div class="saved-modal">
                <button class="close-saved-modal ms-auto mb-4">
                    <img src="./img/icons/Cancel.svg" alt="Cancel" />
                </button>

                <div class="saved-modal-container">
                    <h4 class="saved-modal__items_title h4">
                        Saved to My gallery
                    </h4>

                    <div
                        class="saved-modal__items d-flex flex-column"
                    ></div>

                    <div class="saved-modal__items d-flex flex-column">
                        <div class="d-flex me-auto mt-2">
                            <button
                                class="check-out-saved-modal mb-2 me-3"
                            >
                                Check out
                            </button>
                            <button class="close-saved-modal mb-2">
                                Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty Modal -->
            <div class="saved-modal-empty">
                <button class="close-saved-modal ms-auto">
                    <img src="./img/icons/Cancel.svg" alt="Cancel" />
                </button>

                <h4 class="saved-modal__items_title mt-3 h4">
                    No products to save
                </h4>
                <button class="close-saved-modal mb-2">Back</button>
            </div>
        </div>

        <!-- Share Modal -->
        <div class="share-blackout" data-modal="share">
            <div class="share-modal">
                <button class="close-share-modal ms-auto">
                    <img src="./img/icons/Cancel.svg" alt="Cancel" />
                </button>

                <h4 class="share-modal__items_title h4 mb-4">
                    Share to
                </h4>

                <div class="share-modal__items">
                    <div
                        class="share-modal__item d-flex flex-column align-items-center"
                    >
                        <a href="#!">
                            <img
                                src="{{ asset('img/icons/Whatsapp.svg') }}"
                                alt="Whatsapp"
                            />
                        </a>

                        <span class="share-modal__item_title mt-2"
                        >WhatsApp</span
                        >
                    </div>

                    <div
                        class="share-modal__item d-flex flex-column align-items-center"
                    >
                        <a href="#!">
                            <img
                                src="{{ asset('img/icons/Facebook.svg') }}"
                                alt="Facbook"
                            />
                        </a>

                        <span class="share-modal__item_title mt-2"
                        >Facebook</span
                        >
                    </div>

                    <div
                        class="share-modal__item d-flex flex-column align-items-center"
                    >
                        <a href="#!">
                            <img
                                src="{{ asset('img/icons/gmail-pr.svg') }}"
                                width="48px"
                                heihgt="48px"
                                alt="Email"
                            />
                        </a>

                        <span class="share-modal__item_title mt-2"
                        >Email</span
                        >
                    </div>

                    <div
                        class="share-modal__item d-flex flex-column align-items-center"
                    >
                        <a href="#!">
                            <img
                                src="{{ asset('img/icons/link-pr.svg') }}"
                                width="40px"
                                heihgt="40px"
                                alt="Link"
                            />
                        </a>

                        <span class="share-modal__item_title mt-2"
                        >Copy link</span
                        >
                    </div>
                </div>

                <button class="close-share-modal mb-2">Back</button>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/@panzoom/panzoom@4.5.1/dist/panzoom.min.js"></script>
<!-- JS -->
<script src="{{ asset('js/scene.js') }}"></script>
</body>
</html>
