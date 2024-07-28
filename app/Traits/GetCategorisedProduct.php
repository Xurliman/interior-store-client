<?php

namespace App\Traits;

use App\Models\Category;
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

    public function getCategoryProducts($categoryId): Collection
    {
        return collect(Category::with('products')->firstWhere('id', $categoryId)->products)->map(function ($product) {
            return $product->id;
        });
    }
}
