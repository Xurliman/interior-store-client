@extends('components.layouts.base')

@section('title', 'My Gallery')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('content')
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
@endsection

@section('js')
    <script src="{{ asset('js/gallery.js') }}"></script>
@endsection
