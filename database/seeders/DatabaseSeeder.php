<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            CardSeeder::class,
            TypeSeeder::class,
            // UploadSeeder::class,
            // CustomSeeder::class,
            PaymentSeeder::class,
            ForSaleSeeder::class,
            DiscountSeeder::class,
            SaleSeeder::class,
            MethodSeeder::class,
            RequestSeeder::class,
            MessageSeeder::class,
            LandingSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
    }
}
