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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 3,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 2,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'category_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-black view2 items
            [
                'view_id' => 2,
                'category_id' => 1,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 3,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 2,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'category_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-black view3 items
            [
                'view_id' => 3,
                'category_id' => 1,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 3,
                'category_id' => 3,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 3,
                'category_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-red view1 items
            [
                'view_id' => 4,
                'category_id' => 1,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 4,
                'category_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 4,
                'category_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-red view2 items
            [
                'view_id' => 5,
                'category_id' => 1,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 5,
                'category_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-red view3 items
            [
                'view_id' => 6,
                'category_id' => 1,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-white view1 items
            [
                'view_id' => 7,
                'category_id' => 3,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 2,
                'div_class' => 'floor4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'category_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-white view2 items
            [
                'view_id' => 8,
                'category_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 8,
                'category_id' => 2,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-white view3 items
            [
                'view_id' => 9,
                'category_id' => 3,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 9,
                'category_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 9,
                'category_id' => 2,
                'div_class' => 'floor2',
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
                    'mask_bg'
                ])->toArray();
            })->toArray()
        );
        DB::table('view_items')->insert($dataViewItems);

        $views = View::all();
        foreach ($views as $view) {
            $foundItem = collect($data)->first(function ($item) use ($view) {
                if ($item['data_view'] == $view->data_view && $item['scene_id'] == $view->scene_id) {
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
