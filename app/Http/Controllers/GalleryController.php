<?php

namespace App\Http\Controllers;

use App\Helpers\ImageMerger;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        /** @var User $user */
        $user = auth()->user()->load('carts.products');
        $carts = $user->carts;
        return view('profile.gallery', [
            'carts' => $carts
        ]);
    }

    public function edit(Cart $cart)
    {
        dd("alskjkals");
        dd($cart);
    }
}
