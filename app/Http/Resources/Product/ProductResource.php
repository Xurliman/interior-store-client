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
            'name' => $this->name,
            'short_name' => $this->short_name,
            'description' => $this->description,
            'dimensions' => $this->dimensions,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'product_configuration' => ProductConfigurationResource::make($this->whenLoaded('productConfiguration')),
            'price' => $this->price,
            'image' => $this->image->path ?? null
        ];
    }
}
