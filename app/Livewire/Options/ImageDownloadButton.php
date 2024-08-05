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

    public function addToCart(): void {
//        /** @var User $user */
//        $user = auth()->user();
//        if ($user->cart) {
//            $user->cart()->create();
//        }
//        $user->cart
//            ->items()
//            ->whereHas('product', function ($query) use ($categoryId) {
//                $query->where('category_id', $categoryId);
//            })
//            ->delete();
//        $this->dispatch('renew-cart',
//            cart: $user->cart->id
//        );
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

    public function downloadPng()#: BinaryFileResponse
    {
        if (count($this->selectedProducts) > 0) {
            $view = View::firstWhere('id', $this->viewId);
            $downloadedImg = ImageMerger::imageCreateForView($view, $this->selectedProducts);
            $path = storage_path("app/public/$downloadedImg");
            return response()
                ->download($path, "download.png")
                ->deleteFileAfterSend(true);
        }
    }

    public function downloadPdf()
    {
        $view = View::firstWhere('id', $this->viewId);
        $downloadedImg = ImageMerger::imageCreateForView($view, $this->selectedProducts);
        $path = storage_path("app/public/$downloadedImg");
        list($width, $height) = getimagesize($path);
        $pdf = new FPDF();
        $pdf->Image($downloadedImg, 0, 0, $width, $height, 'PNG');
        $pdf->Output('D');
//        return response()
//            ->download($path, "download.pdf")
//            ->deleteFileAfterSend(true);
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.options.image-download-button', [
            'selected_products' => $this->selectedProducts,
        ]);
    }
}
