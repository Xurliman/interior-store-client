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
    public function renewCart(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function mount(): void
    {
        /** @var User $user */
        $user = auth()->user();
        if (is_null($user->cart)) {
            $user->cart()->create();
        }
        $this->cart = $user->cart->load('products');
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.cart.menu', [
            'cart' => $this->cart
        ]);
    }
}
