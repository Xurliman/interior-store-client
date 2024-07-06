@extends('index')

@section('title', 'Configurator')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/scene-configurator.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('content')
@endsection

@section('js')
    <script src="{{ asset('js/panzoom.js') }}"></script>
    <script src="{{ asset('js/scene.js') }}"></script>
@endsection
