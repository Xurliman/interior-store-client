<?php

namespace App\Livewire\Options;

use App\Helpers\ImageMerger;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SaveToGallery extends Component
{
    public $viewId;
    #[Validate('required')]
    public $selectedProducts = [];

    public function mount($viewId, $selectedProducts): void
    {
        $this->viewId = $viewId;
        $this->selectedProducts = collect(
            Product::with('price.currency')
                ->whereIn('id', $selectedProducts)
                ->get()
            )->toArray();
    }

    #[On('new-view-selected')]
    public function viewSelected($viewId):void
    {
        $this->viewId = $viewId;
    }

    #[On('update-selected-products-list')]
    public function updateSelectedProducts($selectedProducts): void
    {
        $this->selectedProducts = collect(
            Product::with('price.currency')
                ->whereIn('id', $selectedProducts)
                ->get()
        )->toArray();
    }

    public function saveToGallery(): void
    {
        $this->validate();
        /** @var User $user */
        $user = auth()->user();
        $cart = $user->carts()->create([
            'view_id' => $this->viewId,
        ]);
        $productsToSave = collect($this->selectedProducts)
            ->map(function ($product){
                $product['quantity'] = 1;
                $product['product_id'] = $product['id'];
                return collect($product)->only(['quantity', 'product_id']);
            })
            ->toArray();
        $cart->items()->createMany(
            $productsToSave,
        );
        $galleryImage = ImageMerger::imageCreateForView(
            view: \App\Models\View::firstWhere('id', $this->viewId),
            selectedProducts: collect($this->selectedProducts)
                ->map(function ($product){
                    return $product['id'];
                })
                ->toArray()
        );
        $cart->image()->create([
            'path' => $galleryImage,
            'type' => 'mask_merged'
        ]);
        $this->redirectRoute('carts.index');
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.options.save-to-gallery', [
            'view_id' => $this->viewId,
            'selected_products' => $this->selectedProducts
        ]);
    }
}
