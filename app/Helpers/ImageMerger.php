<?php

namespace App\Helpers;

use App\Models\Image;
use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\View;

class ImageMerger
{
    public static function mergeProductWithCorrespondingMask(ProductConfiguration $productConfiguration): string
    {
        $productMaskMergedImage = $productConfiguration->images()
            ->where('type', 'mask_merged')
            ->first()?->path;
        if (is_null($productMaskMergedImage)) {
            $destinationImage = $productConfiguration->images()
                ->where('type', 'mask_bg')
                ->first()?->path;
            $sourceImage = $productConfiguration->images()
                ->where('type', 'transparent_bg')
                ->first()?->path;
            if ($destinationImage) {
                $productMaskMergedImage = self::layerImages(
                    destinationImagePath: storage_path("app/public/$destinationImage"),
                    sourceImagePaths: [storage_path("app/public/$sourceImage")],
                    pct: 1
                );
            } else {
                $productMaskMergedImage = $sourceImage;
            }

            self::saveToDatabaseMaskMerged($productMaskMergedImage, $productConfiguration);
        }
        return $productMaskMergedImage;
    }

    public static function mergeViewWithForegroundTable(View $view)
    {
        $viewMaskMergedImage = $view->images()
            ->where('type', 'mask_merged')
            ->first()?->path;
        if (is_null($viewMaskMergedImage)) {
            $destinationImage = $view->images()
                ->where('type', 'transparent_bg')
                ->first()?->path;
            $sourceImage = $view->images()
                ->where('type', 'mask_bg')
                ->first()?->path;
            if (is_null($sourceImage)) {
                $destinationImage = imagecreatefromjpeg(storage_path("app/public/".$destinationImage));
                $newFileName = uniqid(rand(), false).'_'.time().'.png';
                imagepng($destinationImage, storage_path("app/public/$newFileName"));
                imagedestroy($destinationImage);
                $viewMaskMergedImage = $newFileName;
            } else {
                $viewMaskMergedImage = self::layerImages(
                    destinationImagePath: storage_path("app/public/$destinationImage"),
                    sourceImagePaths: [storage_path("app/public/$sourceImage")],
                    pct: 0
                );
            }
            self::saveToDatabaseMaskMerged(
                maskMergedImagePath: $viewMaskMergedImage,
                object: $view);
        }
        return $viewMaskMergedImage;
    }

    public static function imageCreateForView(View $view, $selectedProducts): string
    {
        $viewImageName = self::mergeViewWithForegroundTable(view: $view);
        $destinationViewImagePath = storage_path("app/public/$viewImageName");
        $sourceImagePaths = [];
        $selectedProducts = Product::find([$selectedProducts])
            ->load('productConfigurations.images')
            ->sortBy('category_id');
        foreach ($selectedProducts as $selectedProduct) {
            $productConfiguration = collect($selectedProduct
                ->productConfigurations)
                ->where('view_id', $view->id)
                ->first();
            if (is_null($productConfiguration)) {
                continue;
            }
            $sourceImageName = self::mergeProductWithCorrespondingMask(
                productConfiguration: $productConfiguration);
            $sourceImagePaths[] = storage_path("app/public/$sourceImageName");
        }
        return self::layerImages(
            destinationImagePath: $destinationViewImagePath,
            sourceImagePaths: $sourceImagePaths
        );
    }

    public static function saveToDatabaseMaskMerged($maskMergedImagePath, $object): void
    {
        $image = new Image();
        $image->type = "mask_merged";
        $image->path = $maskMergedImagePath;
        $object->images()->save($image);
        $image->save();
    }

    public static function layerImages($destinationImagePath, array $sourceImagePaths, $pct = 0): string
    {
        if (str_ends_with($destinationImagePath, ".jpeg") || str_ends_with($destinationImagePath, ".jpg")) {
            $finalImage = imagecreatefromjpeg($destinationImagePath);
        } else {
            $finalImage = imagecreatefrompng($destinationImagePath);
        }

        $tmpFiles = [];
        foreach ($sourceImagePaths as $sourceImagePath) {
            list($width, $height) = getimagesize($sourceImagePath);
            $sourceImage = imagecreatefrompng($sourceImagePath);
            if ($pct > 0) {
                imagealphablending($finalImage, false);
                imagealphablending($sourceImage, false);
            }
            imagecopy($finalImage, $sourceImage, 0, 0, 0, 0, $width, $height);
            if ($pct > 0) {
                imagesavealpha($finalImage, true);
                imagesavealpha($sourceImage, true);
            }
            if (!next($sourceImagePaths)) {
                header('Content-type: image/png');
                $newFileName = uniqid(rand(), false).'_'.time().'.png';
                imagepng($finalImage, storage_path("app/public/$newFileName"), 0);
                imagedestroy($finalImage);
                foreach ($tmpFiles as $file) {
                    unlink($file);
                }
                return $newFileName;
            }
            $randKey = uniqid(rand(), false);
            $tmpFileName = storage_path("app/public/tmp_image_{$randKey}.png");
            $tmpFiles[] = $tmpFileName;
            imagepng($finalImage, $tmpFileName);
            $finalImage = imagecreatefrompng($tmpFileName);
            imagedestroy($sourceImage);
        }
        return $destinationImagePath;
    }
}
