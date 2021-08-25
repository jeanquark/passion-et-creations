<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        $images = array(
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1200.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1200.jpg', 'height' => 1200, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '3200x1080.jpg', 'description' => '', 'path' => '/images/portfolio/3200x1080.jpg', 'height' => 1800, 'width' => 3200], 'created_at' => new DateTime, 'updated_at' => new DateTime,
            ['name' => '768x1080.jpg', 'description' => '', 'path' => '/images/portfolio/768x1080.jpg', 'height' => 1080, 'width' => 768, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1200.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1200.jpg', 'height' => 1200, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '3200x1080.jpg', 'description' => '', 'path' => '/images/portfolio/3200x1080.jpg', 'height' => 1800, 'width' => 3200, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '768x1080.jpg', 'description' => '', 'path' => '/images/portfolio/768x1080.jpg', 'height' => 1080, 'width' => 768, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1200.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1200.jpg', 'height' => 1200, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '3200x1080.jpg', 'description' => '', 'path' => '/images/portfolio/3200x1080.jpg', 'height' => 1800, 'width' => 3200, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '768x1080.jpg', 'description' => '', 'path' => '/images/portfolio/768x1080.jpg', 'height' => 1080, 'width' => 768, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1200.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1200.jpg', 'height' => 1200, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1200.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1200.jpg', 'height' => 1200, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '3200x1080.jpg', 'description' => '', 'path' => '/images/portfolio/3200x1080.jpg', 'height' => 1800, 'width' => 3200, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '3200x1080.jpg', 'description' => '', 'path' => '/images/portfolio/3200x1080.jpg', 'height' => 1800, 'width' => 3200, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '768x1080.jpg', 'description' => '', 'path' => '/images/portfolio/768x1080.jpg', 'height' => 1080, 'width' => 768, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '768x1080.jpg', 'description' => '', 'path' => '/images/portfolio/768x1080.jpg', 'height' => 1080, 'width' => 768, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('images')->insert($images);
    }
}
