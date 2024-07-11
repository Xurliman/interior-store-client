<?php

namespace App\Http\Resources\Price;

use App\Http\Resources\Currency\CurrencyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'currency' => CurrencyResource::make($this->whenLoaded('currency')),
        ];
    }
}
