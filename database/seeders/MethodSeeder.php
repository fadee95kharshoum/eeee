<?php

namespace Database\Seeders;

use App\Models\Method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array('Al-Haram', 'Syriatel Cash', 'By Hand', 'Al-Fouad', 'USDT');
        for ($i=0; $i < count($objects); $i++) { 
            Method::create([
                'name' => $objects[$i],
                'status' => true
            ]);
        }
    }
}
