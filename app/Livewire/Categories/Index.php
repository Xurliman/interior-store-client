<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Livewire\Component;

class Index extends Component
{
    public string $class = '';
    public $categoryId;
    public $categorisedProducts;

    public function mount($viewId) {
        $products = View::find($viewId)
            ->load('products.category')
            ->load('products.image')
            ->load('products.productConfigurations.images')
            ->products;
        $this->categorisedProducts = collect($products)->groupBy(function ($product) {
            return $product->category_id;
        });
    }

    public function productSelected($categoryId, $productId) {
        $this->class = 'open';
        $this->categoryId = $categoryId;
        $this->dispatch('update-category-mask', categoryId : $categoryId, productId: $productId);
    }

    public function render()
    {
        return view('livewire.categories.index', [
            'categorised_products' => $this->categorisedProducts,
            'category_id' => $this->categoryId,
            'class' => $this->class,
        ]);
    }
}
