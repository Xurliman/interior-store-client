<?php

namespace App\View\Components\Orders;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public array $selectedProducts;

    public function __construct($selectedProducts)
    {
        $this->selectedProducts = $selectedProducts;
    }

    public function render(): View|Closure|string
    {
        return view('components.orders.menu', [
            'selected_products' => $this->selectedProducts,
        ]);
    }
}
