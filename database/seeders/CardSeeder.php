<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array('GooglePlay', 'Itunz', 'Rezer', 'Play Staion');
        for ($i=0; $i < count($objects); $i++) {
            Card::create([
                'name' => $objects[$i],
                'status' => true,
            ]);
        }
        $customObjects = array('Paypal', 'Payyer', 'USDT');
        for ($i=0; $i < count($customObjects); $i++) {
            Card::create([
                'name' => $customObjects[$i],
                'status' => true,
            ]);
        }

    }
}
