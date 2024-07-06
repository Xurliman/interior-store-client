<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function (){
    return view('components.main.about');
})->name('about');
Route::get('/contact', function (){
    return view('components.main.contact');
})->name('contact');
Route::get('/faq', function (){
    return view('components.main.f-a-q');
})->name('faq');
Route::get('/gallery', function (){
    return view('components.user.gallery');
})->name('gallery');
Route::get('/index', function (){
    return view('index');
})->name('index');
Route::get('/profile', function (){
    return view('components.user.profile');
})->name('profile');
Route::get('/scene-configurator', function (){
//    return view('scene-configurator');
    return view('components.main.configurator');
})->name('scene');
Route::get('/signup', function (){
    return view('components.auth.registration');
})->name('signup');
