<?php

namespace App\View\Components\Options;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveButton extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.options.save-button');
    }
}
