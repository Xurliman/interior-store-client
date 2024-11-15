<?php

namespace App\Livewire\Options;

use App\Helpers\FPDF;
use App\Helpers\ImageMerger;
use App\Models\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageDownloadButton extends Component
{
    public array $selectedProducts;
    public $viewId;

    public function mount($viewId, $selectedProducts=[]): void
    {
        $this->viewId = $viewId;
        $this->selectedProducts = $selectedProducts;
    }

    #[On('new-view-selected')]
    public function viewSelected($viewId):void
    {
        $this->viewId = $viewId;
    }

    #[On('update-selected-products-list')]
    public function updateSelectedProducts($selectedProducts): void
    {
        $this->selectedProducts = $selectedProducts;
    }

    public function downloadPng()
    {
        $view = View::firstWhere('id', $this->viewId);
        $products = collect($this->selectedProducts)->pluck('product_id')->toArray();
        $downloadedImg = ImageMerger::imageCreateForView($view, $products);
        $path = storage_path("app/public/$downloadedImg");
        return response()
            ->download($path, "download.png")
            ->deleteFileAfterSend(true);
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.options.image-download-button');
    }
}
