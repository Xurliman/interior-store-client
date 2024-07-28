<?php

namespace App\View\Components\Options;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CameraViewButton extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.options.camera-view-button');
    }
}
