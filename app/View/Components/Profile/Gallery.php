<?php

namespace App\View\Components\Profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Gallery extends Component
{
    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function render(): View|Closure|string
    {
        return view('components.profile.gallery', [
            'products' => $this->products
        ]);
    }
}
