<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Menu extends Component
{
    public $cart;

    #[On('renew-cart')]
    public function renewCart(Cart $cart): void
    {
        $this->cart = $cart->load('products');
    }

    public function mount(): void
    {
        /** @var User $user */
        $user = auth()->user() ?? User::find(1);
        if (is_null($user->cart)) {
            $user->carts()->create();
        }
        $this->cart = $user->carts?->load('products');
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.carts.menu', [
            'cart' => $this->cart
        ]);
    }
}
