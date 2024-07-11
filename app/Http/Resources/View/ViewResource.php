<?php

namespace App\Http\Resources\View;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Scene\SceneResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_default' => $this->is_default,
            'image' => $this->image->path,
            'scene' => SceneResource::make($this->whenLoaded('scene')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
        ];
    }
}
