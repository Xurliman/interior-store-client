<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Price\PriceResource;
use App\Http\Resources\ProductConfiguration\ProductConfigurationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'short_name' => $this->short_name,
            'description' => $this->description,
            'dimensions' => $this->dimensions,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'price' => $this->price,
            'image' => $this->image->path ?? null,
            'product_configurations' => ProductConfigurationResource::collection($this->whenLoaded('productConfigurations')),
        ];
    }
}
