<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'currency_id' => 1,
                'value' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'currency_id' => 1,
                'value' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'currency_id' => 1,
                'value' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 4,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 9,
                'currency_id' => 1,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'currency_id' => 1,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 11,
                'currency_id' => 1,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 12,
                'currency_id' => 1,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 13,
                'currency_id' => 1,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 14,
                'currency_id' => 1,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 15,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 16,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 17,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 19,
                'currency_id' => 1,
                'value' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('prices')->insert($data);
    }
}
