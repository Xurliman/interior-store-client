@extends('components.layouts.base')

@section('title', 'Configurator')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/scene-configurator.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('loading-modal')
    <div id="loadingModal" class="loading-modal">
        <div class="loader"></div>
        <!-- Здесь ваша анимация загрузки -->
    </div>
@endsection

@section('content')
    <livewire:views.show :scene="$scene" :view="null"/>
@endsection

@section('js')
    <script src="{{ asset('js/panzoom.js') }}"></script>
    <script src="{{ asset('js/scene.js') }}"></script>
@endsection