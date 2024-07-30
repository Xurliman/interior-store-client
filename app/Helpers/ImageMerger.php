<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\View;
use function PHPUnit\Framework\directoryExists;
use function PHPUnit\Framework\throwException;

class ImageMerger
{
    public static function mergeProductWithCorrespondingMask(ProductConfiguration $productConfiguration, $directoryName): void
    {
        $productTransparentImage = $productConfiguration->images()
            ->where('type', 'transparent_bg')
            ->first()?->path;
        $productMaskImage = $productConfiguration->images()
            ->where('type', 'mask_bg')
            ->first()?->path;
        self::mergeImages(
            destinationImagePath: storage_path("app/public/".$productTransparentImage),
            sourceImagePath: storage_path("app/public/".$productMaskImage),
            directoryName: $directoryName);
    }

    public static function viewMergeWithForegroundTable(View $view, $directoryName): void
    {
        $destinationImage = $view->images()
            ->where('type', 'transparent_bg')
            ->first()?->path;
        $sourceImage = $view->images()
            ->where('type', 'mask_bg')
            ->first()?->path;
        if (!is_null($sourceImage)) {
            self::mergeImages(
                destinationImagePath: storage_path("app/public/".$destinationImage),
                sourceImagePath: storage_path("app/public/".$sourceImage),
                directoryName: $directoryName);
        }
    }

    public static function mergeImages($destinationImagePath, $sourceImagePath, $directoryName): void
    {
        list($width, $height) = getimagesize($sourceImagePath);

        if (str_ends_with($destinationImagePath, ".jpeg") || str_ends_with($destinationImagePath, ".jpg")) {
            $destinationImage = imagecreatefromjpeg($destinationImagePath);
        } else {
            $destinationImage = imagecreatefrompng($destinationImagePath);
        }
        $sourceImage = imagecreatefrompng($sourceImagePath);

        imagecopymerge($destinationImage, $sourceImage, 0, 0, 0, 0, $width, $height, 50);
        header('Content-type: image/png');

        if (!file_exists($directoryName)){
            mkdir($directoryName);
        }
        imagepng($destinationImage, $directoryName."/merge.png",0);
        imagedestroy($destinationImage);
        imagedestroy($sourceImage);
    }


    public static function selectedProductsMaskManager($selectedProducts, View $view): void
    {
        $directoryName = storage_path("app/public/generated-images/");
        self::viewMergeWithForegroundTable($view, $directoryName."/views/".$view->id);

        $productConfigurationIds = [];
        foreach ($selectedProducts as $selectedProductId) {
            $productConfiguration = collect(
                Product::firstWhere('id', $selectedProductId)
                    ->load('productConfigurations.images')
                    ->productConfigurations
            )
                ->where('view_id', $view->id)
                ->where('is_visible', true)
                ->first();
            $productConfigurationIds[] = $productConfiguration->id;
            self::mergeProductWithCorrespondingMask($productConfiguration, $directoryName."/product-configurations/".$productConfiguration->id);
        }

        $destinationViewImagePath = $directoryName."views/".$view->id."/merge.png";
        foreach ($productConfigurationIds as $productConfigurationId) {
            $sourceViewImagePath = $directoryName."product-configurations/".$productConfigurationId."/merge.png";
            if (!file_exists($sourceViewImagePath) || !file_exists($destinationViewImagePath)) {
                dd("check for ".$productConfigurationId);
            }
            self::mergeImages($destinationViewImagePath, $sourceViewImagePath, $directoryName."results/".$view->id);
        }
    }
}
