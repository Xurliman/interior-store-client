<?php

namespace App\Livewire\Options;

use App\Helpers\ImageMerger;
use App\Models\View;
use Livewire\Component;

class ImageDownloadButton extends Component
{
    public array $selectedProducts;
    public $view;

    public function mount(View $view, $selectedProducts): void
    {
        $this->selectedProducts = $selectedProducts;
        $this->view = $view;
    }

    public function downloadPng($selectedProducts)
    {
        ImageMerger::selectedProductsManager($this->selectedProducts, $this->view);
    }

    public function render()
    {
        return view('livewire.options.image-download-button');
    }
}
