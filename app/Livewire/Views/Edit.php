<?php

namespace App\Livewire\Views;

use App\Models\Cart;
use App\Models\Product;
use App\Models\View;
use App\Traits\GetCategorisedProduct;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    public $cart;
    public $currentView;
    public $selectedProducts;
    public $scene;
    public $categoryMaskId;
    public $maskImg;
    use GetCategorisedProduct;

    public function mount(Cart $cart): void
    {
        $this->cart = $cart->load('view.scene')->load('items');
        $this->currentView = $cart->view;
        $this->scene = $cart->view->scene;
        $this->selectedProducts = collect($cart->items)
            ->map(function ($item){
                return $item->only(['product_id', 'category_id']);
            })->toArray();
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

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|\Illuminate\View\View
    {
        $bgImg = $this->currentView->images()->where('type', 'transparent_bg')->first()?->path;
        $fgImg = $this->currentView->images()->where('type', 'mask_bg')->first()?->path;
        $categorisedProducts = $this->getCategorisedProducts($this->currentView->id);

        return view('livewire.views.edit', [
            'view' => $this->currentView,
            'background_img' => $bgImg,
            'foreground_img' => $fgImg,
            'categories' => $this->setMaskImgs($categorisedProducts, $this->selectedProducts),
            'category_mask_id' => $this->categoryMaskId,
            'mask_selected_img' => $this->maskImg,
            'selected_products' => $this->selectedProducts,
        ]);
    }
}
