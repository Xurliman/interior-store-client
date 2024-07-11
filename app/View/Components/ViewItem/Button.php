<?php

namespace App\View\Components\ViewItem;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function render(): View|Closure|string
    {
        return view('components.view-item.button', ['view' => $this->view]);
    }
}
