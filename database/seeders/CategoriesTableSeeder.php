<?php

namespace Database\Seeders;

use Datetime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = array(
            ['name' => 'Mobilier', 'slug' => 'mobilier', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Luminaires', 'slug' => 'luminaires', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Objects déco', 'slug' => 'objects-deco', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Tableaux', 'slug' => 'tableaux', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('categories')->insert($categories);
    }
}
