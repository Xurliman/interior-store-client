@extends('components.layouts.base')

@section('title', 'FAQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('content')
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
@endsection

@section('js')
    <script src="{{ asset('js/user.js') }}"></script>
@endsection
