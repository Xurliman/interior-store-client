<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.qq',
            'password' => bcrypt('securepass'),
        ]);

        Role::create([
            'id' => 1,
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user->assignRole('admin');

        /** @var User $user */
        $user = User::factory()->create([
            'name' => 'Khurliman',
            'email' => 'jumamuratovahurliman8@gmail.com',
            'password' => bcrypt('securepassword'),
        ]);

        Role::create([
            'id' => 2,
            'name' => 'manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user->assignRole('manager');

        $setting = Setting::create([
            'company_name' => 'Fantom',
            'company_phone' => '+47 94 163 884',
            'company_email' => 'no-reply@fantomstudio.uz',
            'company_url' => 'www.fantomstudio.uz',
            'currency' => 'dollar',
            'currency_symbol' => '$',
            'timezone' => 'Asia/Tashkent',
        ]);

        $newFileName = uniqid(rand(), false).'_mainlogo.svg';
        Storage::putFileAs('public',public_path('img/mainlogo.svg'), $newFileName);
        $setting->images()->create([
            'type' => 'transparent_bg',
            'path' => $newFileName,
        ]);
    }
}
