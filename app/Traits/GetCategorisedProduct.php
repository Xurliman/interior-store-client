<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait GetCategorisedProduct
{
    public function getCategorisedProducts($viewId): \Illuminate\Database\Eloquent\Collection
    {
        $view = View::firstWhere('id', $viewId);
        $sceneViews = $view->scene->views()->pluck('id')->all();
        $categories = Category::with('products.productConfigurations')
            ->whereHas('products', function (Builder $query){
                $query->where('is_visible', 1);
            })
            ->orderBy('layer_order')
            ->get();
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

    public function getSelectedCategoryIds(array $selectedProducts): array
    {
        return collect($selectedProducts)->pluck('category_id')->toArray();
    }

    public function getSelectedProductIds(array $selectedProducts): array
    {
        return collect($selectedProducts)->pluck('product_id')->toArray();
    }

    public function getProduct($categoryId, $selectedProducts)
    {
        return collect($selectedProducts)->firstWhere(function ($product) use ($categoryId) {
            return $product['category_id'] == $categoryId;
        })['product_id'];
    }

    public function setMaskImgs($categorisedProducts, $selectedProducts)
    {
        $sProducts = Product::with('productConfigurations.images')
            ->whereIn('id', $this->getSelectedProductIds($selectedProducts))
            ->get();
        foreach ($categorisedProducts as $category) {

            if (in_array($category->id, $this->getSelectedCategoryIds($selectedProducts))) {
                $productId = $this->getProduct($category->id, $selectedProducts);
                $category->mask_img = collect($sProducts)
                    ->where('id', $productId)
                    ->where('is_visible', true)
                    ->first()?->productConfigurations
                    ->where('view_id', $this->currentView->id)
                    ->first()?->images
                    ->where('type', 'mask_bg')
                    ->first()?->path;
            } else {
                $category->mask_img = collect($category->products)
                    ->map(function ($product) {
                        if ($product->is_visible) {
                            return collect($product->productConfigurations)
                                ->where('view_id', $this->currentView->id)
                                ->first()?->images
                                ->where('type', 'mask_bg')
                                ->first()?->path;
                        }
                    })->filter()
                    ->first();
            }
        }
        return $categorisedProducts;
    }
}
