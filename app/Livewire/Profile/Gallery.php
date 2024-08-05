<?php

namespace App\Livewire\Profile;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;

class Gallery extends Component
{
    public $carts;

    public function mount($carts): void
    {
        $this->carts = $carts;
    }

    public function deleteProduct($cartId): void
    {
        Cart::firstWhere('id', $cartId)->delete();
        /** @var User $user */
        $user = auth()->user();
        $this->carts = $user->carts;
    }

    public function render()
    {
        return view('livewire.profile.gallery');
    }
}
