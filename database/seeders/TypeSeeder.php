<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 4; $i++) {
            for ($j=5; $j < 26; $j = $j+5) {
                Type::create([
                    'name' => $j,
                    'daily_price' => 5000,
                    'placeholder' => 'xjfid-njdsa-hgkaar-jfsdfng',
                    'card_id' => $i,
                    'status' => true,
                ]);
            }
        }
        for ($i=1; $i <8 ; $i++) {
            Type::create([
                'name' => 'custom',
                'daily_price' => 5000,
                'placeholder' => 'xjfid-njdsa-hgkaar-jfsdfng',
                'card_id' => $i,
                'status' => true,
            ]);
        }
    }
}
