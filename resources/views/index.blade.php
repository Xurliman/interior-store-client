@extends('components.layouts.base')

@section('title', 'My Gallery')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}"/>
@endsection

@section('content')
    <!-- Carousel -->
    <div class="carousel swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="main-cont">
                    <h1 class="carousel__title carousel__title-mobile h1">
                        Black Kitchen
                    </h1>

                    <a class="kitchen-scene" href="{{ route('scene') }}">
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
                        <h1 class="carousel__title h1">Black Kitchen</h1>
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
                    <h1 class="carousel__title carousel__title-mobile h1">
                        Red Kitchen
                    </h1>

                    <a class="kitchen-scene" href="{{ route('scene') }}">
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
                    <h1 class="carousel__title carousel__title-mobile h1">
                        White Kitchen
                    </h1>

                    <a class="kitchen-scene" href="{{ route('scene') }}">
                        <picture>
                            <source
                                data-scene="kitchen-white"
                                srcset="./img/main-white-mobile.jpg"
                                media="(max-width: 540px)"
                            />
                            <img
                                data-scene="kitchen-white"
                                class="carousel__img"
                                src="./img/kitchen-white/View1/Jpeg/Final.jpg"
                                alt="kitchen-gray"
                            />
                        </picture>
                    </a>

                    <div class="container-xxl">
                        <h1 class="carousel__title h1">White Kitchen</h1>
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
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
