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
    public string $activeClass = '';
    public bool $showDropList = true;
    public array $selectedProducts = [];
    public $categoryId;
    public $viewId;
    public $categorisedProducts;
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
        $selectedProductCategoryIds = collect($this->selectedProducts)->pluck('category_id')->toArray();
        if(in_array($categoryId, $selectedProductCategoryIds)) {
            $key = array_search($categoryId, $selectedProductCategoryIds);
            unset($this->selectedProducts[$key]);
        }
        $this->dispatch('update-selected-products-list',
            selectedProducts : $this->selectedProducts);
        $this->categorisedProducts = $this->getCategorisedProducts($categoryId);
    }

    public function productSelected($categoryId, $productId): void
    {
        $this->class = 'open';
        $this->categoryId = $categoryId;

        $selectedProductIds = collect($this->selectedProducts)->pluck('product_id')->toArray();
        $selectedProductCategoryIds = collect($this->selectedProducts)->pluck('category_id')->toArray();
        if (!in_array($productId, $selectedProductIds)) {
            if(in_array($categoryId, $selectedProductCategoryIds)) {
                $key = array_search($categoryId, $selectedProductCategoryIds);
                $this->selectedProducts[$key]['product_id'] = $productId;
            } else {
                $this->selectedProducts[] = [
                    'product_id' => $productId,
                    'category_id' => $categoryId
                ];
            }
            $this->dispatch('update-category-mask',
                categoryId : $categoryId,
                productId : $productId,
                selectedProducts : $this->selectedProducts);
            $this->dispatch('update-selected-products-list',
                selectedProducts : $this->selectedProducts);
        }
        $this->categorisedProducts = $this->getCategorisedProducts($this->viewId);
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
