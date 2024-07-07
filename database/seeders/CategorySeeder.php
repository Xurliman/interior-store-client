<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Wall Panels',
                'div_id' => 'wall-pattern',
                'data_mask' => 'wall-pattern',
                'class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Floor Covering',
                'div_id' => 'floor',
                'data_mask' => 'floor',
                'class' => 'floor-custom-img',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chairs',
                'div_id' => 'chair',
                'data_mask' => 'chairs',
                'class' => 'custom-chairs-img',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lamps',
                'div_id' => 'lamp',
                'data_mask' => 'lamps',
                'class' => 'custom-lamps-img',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
