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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Kitchen',
                'slug' => 'kitchen-red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White Kitchen',
                'slug' => 'kitchen-white',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('scenes')->insert($data);
    }
}
