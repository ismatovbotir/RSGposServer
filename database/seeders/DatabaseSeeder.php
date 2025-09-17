<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Department;
use App\Models\Price;
use App\Models\PriceChecker;
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

        $company=Company::create([
            'name'=>'My Company'

        ]);

        $company->users()->create([
            'id'=>1,
            'name'=>'Admin',
            'email'=>'price@pos.uz',
            'password'=>Hash::make('qwerty2025')
        ]);
        $company->departments()->create([
            'id'=>1,
            'user_id'=>1,
            'name'=>"Department",
        ]);

        $company->prices()->create(
            [
                'id'=>1,
                
                'name'=>'buy'
            ]
        );
        $company->prices()->create(
            
            [
                'id'=>2,
                'name'=>'sell'
            ]
        );
        $company->shops()->create([
            'id'=>1,
            
            'name'=>'Shop',
            'price_id'=>2
        ]);
        
        PriceChecker::create([
            'shop_id'=>1,
            'name'=>"PriceChecker 1"
        ]);
    }
}
