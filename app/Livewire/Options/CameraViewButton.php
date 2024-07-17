<?php

namespace App\Livewire\Options;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CameraViewButton extends Component
{

    public function listViews(): void
    {
        $this->dispatch('list-views');
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.options.camera-view-button');
    }
}
