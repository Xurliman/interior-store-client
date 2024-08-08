<?php

namespace App\Livewire\Options;

use App\Helpers\ImageMerger;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SaveToGallery extends Component
{
    public $cart;
    public $viewId;
    #[Validate('required')]
    public $selectedProducts = [];

    public function mount($viewId, $selectedProducts, $cart = null): void
    {
        $this->viewId = $viewId;
        $this->selectedProducts = collect(
            Product::with('category')
                ->whereIn('id', collect($selectedProducts)->pluck('product_id')->toArray())
                ->get()
        )->toArray();

        if (!is_null($cart)) {
            $this->cart = $cart;
        }
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
            Product::with('category')
                ->whereIn('id', collect($selectedProducts)->pluck('product_id')->toArray())
                ->get()
        )->toArray();
    }

    public function saveToGallery(): void
    {
        $this->validate();
        /** @var User $user */
        $user = auth()->user();

        /** @var Cart $cart */
        $cart = $user->carts()->create([
            'view_id' => $this->viewId,
        ]);
        $cart->items()->createMany(
            $this->getProductsToSave(),
        );
        $cart->image()->create([
            'path' => $this->saveImage(),
            'type' => 'mask_merged'
        ]);
        $this->redirectRoute('carts.index');
    }

    public function updateCart(Cart $cart): void
    {
        $cart->update(['view_id' => $this->viewId]);

        $cart->items()->delete();
        $cart->items()->createMany(
            $this->getProductsToSave(),
        );

        if ($cart->image->path) {
            Storage::disk('public')->delete($cart->image->path);
        }
        $cart->image()->update([
            'path' => $this->saveImage(),
            'type' => 'mask_merged'
        ]);
        $this->redirectRoute('carts.index');
    }

    public function getProductsToSave(): array
    {
        return collect($this->selectedProducts)
            ->map(function ($product){
                $product['quantity'] = 1;
                $product['product_id'] = $product['id'];
                return collect($product)->only(['quantity', 'product_id', 'category_id']);
            })
            ->toArray();
    }

    public function saveImage(): string
    {
        return ImageMerger::imageCreateForView(
            view: View::firstWhere('id', $this->viewId),
            selectedProducts: collect($this->selectedProducts)
                ->map(function ($product){
                    return $product['id'];
                })
                ->toArray()
        );
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.options.save-to-gallery', [
            'view_id' => $this->viewId,
            'selected_products' => $this->selectedProducts
        ]);
    }
}
