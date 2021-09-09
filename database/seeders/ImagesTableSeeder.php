<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

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
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_01.jpg', 'path' => '/images/sculpture_le_therianthrope_01.jpg', 'size' => 200000, 'width' => 1394, 'height' => 1046, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_02.jpg', 'path' => '/images/sculpture_le_therianthrope_02.jpg', 'size' => 30400, 'width' => 349, 'height' => 228, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_03.jpg', 'path' => '/images/sculpture_le_therianthrope_03.jpg', 'size' => 420000, 'width' => 1390, 'height' => 1854, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_04.jpg', 'path' => '/images/sculpture_le_therianthrope_04.jpg', 'size' => 1019000, 'width' => 2448, 'height' => 1836, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_05.jpg', 'path' => '/images/sculpture_le_therianthrope_05.jpg', 'size' => 1110000, 'width' => 2125, 'height' => 1594, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 2, 'name' => 'meuble_console_01.jpg', 'path' => '/images/meuble_console_01.jpg', 'size' => 695000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 2, 'name' => 'meuble_console_02.jpg', 'path' => '/images/meuble_console_02.jpg', 'size' => 723000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 2, 'name' => 'meuble_console_03.jpg', 'path' => '/images/meuble_console_03.jpg', 'size' => 630000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_01.jpg', 'path' => '/images/meuble_table_basse_01.jpg', 'size' => 599000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [   
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_02.jpg', 'path' => '/images/meuble_table_basse_02.jpg', 'size' => 683000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_03.jpg', 'path' => '/images/meuble_table_basse_03.jpg', 'size' => 776000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_04.jpg', 'path' => '/images/meuble_table_basse_04.jpg', 'size' => 625000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 4, 'name' => 'lampe_cailloux_033b_01.jpg', 'path' => '/images/lampe_cailloux_033b_01.jpg', 'size' => 798000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 4, 'name' => 'lampe_cailloux_033b_02.jpg', 'path' => '/images/lampe_cailloux_033b_02.jpg', 'size' => 645000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 5, 'name' => 'meuble_tables_gigognes_01.jpg', 'path' => '/images/meuble_tables_gigognes_01.jpg', 'size' => 689000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 5, 'name' => 'meuble_tables_gigognes_02.jpg', 'path' => '/images/meuble_tables_gigognes_02.jpg', 'size' => 677000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 5, 'name' => 'meuble_tables_gigognes_03.jpg', 'path' => '/images/meuble_tables_gigognes_03.jpg', 'size' => 632000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 6, 'name' => 'lampe_cailloux_033a_01.jpg', 'path' => '/images/lampe_cailloux_033a_01.jpg', 'size' => 546000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 6, 'name' => 'lampe_cailloux_033a_02.jpg', 'path' => '/images/lampe_cailloux_033a_02.jpg', 'size' => 828000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_01.jpg', 'path' => '/images/lampe_chandelier_030a_01.jpg', 'size' => 535000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_02.jpg', 'path' => '/images/lampe_chandelier_030a_02.jpg', 'size' => 452000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_03.jpg', 'path' => '/images/lampe_chandelier_030a_03.jpg', 'size' => 585000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_04.jpg', 'path' => '/images/lampe_chandelier_030a_04.jpg', 'size' => 481000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 8, 'name' => 'lampe_fusee_033b_01.jpg', 'path' => '/images/lampe_fusee_033b_01.jpg', 'size' => 578000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 8, 'name' => 'lampe_fusee_033b_02.jpg', 'path' => '/images/lampe_fusee_033b_02.jpg', 'size' => 521000, 'width' => 2560, 'height' => 1919, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            
            [
                'portfolio_id' => 8, 'name' => 'lampe_fusee_033b_03.jpg', 'path' => '/images/lampe_fusee_033b_03.jpg', 'size' => 652000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 9, 'name' => 'lampe_z_032_01.jpg', 'path' => '/images/lampe_z_032_01.jpg', 'size' => 619000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 9, 'name' => 'lampe_z_032_02.jpg', 'path' => '/images/lampe_z_032_02.jpg', 'size' => 701000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 9, 'name' => 'lampe_z_032_03.jpg', 'path' => '/images/lampe_z_032_01.jpg', 'size' => 645000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_01.jpg', 'path' => '/images/lampes_cailloux_01.jpg', 'size' => 804000, 'width' => 2257, 'height' => 1693, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_02.jpg', 'path' => '/images/lampes_cailloux_02.jpg', 'size' => 817000, 'width' => 2185, 'height' => 1638, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_03.jpg', 'path' => '/images/lampes_cailloux_03.jpg', 'size' => 920000, 'width' => 2288, 'height' => 1726, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_04.jpg', 'path' => '/images/lampes_cailloux_04.jpg', 'size' => 996000, 'width' => 2416, 'height' => 1812, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_05.jpg', 'path' => '/images/lampes_cailloux_05.jpg', 'size' => 1030000, 'width' => 2372, 'height' => 1779, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_06.jpg', 'path' => '/images/lampes_cailloux_06.jpg', 'size' => 1050000, 'width' => 2400, 'height' => 1800, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 11, 'name' => 'meuble_table_basse_marie_christine_01.jpg', 'path' => '/images/meuble_table_basse_marie_christine_01.jpg', 'size' => 726000, 'width' => 2040, 'height' => 1530, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 11, 'name' => 'meuble_table_basse_marie_christine_02.jpg', 'path' => '/images/meuble_table_basse_marie_christine_02.jpg', 'size' => 783000, 'width' => 2040, 'height' => 1530, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes damier_029_01.jpg', 'path' => '/images/lampes damier_029_01.jpg', 'size' => 640000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes damier_029_02.jpg', 'path' => '/images/lampes damier_029_02.jpg', 'size' => 807000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes damier_029_03.jpg', 'path' => '/images/lampes damier_029_03.jpg', 'size' => 644000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes damier_029_04.jpg', 'path' => '/images/lampes damier_029_04.jpg', 'size' => 657000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes damier_029_05.jpg', 'path' => '/images/lampes damier_029_05.jpg', 'size' => 736000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_01.jpg', 'path' => '/images/lampe_industrielle_028_01.jpg', 'size' => 410000, 'width' => 1854, 'height' => 1484, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_02.jpg', 'path' => '/images/lampe_industrielle_028_02.jpg', 'size' => 405000, 'width' => 1840, 'height' => 1472, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_03.jpg', 'path' => '/images/lampe_industrielle_028_03.jpg', 'size' => 324000, 'width' => 1749, 'height' => 1399, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_04.jpg', 'path' => '/images/lampe_industrielle_028_04.jpg', 'size' => 453000, 'width' => 1817, 'height' => 1454, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 14, 'name' => 'lampe_bois_brule_027_01.jpg', 'path' => '/images/lampe_bois_brule_027_01.jpg', 'size' => 796000, 'width' => 1480, 'height' => 1480, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 14, 'name' => 'lampe_bois_brule_027_02.jpg', 'path' => '/images/lampe_bois_brule_027_02.jpg', 'size' => 480000, 'width' => 1502, 'height' => 1502, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 14, 'name' => 'lampe_bois_brule_027_03.jpg', 'path' => '/images/lampe_bois_brule_027_03.jpg', 'size' => 844000, 'width' => 1530, 'height' => 1530, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 15, 'name' => 'lampe_bonhomme_025_01.jpg', 'path' => '/images/lampe_bonhomme_025_01.jpg', 'size' => 388000, 'width' => 1982, 'height' => 1485, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 15, 'name' => 'lampe_bonhomme_025_02.jpg', 'path' => '/images/lampe_bonhomme_025_02.jpg', 'size' => 730000, 'width' => 2048, 'height' => 1638, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_01.jpg', 'path' => '/images/meuble_table_basse_015_01.jpg', 'size' => 740000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_02.jpg', 'path' => '/images/meuble_table_basse_015_02.jpg', 'size' => 1740000, 'width' => 2448, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_03.jpg', 'path' => '/images/meuble_table_basse_015_03.jpg', 'size' => 1270000, 'width' => 2448, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_04.jpg', 'path' => '/images/meuble_table_basse_015_04.jpg', 'size' => 1260000, 'width' => 2448, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
        );

        $images2 = array(
            ['name' => '1920x1080.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1080.jpg', 'height' => 1080, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '1920x1200.jpg', 'description' => '', 'path' => '/images/portfolio/1920x1200.jpg', 'height' => 1200, 'width' => 1920, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => '3200x1080.jpg', 'description' => '', 'path' => '/images/portfolio/3200x1080.jpg', 'height' => 1800, 'width' => 3200, 'created_at' => new DateTime, 'updated_at' => new DateTime],
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
