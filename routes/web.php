<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;


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
Route::get('/profile', function (){
    return view('components.user.profile');
})->name('profile');
Route::get('/scene-configurator', function (){
    return view('components.main.configurator');
})->name('scene');
Route::get('/signup', function (){
    return view('components.auth.registration');
})->name('signup');

Route::get('/', [SceneController::class, 'index'])->name('scenes.index');
Route::resource('scenes', SceneController::class)->only(['show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('currencies', CurrencyController::class)->only(['index', 'show']);
Route::resource('prices', PriceController::class)->only(['index', 'show']);
Route::resource('views', ViewController::class)->only(['index', 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
});
