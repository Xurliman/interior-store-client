<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViewSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
//            kitchen-black views
            [
                'scene_id' => 1,
                'name' => 'view1',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 1,
                'name' => 'view2',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 1,
                'name' => 'view3',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
//            kitchen-red views
            [
                'scene_id' => 2,
                'name' => 'view1',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 2,
                'name' => 'view2',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 2,
                'name' => 'view3',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
//            kitchen-white views
            [
                'scene_id' => 3,
                'name' => 'view1',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 3,
                'name' => 'view2',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'scene_id' => 3,
                'name' => 'view3',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataViewItems = [
//            kitchen-black view1 items
            [
                'view_id' => 1,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 1,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-black view2 items
            [
                'view_id' => 2,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 2,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-black view3 items
            [
                'view_id' => 3,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 3,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 3,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-red view1 items
            [
                'view_id' => 4,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 4,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 4,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-red view2 items
            [
                'view_id' => 5,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 5,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-red view3 items
            [
                'view_id' => 6,
                'div_class' => 'wall',
                'created_at' => now(),
                'updated_at' => now(),
            ],

//            kitchen-white view1 items
            [
                'view_id' => 7,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'div_class' => 'floor3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'div_class' => 'floor4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 7,
                'div_class' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-white view2 items
            [
                'view_id' => 8,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 8,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],


//            kitchen-white view3 items
            [
                'view_id' => 9,
                'div_class' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 9,
                'div_class' => 'floor1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'view_id' => 9,
                'div_class' => 'floor2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('views')->insert($data);
        DB::table('view_items')->insert($dataViewItems);
    }
}
