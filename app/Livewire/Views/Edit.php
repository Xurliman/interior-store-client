<?php

namespace App\Livewire\Views;

use App\Models\Cart;
use App\Models\Product;
use App\Models\View;
use App\Traits\GetCategorisedProduct;
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
        $this->selectedProducts = $cart->items()->pluck('product_id')->toArray();
        $this->scene = $cart->view->scene;
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

    public function render()
    {
        $bgImg = $this->currentView->images()->where('type', 'transparent_bg')->first()?->path;
        $fgImg = $this->currentView->images()->where('type', 'mask_bg')->first()?->path;
        $categorisedProducts = $this->getCategorisedProducts($this->currentView->id);
        $products = Product::with('productConfigurations.images')->whereIn('id', $this->selectedProducts)->get();
        $categories = collect($products)->map(function ($product) use($categorisedProducts){
            foreach ($categorisedProducts as $category) {
                if ($product->category_id == $category->id) {
                    $category->mask_img = $product
                        ->productConfigurations()
                        ->where('view_id', $this->currentView->id)
                        ->where('is_visible', true)
                        ->first()?->images()
                        ->where('type', 'mask_bg')
                        ->first()?->path;
                    return $category;
                }
            }
        });
        dd($categories);
        return view('livewire.views.edit', [
            'view' => $this->currentView,
            'background_img' => $bgImg,
            'foreground_img' => $fgImg,
            'categories' => $categories,
            'category_mask_id' => $this->categoryMaskId,
            'mask_selected_img' => $this->maskImg,
            'selected_products' => $this->selectedProducts,
        ]);
    }
}
