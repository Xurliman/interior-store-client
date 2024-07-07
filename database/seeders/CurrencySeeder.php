<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'American dollar',
                'code' => 'USD',
                'symbol' => '$',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Euro',
                'code' => 'EUR',
                'symbol' => '€',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Russian ruble',
                'code' => 'RUB',
                'symbol' => '₽',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('currencies')->insert($data);
    }
}
