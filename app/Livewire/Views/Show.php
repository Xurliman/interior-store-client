<?php

namespace App\Livewire\Views;

use App\Models\Product;
use App\Models\Scene;
use App\Models\View;
use App\Traits\GetCategorisedProduct;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $scene;
    public $currentView;
    public $categoryMaskId;
    public $maskImg;
    public string $activeClass = '';
    public array $selectedProducts = [];
    use GetCategorisedProduct;

    public function mount(Scene $scene, $view): void
    {
        $this->scene = $scene;
        $this->currentView = $view ?? $this->scene->views()->where('is_default', true)->first();
    }

    public function viewSelected($viewId): void
    {
        $this->currentView = View::firstWhere('id', $viewId);
        $this->dispatch('new-view-selected',
            viewId : $viewId
        );
    }

    #[On('update-category-mask')]
    public function updateProductMask($categoryId, $productId, $selectedProducts): void
    {
        $this->categoryMaskId = $categoryId;
        $this->selectedProducts = $selectedProducts;
        $this->maskImg = Product::with('productConfigurations.images')
            ->find($productId)
            ->productConfigurations()
            ->where('view_id', $this->currentView->id)
            ->where('is_visible', true)
            ->first()
            ->images()
            ->where('type', 'mask_bg')
            ->first()?->path;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View
    {
        $bgImg = $this->currentView->images()->where('type', 'transparent_bg')->first()?->path;
        $fgImg = $this->currentView->images()->where('type', 'mask_bg')->first()?->path;
        $categorisedProducts = $this->getCategorisedProducts($this->currentView->id);

        return view('livewire.views.show', [
            'view' => $this->currentView,
            'background_img' => $bgImg,
            'foreground_img' => $fgImg,
            'categories' => $categorisedProducts,
            'category_mask_id' => $this->categoryMaskId,
            'mask_selected_img' => $this->maskImg,
            'selected_products' => $this->selectedProducts,
        ]);
    }
}
