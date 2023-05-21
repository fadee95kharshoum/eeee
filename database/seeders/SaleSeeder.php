<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            'name' => 'Fadee',
            'email' => 'Fadee@Fadee.com',
            'phone' => '123456789',
            'tr_nb' => '123456789',
            'tr_img' => 'CardForSale/img1.png',
            'discount_id' => 1,
        ]);
    }
}
