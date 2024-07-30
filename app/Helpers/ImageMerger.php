<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\View;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class ImageMerger
{
    public static function mergeProductWithCorrespondingMask(ProductConfiguration $productConfiguration, $directoryName): void
    {
        $productTransparentImage = $productConfiguration->images()
            ->where('type', 'mask_bg')
            ->first()?->path;
        $productMaskImage = $productConfiguration->images()
            ->where('type', 'transparent_bg')
            ->first()?->path;
        self::mergeImages(
            destinationImagePath: storage_path("app/public/".$productTransparentImage),
            sourceImagePath: storage_path("app/public/".$productMaskImage),
            directoryName: $directoryName,
            pct: 1);
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

    public static function mergeImages($destinationImagePath, $sourceImagePath, $directoryName, $pct=0): void
    {
        list($width, $height) = getimagesize($sourceImagePath);
        if (str_ends_with($destinationImagePath, ".jpeg") || str_ends_with($destinationImagePath, ".jpg")) {
            $destinationImage = imagecreatefromjpeg($destinationImagePath);
        } else {
            $destinationImage = imagecreatefrompng($destinationImagePath);
        }
        $sourceImage = imagecreatefrompng($sourceImagePath);

        if ($pct > 0) {
        imagealphablending($destinationImage, false);
        imagealphablending($sourceImage, false);
        }

        imagecopy($destinationImage, $sourceImage, 0, 0, 0, 0, $width, $height);

        if ($pct > 0) {
        imagesavealpha($destinationImage, true);
        imagesavealpha($sourceImage, true);
        }

        header('Content-type: image/png');

        if (!file_exists($directoryName)){
            mkdir($directoryName);
        }
        imagepng($destinationImage, $directoryName."/merge.png",0);
        imagedestroy($destinationImage);
        imagedestroy($sourceImage);
    }


    public static function galleryImageCreator($selectedProducts, View $view): void
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
            if (is_null($productConfiguration)) {
                continue;
            }
            $productConfigurationIds[] = $productConfiguration->id;
            self::mergeProductWithCorrespondingMask($productConfiguration, $directoryName."/product-configurations/".$productConfiguration->id);
        }

        $oldResultFile = $directoryName."results/".$view->id."/merge.png";
        if (file_exists($oldResultFile)) {
            unlink($oldResultFile);
        }

        foreach ($productConfigurationIds as $productConfigurationId) {
            $destinationViewImagePath = $directoryName."results/".$view->id."/merge.png";
            if (!file_exists($destinationViewImagePath)) {
                $destinationViewImagePath = $directoryName."views/".$view->id."/merge.png";
            }
            $sourceViewImagePath = $directoryName."product-configurations/".$productConfigurationId."/merge.png";
            self::mergeImages($destinationViewImagePath, $sourceViewImagePath, $directoryName."results/".$view->id);
        }
    }
}
