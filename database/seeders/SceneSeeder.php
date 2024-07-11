<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Black Kitchen',
                'slug' => 'kitchen-black',
                'img_class' => 'black',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Kitchen',
                'slug' => 'kitchen-red',
                'img_class' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White Kitchen',
                'slug' => 'kitchen-white',
                'img_class' => 'white',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('scenes')->insert($data);
    }
}
