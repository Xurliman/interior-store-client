<?php

namespace App\Livewire\Categories;

use App\Models\User;
use App\Models\View;
use App\Traits\GetCategorisedProduct;
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
    public $activeClass = '';
    public array $selectedProducts = [];
    use GetCategorisedProduct;


    public function mount($viewId): void
    {
        $this->viewId = $viewId;
        $this->categorisedProducts = $this->getCategorisedProducts($viewId);
    }


    #[On('new-view-selected')]
    public function viewSelected($viewId): void
    {
        $this->viewId = $viewId;
        $this->categorisedProducts = $this->getCategorisedProducts($viewId);
    }

    public function removeProducts($categoryId): void {
        $this->activeClass = '';

        $productIds = $this->getCategoryProducts($categoryId);
        foreach ($productIds as $productId) {
            if (in_array($productId, $this->selectedProducts)) {
                $key = array_search($productId, $this->selectedProducts);
                unset($this->selectedProducts[$key]);
            }
        }
        $this->categorisedProducts = $this->getCategorisedProducts($categoryId);
//        /** @var User $user */
//        $user = auth()->user();
//        $user->cart
//            ->items()
//            ->whereHas('product', function ($query) use ($categoryId) {
//                $query->where('category_id', $categoryId);
//            })
//            ->delete();
//        $this->dispatch('renew-cart',
//            cart: $user->cart->id
//        );
    }

    public function productSelected($categoryId, $productId): void
    {
        $this->class = 'open';
        $this->activeClass = 'active';
        $this->categoryId = $categoryId;

        $productIds = $this->getCategoryProducts($categoryId);
        if (!in_array($productId, $this->selectedProducts)) {
            $flag = false;
            foreach ($productIds as $catProductId) {
                if(in_array($catProductId, $this->selectedProducts)) {
                    $flag = true;
                    $key = array_search($catProductId, $this->selectedProducts);
                    $this->selectedProducts[$key] = $productId;
                }
            }
            if (!$flag) {
                $this->selectedProducts[] = $productId;
            }
            $this->dispatch('update-category-mask',
                categoryId : $categoryId,
                productId : $productId,
                selectedProducts : $this->selectedProducts);
        }
        $this->categorisedProducts = $this->getCategorisedProducts($this->viewId);
//        /** @var User $user */
//        $user = auth()->user();
//        $doesCartHaveCategoryProduct = $user
//            ->cart
//            ->products()
//            ->where('category_id', $categoryId)
//            ->exists();
//        $isProductInCart = Product::isInCart($productId, $user->cart->id);
//        if ($doesCartHaveCategoryProduct || $isProductInCart) {
//            $user->cart
//                ->products()
//                ->where(function ($query) use ($categoryId) {
//                    $query->where('category_id', $categoryId);
//                })->update([
//                    'product_id' => $productId,
//                    'quantity' => 1,
//                ]);
//        } else {
//            $user->cart->items()->create([
//                'product_id' => $productId,
//                'quantity' => 1,
//            ]);
//        }

//        $this->dispatch('renew-cart', cart: $user->cart->id);

//            cartId: $user->cart->id);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.categories.index', [
            'categories' => $this->categorisedProducts,
            'category_id' => $this->categoryId,
            'view_id' => $this->viewId,
            'class' => $this->class,
            'active_class' => $this->activeClass,
        ]);
    }
}
