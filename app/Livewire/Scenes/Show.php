<?php

namespace App\Livewire\Scenes;

use App\Models\Scene;
use Livewire\Component;

class Show extends Component
{
    public $scene;

    public function mount(Scene $scene)
    {
        $this->scene = $scene->load('views');
    }

    public function viewSelected()
    {
        dd("heeey");
    }

    public function render()
    {
        return view('livewire.scenes.show', [
            'views' => $this->scene->views,
        ]);
    }
}
