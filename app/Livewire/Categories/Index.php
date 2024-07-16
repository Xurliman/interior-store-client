<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public string $class = '';
    public $categoryId;

    public function productSelected($categoryId, $productId) {
        $this->class = 'open';
        $this->categoryId = $categoryId;
        $this->dispatch('update-category-mask', categoryId : $categoryId, productId: $productId);
    }

    public function render()
    {
        $categories = Category::with('products')->get();
        return view('livewire.categories.index', [
            'categories' => $categories,
            'category_id' => $this->categoryId,
            'class' => $this->class,
        ]);
    }
}
