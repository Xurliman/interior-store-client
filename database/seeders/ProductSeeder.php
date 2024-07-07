<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'category_id' => 1,
                'name' => 'Black Wall Panel',
                'description' => 'Black Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Grey Wall Panel',
                'description' => 'Grey Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Yellow Wall Panel',
                'description' => 'Yellow Wall Panel',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'category_id' => 2,
                'name' => 'Grey Floor Covering',
                'description' => 'Grey Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Brown Floor Covering',
                'description' => 'Brown Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Yellow Floor Covering',
                'description' => 'Yellow Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Black Floor Covering',
                'description' => 'Black Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'White Floor Covering',
                'description' => 'White Floor Covering',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'category_id' => 3,
                'name' => 'Black Chair',
                'description' => 'Black Chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Light Grey Chair',
                'description' => 'Light Grey Chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Yellow Chair',
                'description' => 'Yellow Chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Grey Chair',
                'description' => 'Grey Chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'White Chair',
                'description' => 'White Chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Total Black Chair',
                'description' => 'Total Black Chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'category_id' => 4,
                'name' => 'Black Lamp',
                'description' => 'Black Lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Mini Lamp',
                'description' => 'Mini Lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Timber Lamp',
                'description' => 'Timber Lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Complex Lamp',
                'description' => 'Complex Lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'White Lamp',
                'description' => 'White Lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($data);
    }
}
