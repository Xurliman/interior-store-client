@extends('components.layouts.base')

@section('title', 'Register')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('main-content')
    <!-- Sign Up -->
    <div class="signup">
        <form class="signup d-flex flex-column mb-4">
            <input
                class="signup__input mb-3"
                type="text"
                required
                placeholder="Email or phone number"
            />
            <button class="signup__btn">Next</button>
        </form>

        <span class="signup__txt">Already have an account?
            <a href="./index.html" class="signup__txt-link">Sign in</a>
        </span>
    </div>

    <!-- Confirmation -->
    <div class="confirmation">
        <h1 class="confirmation__title h1 text-center mb-3">
            We sent an confirmation code to your email
        </h1>
        <h3 class="confirmation__subtitle h3">
            Please, confirm your registration
        </h3>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user.js') }}"></script>
    <script src="{{ asset('js/signup.js') }}"></script>
@endsection
