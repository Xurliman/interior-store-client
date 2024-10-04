@extends('components.layouts.base')

@section('title', 'My Gallery')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
@endsection

@section('main-content')
    <!-- Gallery -->
    <livewire:profile.gallery :carts="$carts"/>
@endsection

@section('js')
    <script src="{{ asset('js/gallery.js') }}"></script>
@endsection
