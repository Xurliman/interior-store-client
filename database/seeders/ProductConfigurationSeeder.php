<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'btn_class' => 'object-fartuk-btn',
                'data_object' => 'fartuk1',
                'class' => 'fartuk',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'btn_class' => 'object-fartuk-btn',
                'data_object' => 'fartuk2',
                'class' => 'fartuk',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'btn_class' => 'object-fartuk-btn',
                'data_object' => 'fartuk3',
                'class' => 'fartuk',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 4,
                'btn_class' => 'object-parquet-btn',
                'data_object' => 'parquet1',
                'class' => 'parquet',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'btn_class' => 'object-parquet-btn',
                'data_object' => 'parquet2',
                'class' => 'parquet',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'btn_class' => 'object-parquet-btn',
                'data_object' => 'parquet3',
                'class' => 'parquet',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'btn_class' => 'object-parquet-btn',
                'data_object' => 'parquet4',
                'class' => 'parquet',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'btn_class' => 'object-parquet-btn',
                'data_object' => 'parquet5',
                'class' => 'parquet',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 9,
                'btn_class' => 'object-bar-stool-btn',
                'data_object' => 'BarStool1',
                'class' => 'chair',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'btn_class' => 'object-bar-stool-btn',
                'data_object' => 'BarStool2',
                'class' => 'chair',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 11,
                'btn_class' => 'object-bar-stool-btn',
                'data_object' => 'BarStool3',
                'class' => 'chair',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 12,
                'btn_class' => 'object-bar-stool-btn',
                'data_object' => 'BarStool4',
                'class' => 'chair',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 13,
                'btn_class' => 'object-bar-stool-btn',
                'data_object' => 'BarStool5',
                'class' => 'chair',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 14,
                'btn_class' => 'object-bar-stool-btn',
                'data_object' => 'BarStool6',
                'class' => 'chair',
                'extra_class' => 'kitchen-white-chair',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'product_id' => 15,
                'btn_class' => 'object-lamp-btn',
                'data_object' => 'Lamp1',
                'class' => 'lamp',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 16,
                'btn_class' => 'object-lamp-btn',
                'data_object' => 'Lamp2',
                'class' => 'lamp',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 17,
                'btn_class' => 'object-lamp-btn',
                'data_object' => 'Lamp3',
                'class' => 'lamp',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 18,
                'btn_class' => 'object-lamp-btn',
                'data_object' => 'Lamp4',
                'class' => 'lamp',
                'extra_class' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 19,
                'btn_class' => 'object-lamp-btn',
                'data_object' => 'Lamp5',
                'class' => 'lamp',
                'extra_class' => 'kitchen-white-lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 20,
                'btn_class' => 'object-lamp-btn',
                'data_object' => 'Lamp6',
                'class' => 'lamp',
                'extra_class' => 'kitchen-red-lamp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('product_configurations')->insert($data);
    }
}
