<div class="swiper-slide">
    <div class="main-cont">
        <h1 class="carousel__title carousel__title-mobile h1">

        </h1>

        <a class="kitchen-scene"
           href="{{ route('scene') }}">
            <picture>
                <source
                    data-scene="kitchen-white"
                    srcset="./img/main-white-mobile.jpg"
                    media="(max-width: 540px)"
                />
                <img
                    data-scene="kitchen-white"
                    class="carousel__img"
                    src="{{ asset('img/kitchen-white/View1/Jpeg/Final.jpg') }}"
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
                data-scene="kitchen-white">
                Get started
            </button>
        </div>
    </div>
</div>
