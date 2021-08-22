<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->delete();
        $images = array(
            ['name' => '1920x1080.jpg', 'path' => '/images/slider/1920x1080.jpg'],
            ['name' => '1920x1200.jpg', 'path' => '/images/slider/1920x1200.jpg'],
            ['name' => '3200x1800.jpg', 'path' => '/images/slider/3200x1800.jpg'],
        );
        DB::table('slider')->insert($images);
    }
}
