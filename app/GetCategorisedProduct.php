<?php

namespace App;

use App\Models\View;
use Illuminate\Support\Collection;

trait GetCategorisedProduct
{
    public function getCategorisedProducts($products): Collection
    {
        return collect($products)->filter(function ($product) {
            $productConfigurations = collect($product->productConfigurations)->map(function ($productConfiguration) {
                return $productConfiguration->is_visible == true;
            })->toArray();
            return in_array(true, $productConfigurations);
        })->groupBy(function ($product) {
            return $product->category_id;
        });
    }
}
