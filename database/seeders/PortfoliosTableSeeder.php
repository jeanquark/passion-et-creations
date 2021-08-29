<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Portfolio;
use Datetime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->delete();
        $portfolios = array(
            ['category_id' => rand(1, 4), 'front_image_id' => rand(1, 20), 'title' => 'Sculpture Le Thérianthrope', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Sculpture en béton, creuse soutenue par des fers à béton et posée sur des caisses.Inspirée du sculpteur lausannois Zaric et faite pour une exposition animalière collective qui a eu lieu en octobre 2019.</p><br /><b style="color: #8b8b8b">DIMENSION</b><br /><p>55 / 65 cm, H : 170 cm<br /></p><br /><b style="color: #8b8b8b">PRIX</b><br /><p>CHF 2\'100,00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => rand(1, 4), 'front_image_id' => rand(1, 20), 'title' => 'M-017 Console', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Console en bois de palette recyclé avec un tiroir central en bois flotté, structure en acier noirci.</p><br /><b style="color: #8b8b8b">DIMENSION</b><br /><p>101 / 33 cm, H : 86 cm<br /></p><br /><b style="color: #8b8b8b">PRIX</b><br /><p>CHF 590,00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => rand(1, 4), 'front_image_id' => rand(1, 20), 'title' => 'M-16 Table basse', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Table crée avec une jante et un couvercle de fût recyclés.</p><br /><b style="color: #8b8b8b">DIMENSION</b><br /><p>Diam : 60 cm, H : 41 cm<br /></p><br /><b style="color: #8b8b8b">PRIX</b><br /><p>Vendu</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => rand(1, 4), 'front_image_id' => rand(1, 20), 'title' => 'L-33b Lampe Cailloux', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br /><p>Lampe sculpture en cailloux, câble tissu soie torsadé ton gris et ampoule LED "Diamant".</p><br />
            <b style="color: #8b8b8b">DIMENSION</b><br /><p>H : 47 cm<br /></p><br /><b style="color: #8b8b8b">PRIX</b><br /><p>Lampe sans ampoule : CHF 210,00</p><p>Ampoule : CHF 40,00 pce</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => rand(1, 4), 'front_image_id' => rand(1, 20), 'title' => 'M-018 Tables gigognes', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br /><p>Tables en sapin vieilli et plaques en métal travaillés avec des acides, structure en métal.</p><br /><b style="color: #8b8b8b">DIMENSION</b><br /><p>75 / 75 cm, H : 41 cm<br /></p><br /><b style="color: #8b8b8b">PRIX</b><br /><p>Vendu</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-033a Lampe Cailloux', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Lampe sculpture en cailloux, câble tissu soie torsadé ton gris et ampoule LED "Diamant".</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H : 50 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>Lampe sans ampoule : CHF 210,00</p>
            <p>Ampoule : CHF 40,00 pce</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-030a "Chandelier"', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Lampe créée avec des pièces recyclées; arbre de boîte à vitesse, engrenages et pignons. Câble en tissu noir torsadé et ampoule LED "Diamant".</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H : 45 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>En vente chez <a href="https://www.facebook.com/Fleurs.de.Cel1176" target="_blank">Fleurs de Cél à St-Livres</a></p></p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-030b "Fusée"', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Lampe créée avec des pièces recyclées; arbre de boîte à vitesse, engrenages et pignons. Câble en tissu noir torsadé et ampoule LED super design.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H : 45 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>Lampe sans ampoule : CHF 310,00</p>
            <p>Ampoule : CHF 40,00 pce</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-032 Lampe "Z"', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Socle cubique en damier sapin giclé et béton, câble en tissu rouge et ampoule design. </p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>Cube : 14 / 14 / 14 cm, H avec ampoule : 55 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 255,00 </p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'Lampes cailloux ', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cailloux de diverses couleurs de beige à gris foncé avec douille et câble; rouge/rouge, doré/blanc ou anthracite/noir. Avec une très belle ampoule "guirlande".</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>Ø 12 à 14 cm, H 20 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 68,00 pce</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-014 Table basse Marie-Christine', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Ancien plateau de machine à coudre avec plaque de béton ciré, pieds en tubes sanitaires cirés couleur anthracite.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p><br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-029 Lampes damier', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Socle en chêne et béton ciré selon le modèle.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>17 / 17 cm, H 27 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 250.00 à CHF 275.00 selon modèle, sans ampoule</p>
            <p>Ampoule : CHF 30.00 à CHF 40.00 selon modèle</p>
            <p>Possibilité de mettre un câble en tissus design, divers couleurs à choix CHF 35.00 en supplément</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-028 Lampe industrielle', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pièces de moteur recyclées, abat-jour en acier. Patine pour métal.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 43 cm, abat-jour Ø 20 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 445.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-027 Lampe bois brûlé', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Socle en bois brûlé et béton ciré, douille céramique noire.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 30 cm, 11 / 11 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 240.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-025 Lampe Bonhomme', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Lampe bonhomme en tube sanitaire.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 32 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 195.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-015 Table basse', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Anciens fûts recyclés, patine sur métal.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 41 cm, Ø 60 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 380.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-023 et L-024 Lampes', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Socle en chêne massif, abat-jour en cuivre recouvert de peau de chèvrepoil.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 33 cm, abat-jour Ø 11 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>de 295.00 à CHF 380.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-018 Lampes', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Offre spéciale</p>
            <p>Socle en chêne massif, abat-jour en cuivre recouvert de cuir ou daim.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 33 cm, abat-jour Ø 11 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 210.00 pce</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-015 Lampe vélo', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Socle creux en chêne, abat-jour fait en pignons de vélo soudés.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 60 cm, abat-jour carré 30/30 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-011 / 012 / 013 Miroir', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois de 7,5 / 6 cm peint en bleu pétrole et gris avec effet vieilli puis ciré et patiné.</p>

            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 45 / L 45 cm <br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>Plus que 2 en vente chez <a href="https://www.facebook.com/Fleurs.de.Cel1176" target="_blank">Fleurs de Cél à St-Livres</a></p></p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-010 Miroir', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois avec 5couches de peinture de couleurs différentes mises à la spatule avec effet vieilli puis ciré et patiné. Anciennes équerres décoratives faites à la main.</p>
            <p>Peut être mis à l\'horizontale ou à la verticale.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 68 / L 138 cm <br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 415.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-022 Lampe', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Trépied en métal soudé avec des engrenages, fil électrique triple torsadé, abat-jour en tissu gris anthracite.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 76 cm, abat-jour Ø 40 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 445.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-013 et L-014 Lampe', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pied en bois ciré et patiné. Abat-jour en cuivre recouvert de tissu à trous couleur anthracite.</p>
            <p>Existe en 2 formats.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>Abat-jour Ø 30 cm.<br />
            <p>Grande: H 103 cm. Petite: H 83 cm.<br />
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>Grande L-013: VENDU</p>
            <p>Petite L-014: VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-017 Applique', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pièce de lierre ciré et patiné, tube sanitaire pour la partie électrique.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>H 65 / L 14 cm<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 210.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-012 Commode', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Bois ciré et patiné, 6 tiroirs: 2 en béton ciré, 2 en zinc et 2 en chambre à air de camion et pneu de vélo.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 120 / P 48 / H 80 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-009 Lampe de table', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pièce de bois cirée et patinée, 4 points de pose dont 2 sur écrous vieillis. Abat-jour traditionnel tissu bleu pétrole.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 28 / L 14 / H 66 cm, abat-jour Ø 40 cm.<br />
            </p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-011 PORTE MANTEAU', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Rondin de sapin poncé, ciré et patiné. 4 grandes et 2 petites accroches en tige filetée avec écrous rouillés et patinés.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 40 / L 40 / H 176 cm.<br />
            Diam. 10 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-008 MIROIR', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois aspect vieilli dans les tons blanc et brun, pourtour en bois recyclé d\'ancienne palette ciré et anciens écrous intégrés.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 80 / L 65 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 375.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-009 MIROIR', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois aspect vieilli dans les tons blanc et brun avec des barres à béton insérées.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 76 / L 60 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-010 TABLE BASSE', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Ancienne palette teintée et cirée dans les tons gris, sur roulettes à arrêt, 2 tiroirs </p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 120 / L 48 / H 30 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-011 LAMPE', 'description' => '<b style="color: #8b8b8b">DESCRIPTION</b><br />
            <p>Pied en chêne, abat-jour en cuivre recouvert de tissu anthracite imitation cuir.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>L 16 / L 16 / H 62 cm, abat-jour Ø 30 cm.<br />
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-007 MIROIR', 'description' => '<b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois recyclé d\'ancienne palette travaillé et ciré.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 75 / L 75 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>
            ', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-010 LAMPE', 'description' => '<b style="color: #8b8b8b">DESCRIPTION</b><br />
            <p>Cube en chêne massif, abat-jour en cuivre et cuir.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>L 10 / L 10 / H 30 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-003 CHAISE BASSE NAPOLÉON III', 'description' => '<h3>M-003 CHAISE BASSE NAPOLÉON III</h3>
            <br />
            <b style="color: #8b8b8b">DESCRIPTION</b><br />
            <p>Cadre bois noir partiellement dépeint et ciré, assise et dossier en tissu « vache ».</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>L 48 / P 45 / H 100 cm.Assise H 38 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-001 SIÈGE', 'description' => '<h2>M-001 SIÈGE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTION</b><br />
            <p>Constitué de 2 anciennes jantes soudées, assise en tissu imprimé « journaux ».</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>Diam. 38 cm / H 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-005 LAMPE', 'description' => '<h2>L-005 LAMPE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTION</b><br />
            <p>Structure en bois ciré, abat-jour tout métal et socle en béton ciré.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>L 25 / L 12 / H 58 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 290.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-010 ROUAGES', 'description' => '<h2>T-010 ROUAGES</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Anciens engrenages sur ondins de bois peints et cirés, plexiglas dépoli, cadre en acier rouillé.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>50 x 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 990.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-011 ABSTRAIT', 'description' => '<h2>T-011 ABSTRAIT</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Peinture acrylique, spatule.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>60 x 60 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 400.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-003 LAMPE', 'description' => '<h2>L-003 LAMPE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Tout en métal, Abat-jour avec une structure en métal soudé entouré d’un fil strié puis d’un autre fil fin incéré de perles métalliques.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>Diam. 45 / H 104 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 480.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-004 LAMPE', 'description' => '<h2>L-004 LAMPE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Structure en bois ciré et socle en béton ciré, ampoule vintage à filament avec variateur.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 38 / L 10 / H 41 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 280.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-006 LAMPE', 'description' => '<h2>L-006 LAMPE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Support ancienne poutre cirée blanc et gris, pied plaque en bois surélevé d’une plaque de métal, abat-jour ovale en tissu « vache ».</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 35 / L 25 / H 116 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-007 LAMPE DE TABLE', 'description' => '<h2>L-007 LAMPE DE TABLE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Base maillons de chaîne soudés, douille retro avec interrupteur à chaînette, câble en tissu noir et blanc.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 22 / L 22 / H 55 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-002 COMMODE', 'description' => '<h2>M-002 COMMODE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>En bois teinté et ciré, sur roulette, tiroirs caisses à vin, plateau ancienne traverse.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 42 / P 30 / H 89 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-003 MIROIR', 'description' => '<h2>D-003 MIROIR</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois recyclé d\'ancienne palette et ciré.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 80 / L 68 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-004 MIROIR', 'description' => '<h2>D-004 MIROIR</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois vieilli et ciré, décoré de pièces bois séchés.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 60 / L 76 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-005 MIROIR', 'description' => '<h2>D-005 MIROIR</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois d\'ancienne palette ciré, vieils écroux.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 70 / L 86 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-006 TABLE BASSE', 'description' => '<h2>M-006 TABLE BASSE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Plateau en bois massif avec impression « monde », pieds en acier.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 75 / L 50 /H 35 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-002 SCULPTURE', 'description' => '<h2>D-002 SCULPTURE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pièce de bois érodée, cirée et patinée montée sur support en acier brut.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 40 / L 20 / H 43 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 90.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-001 SCULPTURE', 'description' => '<h2>D-001 SCULPTURE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pièce de bois érodée, cirée et patinée montée sur support en acier brut.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 20 / L 17 / H 142 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'M-005 TABLE BASSE', 'description' => '<h2>M-006 TABLE BASSE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Ancienne palette teintée et cirée dans les tons gris, sur roulettes à arrêt et tiroir traversant.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 67 / L 47 / H 27 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'L-008 LAMPE DE TABLE', 'description' => '<h2>L-008 LAMPE DE TABLE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Pièce de bois cérusée et cirée, spot en verre monté sur support amovible, le tout inséré sur un ancien rouage.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>Diam. 15 cm / H 92 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'D-006 MIROIR', 'description' => '<h2>D-006 MIROIR</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Cadre en bois vieilli et ciré, décoré d\'anciennes rondelles carrées et de clous.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>L 76 / L 60 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-013 ZEN', 'description' => '<h2>T-013 ZEN</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Peinture acrylique sur toile de 50/30 cm fixée sur plexiglas, cadre en bois de palette.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>90 x 70 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-008 ABSTRAIT', 'description' => '<h2>T-008 ABSTRAIT</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Peinture acrylique et fusain, spatule.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>70 x 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-005 CA GAZE', 'description' => '<h2>T-005 CA GAZE</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Canettes sur toiles de 20/20 cm fixées sur plexiglas.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>50 x 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-001 ABSTRAIT', 'description' => '<h2>T-001 ABSTRAIT</h2>
            <br />
            <b style="color: #8b8b8b">TAILLE</b><br />
            <p>60x60cm.</p>
            <br />
            <b style="color: #8b8b8b">TECHNIQUE</b><br />
            <p>Peinture acrylique, pinceau.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-006 ABSTRAIT', 'description' => '<h2>T-006 ABSTRAIT</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Peinture acrylique et fusain, spatule, toile 3D.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>50 x 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 250.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-012 ABSTRAIT', 'description' => '<h2>T-012 ABSTRAIT</h2>
            <br />
            <b style="color: #8b8b8b">TECHNIQUE</b><br />
            <p>Peinture acrylique, spatule.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>30 x 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>VENDU</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-002 BAMBOU', 'description' => '<h2>T-002 BAMBOU</h2>
            <br />
            <b style="color: #8b8b8b">TAILLE</b><br />
            <p>75x25cm.</p>
            <br />
            <b style="color: #8b8b8b">TECHNIQUE</b><br />
            <p>Peinture acrylique, pinceau, toile 3D.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 300.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-004 NU', 'description' => '<h2>T-004 NU</h2>
            <br />
            <b style="color: #8b8b8b">DESCRIPTIF</b><br />
            <p>Peinture acrylique, pinceau et spatule, toile 3D.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSION</b><br />
            <p>40 cm x 40 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 300.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['category_id' => null, 'front_image_id' => rand(1, 20), 'title' => 'T-007 ABSTRAIT', 'description' => '<h2>T-007 ABSTRAIT</h2>
            <br />
            <b style="color: #8b8b8b">TECHNIQUE</b><br />
            <p>Peinture acrylique et fusain, spatule, toile 3D.</p>
            <br />
            <b style="color: #8b8b8b">DIMENSIONS</b><br />
            <p>50 x 50 cm.</p>
            <br />
            <b style="color: #8b8b8b">PRIX</b><br />
            <p>CHF 350.00</p>', 'order' => rand(1, 10), 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('portfolios')->insert($portfolios);

        DB::table('portfolio_image')->delete();

        // Get all the roles attaching up to 3 random roles to each user
        $images = Image::all();

        // Populate the pivot table
        Portfolio::all()->each(function ($portfolio) use ($images) {
            $portfolio->images()->attach(
                $images->random(rand(1, 4))->pluck('id')->toArray()
            );
        });

        // $portfolio_image = array(
        //     ['portfolio_id' => rand(1, 5), 'image_id' => rand(1, 20), 'created_at' => new DateTime, 'updated_at' => new DateTime],
        // );
        // DB::table('portfolio_image')->insert($portfolio_image);
    }
}
