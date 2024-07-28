<?php

namespace App\View\Components\Options;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DownloadButton extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.options.download-button');
    }
}
