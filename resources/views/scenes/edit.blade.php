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
    </div>
@endsection

@section('main-content')
    <livewire:views.edit :cart="$cart"/>
@endsection

@section('js')
    <script src="{{ asset('js/panzoom.js') }}"></script>
    <script type="module" src="{{ asset('js/scene.js') }}"></script>
@endsection
