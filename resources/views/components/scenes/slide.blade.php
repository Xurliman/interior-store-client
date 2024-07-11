<div class="swiper-slide">
    <div class="main-cont">
        <h1 class="carousel__title carousel__title-mobile h1">
            {{ $scene->name }}
        </h1>

        <a class="kitchen-scene" href="{{ route('scenes.show', ["scene" => $scene]) }}">
            <picture>
                <source
                    data-scene="{{ $scene->slug }}"
                    srcset="{{ asset("img/main-white-mobile.jpg") }}"
                    media="(max-width: 540px)"
                />
                <img
                    data-scene="{{ $scene->slug }}"
                    class="carousel__img"
                    src="{{ asset('img/kitchen-white/View1/Jpeg/Final.jpg') }}"
                    alt="kitchen-gray"
                />
            </picture>
        </a>

        <div class="container-xxl">
            <h1 class="carousel__title h1">{{ $scene->name }}</h1>
            <button
                class="carousel__btn carousel__btn-start kitchen-scene"
                data-scene="{{ $scene->slug }}"
            >
                Get started
            </button>
        </div>
    </div>
</div>
