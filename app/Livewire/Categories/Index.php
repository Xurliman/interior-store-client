<?php

namespace App\Livewire\Categories;

use App\GetCategorisedProduct;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public string $class = '';
    public $categoryId;
    public $viewId;
    public $categorisedProducts;
    use GetCategorisedProduct;


    public function mount($viewId): void
    {
        $this->viewId = $viewId;
        $this->categorisedProducts = $this->getCategorisedProducts(View::getView($viewId)?->products);
    }


    #[On('new-view-selected')]
    public function viewSelected($viewId): void
    {
        $this->viewId = $viewId;
        $this->categorisedProducts = $this->getCategorisedProducts(View::getView($viewId)?->products);
    }

    public function removeProducts($categoryId): void {
        /** @var User $user */
        $user = auth()->user();
        $user->cart
            ->items()
            ->whereHas('product', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->delete();
        $this->dispatch('renew-cart', cart: $user->cart->id);
    }

    public function productSelected($categoryId, $productId): void
    {
        $this->class = 'open';
        $this->categoryId = $categoryId;

        /** @var User $user */
        $user = auth()->user();
        $product = $user->cart
            ->items()
            ->whereHas('product', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        if ($product) {
            $product->update([
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        } else {
            $user->cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
        
        $this->dispatch('renew-cart', cart: $user->cart->id);
        $this->dispatch('update-category-mask', categoryId : $categoryId, cartId: $user->cart->id);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.categories.index', [
            'categorised_products' => $this->categorisedProducts,
            'category_id' => $this->categoryId,
            'view_id' => $this->viewId,
            'class' => $this->class,
        ]);
    }
}
