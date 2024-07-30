<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'selected_products' => 'required',
        ]);
        /** @var User $user */
        $user = auth()->user();
        $cart = $user->cart;
        if (is_null($cart)) {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
        }
        $selectedProductIds = json_decode($request->selected_products, 1);
//        foreach ($selected_productIds as $productId) {
//            $cart->items()->create([
//                'product_id' => $productId,
//                'quantity' => 1
//            ]);
//        }
        $products = Product::with('category')->whereIn('id',  $selectedProductIds)->get();
        foreach ($products as $product) {
            $categoryId = $product->category_id;
            $doesCartHaveCategoryProduct = $user
                ->cart?->products()->where('category_id', $categoryId)->exists();
            if ($doesCartHaveCategoryProduct) {
                $user->cart
                    ->products()
                    ->where(function ($query) use ($categoryId) {
                        $query->where('category_id', $categoryId);
                    })->update([
                        'product_id' => $product->id,
                        'quantity' => 1,
                    ]);
            } else {
                $user->cart->items()->create([
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            }
        }
        return redirect()->route('carts.index');
    }

    public function index() {
        /** @var User $user */
        $user = auth()->user()->load('cart.products');
        $products = $user->cart->products;
        return view('profile.gallery', [
            'products' => $products
        ]);
    }
}
