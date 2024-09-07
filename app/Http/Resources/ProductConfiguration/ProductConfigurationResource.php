<?php

namespace App\Http\Resources\ProductConfiguration;

use App\Http\Resources\View\ViewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductConfigurationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'view_id' => $this->view_id,
            'images' => $this->images,
            'view' => ViewResource::make($this->whenLoaded('view')),
        ];
    }
}
