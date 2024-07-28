<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\View;
use Illuminate\Support\Collection;

trait GetCategorisedProduct
{
    public function getCategorisedProducts($viewId): \Illuminate\Database\Eloquent\Collection
    {
        $view = View::firstWhere('id', $viewId);
        $sceneViews = $view->scene->views()->pluck('id')->all();
        $categories = Category::with('products.productConfigurations')->get();

        foreach ($categories as $key => $category) {
            $flag = false;
            $category->display = false;
            foreach ($category->products as $product) {
                foreach ($product->productConfigurations as $productConfiguration) {
                    if (in_array($productConfiguration->view_id, $sceneViews)) {
                        $flag = true;
                        if ($productConfiguration->view_id == $view->id) {
                            $category->display = true;
                            break;
                        }
                    }
                }
            }
            if (!$flag) {
                unset($categories[$key]);
            }
        }
        return $categories;
    }

    public function getCategoryProducts($categoryId): Collection
    {
        return collect(Category::with('products')->firstWhere('id', $categoryId)->products)->map(function ($product) {
            return $product->id;
        });
    }
}
