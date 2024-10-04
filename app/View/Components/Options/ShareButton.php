<?php

namespace App\View\Components\Options;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShareButton extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.options.share-button');
    }
}
