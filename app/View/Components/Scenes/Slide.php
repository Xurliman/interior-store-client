<?php

namespace App\View\Components\Scenes;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slide extends Component
{
    public $scene;

    public function __construct($scene)
    {
        $this->scene = $scene;
    }

    public function render(): View|Closure|string
    {
        return view('components.scenes.slide', [
            'scene' => $this->scene,
            'view_images' => collect(
                $this->scene
                ->load('views.images')->views)
                ->where('is_visible', true)
                ->where('is_default', true)
                ->first()?->images
            ]
        );
    }
}
