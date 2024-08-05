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
    public function store(Request $request)
    {
        $request->validate([
            'view_id' => 'required',
            'selected_products' => 'required',
        ]);
        /** @var User $user */
        $user = auth()->user();
        $selectedProducts = json_decode($request->selected_products, 1);
        $cart = $user->carts()->create([
            'view_id' => $request->view_id,
        ]);
        $productsToSave = collect($selectedProducts)
            ->map(function ($product){
                $product['quantity'] = 1;
                $product['product_id'] = $product['id'];
                return collect($product)->only(['quantity', 'product_id']);
            })
            ->toArray();
        $cart->items()->createMany(
            $productsToSave,
        );
        $galleryImage = ImageMerger::imageCreateForView(
            view: View::firstWhere('id', $request->view_id),
            selectedProducts: collect($selectedProducts)
                ->map(function ($product){
                    return $product['id'];
                })
                ->toArray()
        );
        $cart->image()->create([
            'path' => $galleryImage,
            'type' => 'mask_merged'
        ]);
//        $products = Product::with('category')->whereIn('id',  $selectedProductIds)->get();
//        foreach ($products as $product) {
//            $categoryId = $product->category_id;
//            $doesCartHaveCategoryProduct = $user
//                ->carts?->products()->where('category_id', $categoryId)->exists();
//            if ($doesCartHaveCategoryProduct) {
//                $user->cart
//                    ->products()
//                    ->where(function ($query) use ($categoryId) {
//                        $query->where('category_id', $categoryId);
//                    })->update([
//                        'product_id' => $product->id,
//                        'quantity' => 1,
//                    ]);
//            } else {
//                $user->cart->items()->create([
//                    'product_id' => $product->id,
//                    'quantity' => 1,
//                ]);
//            }
//        }
        return redirect()->route('carts.index');
    }

    public function index() {
        /** @var User $user */
        $user = auth()->user()->load('carts.products');
        $carts = $user->carts;
        return view('profile.gallery', [
            'carts' => $carts
        ]);
    }
}
