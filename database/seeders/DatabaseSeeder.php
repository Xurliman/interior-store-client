<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.qq',
            'password' => bcrypt('securepass'),
        ]);

        $this->call([
            CategorySeeder::class,
            CurrencySeeder::class,
            ProductSeeder::class,
            ProductConfigurationSeeder::class,
            PriceSeeder::class,
            SceneSeeder::class,
            ViewSeeder::class
        ]);
    }
}
