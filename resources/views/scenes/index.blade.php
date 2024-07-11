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
            @foreach($scenes as $scene)
                <x-scenes.slide :scene="$scene"/>
            @endforeach
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
