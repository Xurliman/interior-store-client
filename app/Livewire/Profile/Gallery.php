<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class Gallery extends Component
{
    public $carts;

    public function mount($carts): void
    {
        $this->carts = $carts;
    }

    public function render()
    {
        return view('livewire.profile.gallery');
    }
}
