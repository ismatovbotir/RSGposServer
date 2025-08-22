<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Price;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id'=>1,
            'name'=>'Admin',
            'email'=>'price@pos.uz',
            'password'=>Hash::make('qwerty2025')
        ]);
        Company::create([
            'id'=>1,
            'name'=>'Retail Service Group'

        ]);
        Price::create([
            [
                'id'=>1,
                'name'=>'buy'
            ],
            [
                'id'=>2,
                'name'=>'sell'
            ]
        ]);
        Shop::create([
            'id'=>1,
            'name'=>'Shop',
            'price_id'=>2
        ]);
    }
}
