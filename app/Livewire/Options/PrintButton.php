<?php

namespace App\Livewire\Options;

use App\Helpers\ImageMerger;
use App\Models\View;
use Livewire\Attributes\On;
use Livewire\Component;

class PrintButton extends Component
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

    public function print()
    {
        redirect()->route('print', [
            'view_id' => $this->viewId,
            'products' => $this->selectedProducts,
        ]);
    }

    public function render()
    {
        return view('livewire.options.print-button');
    }
}
