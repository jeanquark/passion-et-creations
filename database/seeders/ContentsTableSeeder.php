<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Datetime;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->delete();
        $contents = array(
            ['name' => 'Accueil', 'section' => 'accueil', 'content' => '<h2 class="text-center my-2" style="color: #c49a6c;">Bienvenue</h2>
            <p class="text-justify">Désireuse de m’inspirer des éléments qui m’entourent (matériaux, formes), je crée du mobilier d’intérieur pour meubler l’espace de votre habitat et lui conférer un caractère particulier. Chacune de mes œuvres est unique, soigneusement élaborée avec un design élégant et des finitions de qualité. Des objets qui s’intégreront parfaitement à votre intérieur confortable, aux formes douces et à l’ambiance apaisée.</p>
            <p class="text-justify">Pour un aperçu de mes créations, se référer au portfolio. Rendez-vous également sur ma page personnelle Pinterest. Vous ne trouvez pas votre bonheur? Vous changeriez un motif sur une commode? N’hésitez pas à m’en parler, ou mieux encore: venez me trouver à mon atelier. Je serai ravie d’en discuter avec vous, et voir dans quelle mesure je peux vous aider à obtenir l’objet qui comblera toutes vos attentes.</p>', 'is_published' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Portrait', 'section' => 'portrait', 'content' => '<h2 style="color: #c49a6c">Entre passion & créations elle aime</h2>
            <br />
            <p class="text-justify" style="color: #4b4b4b">
                L’odeur qui se dégage du métal coupé, Le voir rougeoyer sous la flamme du chalumeau jusqu’au bain de fusion, le tordre en un tour de main avant qu’il ne redevienne à l’état solide et
                que l’on a de la peine à croire à sa fragilité de l’instant d’avant. S’imaginer avoir été ferrailleur en d’autre temps.
            </p>
            <p class="text-justify" style="color: #4b4b4b">
                Aller en forêt, s’encoubler sur une branche et découvrir un bois, en détailler ses veines, ses courbes, observer les traces laissées par le temps, imaginer son passé et lui donner une
                nouvelle vie.
            </p>
            <p class="text-justify" style="color: #4b4b4b">
                Créer des lampes, associer ou mélanger les styles, recycler et transformer les objets. L’odeur de la cire à bois, jouer avec les différentes teintes de cire afin de rafraîchir,
                styliser, vieillir ou personnaliser un meuble neuf ou ancien. Voir la métamorphose du bois au moment de la patine.
            </p>
            <p class="text-justify" style="color: #4b4b4b">
                Beaucoup d’idées se bousculent dans son esprit, certaines méritent encore études et réflexions d’autres n’attendent que d’être créées mais surtout elle aime laisser une place à
                l’imprévu dans ses créations.
            </p>', 'is_published' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Point de vente', 'section' => 'contact', 'content' => '[Addresse du point de vente]', 'is_published' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Emission RTS', 'section' => 'info', 'content' => '<iframe width="100%" height="300" src="https://www.rts.ch/play/embed?urn=urn:rts:video:12405396&subdivisions=false" allowfullscreen allow="geolocation *; autoplay; encrypted-media"></iframe><p>Participation à l\'émission de la RTS "Bon débarras" diffusée le 13 août 2021 (46 min).</p>', 'is_published' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Women Up', 'section' => 'info', 'content' => '<img src="/medias/images/womenup.jpg" width="100%" />', 'is_published' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Accueil Image', 'section' => 'accueil-image', 'content' => '<v-img src="/medias/400x400.jpg" width="100%"></v-img>', 'is_published' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('contents')->insert($contents);
    }
}
