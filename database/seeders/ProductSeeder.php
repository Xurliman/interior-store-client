<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [//1
                'category_id' => 1,
                'name' => 'Black Wall Panel',
                'description' => 'Black Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk1.jpg',
                'path' => public_path("img/kitchen-black/Detailed/KitchenFartuk1.jpg"),
            ],
            [//2
                'category_id' => 1,
                'name' => 'Grey Wall Panel',
                'description' => 'Grey Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk2.jpg',
                'path' => public_path("img/kitchen-black/Detailed/KitchenFartuk2.jpg"),
            ],
            [//3
                'category_id' => 1,
                'name' => 'Yellow Wall Panel',
                'description' => 'Yellow Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk3.jpg',
                'path' => public_path("img/kitchen-black/Detailed/KitchenFartuk3.jpg"),
            ],


            [//4
                'category_id' => 2,
                'name' => 'Grey Floor Covering',
                'description' => 'Grey Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet1.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Parquet1.jpg"),
            ],
            [//5
                'category_id' => 2,
                'name' => 'Brown Floor Covering',
                'description' => 'Brown Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet2.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Parquet2.jpg"),
            ],
            [
                'category_id' => 2,
                'name' => 'Yellow Floor Covering',
                'description' => 'Yellow Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet3.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Parquet3.jpg"),
            ],
            [
                'category_id' => 2,
                'name' => 'Black Floor Covering',
                'description' => 'Black Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet4.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Parquet4.jpg"),
            ],
            [
                'category_id' => 2,
                'name' => 'White Floor Covering',
                'description' => 'White Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet5.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Parquet5.jpg"),
            ],


            [
                'category_id' => 3,
                'name' => 'Black Chair',
                'description' => 'Black Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool1.jpg',
                'path' => public_path("img/kitchen-black/Detailed/BarStool1.jpg"),
            ],
            [
                'category_id' => 3,
                'name' => 'Light Grey Chair',
                'description' => 'Light Grey Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool2.jpg',
                'path' => public_path("img/kitchen-black/Detailed/BarStool2.jpg"),
            ],
            [
                'category_id' => 3,
                'name' => 'Yellow Chair',
                'description' => 'Yellow Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool3.jpg',
                'path' => public_path("img/kitchen-black/Detailed/BarStool3.jpg"),
            ],
            [
                'category_id' => 3,
                'name' => 'Grey Chair',
                'description' => 'Grey Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool4.jpg',
                'path' => public_path("img/kitchen-black/Detailed/BarStool4.jpg"),
            ],
            [
                'category_id' => 3,
                'name' => 'White Chair',
                'description' => 'White Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool5.jpg',
                'path' => public_path("img/kitchen-black/Detailed/BarStool5.jpg"),
            ],
            [
                'category_id' => 3,
                'name' => 'Total Black Chair',
                'description' => 'Total Black Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool6.jpg',
                'path' => public_path("img/kitchen-black/Detailed/BarStool6.jpg"),
            ],


            [
                'category_id' => 4,
                'name' => 'Black Lamp',
                'description' => 'Black Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp1.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Lamp1.jpg"),
            ],
            [
                'category_id' => 4,
                'name' => 'Mini Lamp',
                'description' => 'Mini Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp2.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Lamp2.jpg"),
            ],
            [
                'category_id' => 4,
                'name' => 'Timber Lamp',
                'description' => 'Timber Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp3.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Lamp3.jpg"),
            ],
            [
                'category_id' => 4,
                'name' => 'Complex Lamp',
                'description' => 'Complex Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp4.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Lamp4.jpg"),
            ],
            [
                'category_id' => 4,
                'name' => 'White Lamp',
                'description' => 'White Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp5.jpg',
                'path' => public_path("img/kitchen-black/Detailed/Lamp5.jpg"),
            ],
            [
                'category_id' => 4,
                'name' => 'Red Timber Lamp',
                'description' => 'Red Timber Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp6.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Lamp6.jpg"),
            ],


            //from red kitchen
            [//21
                'category_id' => 1,
                'name' => 'White Wall Panel',
                'description' => 'White Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk2.jpg',
                'path' => public_path("img/kitchen-red/Detailed/KitchenFartuk2.jpg"),
            ],

            [//22
                'category_id' => 2,
                'name' => 'Horizontal Floor Covering',
                'description' => 'Horizontal Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet2.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Parquet2.jpg"),
            ],
            [//23
                'category_id' => 2,
                'name' => 'Light Yellow Floor Covering',
                'description' => 'Light Yellow Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet3.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Parquet3.jpg"),
            ],
            [//24
                'category_id' => 2,
                'name' => 'Light Brown Floor Covering',
                'description' => 'Light Brown Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Parquet4.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Parquet4.jpg"),
            ],

            [//25
                'category_id' => 4,
                'name' => 'Enormous Lamp',
                'description' => 'Enormous Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp1.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Lamp1.jpg"),
            ],
            [//26
                'category_id' => 4,
                'name' => 'Plate Lamp',
                'description' => 'Plate Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp2.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Lamp2.jpg"),
            ],
            [//27
                'category_id' => 4,
                'name' => 'Uno Huge Lamp',
                'description' => 'Uno Huge Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp3.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Lamp3.jpg"),
            ],
            [//28
                'category_id' => 4,
                'name' => 'Circle Lamp',
                'description' => 'Circle Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp4.jpg',
                'path' => public_path("img/kitchen-red/Detailed/Lamp4.jpg"),
            ],


            //from kitchen-white
            [//29
                'category_id' => 2,
                'name' => 'Tiny Brown Particles Floor Covering',
                'description' => 'Tiny Brown Particles Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk1.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Parquet1.jpg"),
            ],
            [//30
                'category_id' => 2,
                'name' => 'Tiny Black Particles Floor Covering',
                'description' => 'Tiny Black Particles Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk2.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Parquet2.jpg"),
            ],
            [//31
                'category_id' => 2,
                'name' => 'Tiny Yellow Particles Floor Covering',
                'description' => 'Tiny Yellow Particles Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk3.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Parquet3.jpg"),
            ],
            [//32
                'category_id' => 2,
                'name' => 'Vertical Tiny Yellow Particles Floor Covering',
                'description' => 'Vertical Tiny Yellow Particles Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk4.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Parquet4.jpg"),
            ],
            [//33
                'category_id' => 2,
                'name' => 'Square Black Floor Covering',
                'description' => 'Square Black Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'KitchenFartuk5.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Parquet5.jpg"),
            ],


            [//34
                'category_id' => 3,
                'name' => 'Milky Colored Chair',
                'description' => 'Milky Colored Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool1.jpg',
                'path' => public_path("img/kitchen-white/Detailed/BarStool1.jpg"),
            ],
            [//35
                'category_id' => 3,
                'name' => 'Rough Textured Green Chair',
                'description' => 'Rough Textured Green Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool2.jpg',
                'path' => public_path("img/kitchen-white/Detailed/BarStool2.jpg"),
            ],
            [//36
                'category_id' => 3,
                'name' => 'Rough Textured Blue Chair',
                'description' => 'Rough Textured Blue Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool3.jpg',
                'path' => public_path("img/kitchen-white/Detailed/BarStool3.jpg"),
            ],
            [//37
                'category_id' => 3,
                'name' => 'Vertical Lined Green Chair',
                'description' => 'Vertical Lined Green Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool4.jpg',
                'path' => public_path("img/kitchen-white/Detailed/BarStool4.jpg"),
            ],
            [//38
                'category_id' => 3,
                'name' => 'Smooth Textured Creamy Colored Chair',
                'description' => 'Smooth Textured Creamy Colored Chair',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'BarStool5.jpg',
                'path' => public_path("img/kitchen-white/Detailed/BarStool5.jpg"),
            ],


            [//39
                'category_id' => 4,
                'name' => 'Lamp with Gentle Tiny circles',
                'description' => 'Lamp with Gentle Tiny circles',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp1.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Lamp1.jpg"),
            ],
            [//40
                'category_id' => 4,
                'name' => 'Candle Lamp',
                'description' => 'Candle Lamp',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp3.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Lamp3.jpg"),
            ],
            [//41
                'category_id' => 4,
                'name' => 'Lamp with Complex Lines',
                'description' => 'Lamp with Complex Lines',
                'created_at' => now(),
                'updated_at' => now(),
                'file_name' => 'Lamp4.jpg',
                'path' => public_path("img/kitchen-white/Detailed/Lamp4.jpg"),
            ],
        ];


        $saveData = array_merge([], $data);
        DB::table('products')->insert(
            collect($saveData)->map(function ($item) {
                return collect($item)->except(['file_name', 'path'])->toArray();
            })->toArray()
        );

        $products = Product::all();
        foreach ($products as $product) {
            $foundItem = collect($data)->first(function ($item) use ($product) {
                if ($item['name'] == $product->name) {
                    return $item;
                }
            });
            if ($foundItem) {
                $manager = ImageManager::gd();
                $img = $manager->read($foundItem['path']);
                $fileName = uniqid(rand(), false).'_'.$foundItem['file_name'];
                $img->save(storage_path('app/public/'.$fileName));

                $image = new Image();
                $image->path = $fileName;
                $product->image()->save($image);
                $image->save();
            }
        }
    }
}
