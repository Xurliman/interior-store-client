<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class ViewSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
//            kitchen-black views
            [
                'scene_id' => 1,
                'name' => 'view1',
                'description' => 'Black Kitchen - View1',
                'data_view' => 'View1',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => "Foreground.png",
                'transparent_bg' => public_path("img/kitchen-black/View1/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-black/View1/Jpeg/Final.jpg"),
                'mask_bg' => public_path("img/kitchen-black/View1/Png/Foreground.png"),
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 1,
                'name' => 'view2',
                'description' => 'Black Kitchen - View2',
                'data_view' => 'View2',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => "Foreground.png",
                'transparent_bg' => public_path("img/kitchen-black/View2/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-black/View2/Jpeg/Final.jpg"),
                'mask_bg' => public_path("img/kitchen-black/View2/Png/Foreground.png"),
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 1,
                'name' => 'view3',
                'description' => 'Black Kitchen - View3',
                'data_view' => 'View3',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => null,
                'transparent_bg' => public_path("img/kitchen-black/View3/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-black/View3/Jpeg/Final.jpg"),
                'mask_bg' => null,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
//            kitchen-red views
            [
                'scene_id' => 2,
                'name' => 'view1',
                'description' => 'Red Kitchen - View1',
                'data_view' => 'View1',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => "Table.png",
                'transparent_bg' => public_path("img/kitchen-red/View1/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-red/View1/Jpeg/Final.jpg"),
                'mask_bg' => public_path("img/kitchen-red/View1/Png/Table.png"),
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 2,
                'name' => 'view2',
                'description' => 'Red Kitchen - View2',
                'data_view' => 'View2',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => "Table.png",
                'transparent_bg' => public_path("img/kitchen-red/View2/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-red/View2/Jpeg/Final.jpg"),
                'mask_bg' => public_path("img/kitchen-red/View2/Png/Table.png"),
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 2,
                'name' => 'view3',
                'description' => 'Red Kitchen - View3',
                'data_view' => 'View3',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => null,
                'transparent_bg' => public_path("img/kitchen-red/View3/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-red/View3/Jpeg/Final.jpg"),
                'mask_bg' => null,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
//            kitchen-white views
            [
                'scene_id' => 3,
                'name' => 'view1',
                'description' => 'White Kitchen - View1',
                'data_view' => 'View1',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => null,
                'transparent_bg' => public_path("img/kitchen-white/View1/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-white/View1/Jpeg/Final.jpg"),
                'mask_bg' => null,
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 3,
                'name' => 'view2',
                'description' => 'White Kitchen - View2',
                'data_view' => 'View2',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => null,
                'transparent_bg' => public_path("img/kitchen-white/View2/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-white/View2/Jpeg/Final.jpg"),
                'mask_bg' => null,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 3,
                'name' => 'view3',
                'description' => 'White Kitchen - View3',
                'data_view' => 'View3',
                'transparent_bg_file_name' => "Background.jpg",
                'black_bg_file_name' => "Final.jpg",
                'mask_bg_file_name' => null,
                'transparent_bg' => public_path("img/kitchen-white/View3/Jpeg/Background.jpg"),
                'black_bg' => public_path("img/kitchen-white/View3/Jpeg/Final.jpg"),
                'mask_bg' => null,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataViewItems = [
//            kitchen-black view1 items
            [
                'view_id' => 1,
                'category_id' => 1,
                'div_class' => 'wall',
                'width' => 39,
                'height' => 15,
                'top' => 48,
                'bottom' => null,
                'left' => 30.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 3,
                'div_class' => 'chairs',
                'width' => 24,
                'height' => 20,
                'top' => 66,
                'bottom' => null,
                'left' => 56,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 2,
                'div_class' => 'floor1',
                'width' => 17,
                'height' => 20,
                'top' => null,
                'bottom' => 0,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 2,
                'div_class' => 'floor2',
                'width' => 15,
                'height' => 34,
                'top' => null,
                'bottom' => 0,
                'left' => null,
                'right' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 4,
                'div_class' => 'lamps',
                'width' => 55,
                'height' => 47,
                'top' => 0,
                'bottom' => null,
                'left' => null,
                'right' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-black view2 items
            [
                'view_id' => 2,
                'category_id' => 1,
                'div_class' => 'wall',
                'width' => 34,
                'height' => 17,
                'top' => 47,
                'bottom' => null,
                'left' => 18.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 3,
                'div_class' => 'chairs',
                'width' => 13.5,
                'height' => 25,
                'top' => 63,
                'bottom' => null,
                'left' => 64,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 2,
                'div_class' => 'floor1',
                'width' => 33,
                'height' => 12,
                'top' => null,
                'bottom' => 0,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 2,
                'div_class' => 'floor2',
                'width' => 22.5,
                'height' => 34,
                'top' => null,
                'bottom' => 0,
                'left' => null,
                'right' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 4,
                'div_class' => 'lamps',
                'width' => 44,
                'height' => 47,
                'top' => 0,
                'bottom' => null,
                'left' => null,
                'right' => 37.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-black view3 items
            [
                'view_id' => 3,
                'category_id' => 1,
                'div_class' => 'wall',
                'width' => 66,
                'height' => 27,
                'top' => 44,
                'bottom' => null,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 3,
                'category_id' => 3,
                'div_class' => 'chairs',
                'width' => 54.5,
                'height' => 17,
                'top' => null,
                'bottom' => 0,
                'left' => 30,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 3,
                'category_id' => 4,
                'div_class' => 'lamps',
                'width' => 66,
                'height' => 44,
                'top' => 0,
                'bottom' => null,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-red view1 items
            [
                'view_id' => 4,
                'category_id' => 1,
                'div_class' => 'wall',
                'width' => 22,
                'height' => 14.5,
                'top' => 47,
                'bottom' => null,
                'left' => 39,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 4,
                'category_id' => 2,
                'div_class' => 'floor1',
                'width' => 100,
                'height' => 21,
                'top' => null,
                'bottom' => 0,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 4,
                'category_id' => 4,
                'div_class' => 'lamps',
                'width' => 57,
                'height' => 46.5,
                'top' => 0,
                'bottom' => null,
                'left' => 21.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-red view2 items
            [
                'view_id' => 5,
                'category_id' => 1,
                'div_class' => 'wall',
                'width' => 33.5,
                'height' => 22,
                'top' => 46,
                'bottom' => null,
                'left' => 31.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 5,
                'category_id' => 4,
                'div_class' => 'lamps',
                'width' => 86,
                'height' => 46,
                'top' => 0,
                'bottom' => null,
                'left' => 5.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-red view3 items
            [
                'view_id' => 6,
                'category_id' => 1,
                'div_class' => 'wall',
                'width' => 67.5,
                'height' => 42,
                'top' => 34,
                'bottom' => null,
                'left' => 7,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-white view1 items
            [
                'view_id' => 7,
                'category_id' => 3,
                'div_class' => 'chairs',
                'width' => 25.5,
                'height' => 37.5,
                'top' => null,
                'bottom' => 0,
                'left' => 40.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor1',
                'width' => 40.5,
                'height' => 18,
                'top' => null,
                'bottom' => 0,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor2',
                'width' => 16,
                'height' => 21,
                'top' => null,
                'bottom' => 8,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor3',
                'width' => 9,
                'height' => 33,
                'top' => null,
                'bottom' => 0,
                'left' => null,
                'right' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor4',
                'width' => 23.5,
                'height' => 18,
                'top' => null,
                'bottom' => 0,
                'left' => null,
                'right' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 4,
                'div_class' => 'lamps',
                'width' => 32.5,
                'height' => 59,
                'top' => 0,
                'bottom' => null,
                'left' => 39.5,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-white view2 items
            [
                'view_id' => 8,
                'category_id' => 2,
                'div_class' => 'floor1',
                'width' => 40.5,
                'height' => 18,
                'top' => null,
                'bottom' => 0,
                'left' => 18,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 8,
                'category_id' => 2,
                'div_class' => 'floor2',
                'width' => 17.5,
                'height' => 18,
                'top' => null,
                'bottom' => 13,
                'left' => 32,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-white view3 items
            [
                'view_id' => 9,
                'category_id' => 3,
                'div_class' => 'chairs',
                'width' => 30,
                'height' => 44,
                'top' => null,
                'bottom' => 0,
                'left' => null,
                'right' => 38.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 9,
                'category_id' => 2,
                'div_class' => 'floor1',
                'width' => 31.5,
                'height' => 33,
                'top' => null,
                'bottom' => 0,
                'left' => 0,
                'right' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 9,
                'category_id' => 2,
                'div_class' => 'floor2',
                'width' => 14.5,
                'height' => 15,
                'top' => null,
                'bottom' => 0,
                'left' => null,
                'right' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $saveData = array_merge([], $data);
        DB::table('views')->insert(
            collect($saveData)->map(function ($item) {
                return collect($item)->except([
                    'transparent_bg_file_name',
                    'black_bg_file_name',
                    'mask_bg_file_name',
                    'transparent_bg',
                    'black_bg',
                    'mask_bg',
                    'data_view'
                ])->toArray();
            })->toArray()
        );
        DB::table('view_items')->insert($dataViewItems);

        $views = View::all();
        foreach ($views as $view) {
            $foundItem = collect($data)->first(function ($item) use ($view) {
                if ($item['data_view'] == ucfirst($view->name) && $item['scene_id'] == $view->scene_id) {
                    return $item;
                }
            });
            if ($foundItem) {
                $manager = ImageManager::gd();
                $transparent_img = $manager->read($foundItem['transparent_bg']);
                $fileName = uniqid(rand(), false).'_'.$foundItem['transparent_bg_file_name'];
                $transparent_img->save(storage_path('app/public/'.$fileName));
                $transparent_bg_image = new Image();
                $transparent_bg_image->type = 'transparent_bg';
                $transparent_bg_image->path = $fileName;
                $view->images()->save($transparent_bg_image);
                $transparent_bg_image->save();

                $black_img = $manager->read($foundItem['black_bg']);
                $fileName = uniqid(rand(), false).'_'.$foundItem['black_bg_file_name'];
                $black_img->save(storage_path('app/public/'.$fileName));
                $black_bg_image = new Image();
                $black_bg_image->type = 'black_bg';
                $black_bg_image->path = $fileName;
                $view->images()->save($black_bg_image);
                $black_bg_image->save();

                if ($foundItem['mask_bg']) {
                    $mask_img = $manager->read($foundItem['mask_bg']);
                    $fileName = uniqid(rand(), false).'_'.$foundItem['mask_bg_file_name'];
                    $mask_img->save(storage_path('app/public/'.$fileName));
                    $mask_bg_image = new Image();
                    $mask_bg_image->type = 'mask_bg';
                    $mask_bg_image->path = $fileName;
                    $view->images()->save($mask_bg_image);
                    $mask_bg_image->save();
                }
            }
        }
    }
}
