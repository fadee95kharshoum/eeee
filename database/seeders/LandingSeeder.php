<?php

namespace Database\Seeders;

use App\Models\Landing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Landing::create([
            'name' => 'Taste the Creativity',
            'description' => 'We make awesome graphic and web design',
            'path' => 'videoSlider/1.mp4',
            'section' => 'slide_video',
        ]);

        Landing::create([
            'name' => 'Taste the Creativity',
            'description' => 'We make awesome graphic and web design',
            'path' => 'ImagesSlider/uruguay-1920x1080.jpg',
            'section' => 'slide_image',
        ]);

        Landing::create([
            'name' => 'We are Good at',
            'description' => 'Some Of These Stuff Under',
            // 'path' => 'f',
            'section' => 'head',
        ]);
        Landing::create([
            'name' => 'graphic Design',
            'description' => 'Pellentesque in ipsum id orci porta. vivamus magna
            justo,lacinia eget
            consectetur sed,convallis at tellus.',
            'path' => 1,
            'icon' => 'tv',
            'section' => 'services',
        ]);
        Landing::create([
            'name' => 'graphic Design',
            'description' => 'Pellentesque in ipsum id orci porta. vivamus magna
            justo,lacinia eget
            consectetur sed,convallis at tellus.',
            'path' => 2,
            'icon' => 'pencil',
            'section' => 'services',
        ]);
        Landing::create([
            'name' => 'graphic Design',
            'description' => 'Pellentesque in ipsum id orci porta. vivamus magna
            justo,lacinia eget
            consectetur sed,convallis at tellus.',
            'path' => 3,
            'icon' => 'plug',
            'section' => 'services',
        ]);
        Landing::create([
            'name' => 'We Have A Discount',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste quidem, voluptatum facilis officiis nostrum adrepellat soluta corrupti, possimus accusantium in nesciunt, molestias minus illum aliquam sequi quod autem quia!',
            'path' => 'discountImage/IMG20220720110316_00.png',
            'section' => 'discount',
        ]);
        // Landing::create([
        //     'name' => 'We Have A Discount',
        //     'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste quidem, voluptatum facilis officiis
        //     nostrum ad
        //     repellat soluta corrupti, possimus accusantium in nesciunt, molestias minus illum aliquam sequi quod
        //     autem
        //     quia!',
        //     'path' => '',
        //     'section' => 'footer',
        // ]);
    }
}

