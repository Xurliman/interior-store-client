<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.qq',
            'password' => bcrypt('securepass'),
        ]);
        $user->assignRole('admin');
        Cart::create([
            'user_id' => $user->id,
        ]);
        $this->call([
            SceneSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CurrencySeeder::class,
            PriceSeeder::class,
            ViewSeeder::class,
            ProductConfigurationSeeder::class,
        ]);
    }
}
