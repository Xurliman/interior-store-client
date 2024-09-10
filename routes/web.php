<?php

use App\Helpers\ImageMerger;
use App\Http\Controllers\ContentUpdateController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SceneController;
use App\Models\User;
use App\Models\View;
use App\Notifications\UpdateAvailableNotification;
use Filament\Notifications\Notification;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


Route::middleware(\App\Http\Middleware\LicenseChecker::class)->group(function () {
    Route::get('/about', function () {
        return view('components.main.about');
    })->name('about');
    Route::get('/contact', function () {
        return view('components.main.contact');
    })->name('contact');
    Route::get('/faq', function () {
        return view('components.main.f-a-q');
    })->name('faq');
    Route::get('/profile', function () {
        return view('components.profile.profile-settings');
    })->name('profile');
    Route::get('/signup', function () {
        return view('components.auth.registration');
    })->name('signup');

    Route::get('/', [SceneController::class, 'index'])->name('scenes.index');
    Route::resource('scenes', SceneController::class)->only(['show']);
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('carts', GalleryController::class)->only(['index', 'edit']);
        Route::post('/print-view', [SceneController::class, 'printView'])->name('print');
        Route::post('/pdf-download', [SceneController::class, 'downloadPDF'])->name('pdf-download');
        Route::get('/order-placed', [SceneController::class, 'orderPlaced'])->name('order-placed');
    });

});

Route::get('/test', [ContentUpdateController::class, 'manageContentUpdate']);
