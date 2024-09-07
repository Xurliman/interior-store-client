<?php

namespace App\Http\Resources\Scene;

use App\Http\Resources\View\ViewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SceneResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
//            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'views' => ViewResource::collection($this->whenLoaded('views')),
        ];
    }
}
