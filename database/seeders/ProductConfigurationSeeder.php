<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\ProductConfiguration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\ImageManager;

class ProductConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'view_id' => 1,
                'data_object' => 'fartuk1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'view_id' => 4,
                'data_object' => 'fartuk1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'view_id' => 1,
                'data_object' => 'fartuk2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'view_id' => 1,
                'data_object' => 'fartuk3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'view_id' => 4,
                'data_object' => 'fartuk3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'view_id' => 2,
                'data_object' => 'fartuk1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'view_id' => 5,
                'data_object' => 'fartuk1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'view_id' => 2,
                'data_object' => 'fartuk2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'view_id' => 2,
                'data_object' => 'fartuk3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'view_id' => 5,
                'data_object' => 'fartuk3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'view_id' => 3,
                'data_object' => 'fartuk1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'view_id' => 6,
                'data_object' => 'fartuk1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'view_id' => 3,
                'data_object' => 'fartuk2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'view_id' => 3,
                'data_object' => 'fartuk3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'view_id' => 6,
                'data_object' => 'fartuk3',
                'created_at' => now(),
                'updated_at' => now(),
            ],



            [
                'product_id' => 4,
                'view_id' => 1,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'view_id' => 4,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'view_id' => 2,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'view_id' => 5,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 5,
                'view_id' => 1,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'view_id' => 2,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'view_id' => 1,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'view_id' => 2,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'view_id' => 1,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'view_id' => 2,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'view_id' => 1,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'view_id' => 2,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 9,
                'view_id' => 1,
                'data_object' => 'BarStool1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 9,
                'view_id' => 2,
                'data_object' => 'BarStool1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 9,
                'view_id' => 3,
                'data_object' => 'BarStool1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'view_id' => 1,
                'data_object' => 'BarStool2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'view_id' => 2,
                'data_object' => 'BarStool2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'view_id' => 3,
                'data_object' => 'BarStool2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 11,
                'view_id' => 1,
                'data_object' => 'BarStool3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 11,
                'view_id' => 2,
                'data_object' => 'BarStool3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 11,
                'view_id' => 3,
                'data_object' => 'BarStool3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 12,
                'view_id' => 1,
                'data_object' => 'BarStool4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 12,
                'view_id' => 2,
                'data_object' => 'BarStool4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 12,
                'view_id' => 3,
                'data_object' => 'BarStool4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 13,
                'view_id' => 1,
                'data_object' => 'BarStool5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 13,
                'view_id' => 2,
                'data_object' => 'BarStool5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 13,
                'view_id' => 3,
                'data_object' => 'BarStool5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 14,
                'view_id' => 1,
                'data_object' => 'BarStool6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 14,
                'view_id' => 2,
                'data_object' => 'BarStool6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 14,
                'view_id' => 3,
                'data_object' => 'BarStool6',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 15,
                'view_id' => 1,
                'data_object' => 'Lamp1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 15,
                'view_id' => 2,
                'data_object' => 'Lamp1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 15,
                'view_id' => 3,
                'data_object' => 'Lamp1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 16,
                'view_id' => 1,
                'data_object' => 'Lamp2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 16,
                'view_id' => 2,
                'data_object' => 'Lamp2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 16,
                'view_id' => 3,
                'data_object' => 'Lamp2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 17,
                'view_id' => 1,
                'data_object' => 'Lamp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 17,
                'view_id' => 2,
                'data_object' => 'Lamp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 17,
                'view_id' => 3,
                'data_object' => 'Lamp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'view_id' => 1,
                'data_object' => 'Lamp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'view_id' => 2,
                'data_object' => 'Lamp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'view_id' => 3,
                'data_object' => 'Lamp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 19,
                'view_id' => 1,
                'data_object' => 'Lamp5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 19,
                'view_id' => 2,
                'data_object' => 'Lamp5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 19,
                'view_id' => 3,
                'data_object' => 'Lamp5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 20,
                'view_id' => 4,
                'data_object' => 'Lamp6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 20,
                'view_id' => 5,
                'data_object' => 'Lamp6',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //from red kitchen
            [
                'product_id' => 21,
                'view_id' => 4,
                'data_object' => 'fartuk2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 21,
                'view_id' => 5,
                'data_object' => 'fartuk2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 21,
                'view_id' => 6,
                'data_object' => 'fartuk2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 22,
                'view_id' => 4,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 22,
                'view_id' => 5,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 23,
                'view_id' => 4,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 23,
                'view_id' => 5,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 24,
                'view_id' => 4,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 24,
                'view_id' => 5,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'view_id' => 4,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'view_id' => 5,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 25,
                'view_id' => 4,
                'data_object' => 'Lamp1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 25,
                'view_id' => 5,
                'data_object' => 'Lamp1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 26,
                'view_id' => 4,
                'data_object' => 'Lamp2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 26,
                'view_id' => 5,
                'data_object' => 'Lamp2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 27,
                'view_id' => 4,
                'data_object' => 'Lamp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 27,
                'view_id' => 5,
                'data_object' => 'Lamp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 28,
                'view_id' => 4,
                'data_object' => 'Lamp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 28,
                'view_id' => 5,
                'data_object' => 'Lamp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'view_id' => 4,
                'data_object' => 'Lamp5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'view_id' => 5,
                'data_object' => 'Lamp5',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 29,
                'view_id' => 7,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 29,
                'view_id' => 8,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 29,
                'view_id' => 9,
                'data_object' => 'parquet1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 30,
                'view_id' => 7,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 30,
                'view_id' => 8,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 30,
                'view_id' => 9,
                'data_object' => 'parquet2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 31,
                'view_id' => 7,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 31,
                'view_id' => 8,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 31,
                'view_id' => 9,
                'data_object' => 'parquet3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 32,
                'view_id' => 7,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 32,
                'view_id' => 8,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 32,
                'view_id' => 9,
                'data_object' => 'parquet4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 33,
                'view_id' => 7,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 33,
                'view_id' => 8,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 33,
                'view_id' => 9,
                'data_object' => 'parquet5',
                'created_at' => now(),
                'updated_at' => now(),
            ],



            [
                'product_id' => 34,
                'view_id' => 7,
                'data_object' => 'BarStool1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 34,
                'view_id' => 9,
                'data_object' => 'BarStool1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 35,
                'view_id' => 7,
                'data_object' => 'BarStool2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 35,
                'view_id' => 9,
                'data_object' => 'BarStool2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 36,
                'view_id' => 7,
                'data_object' => 'BarStool3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 36,
                'view_id' => 9,
                'data_object' => 'BarStool3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 37,
                'view_id' => 7,
                'data_object' => 'BarStool4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 37,
                'view_id' => 9,
                'data_object' => 'BarStool4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 38,
                'view_id' => 7,
                'data_object' => 'BarStool5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 38,
                'view_id' => 9,
                'data_object' => 'BarStool5',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 39,
                'view_id' => 7,
                'data_object' => 'Lamp1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 27,
                'view_id' => 7,
                'data_object' => 'Lamp2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                    'product_id' => 40,
                'view_id' => 7,
                'data_object' => 'Lamp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 41,
                'view_id' => 7,
                'data_object' => 'Lamp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $imgTypes = [
            'transparent_bg' => '/Png/',
            'mask_bg' => '/Masks/Png/',
        ];
        DB::table('product_configurations')->insert($data);
        $productConfigurations = ProductConfiguration::with('product.category')->with('view.scene')->get();
        foreach ($productConfigurations as $productConfiguration) {
            foreach ($imgTypes as $imgTypeKey => $imgType) {
                $manager = ImageManager::gd();
                $path = public_path('img/'.$productConfiguration->view->scene->slug.'/'.ucfirst($productConfiguration->view->name).$imgType);
                if ($imgTypeKey == 'mask_bg') {
                    if ($productConfiguration->product->category_id == 1) {
                        $fileName = "KitchenFartuk.png";
                    } elseif ($productConfiguration->product->category_id == 2) {
                        $fileName = "Parquet.png";
                    }else {
                        $fileName = ucfirst($productConfiguration->data_object).'.png';
                    }
                } else {
                    $prefix = $productConfiguration->product->category_id == 1 ? "Kitchen" : "";
                    $fileName = $prefix.ucfirst($productConfiguration->data_object).'.png';
                }

                if (file_exists($path.$fileName)) {
                    $img = $manager->read($path.$fileName);
                    $newFileName = uniqid(rand(), false).'_'.$fileName;
                    $img->save(storage_path('app/public/'.$newFileName));

                    $image = new Image();
                    $image->type = $imgTypeKey;
                    $image->path = $newFileName;
                    $productConfiguration->images()->save($image);
                    $image->save();
                }
            }
        }
        Schema::table('product_configurations', function (Blueprint $table) {
            $table->dropColumn('data_object');
        });
    }
}
