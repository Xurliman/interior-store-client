@extends('components.layouts.base')

@section('title', 'Profile Settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('main-content')
    <!-- Profile settings -->
    <div class="height-100 profile-window padding-top hide">
        <div class="profile">
            <div class="container-xxl">
                <h2 class="profile__title h2 mb-5">Profile settings</h2>

                <form class="profile__form">
                    <div class="profile__form_top d-flex flex-column mb-5">
                        <label class="profile__form_label mb-2">Name</label>
                        <input
                            class="profile__form_input mb-4"
                            type="text"
                            placeholder="John"
                        />

                        <label class="profile__form_label mb-2">Email</label>
                        <input
                            class="profile__form_input"
                            type="email"
                            placeholder="fantom@gmail.com"
                        />
                    </div>

                    <div
                        class="profile__form_center d-flex flex-column mb-5"
                    >
                        <label class="profile__form_label mb-2"
                        >Change password</label
                        >
                        <input
                            class="profile__form_input mb-4"
                            type="text"
                            placeholder="New password"
                        />
                        <input
                            class="profile__form_input"
                            type="text"
                            placeholder="Confirm password"
                        />
                    </div>

                    <div class="profile__form_bottom d-flex">
                        <button
                            class="profile__form_btn me-3 profile__form-cansel"
                        >
                            Cansel
                        </button>
                        <button
                            class="profile__form_btn profile__form-save"
                        >
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user.js') }}"></script>
@endsection
