<?php

namespace App\Http\Resources\ProductConfiguration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductConfigurationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'btn_class' => $this->btn_class,
            'data_object' => $this->data_object,
            'class' => $this->class,
            'extra_class' => $this->extra_class,
        ];
    }
}
