<?php

namespace App\Livewire\Categories;

use App\Traits\GetCategorisedProduct;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public string $class = '';
    public bool $showDropList = true;
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
        $this->showDropList = false;
        $this->categorisedProducts = $this->getCategorisedProducts($viewId);
    }

    public function removeProducts($categoryId): void {
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

//        $this->dispatch('renew-cart', cart: $user->cart->id);

//            cartId: $user->cart->id);
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.categories.index', [
            'categories' => $this->categorisedProducts,
            'category_id' => $this->categoryId,
            'show_drop_list' => $this->showDropList,
            'view_id' => $this->viewId,
            'class' => $this->class,
            'active_class' => $this->activeClass,
        ]);
    }
}
