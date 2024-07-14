<?php

namespace App\View\Components\Category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ObjectImage extends Component
{
    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function render(): View|Closure|string
    {
        return view('components.category.object-image');
    }
}
