<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Wall Panels',
                'data_mask' => 'wall-pattern',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Floor Covering',
                'data_mask' => 'floor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chairs',
                'data_mask' => 'chairs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lamps',
                'data_mask' => 'lamps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
