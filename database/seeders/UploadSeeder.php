<?php

namespace Database\Seeders;

use App\Models\Upload;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Upload::create([
            'value' => 'xgndr-emfdgh-mamgdd-nangb',
            'price' => 5000,
            'type_id' => 1,
            'user_id' => 3,
            'status' => 'Pendding',
        ]);
    }
}
