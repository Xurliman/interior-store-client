@extends('components.layouts.base')

@section('title', 'Contact Us')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
@endsection

@section('content')

    <!-- Contact -->
    <div class="contact">
        <div class="container-xxl">
            <h2 class="contact__title h2 mb-5">Contacts us</h2>

            <form class="contact__form">
                <div class="contact__form_top d-flex flex-column mb-4">
                    <label class="contact__form_label mb-2">Title</label>
                    <input
                        class="contact__form_input"
                        type="text"
                        placeholder="Title"
                    />
                </div>

                <div
                    class="contact__form_center d-flex flex-column mb-4">
                    <label class="contact__form_label mb-2">Question</label>
                    <textarea
                        class="contact__form_textarea"
                        cols="10"
                        rows="10"
                        placeholder="How can i...">

                    </textarea>
                </div>

                <div
                    class="contact__form_center d-flex flex-column mb-5">
                    <label class="contact__form_label mb-2">Contacts</label>
                    <input
                        class="contact__form_input"
                        type="number"
                        placeholder="+1"
                    />
                </div>

                <div class="contact__form_bottom d-flex">
                    <button
                        class="contact__form_btn contact-form-send-btn">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Request is sent -->
    <div class="request-blackout">
        <div class="request">
            <button class="request-close-btn ms-auto mb-auto">
                <img src="{{ asset('img/icons/Cancel.svg') }}" alt="cansel" />
            </button>

            <div
                class="request__cont d-flex flex-column align-items-center">
                <h4 class="request__title h4 mb-4">
                    Your request is sent
                </h4>
                <button class="request__btn request-close-btn">
                    Got it
                </button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/user.js') }}"></script>
@endsection
