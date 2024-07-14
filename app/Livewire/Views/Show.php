<?php

namespace App\Livewire\Views;

use App\Models\Scene;
use App\Models\View;
use Livewire\Component;

class Show extends Component
{
    public $scene;
    public $currentView;

    public function mount(Scene $scene, $view)
    {
        $this->scene = $scene;
        $this->currentView = $view ?? $this->scene->views()->where('is_default', true)->first();;
    }

    public function viewSelected(View $view)
    {
        $this->currentView = $view;
    }

    public function render()
    {
        $bgImg = $this->currentView->images()->where('type', 'transparent_bg')->first()?->path;
        $fgImg = $this->currentView->images()->where('type', 'mask_bg')->first()?->path;
        $categories = $this->currentView->load('categories.products.productConfiguration')->categories;
        return view('livewire.views.show', [
            'view' => $this->currentView,
            'background_img' => $bgImg,
            'foreground_img' => $fgImg,
            'categories' => $categories,
        ]);
    }
}
