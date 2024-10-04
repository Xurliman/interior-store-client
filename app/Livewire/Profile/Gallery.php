<?php

namespace App\Livewire\Profile;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
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

    public function edit(Cart $cart): void
    {
        $this->redirectRoute('carts.edit', $cart);
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.profile.gallery');
    }
}
