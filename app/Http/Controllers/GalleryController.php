<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;

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
