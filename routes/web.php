<?php

use App\Helpers\ImageMerger;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SceneController;
use App\Models\Product;
use App\Models\View;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManager;


Route::get('/about', function (){
    return view('components.main.about');
})->name('about');
Route::get('/contact', function (){
    return view('components.main.contact');
})->name('contact');
Route::get('/faq', function (){
    return view('components.main.f-a-q');
})->name('faq');
Route::get('/profile', function (){
    return view('components.profile.profile-settings');
})->name('profile');
Route::get('/signup', function (){
    return view('components.auth.registration');
})->name('signup');

Route::get('/', [SceneController::class, 'index'])->name('scenes.index');
Route::resource('scenes', SceneController::class)->only(['show']);
Route::group(['middleware' => 'auth'], function () {
    Route::resource('carts', GalleryController::class)->only(['index', 'edit']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});

Route::post('/print-view', [SceneController::class, 'printView'])->name('print');
Route::post('/pdf-download', [SceneController::class, 'downloadPDF'])->name('pdf-download');
