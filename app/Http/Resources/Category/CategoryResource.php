<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\ViewItem\ViewItemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'data_mask' => $this->data_mask,
            'div_id' => $this->div_id,
            'class' => $this->class,
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'view_item' => ViewItemResource::make($this->whenLoaded('view_item'))
        ];
    }
}