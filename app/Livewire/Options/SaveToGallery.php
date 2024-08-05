<?php

namespace App\Livewire\Options;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class SaveToGallery extends Component
{
    public $viewId;
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

    public function saveToGallery()
    {

    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.options.save-to-gallery', [
            'view_id' => $this->viewId,
            'selected_products' => $this->selectedProducts
        ]);
    }
}
