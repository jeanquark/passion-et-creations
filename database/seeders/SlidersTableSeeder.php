<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Datetime;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->delete();
        $sliders = array(
            ['name' => 'Main slider', 'slug' => 'main_slider', 'section' => 'welcome', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'About slider', 'slug' => 'about_slider', 'section' => 'about', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('sliders')->insert($sliders);

        DB::table('slider_images')->delete();
        $slider_images = array(
            ['slider_id' => 1, 'image_path' => '/images/meuble_tables_gigognes_01.jpg', 'order' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['slider_id' => 1, 'image_path' => '/images/lampes damier_029_02.jpg', 'order' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['slider_id' => 1, 'image_path' => '/images/meuble_table_basse_01.jpg', 'order' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['slider_id' => 1, 'image_path' => '/images/lampes_018_01.jpg', 'order' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['slider_id' => 2, 'image_path' => '/images/creatrice_01.jpg', 'order' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['slider_id' => 2, 'image_path' => '/images/creatrice_02.jpg', 'order' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['slider_id' => 2, 'image_path' => '/images/creatrice_03.jpg', 'order' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('slider_images')->insert($slider_images);
    }
}
