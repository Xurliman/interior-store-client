@php use Illuminate\Support\Facades\Storage; @endphp
<div class="swiper-slide" style="width: 884px; margin-right: 30px;">
    <div class="main-cont">
        <h1 class="carousel__title carousel__title-mobile h1">
            {{ $scene->name }}
        </h1>

        <a class="kitchen-scene" href="{{ route('scenes.show', ["scene" => $scene]) }}">
            <picture>
                <source
                    srcset="{{ asset("img/main-white-mobile.jpg") }}"
                    media="(max-width: 540px)"
                />
                <img
                    class="carousel__img"
                    src="{{ Storage::url(collect(
                        collect(
                            $scene
                            ->load('views.images')
                            ->views)
                            ->where('is_visible', true)
                            ->where('is_default', true)
                            ->first()?->images)
                            ->where(function($image){
                                return $image->type == 'black_bg';
                        })
                        ->first()?->path) }}"
                    alt="kitchen-gray"
                />
            </picture>
        </a>

        <div class="container-xxl">
            <h1 class="carousel__title h1">{{ $scene->name }}</h1>
            <button
                class="carousel__btn carousel__btn-start kitchen-scene">
                Get started
            </button>
        </div>
    </div>
</div>
