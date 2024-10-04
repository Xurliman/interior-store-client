@extends('components.layouts.base')

@section('title', 'Scenes')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}"/>
@endsection

@section('main-content')
    <div class="about">
        <div class="container-xxl">
            <h2 class="about__title h2 mb-4">Order placed successfully.</h2>
            <div class="about__section mb-4 d-flex flex-column">
                <h4 class="about__section_title h4">
                    Thank you for choosing us
                </h4>
                <p class="about__section_desc">
                    Lorem ipsum dolor sit amet consectetur. Eu placerat
                    ullamcorper ac non et sem ut proin. Volutpat ut sit
                    a ut. Etiam arcu accumsan lobortis facilisis et.
                    Interdum pulvinar cursus aenean ac fusce neque.
                    Dignissim eget egestas non tellus mollis pulvinar
                    ultricies mus. Iaculis aliquet dignissim ut diam ut
                    et. Nibh commodo mattis dui nulla est pharetra a
                    dictumst faucibus. Integer id erat vitae lacinia
                    orci cursus lorem vestibulum bibendum. At auctor
                    neque morbi posuere. Et ac turpis placerat ultricies
                    egestas consectetur. Sed pellentesque enim sit
                    sagittis malesuada viverra pellentesque urna
                    vulputate.
                </p>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
