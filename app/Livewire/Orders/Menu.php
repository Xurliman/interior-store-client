<?php

namespace App\Livewire\Orders;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Menu extends Component
{
    public array $selectedProducts;

    public function mount($selectedProducts): void
    {
        $this->selectedProducts = collect($selectedProducts)->pluck('product_id')->toArray();
    }

    #[On('update-selected-products-list')]
    public function updateSelectedProducts($selectedProducts): void
    {
        $this->selectedProducts = collect($selectedProducts)->pluck('product_id')->toArray();
    }

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        return view('livewire.orders.menu', [
            'selected_products' => $this->selectedProducts
        ]);
    }
}
