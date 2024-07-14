<?php

namespace App\Http\Resources\ViewItem;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\View\ViewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'div_class' => $this->div_class,
            'views' => ViewResource::make($this->whenLoaded('views')),
            'category' => CategoryResource::make($this->whenLoaded('category'))
        ];
    }
}
