<?php

namespace App\Livewire\Views;

use App\Models\Category;
use App\Models\Product;
use App\Models\Scene;
use App\Models\View;
use Livewire\Component;
use Livewire\Attributes\On;

class Show extends Component
{
    public $scene;
    public $currentView;
    public $categoryMaskId;
    public $productId;
    public $maskImg;

    public function mount(Scene $scene, $view)
    {
        $this->scene = $scene;
        $this->currentView = $view ?? $this->scene->views()->where('is_default', true)->first();;
    }

    public function viewSelected(View $view)
    {
        $this->currentView = $view;
    }

    #[On('update-category-mask')]
    public function updateProductMask($categoryId, $productId)
    {
        $this->categoryMaskId = $categoryId;
        $this->productId = $productId;
        $this->maskImg = Product::with('productConfiguration.images')
            ->find($productId)
            ->productConfiguration
            ->images()
            ->where('type', 'mask_bg')
            ->first()?->path;
    }

    public function render()
    {
        $bgImg = $this->currentView->images()->where('type', 'transparent_bg')->first()?->path;
        $fgImg = $this->currentView->images()->where('type', 'mask_bg')->first()?->path;
        $categories = $this->currentView->load('categories.products.productConfiguration')->categories;
        return view('livewire.views.show', [
            'view' => $this->currentView,
            'background_img' => $bgImg,
            'foreground_img' => $fgImg,
            'categories' => $categories,
            'category_mask_id' => $this->categoryMaskId,
            'product_id' => $this->productId,
            'class' => $this->maskImg ? 'open' : '',
            'object_class' => $this->maskImg ? 'object-visible' : '',
            'mask_img' => $this->maskImg,
        ]);
    }
}
