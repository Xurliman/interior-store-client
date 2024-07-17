<?php

namespace App\Livewire\Views;

use App\GetCategorisedProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Scene;
use App\Models\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\Attributes\On;

class Show extends Component
{
    public $scene;
    public $currentView;
    public $categoryMaskId;
    public $cartId;
    public $maskImg;
    public string $activeClass = '';
    use GetCategorisedProduct;

    public function mount(Scene $scene, $view): void
    {
        $this->scene = $scene;
        $this->currentView = $view ?? $this->scene->views()->where('is_default', true)->first();
    }

    public function viewSelected($viewId): void
    {
        $this->currentView = View::getView($viewId);
        $this->dispatch('new-view-selected', ['viewId' => $viewId]);
    }

    #[On('update-category-mask')]
    public function updateProductMask($categoryId, $cartId): void
    {
        $this->categoryMaskId = $categoryId;
        $this->cartId = $cartId;
        $this->maskImg = Product::with('productConfigurations.images')
            ->find(1)
            ->productConfigurations()
            ->where('view_id', $this->currentView->id)
            ->first()
            ->images()
            ->where('type', 'mask_bg')
            ->first()?->path;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View
    {
        $bgImg = $this->currentView->images()->where('type', 'transparent_bg')->first()?->path;
        $fgImg = $this->currentView->images()->where('type', 'mask_bg')->first()?->path;
        $categorisedProducts = $this->getCategorisedProducts(View::getView($this->currentView->id)?->products);

        return view('livewire.views.show', [
            'view' => $this->currentView,
            'background_img' => $bgImg,
            'foreground_img' => $fgImg,
            'categorised_products' => $categorisedProducts,
            'category_mask_id' => $this->categoryMaskId,
            'cart_id' => $this->cartId,
            'class' => $this->maskImg ? 'open' : '',
            'active_class' => $this->activeClass ?? '',
            'mask_img' => $this->maskImg,
        ]);
    }
}
