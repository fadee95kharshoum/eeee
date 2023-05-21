<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'name' => 'Guest',
            'email' => 'Guest@Guest.Guest',
            'phone' => '123456789',
            'case' => 'test_case',
            'subject' => 'Lorem, ipsum dolor sit amet consectetur adipisicing ut Nihil, facere!'
        ]);
    }
}
