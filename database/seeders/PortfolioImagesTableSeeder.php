<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class PortfolioImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_images')->delete();
        $images = array(
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_01.jpg', 'path' => '/images/sculpture_le_therianthrope_01.jpg', 'thumbnail_path' => '/images/sculpture_le_therianthrope_01_thumbnail.jpg', 'size' => 200000, 'width' => 1394, 'height' => 1046, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_02.jpg', 'path' => '/images/sculpture_le_therianthrope_02.jpg', 'thumbnail_path' => '/images/sculpture_le_therianthrope_02_thumbnail.jpg', 'size' => 30400, 'width' => 349, 'height' => 228, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_03.jpg', 'path' => '/images/sculpture_le_therianthrope_03.jpg', 'thumbnail_path' => '/images/sculpture_le_therianthrope_03_thumbnail.jpg', 'size' => 420000, 'width' => 1390, 'height' => 1854, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_04.jpg', 'path' => '/images/sculpture_le_therianthrope_04.jpg', 'thumbnail_path' => '/images/sculpture_le_therianthrope_04_thumbnail.jpg', 'size' => 1019000, 'width' => 2448, 'height' => 1836, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 1, 'name' => 'sculpture_le_therianthrope_05.jpg', 'path' => '/images/sculpture_le_therianthrope_05.jpg', 'thumbnail_path' => '/images/sculpture_le_therianthrope_05_thumbnail.jpg', 'size' => 1110000, 'width' => 2125, 'height' => 1594, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 2, 'name' => 'meuble_console_01.jpg', 'path' => '/images/meuble_console_01.jpg', 'thumbnail_path' => '/images/meuble_console_01_thumbnail.jpg', 'size' => 695000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 2, 'name' => 'meuble_console_02.jpg', 'path' => '/images/meuble_console_02.jpg', 'thumbnail_path' => '/images/meuble_console_02_thumbnail.jpg', 'size' => 723000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 2, 'name' => 'meuble_console_03.jpg', 'path' => '/images/meuble_console_03.jpg', 'thumbnail_path' => '/images/meuble_console_03_thumbnail.jpg', 'size' => 630000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_01.jpg', 'path' => '/images/meuble_table_basse_01.jpg', 'thumbnail_path' => '/images/meuble_table_basse_01_thumbnail.jpg', 'size' => 599000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [   
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_02.jpg', 'path' => '/images/meuble_table_basse_02.jpg', 'thumbnail_path' => '/images/meuble_table_basse_02_thumbnail.jpg', 'size' => 683000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_03.jpg', 'path' => '/images/meuble_table_basse_03.jpg', 'thumbnail_path' => '/images/meuble_table_basse_03_thumbnail.jpg', 'size' => 776000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 3, 'name' => 'meuble_table_basse_04.jpg', 'path' => '/images/meuble_table_basse_04.jpg', 'thumbnail_path' => '/images/meuble_table_basse_04_thumbnail.jpg', 'size' => 625000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 4, 'name' => 'lampe_cailloux_033b_01.jpg', 'path' => '/images/lampe_cailloux_033b_01.jpg', 'thumbnail_path' => '/images/lampe_cailloux_033b_01_thumbnail.jpg', 'size' => 798000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 4, 'name' => 'lampe_cailloux_033b_02.jpg', 'path' => '/images/lampe_cailloux_033b_02.jpg', 'thumbnail_path' => '/images/lampe_cailloux_033b_02_thumbnail.jpg', 'size' => 645000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 5, 'name' => 'meuble_tables_gigognes_01.jpg', 'path' => '/images/meuble_tables_gigognes_01.jpg', 'thumbnail_path' => '/images/meuble_tables_gigognes_01_thumbnail.jpg', 'size' => 689000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 5, 'name' => 'meuble_tables_gigognes_02.jpg', 'path' => '/images/meuble_tables_gigognes_02.jpg', 'thumbnail_path' => '/images/meuble_tables_gigognes_02_thumbnail.jpg', 'size' => 677000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 5, 'name' => 'meuble_tables_gigognes_03.jpg', 'path' => '/images/meuble_tables_gigognes_03.jpg', 'thumbnail_path' => '/images/meuble_tables_gigognes_03_thumbnail.jpg', 'size' => 632000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 6, 'name' => 'lampe_cailloux_033a_01.jpg', 'path' => '/images/lampe_cailloux_033a_01.jpg', 'thumbnail_path' => '/images/lampe_cailloux_033a_01_thumbnail.jpg', 'size' => 546000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 6, 'name' => 'lampe_cailloux_033a_02.jpg', 'path' => '/images/lampe_cailloux_033a_02.jpg', 'thumbnail_path' => '/images/lampe_cailloux_033a_02_thumbnail.jpg', 'size' => 828000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_01.jpg', 'path' => '/images/lampe_chandelier_030a_01.jpg', 'thumbnail_path' => '/images/lampe_chandelier_030a_01_thumbnail.jpg', 'size' => 535000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_02.jpg', 'path' => '/images/lampe_chandelier_030a_02.jpg', 'thumbnail_path' => '/images/lampe_chandelier_030a_02_thumbnail.jpg', 'size' => 452000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_03.jpg', 'path' => '/images/lampe_chandelier_030a_03.jpg', 'thumbnail_path' => '/images/lampe_chandelier_030a_03_thumbnail.jpg', 'size' => 585000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 7, 'name' => 'lampe_chandelier_030a_04.jpg', 'path' => '/images/lampe_chandelier_030a_04.jpg', 'thumbnail_path' => '/images/lampe_chandelier_030a_04_thumbnail.jpg', 'size' => 481000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 8, 'name' => 'lampe_fusee_033b_01.jpg', 'path' => '/images/lampe_fusee_033b_01.jpg', 'thumbnail_path' => '/images/lampe_fusee_033b_01_thumbnail.jpg', 'size' => 578000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 8, 'name' => 'lampe_fusee_033b_02.jpg', 'path' => '/images/lampe_fusee_033b_02.jpg', 'thumbnail_path' => '/images/lampe_fusee_033b_02_thumbnail.jpg', 'size' => 521000, 'width' => 2560, 'height' => 1919, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 8, 'name' => 'lampe_fusee_033b_03.jpg', 'path' => '/images/lampe_fusee_033b_03.jpg', 'thumbnail_path' => '/images/lampe_fusee_033b_03_thumbnail.jpg', 'size' => 652000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 9, 'name' => 'lampe_z_032_01.jpg', 'path' => '/images/lampe_z_032_01.jpg', 'thumbnail_path' => '/images/lampe_z_032_01_thumbnail.jpg', 'size' => 619000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 9, 'name' => 'lampe_z_032_02.jpg', 'path' => '/images/lampe_z_032_02.jpg', 'thumbnail_path' => '/images/lampe_z_032_02_thumbnail.jpg', 'size' => 701000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 9, 'name' => 'lampe_z_032_03.jpg', 'path' => '/images/lampe_z_032_01.jpg', 'thumbnail_path' => '/images/lampe_z_032_03_thumbnail.jpg', 'size' => 645000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_01.jpg', 'path' => '/images/lampes_cailloux_01.jpg', 'thumbnail_path' => '/images/lampes_cailloux_01_thumbnail.jpg', 'size' => 804000, 'width' => 2257, 'height' => 1693, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_02.jpg', 'path' => '/images/lampes_cailloux_02.jpg', 'thumbnail_path' => '/images/lampes_cailloux_02_thumbnail.jpg', 'size' => 817000, 'width' => 2185, 'height' => 1638, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_03.jpg', 'path' => '/images/lampes_cailloux_03.jpg', 'thumbnail_path' => '/images/lampes_cailloux_03_thumbnail.jpg', 'size' => 920000, 'width' => 2288, 'height' => 1726, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_04.jpg', 'path' => '/images/lampes_cailloux_04.jpg', 'thumbnail_path' => '/images/lampes_cailloux_04_thumbnail.jpg', 'size' => 996000, 'width' => 2416, 'height' => 1812, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_05.jpg', 'path' => '/images/lampes_cailloux_05.jpg', 'thumbnail_path' => '/images/lampes_cailloux_05_thumbnail.jpg', 'size' => 1030000, 'width' => 2372, 'height' => 1779, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 10, 'name' => 'lampes_cailloux_06.jpg', 'path' => '/images/lampes_cailloux_06.jpg', 'thumbnail_path' => '/images/lampes_cailloux_06_thumbnail.jpg', 'size' => 1050000, 'width' => 2400, 'height' => 1800, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 11, 'name' => 'meuble_table_basse_marie_christine_01.jpg', 'path' => '/images/meuble_table_basse_marie_christine_01.jpg', 'thumbnail_path' => '/images/meuble_table_basse_marie_christine_01_thumbnail.jpg', 'size' => 726000, 'width' => 2040, 'height' => 1530, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 11, 'name' => 'meuble_table_basse_marie_christine_02.jpg', 'path' => '/images/meuble_table_basse_marie_christine_02.jpg', 'thumbnail_path' => '/images/meuble_table_basse_marie_christine_02_thumbnail.jpg', 'size' => 783000, 'width' => 2040, 'height' => 1530, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes_damier_029_01.jpg', 'path' => '/images/lampes_damier_029_01.jpg', 'thumbnail_path' => '/images/lampes_damier_029_01_thumbnail.jpg', 'size' => 640000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes_damier_029_02.jpg', 'path' => '/images/lampes_damier_029_02.jpg', 'thumbnail_path' => '/images/lampes_damier_029_02_thumbnail.jpg', 'size' => 807000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes_damier_029_03.jpg', 'path' => '/images/lampes_damier_029_03.jpg', 'thumbnail_path' => '/images/lampes_damier_029_03_thumbnail.jpg', 'size' => 644000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes_damier_029_04.jpg', 'path' => '/images/lampes_damier_029_04.jpg', 'thumbnail_path' => '/images/lampes_damier_029_04_thumbnail.jpg', 'size' => 657000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 12, 'name' => 'lampes_damier_029_05.jpg', 'path' => '/images/lampes_damier_029_05.jpg', 'thumbnail_path' => '/images/lampes_damier_029_05_thumbnail.jpg', 'size' => 736000, 'width' => 2560, 'height' => 1920, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_01.jpg', 'path' => '/images/lampe_industrielle_028_01.jpg', 'thumbnail_path' => '/images/lampe_industrielle_028_01_thumbnail.jpg', 'size' => 410000, 'width' => 1854, 'height' => 1484, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_02.jpg', 'path' => '/images/lampe_industrielle_028_02.jpg', 'thumbnail_path' => '/images/lampe_industrielle_028_02_thumbnail.jpg', 'size' => 405000, 'width' => 1840, 'height' => 1472, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_03.jpg', 'path' => '/images/lampe_industrielle_028_03.jpg', 'thumbnail_path' => '/images/lampe_industrielle_028_03_thumbnail.jpg', 'size' => 324000, 'width' => 1749, 'height' => 1399, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 13, 'name' => 'lampe_industrielle_028_04.jpg', 'path' => '/images/lampe_industrielle_028_04.jpg', 'thumbnail_path' => '/images/lampe_industrielle_028_04_thumbnail.jpg', 'size' => 453000, 'width' => 1817, 'height' => 1454, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 14, 'name' => 'lampe_bois_brule_027_01.jpg', 'path' => '/images/lampe_bois_brule_027_01.jpg', 'thumbnail_path' => '/images/lampe_bois_brule_027_01_thumbnail.jpg', 'size' => 796000, 'width' => 1480, 'height' => 1480, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 14, 'name' => 'lampe_bois_brule_027_02.jpg', 'path' => '/images/lampe_bois_brule_027_02.jpg', 'thumbnail_path' => '/images/lampe_bois_brule_027_02_thumbnail.jpg', 'size' => 480000, 'width' => 1502, 'height' => 1502, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 14, 'name' => 'lampe_bois_brule_027_03.jpg', 'path' => '/images/lampe_bois_brule_027_03.jpg', 'thumbnail_path' => '/images/lampe_bois_brule_027_03_thumbnail.jpg', 'size' => 844000, 'width' => 1530, 'height' => 1530, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 15, 'name' => 'lampe_bonhomme_025_01.jpg', 'path' => '/images/lampe_bonhomme_025_01.jpg', 'thumbnail_path' => '/images/lampe_bonhomme_025_01_thumbnail.jpg', 'size' => 388000, 'width' => 1982, 'height' => 1485, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 15, 'name' => 'lampe_bonhomme_025_02.jpg', 'path' => '/images/lampe_bonhomme_025_02.jpg', 'thumbnail_path' => '/images/lampe_bonhomme_025_02_thumbnail.jpg', 'size' => 730000, 'width' => 2048, 'height' => 1638, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_01.jpg', 'path' => '/images/meuble_table_basse_015_01.jpg', 'thumbnail_path' => '/images/meuble_table_basse_015_01_thumbnail.jpg', 'size' => 740000, 'width' => 2560, 'height' => 1920, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_02.jpg', 'path' => '/images/meuble_table_basse_015_02.jpg', 'thumbnail_path' => '/images/meuble_table_basse_015_02_thumbnail.jpg', 'size' => 1740000, 'width' => 2448, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_03.jpg', 'path' => '/images/meuble_table_basse_015_03.jpg', 'thumbnail_path' => '/images/meuble_table_basse_015_03_thumbnail.jpg', 'size' => 1270000, 'width' => 2448, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 16, 'name' => 'meuble_table_basse_015_04.jpg', 'path' => '/images/meuble_table_basse_015_04.jpg', 'thumbnail_path' => '/images/meuble_table_basse_015_04_thumbnail.jpg', 'size' => 1260000, 'width' => 2448, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 17, 'name' => 'lampes_023_et_024_01.jpg', 'path' => '/images/lampes_023_et_024_01.jpg', 'thumbnail_path' => '/images/lampes_023_et_024_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 17, 'name' => 'lampes_023_et_024_02.jpg', 'path' => '/images/lampes_023_et_024_02.jpg', 'thumbnail_path' => '/images/lampes_023_et_024_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3188, 'height' => 2391, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 17, 'name' => 'lampes_023_et_024_03.jpg', 'path' => '/images/lampes_023_et_024_03.jpg', 'thumbnail_path' => '/images/lampes_023_et_024_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_01.jpg', 'path' => '/images/lampes_018_01.jpg', 'thumbnail_path' => '/images/lampes_018_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3202, 'height' => 2401, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_02.jpg', 'path' => '/images/lampes_018_02.jpg', 'thumbnail_path' => '/images/lampes_018_02_thumbnail.jpg', 'size' => 1260000, 'width' => 2920, 'height' => 2186, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_03.jpg', 'path' => '/images/lampes_018_03.jpg', 'thumbnail_path' => '/images/lampes_018_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_04.jpg', 'path' => '/images/lampes_018_04.jpg', 'thumbnail_path' => '/images/lampes_018_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_05.jpg', 'path' => '/images/lampes_018_05.jpg', 'thumbnail_path' => '/images/lampes_018_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_06.jpg', 'path' => '/images/lampes_018_06.jpg', 'thumbnail_path' => '/images/lampes_018_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 18, 'name' => 'lampes_018_07.jpg', 'path' => '/images/lampes_023_et_024_07.jpg', 'thumbnail_path' => '/images/lampes_018_07_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 19, 'name' => 'lampe_velo_015_01.jpg', 'path' => '/images/lampe_velo_015_01.jpg', 'thumbnail_path' => '/images/lampe_velo_015_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 19, 'name' => 'lampe_velo_015_02.jpg', 'path' => '/images/lampe_velo_015_02.jpg', 'thumbnail_path' => '/images/lampe_velo_015_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3078, 'height' => 2308, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 19, 'name' => 'lampe_velo_015_03.jpg', 'path' => '/images/lampe_velo_015_03.jpg', 'thumbnail_path' => '/images/lampe_velo_015_03_thumbnail.jpg', 'size' => 1260000, 'width' => 2994, 'height' => 2245, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 19, 'name' => 'lampe_velo_015_04.jpg', 'path' => '/images/lampe_velo_015_04.jpg', 'thumbnail_path' => '/images/lampe_velo_015_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 20, 'name' => 'miroir_D011_D012_D013_01.jpg', 'path' => '/images/miroir_D011_D012_D013_01.jpg', 'thumbnail_path' => '/images/miroir_D011_D012_D013_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 20, 'name' => 'miroir_D011_D012_D013_02.jpg', 'path' => '/images/miroir_D011_D012_D013_02.jpg', 'thumbnail_path' => '/images/miroir_D011_D012_D013_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 20, 'name' => 'miroir_D011_D012_D013_03.jpg', 'path' => '/images/miroir_D011_D012_D013_03.jpg', 'thumbnail_path' => '/images/miroir_D011_D012_D013_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 20, 'name' => 'miroir_D011_D012_D013_04.jpg', 'path' => '/images/miroir_D011_D012_D013_04.jpg', 'thumbnail_path' => '/images/miroir_D011_D012_D013_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 20, 'name' => 'miroir_D011_D012_D013_05.jpg', 'path' => '/images/miroir_D011_D012_D013_05.jpg', 'thumbnail_path' => '/images/miroir_D011_D012_D013_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 20, 'name' => 'miroir_D011_D012_D013_06.jpg', 'path' => '/images/miroir_D011_D012_D013_06.jpg', 'thumbnail_path' => '/images/miroir_D011_D012_D013_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 21, 'name' => 'miroir_D010_01.jpg', 'path' => '/images/miroir_D010_01.jpg', 'thumbnail_path' => '/images/miroir_D010_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 21, 'name' => 'miroir_D010_02.jpg', 'path' => '/images/miroir_D010_02.jpg', 'thumbnail_path' => '/images/miroir_D010_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 21, 'name' => 'miroir_D010_03.jpg', 'path' => '/images/miroir_D010_03.jpg', 'thumbnail_path' => '/images/miroir_D010_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 21, 'name' => 'miroir_D010_04.jpg', 'path' => '/images/miroir_D010_04.jpg', 'thumbnail_path' => '/images/miroir_D010_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 22, 'name' => 'lampe_L022_01.jpg', 'path' => '/images/lampe_L022_01.jpg', 'thumbnail_path' => '/images/lampe_L022_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 22, 'name' => 'lampe_L022_02.jpg', 'path' => '/images/lampe_L022_02.jpg', 'thumbnail_path' => '/images/lampe_L022_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 22, 'name' => 'lampe_L022_03.jpg', 'path' => '/images/lampe_L022_03.jpg', 'thumbnail_path' => '/images/lampe_L022_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 22, 'name' => 'lampe_L022_04.jpg', 'path' => '/images/lampe_L022_04.jpg', 'thumbnail_path' => '/images/lampe_L022_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 23, 'name' => 'lampe_L013_et_L014_01.jpg', 'path' => '/images/lampe_L013_et_L014_01.jpg', 'thumbnail_path' => '/images/lampe_L013_et_L014_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3060, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 23, 'name' => 'lampe_L013_et_L014_02.jpg', 'path' => '/images/lampe_L013_et_L014_02.jpg', 'thumbnail_path' => '/images/lampe_L013_et_L014_02_thumbnail.jpg', 'size' => 1260000, 'width' => 2564, 'height' => 2051, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 23, 'name' => 'lampe_L013_et_L014_03.jpg', 'path' => '/images/lampe_L013_et_L014_03.jpg', 'thumbnail_path' => '/images/lampe_L013_et_L014_03_thumbnail.jpg', 'size' => 1260000, 'width' => 2828, 'height' => 2118, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 24, 'name' => 'applique_L017_01.jpg', 'path' => '/images/applique_L017_01.jpg', 'thumbnail_path' => '/images/applique_L017_01_thumbnail.jpg', 'size' => 1260000, 'width' => 2371, 'height' => 1897, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 24, 'name' => 'applique_L017_02.jpg', 'path' => '/images/applique_L017_02.jpg', 'thumbnail_path' => '/images/applique_L017_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1611, 'height' => 1219, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 25, 'name' => 'commode_M012_01.jpg', 'path' => '/images/commode_M012_01.jpg', 'thumbnail_path' => '/images/commode_M012_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3159, 'height' => 2369, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 25, 'name' => 'commode_M012_02.jpg', 'path' => '/images/commode_M012_02.jpg', 'thumbnail_path' => '/images/commode_M012_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 25, 'name' => 'commode_M012_03.jpg', 'path' => '/images/commode_M012_03.jpg', 'thumbnail_path' => '/images/commode_M012_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 25, 'name' => 'commode_M012_04.jpg', 'path' => '/images/commode_M012_04.jpg', 'thumbnail_path' => '/images/commode_M012_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 25, 'name' => 'commode_M012_05.jpg', 'path' => '/images/commode_M012_05.jpg', 'thumbnail_path' => '/images/commode_M012_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 25, 'name' => 'commode_M012_06.jpg', 'path' => '/images/commode_M012_06.jpg', 'thumbnail_path' => '/images/commode_M012_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_01.jpg', 'path' => '/images/lampe_de_table_L009_01.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_02.jpg', 'path' => '/images/lampe_de_table_L009_02.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_03.jpg', 'path' => '/images/lampe_de_table_L009_03.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_04.jpg', 'path' => '/images/lampe_de_table_L009_04.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_05.jpg', 'path' => '/images/lampe_de_table_L009_05.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_06.jpg', 'path' => '/images/lampe_de_table_L009_06.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 26, 'name' => 'lampe_de_table_L009_07.jpg', 'path' => '/images/lampe_de_table_L009_07.jpg', 'thumbnail_path' => '/images/lampe_de_table_L009_07_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 27, 'name' => 'porte_manteau_M011_01.jpg', 'path' => '/images/porte_manteau_M011_01.jpg', 'thumbnail_path' => '/images/porte_manteau_M011_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 27, 'name' => 'porte_manteau_M011_02.jpg', 'path' => '/images/porte_manteau_M011_02.jpg', 'thumbnail_path' => '/images/porte_manteau_M011_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 27, 'name' => 'porte_manteau_M011_03.jpg', 'path' => '/images/porte_manteau_M011_03.jpg', 'thumbnail_path' => '/images/porte_manteau_M011_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 27, 'name' => 'porte_manteau_M011_04.jpg', 'path' => '/images/porte_manteau_M011_04.jpg', 'thumbnail_path' => '/images/porte_manteau_M011_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 27, 'name' => 'porte_manteau_M011_05.jpg', 'path' => '/images/porte_manteau_M011_05.jpg', 'thumbnail_path' => '/images/porte_manteau_M011_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3227, 'height' => 2420, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 27, 'name' => 'porte_manteau_M011_06.jpg', 'path' => '/images/porte_manteau_M011_06.jpg', 'thumbnail_path' => '/images/porte_manteau_M011_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 28, 'name' => 'miroir_D008_01.jpg', 'path' => '/images/miroir_D008_01.jpg', 'thumbnail_path' => '/images/miroir_D008_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 28, 'name' => 'miroir_D008_02.jpg', 'path' => '/images/miroir_D008_02.jpg', 'thumbnail_path' => '/images/miroir_D008_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 28, 'name' => 'miroir_D008_03.jpg', 'path' => '/images/miroir_D008_03.jpg', 'thumbnail_path' => '/images/miroir_D008_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 28, 'name' => 'miroir_D008_04.jpg', 'path' => '/images/miroir_D008_04.jpg', 'thumbnail_path' => '/images/miroir_D008_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 29, 'name' => 'miroir_D009_01.jpg', 'path' => '/images/miroir_D009_01.jpg', 'thumbnail_path' => '/images/miroir_D009_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3187, 'height' => 2390, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 29, 'name' => 'miroir_D009_02.jpg', 'path' => '/images/miroir_D009_02.jpg', 'thumbnail_path' => '/images/miroir_D009_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 29, 'name' => 'miroir_D009_03.jpg', 'path' => '/images/miroir_D009_03.jpg', 'thumbnail_path' => '/images/miroir_D009_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 29, 'name' => 'miroir_D009_04.jpg', 'path' => '/images/miroir_D009_04.jpg', 'thumbnail_path' => '/images/miroir_D009_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 29, 'name' => 'miroir_D009_05.jpg', 'path' => '/images/miroir_D009_05.jpg', 'thumbnail_path' => '/images/miroir_D009_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3187, 'height' => 2390, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 30, 'name' => 'table_basse_M010_01.jpg', 'path' => '/images/table_basse_M010_01.jpg', 'thumbnail_path' => '/images/table_basse_M010_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 30, 'name' => 'table_basse_M010_02.jpg', 'path' => '/images/table_basse_M010_02.jpg', 'thumbnail_path' => '/images/table_basse_M010_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 30, 'name' => 'table_basse_M010_03.jpg', 'path' => '/images/table_basse_M010_03.jpg', 'thumbnail_path' => '/images/table_basse_M010_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 31, 'name' => 'lampe_L011_01.jpg', 'path' => '/images/lampe_L011_01.jpg', 'thumbnail_path' => '/images/lampe_L011_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 31, 'name' => 'lampe_L011_02.jpg', 'path' => '/images/lampe_L011_02.jpg', 'thumbnail_path' => '/images/lampe_L011_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 31, 'name' => 'lampe_L011_03.jpg', 'path' => '/images/lampe_L011_03.jpg', 'thumbnail_path' => '/images/lampe_L011_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 31, 'name' => 'lampe_L011_04.jpg', 'path' => '/images/lampe_L011_04.jpg', 'thumbnail_path' => '/images/lampe_L011_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 31, 'name' => 'lampe_L011_05.jpg', 'path' => '/images/lampe_L011_05.jpg', 'thumbnail_path' => '/images/lampe_L011_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 32, 'name' => 'miroir_D007_01.jpg', 'path' => '/images/miroir_D007_01.jpg', 'thumbnail_path' => '/images/miroir_D007_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 32, 'name' => 'miroir_D007_02.jpg', 'path' => '/images/miroir_D007_02.jpg', 'thumbnail_path' => '/images/miroir_D007_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 32, 'name' => 'miroir_D007_03.jpg', 'path' => '/images/miroir_D007_03.jpg', 'thumbnail_path' => '/images/miroir_D007_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 32, 'name' => 'miroir_D007_04.jpg', 'path' => '/images/miroir_D007_04.jpg', 'thumbnail_path' => '/images/miroir_D007_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 33, 'name' => 'lampe_L010_01.jpg', 'path' => '/images/lampe_L010_01.jpg', 'thumbnail_path' => '/images/lampe_L010_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 33, 'name' => 'lampe_L010_02.jpg', 'path' => '/images/lampe_L010_02.jpg', 'thumbnail_path' => '/images/lampe_L010_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 33, 'name' => 'lampe_L010_03.jpg', 'path' => '/images/lampe_L010_03.jpg', 'thumbnail_path' => '/images/lampe_L010_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 33, 'name' => 'lampe_L010_04.jpg', 'path' => '/images/lampe_L010_04.jpg', 'thumbnail_path' => '/images/lampe_L010_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 33, 'name' => 'lampe_L010_05.jpg', 'path' => '/images/lampe_L010_05.jpg', 'thumbnail_path' => '/images/lampe_L010_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 33, 'name' => 'lampe_L010_06.jpg', 'path' => '/images/lampe_L010_06.jpg', 'thumbnail_path' => '/images/lampe_L010_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 34, 'name' => 'chaise_basse_napoleon_III_M003_01.jpg', 'path' => '/images/chaise_basse_napoleon_III_M003_01.jpg', 'thumbnail_path' => '/images/chaise_basse_napoleon_III_M003_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 34, 'name' => 'chaise_basse_napoleon_III_M003_02.jpg', 'path' => '/images/chaise_basse_napoleon_III_M003_02.jpg', 'thumbnail_path' => '/images/chaise_basse_napoleon_III_M003_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 34, 'name' => 'chaise_basse_napoleon_III_M003_03.jpg', 'path' => '/images/chaise_basse_napoleon_III_M003_03.jpg', 'thumbnail_path' => '/images/chaise_basse_napoleon_III_M003_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 34, 'name' => 'chaise_basse_napoleon_III_M003_04.jpg', 'path' => '/images/chaise_basse_napoleon_III_M003_04.jpg', 'thumbnail_path' => '/images/chaise_basse_napoleon_III_M003_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 34, 'name' => 'chaise_basse_napoleon_III_M003_05.jpg', 'path' => '/images/chaise_basse_napoleon_III_M003_05.jpg', 'thumbnail_path' => '/images/chaise_basse_napoleon_III_M003_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 35, 'name' => 'siege_M001_01.jpg', 'path' => '/images/siege_M001_01.jpg', 'thumbnail_path' => '/images/siege_M001_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 35, 'name' => 'siege_M001_02.jpg', 'path' => '/images/siege_M001_02.jpg', 'thumbnail_path' => '/images/siege_M001_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 35, 'name' => 'siege_M001_03.jpg', 'path' => '/images/siege_M001_03.jpg', 'thumbnail_path' => '/images/siege_M001_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 36, 'name' => 'lampe_L005_01.jpg', 'path' => '/images/lampe_L005_01.jpg', 'thumbnail_path' => '/images/lampe_L005_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 36, 'name' => 'lampe_L005_02.jpg', 'path' => '/images/lampe_L005_02.jpg', 'thumbnail_path' => '/images/lampe_L005_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 36, 'name' => 'lampe_L005_03.jpg', 'path' => '/images/lampe_L005_03.jpg', 'thumbnail_path' => '/images/lampe_L005_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 36, 'name' => 'lampe_L005_04.jpg', 'path' => '/images/lampe_L005_04.jpg', 'thumbnail_path' => '/images/lampe_L005_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 36, 'name' => 'lampe_L005_05.jpg', 'path' => '/images/lampe_L005_05.jpg', 'thumbnail_path' => '/images/lampe_L005_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 37, 'name' => 'tableau_rouages_T010_01.jpg', 'path' => '/images/tableau_rouages_T010_01.jpg', 'thumbnail_path' => '/images/tableau_rouages_T010_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 37, 'name' => 'tableau_rouages_T010_02.jpg', 'path' => '/images/tableau_rouages_T010_02.jpg', 'thumbnail_path' => '/images/tableau_rouages_T010_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 37, 'name' => 'tableau_rouages_T010_03.jpg', 'path' => '/images/tableau_rouages_T010_03.jpg', 'thumbnail_path' => '/images/tableau_rouages_T010_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 38, 'name' => 'tableau_T011_01.jpg', 'path' => '/images/tableau_T011_01.jpg', 'thumbnail_path' => '/images/tableau_T011_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 38, 'name' => 'tableau_T011_02.jpg', 'path' => '/images/tableau_T011_02.jpg', 'thumbnail_path' => '/images/tableau_T011_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_01.jpg', 'path' => '/images/lampe_L003_01.jpg', 'thumbnail_path' => '/images/lampe_L003_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_02.jpg', 'path' => '/images/lampe_L003_02.jpg', 'thumbnail_path' => '/images/lampe_L003_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_03.jpg', 'path' => '/images/lampe_L003_03.jpg', 'thumbnail_path' => '/images/lampe_L003_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_04.jpg', 'path' => '/images/lampe_L003_04.jpg', 'thumbnail_path' => '/images/lampe_L003_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_05.jpg', 'path' => '/images/lampe_L003_05.jpg', 'thumbnail_path' => '/images/lampe_L003_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_06.jpg', 'path' => '/images/lampe_L003_06.jpg', 'thumbnail_path' => '/images/lampe_L003_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_07.jpg', 'path' => '/images/lampe_L003_07.jpg', 'thumbnail_path' => '/images/lampe_L003_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_08.jpg', 'path' => '/images/lampe_L003_08.jpg', 'thumbnail_path' => '/images/lampe_L003_08_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 39, 'name' => 'lampe_L003_09.jpg', 'path' => '/images/lampe_L003_09.jpg', 'thumbnail_path' => '/images/lampe_L003_09_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 40, 'name' => 'lampe_L004_01.jpg', 'path' => '/images/lampe_L004_01.jpg', 'thumbnail_path' => '/images/lampe_L004_01_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 40, 'name' => 'lampe_L004_02.jpg', 'path' => '/images/lampe_L004_02.jpg', 'thumbnail_path' => '/images/lampe_L004_02_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 40, 'name' => 'lampe_L004_03.jpg', 'path' => '/images/lampe_L004_03.jpg', 'thumbnail_path' => '/images/lampe_L004_03_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 40, 'name' => 'lampe_L004_04.jpg', 'path' => '/images/lampe_L004_04.jpg', 'thumbnail_path' => '/images/lampe_L004_04_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 40, 'name' => 'lampe_L004_05.jpg', 'path' => '/images/lampe_L004_05.jpg', 'thumbnail_path' => '/images/lampe_L004_05_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 40, 'name' => 'lampe_L004_06.jpg', 'path' => '/images/lampe_L004_06.jpg', 'thumbnail_path' => '/images/lampe_L004_06_thumbnail.jpg', 'size' => 1260000, 'width' => 3264, 'height' => 2448, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_01.jpg', 'path' => '/images/lampe_L006_01.jpg', 'thumbnail_path' => '/images/lampe_L006_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_02.jpg', 'path' => '/images/lampe_L006_02.jpg', 'thumbnail_path' => '/images/lampe_L006_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_03.jpg', 'path' => '/images/lampe_L006_03.jpg', 'thumbnail_path' => '/images/lampe_L006_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_04.jpg', 'path' => '/images/lampe_L006_04.jpg', 'thumbnail_path' => '/images/lampe_L006_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_05.jpg', 'path' => '/images/lampe_L006_05.jpg', 'thumbnail_path' => '/images/lampe_L006_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_06.jpg', 'path' => '/images/lampe_L006_06.jpg', 'thumbnail_path' => '/images/lampe_L006_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 41, 'name' => 'lampe_L006_07.jpg', 'path' => '/images/lampe_L006_07.jpg', 'thumbnail_path' => '/images/lampe_L006_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_001.jpg', 'path' => '/images/lampe_de_table_007_001.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_001_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_002.jpg', 'path' => '/images/lampe_de_table_007_002.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_002_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_003.jpg', 'path' => '/images/lampe_de_table_007_003.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_003_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_004.jpg', 'path' => '/images/lampe_de_table_007_004.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_004_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_005.jpg', 'path' => '/images/lampe_de_table_007_005.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_005_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_006.jpg', 'path' => '/images/lampe_de_table_007_006.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_006_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_007.jpg', 'path' => '/images/lampe_de_table_007_007.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_007_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_008.jpg', 'path' => '/images/lampe_de_table_007_008.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_008_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 42, 'name' => 'lampe_de_table_007_009.jpg', 'path' => '/images/lampe_de_table_007_009.jpg', 'thumbnail_path' => '/images/lampe_de_table_007_009_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_01.jpg', 'path' => '/images/commode_M002_01.jpg', 'thumbnail_path' => '/images/commode_M002_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_02.jpg', 'path' => '/images/commode_M002_02.jpg', 'thumbnail_path' => '/images/commode_M002_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_03.jpg', 'path' => '/images/commode_M002_03.jpg', 'thumbnail_path' => '/images/commode_M002_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_04.jpg', 'path' => '/images/commode_M002_04.jpg', 'thumbnail_path' => '/images/commode_M002_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_05.jpg', 'path' => '/images/commode_M002_05.jpg', 'thumbnail_path' => '/images/commode_M002_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_06.jpg', 'path' => '/images/commode_M002_06.jpg', 'thumbnail_path' => '/images/commode_M002_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_07.jpg', 'path' => '/images/commode_M002_07.jpg', 'thumbnail_path' => '/images/commode_M002_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 43, 'name' => 'commode_M002_08.jpg', 'path' => '/images/commode_M002_08.jpg', 'thumbnail_path' => '/images/commode_M002_08_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 44, 'name' => 'miroir_D003_01.jpg', 'path' => '/images/miroir_D003_01.jpg', 'thumbnail_path' => '/images/miroir_D003_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 44, 'name' => 'miroir_D003_02.jpg', 'path' => '/images/miroir_D003_02.jpg', 'thumbnail_path' => '/images/miroir_D003_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 44, 'name' => 'miroir_D003_03.jpg', 'path' => '/images/miroir_D003_03.jpg', 'thumbnail_path' => '/images/miroir_D003_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 44, 'name' => 'miroir_D003_04.jpg', 'path' => '/images/miroir_D003_04.jpg', 'thumbnail_path' => '/images/miroir_D003_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 44, 'name' => 'miroir_D003_05.jpg', 'path' => '/images/miroir_D003_05.jpg', 'thumbnail_path' => '/images/miroir_D003_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 44, 'name' => 'miroir_D003_06.jpg', 'path' => '/images/miroir_D003_06.jpg', 'thumbnail_path' => '/images/miroir_D003_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 45, 'name' => 'miroir_D004_01.jpg', 'path' => '/images/miroir_D004_01.jpg', 'thumbnail_path' => '/images/miroir_D004_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 45, 'name' => 'miroir_D004_02.jpg', 'path' => '/images/miroir_D004_02.jpg', 'thumbnail_path' => '/images/miroir_D004_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 45, 'name' => 'miroir_D004_03.jpg', 'path' => '/images/miroir_D004_03.jpg', 'thumbnail_path' => '/images/miroir_D004_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 45, 'name' => 'miroir_D004_04.jpg', 'path' => '/images/miroir_D004_04.jpg', 'thumbnail_path' => '/images/miroir_D004_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 45, 'name' => 'miroir_D004_05.jpg', 'path' => '/images/miroir_D004_05.jpg', 'thumbnail_path' => '/images/miroir_D004_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_01.jpg', 'path' => '/images/miroir_D005_01.jpg', 'thumbnail_path' => '/images/miroir_D005_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_02.jpg', 'path' => '/images/miroir_D005_02.jpg', 'thumbnail_path' => '/images/miroir_D005_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_03.jpg', 'path' => '/images/miroir_D005_03.jpg', 'thumbnail_path' => '/images/miroir_D005_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_04.jpg', 'path' => '/images/miroir_D005_04.jpg', 'thumbnail_path' => '/images/miroir_D005_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_05.jpg', 'path' => '/images/miroir_D005_05.jpg', 'thumbnail_path' => '/images/miroir_D005_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_06.jpg', 'path' => '/images/miroir_D005_06.jpg', 'thumbnail_path' => '/images/miroir_D005_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 46, 'name' => 'miroir_D005_07.jpg', 'path' => '/images/miroir_D005_07.jpg', 'thumbnail_path' => '/images/miroir_D005_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 47, 'name' => 'table_basse_M006_01.jpg', 'path' => '/images/table_basse_M006_01.jpg', 'thumbnail_path' => '/images/table_basse_M006_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 47, 'name' => 'table_basse_M006_02.jpg', 'path' => '/images/table_basse_M006_02.jpg', 'thumbnail_path' => '/images/table_basse_M006_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 47, 'name' => 'table_basse_M006_03.jpg', 'path' => '/images/table_basse_M006_03.jpg', 'thumbnail_path' => '/images/table_basse_M006_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 47, 'name' => 'table_basse_M006_04.jpg', 'path' => '/images/table_basse_M006_04.jpg', 'thumbnail_path' => '/images/table_basse_M006_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 47, 'name' => 'table_basse_M006_05.jpg', 'path' => '/images/table_basse_M006_05.jpg', 'thumbnail_path' => '/images/table_basse_M006_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_01.jpg', 'path' => '/images/sculpture_002_01.jpg', 'thumbnail_path' => '/images/sculpture_002_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_02.jpg', 'path' => '/images/sculpture_002_02.jpg', 'thumbnail_path' => '/images/sculpture_002_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_03.jpg', 'path' => '/images/sculpture_002_03.jpg', 'thumbnail_path' => '/images/sculpture_002_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_04.jpg', 'path' => '/images/sculpture_002_04.jpg', 'thumbnail_path' => '/images/sculpture_002_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_05.jpg', 'path' => '/images/sculpture_002_05.jpg', 'thumbnail_path' => '/images/sculpture_002_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_06.jpg', 'path' => '/images/sculpture_002_06.jpg', 'thumbnail_path' => '/images/sculpture_002_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 48, 'name' => 'sculpture_002_07.jpg', 'path' => '/images/sculpture_002_07.jpg', 'thumbnail_path' => '/images/sculpture_002_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_01.jpg', 'path' => '/images/sculpture_001_01.jpg', 'thumbnail_path' => '/images/sculpture_001_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_02.jpg', 'path' => '/images/sculpture_001_02.jpg', 'thumbnail_path' => '/images/sculpture_001_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_03.jpg', 'path' => '/images/sculpture_001_03.jpg', 'thumbnail_path' => '/images/sculpture_001_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_04.jpg', 'path' => '/images/sculpture_001_04.jpg', 'thumbnail_path' => '/images/sculpture_001_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_05.jpg', 'path' => '/images/sculpture_001_05.jpg', 'thumbnail_path' => '/images/sculpture_001_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_06.jpg', 'path' => '/images/sculpture_001_06.jpg', 'thumbnail_path' => '/images/sculpture_001_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 49, 'name' => 'sculpture_001_07.jpg', 'path' => '/images/sculpture_001_07.jpg', 'thumbnail_path' => '/images/sculpture_001_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_01.jpg', 'path' => '/images/table_basse_M005_01.jpg', 'thumbnail_path' => '/images/table_basse_M005_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_02.jpg', 'path' => '/images/table_basse_M005_02.jpg', 'thumbnail_path' => '/images/table_basse_M005_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_03.jpg', 'path' => '/images/table_basse_M005_03.jpg', 'thumbnail_path' => '/images/table_basse_M005_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_04.jpg', 'path' => '/images/table_basse_M005_04.jpg', 'thumbnail_path' => '/images/table_basse_M005_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_05.jpg', 'path' => '/images/table_basse_M005_05.jpg', 'thumbnail_path' => '/images/table_basse_M005_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_06.jpg', 'path' => '/images/table_basse_M005_06.jpg', 'thumbnail_path' => '/images/table_basse_M005_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 50, 'name' => 'table_basse_M005_07.jpg', 'path' => '/images/table_basse_M005_07.jpg', 'thumbnail_path' => '/images/table_basse_M005_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_01.jpg', 'path' => '/images/lampe_de_table_L008_01.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_02.jpg', 'path' => '/images/lampe_de_table_L008_02.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_03.jpg', 'path' => '/images/lampe_de_table_L008_03.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_04.jpg', 'path' => '/images/lampe_de_table_L008_04.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_05.jpg', 'path' => '/images/lampe_de_table_L008_05.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_06.jpg', 'path' => '/images/lampe_de_table_L008_06.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 51, 'name' => 'lampe_de_table_L008_07.jpg', 'path' => '/images/lampe_de_table_L008_07.jpg', 'thumbnail_path' => '/images/lampe_de_table_L008_07_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 52, 'name' => 'miroir_D006_01.jpg', 'path' => '/images/miroir_D006_01.jpg', 'thumbnail_path' => '/images/miroir_D006_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 52, 'name' => 'miroir_D006_02.jpg', 'path' => '/images/miroir_D006_02.jpg', 'thumbnail_path' => '/images/miroir_D006_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 52, 'name' => 'miroir_D006_03.jpg', 'path' => '/images/miroir_D006_03.jpg', 'thumbnail_path' => '/images/miroir_D006_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 52, 'name' => 'miroir_D006_04.jpg', 'path' => '/images/miroir_D006_04.jpg', 'thumbnail_path' => '/images/miroir_D006_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 52, 'name' => 'miroir_D006_05.jpg', 'path' => '/images/miroir_D006_05.jpg', 'thumbnail_path' => '/images/miroir_D006_05_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 52, 'name' => 'miroir_D006_06.jpg', 'path' => '/images/miroir_D006_06.jpg', 'thumbnail_path' => '/images/miroir_D006_06_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 53, 'name' => 'tableau_zen_T013_01.jpg', 'path' => '/images/tableau_zen_T013_01.jpg', 'thumbnail_path' => '/images/tableau_zen_T013_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 53, 'name' => 'tableau_zen_T013_02.jpg', 'path' => '/images/tableau_zen_T013_02.jpg', 'thumbnail_path' => '/images/tableau_zen_T013_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 53, 'name' => 'tableau_zen_T013_03.jpg', 'path' => '/images/tableau_zen_T013_03.jpg', 'thumbnail_path' => '/images/tableau_zen_T013_03_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 53, 'name' => 'tableau_zen_T013_04.jpg', 'path' => '/images/tableau_zen_T013_04.jpg', 'thumbnail_path' => '/images/tableau_zen_T013_04_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 54, 'name' => 'tableau_abstrait_T008_01.jpg', 'path' => '/images/tableau_abstrait_T008_01.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T008_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 54, 'name' => 'tableau_abstrait_T008_02.jpg', 'path' => '/images/tableau_abstrait_T008_02.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T008_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 55, 'name' => 'tableau_ca_gaze_T005_01.jpg', 'path' => '/images/tableau_ca_gaze_T005_01.jpg', 'thumbnail_path' => '/images/tableau_ca_gaze_T005_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 55, 'name' => 'tableau_ca_gaze_T005_02.jpg', 'path' => '/images/tableau_ca_gaze_T005_02.jpg', 'thumbnail_path' => '/images/tableau_ca_gaze_T005_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 56, 'name' => 'tableau_abstrait_T001_01.jpg', 'path' => '/images/tableau_abstrait_T001_01.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T001_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 56, 'name' => 'tableau_abstrait_T001_02.jpg', 'path' => '/images/tableau_abstrait_T001_02.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T001_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 57, 'name' => 'tableau_abstrait_T006_01.jpg', 'path' => '/images/tableau_abstrait_T006_01.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T006_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 57, 'name' => 'tableau_abstrait_T006_02.jpg', 'path' => '/images/tableau_abstrait_T006_02.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T006_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 58, 'name' => 'tableau_abstrait_T012_01.jpg', 'path' => '/images/tableau_abstrait_T012_01.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T012_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 58, 'name' => 'tableau_abstrait_T012_02.jpg', 'path' => '/images/tableau_abstrait_T012_02.jpg', 'thumbnail_path' => '/images/tableau_abstrait_T012_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 59, 'name' => 'tableau_bambou_T002_01.jpg', 'path' => '/images/tableau_bambou_T002_01.jpg', 'thumbnail_path' => '/images/tableau_bambou_T002_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 59, 'name' => 'tableau_bambou_T002_02.jpg', 'path' => '/images/tableau_bambou_T002_02.jpg', 'thumbnail_path' => '/images/tableau_bambou_T002_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 60, 'name' => 'tableau_nu_T004_01.jpg', 'path' => '/images/tableau_nu_T004_01.jpg', 'thumbnail_path' => '/images/tableau_nu_T004_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 60, 'name' => 'tableau_nu_T004_02.jpg', 'path' => '/images/tableau_nu_T004_02.jpg', 'thumbnail_path' => '/images/tableau_nu_T004_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 61, 'name' => 'tableau_T007_01.jpg', 'path' => '/images/tableau_T007_01.jpg', 'thumbnail_path' => '/images/tableau_T007_01_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime
            ],
            [
                'portfolio_id' => 61, 'name' => 'tableau_T007_02.jpg', 'path' => '/images/tableau_T007_02.jpg', 'thumbnail_path' => '/images/tableau_T007_02_thumbnail.jpg', 'size' => 1260000, 'width' => 1300, 'height' => 975, 'is_front_image' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime
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
        DB::table('portfolio_images')->insert($images);
    }
}
