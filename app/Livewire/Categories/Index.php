<?php

namespace App\Livewire\Categories;

use App\Traits\GetCategorisedProduct;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public string $class = '';
    public array $selectedProducts = [];
    public $categoryId;
    public $viewId;
    public $categorisedProducts;
    use GetCategorisedProduct;


    public function mount($viewId, $selectedProducts = []): void
    {
        $this->viewId = $viewId;
        $this->categorisedProducts = $this->getCategorisedProducts($viewId);

        if (!is_null($selectedProducts)) {
            $this->selectedProducts = $selectedProducts;
        }
    }

    #[On('new-view-selected')]
    public function viewSelected($viewId): void
    {
        $this->viewId = $viewId;
        $this->categorisedProducts = $this->getCategorisedProducts($viewId);
    }

    public function removeProducts($categoryId): void {
        if(in_array($categoryId, $this->getSelectedCategoryIds($this->selectedProducts))) {
            foreach ($this->selectedProducts as $key => $selectedProduct) {
                if ($selectedProduct['category_id'] == $categoryId) {
                    unset($this->selectedProducts[$key]);
                }
            }
        }
        $this->dispatch('update-selected-products-list',
            selectedProducts : $this->selectedProducts);
        $this->categorisedProducts = $this->getCategorisedProducts($this->viewId);
    }

    public function productSelected($categoryId, $productId): void
    {
        $this->class = 'open';
        $this->categoryId = $categoryId;

        if (!in_array($productId, $this->getSelectedProductIds($this->selectedProducts))) {
            if(in_array($categoryId, $this->getSelectedCategoryIds($this->selectedProducts))) {
                foreach ($this->selectedProducts as $key => $selectedProduct) {
                    if ($selectedProduct['category_id'] == $categoryId) {
                        $this->selectedProducts[$key]['product_id'] = $productId;
                    }
                }
            } else {
                $this->selectedProducts[] = [
                    'category_id' => $categoryId,
                    'product_id' => $productId,
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

    public function render(): Application|Factory|View
    {
        return view('livewire.categories.index', [
            'categories' => $this->categorisedProducts,
            'category_id' => $this->categoryId,
            'view_id' => $this->viewId,
            'class' => $this->class,
        ]);
    }
}
