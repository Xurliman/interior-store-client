<?php

namespace App\Livewire\Options;

use App\Helpers\ImageMerger;
use App\Models\View;
use Livewire\Attributes\On;
use Livewire\Component;

class ShareModal extends Component
{
    public $viewId;
    public array $selectedProducts;

    public function mount($viewId, $selectedProducts): void
    {
        $this->viewId = $viewId;
        $this->selectedProducts = $selectedProducts;
    }

    #[On('update-selected-products-list')]
    public function updateSelectedProducts($selectedProducts): void
    {
        $this->selectedProducts = $selectedProducts;
    }

    #[On('new-view-selected')]
    public function viewSelected($viewId):void
    {
        $this->viewId = $viewId;
    }

    public function getImageUrl(): string
    {
        $url =  ImageMerger::imageCreateForView(
            view: View::firstWhere('id', $this->viewId),
            selectedProducts: collect($this->selectedProducts)
                ->map(function ($product){
                    return $product['product_id'];
                })
                ->toArray()
        );
        return asset("storage/$url");
    }

    public function render()
    {
        return view('livewire.options.share-modal');
    }
}
