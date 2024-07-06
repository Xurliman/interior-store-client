@extends('index')

@section('title', 'About Us')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}"/>
@endsection

@section('content')
    <!-- About -->
    <div class="about">
        <div class="container-xxl">
            <h2 class="about__title h2 mb-5">About us</h2>

            <div class="about__section mb-4 d-flex flex-column">
                <h4 class="about__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
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

            <div class="about__section mb-4 d-flex flex-column">
                <h4 class="about__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
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

            <div class="about__section mb-4 d-flex flex-column">
                <h4 class="about__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
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

            <div class="about__section mb-4 d-flex flex-column">
                <h4 class="about__section_title h4">
                    Lorem ipsum dolor sit amet consectetur?
                </h4>
                <p class="about__section_desc">
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
@endsection

@section('js')
    <script src="{{ asset('js/user.js') }}"></script>
@endsection
