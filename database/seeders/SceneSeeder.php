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
                'sequence_number' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Kitchen',
                'slug' => 'kitchen-red',
                'sequence_number' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White Kitchen',
                'slug' => 'kitchen-white',
                'sequence_number' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('scenes')->insert($data);
    }
}
