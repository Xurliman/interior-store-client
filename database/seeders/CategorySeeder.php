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
                'div_class' => 'fartuks',
                'img_class' => 'fartuk-img',
                'class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Floor Covering',
                'div_id' => 'floor',
                'data_mask' => 'floor',
                'div_class' => 'portuquets',
                'img_class' => 'portuquet-img',
                'class' => 'floor-custom-img',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chairs',
                'div_id' => 'chair',
                'data_mask' => 'chairs',
                'div_class' => 'bar-stools',
                'img_class' => 'bar-stool-img',
                'class' => 'custom-chairs-img',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lamps',
                'div_id' => 'lamp',
                'data_mask' => 'lamps',
                'div_class' => 'lamps',
                'img_class' => 'lamp-img',
                'class' => 'custom-lamps-img',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
