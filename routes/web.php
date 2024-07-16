<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\ViewController;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\View;
use Illuminate\Support\Facades\DB;
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

Route::get('/test', function (){
//    $path = public_path("img/kitchen-black/View1/Masks/Background.jpg");
////    $product = Product::find(20);
//    $manager = ImageManager::gd();
//    $img = $manager->read($path);
//    $fileName = date('YmdHi').'_'."Lamp6.jpg";
//    $path = storage_path('app/public/'.$fileName);
//    $img->toPng()->save($path);
//    return "done";
//    $image = new Image();
//    $image->path = $path;
//    $product->image()->save($image);
//    $image->save();
//    return $product->load('image');

});
