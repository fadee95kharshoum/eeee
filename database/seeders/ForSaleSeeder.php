<?php

namespace Database\Seeders;

use App\Models\ForSale;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array('GooglePlay', 'Paypal', 'Itunz', 'Rezer', 'Play Staion');
        for ($i=0; $i < count($objects); $i++) {
            ForSale::create([
                'name' => $objects[$i],
                'description' => 'Lorem LoremLorem Lorem Lorem Lorem Lorem',
                'path' => 'CardForSale/img1.png',
                'status' => true,
            ]);
        }
    }
}
