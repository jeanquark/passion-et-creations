<template>
    <v-row no-gutters justify="center" id="about" class="my-10 px-0">
        <!-- <v-col cols="12" md="3" class="px-3">
            <v-carousel cycle hide-delimiters :show-arrows="false" :interval="2000">
                <v-carousel-item v-for="(image, i) in images" :key="i" :src="image"></v-carousel-item>
            </v-carousel>
        </v-col> -->
        <v-col cols="12" md="4" class="px-5">
            <h2 style="color: #c49a6c">Entre passion & créations elle aime</h2>
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
            </p>
        </v-col>
        <!-- <v-col cols="12" md="3" class="px-3">
            SABINE PIRAT en bref Naissance 05 juillet 1967 Renaissance 10 décembre 2010 Premiers pas actifs en création, d’abord en peinture puis le bois et la soudure Cours Divers techniques de
            peinture acrylique Soudure au chalumeau Patine sur bois Réfection d’assises de chaises Sources d’inspiration Les éléments naturels, l’érosion du temps, un détail accrocheur Matériaux de
            prédilection L’acier et le bois. Un projet Partager un local avec d’autres personnes, qui tienne lieu d’atelier et de salle d’exposition. C’est fait! Alors un autre projet? Allez plus
            loin…
        </v-col> -->
        <v-col cols="12" md="6" class="px-5">
            <v-timeline>
                <v-timeline-item large>
                    <template v-slot:icon>
                        <v-avatar size="68">
                            <img src="/images/bebe.jpg" />
                        </v-avatar>
                    </template>
                    <template v-slot:opposite>
                        <span>Naissance</span>
                    </template>
                    <v-card class="elevation-2">
                        <v-card-title class="text-subtitle-2">05 juillet 1967</v-card-title>
                    </v-card>
                </v-timeline-item>
                <v-timeline-item>
                    <template v-slot:icon>
                        <v-avatar size="68">
                            <img src="/images/soudure.jpg" />
                        </v-avatar>
                    </template>
                    <template v-slot:opposite>
                        <span>Renaissance</span>
                    </template>
                    <v-card class="elevation-2">
                        <v-card-title class="text-subtitle-2">10 décembre 2010</v-card-title>
                        <v-card-text>Premiers pas actifs en création, d’abord en peinture puis le bois et la soudure</v-card-text>
                    </v-card>
                </v-timeline-item>
                <v-timeline-item>
                    <template v-slot:icon>
                        <v-avatar size="68">
                            <img src="/images/cours.jpg" />
                        </v-avatar>
                    </template>
                    <template v-slot:opposite>
                        <span>Cours</span>
                    </template>
                    <v-card class="elevation-2">
                        <v-card-text>Divers techniques de peinture acrylique. Soudure au chalumeau. Patine sur bois. Réfection d’assises de chaises</v-card-text>
                    </v-card>
                </v-timeline-item>
                <v-timeline-item>
                    <template v-slot:icon>
                        <v-avatar size="68">
                            <img src="/images/inspiration.jpg" />
                        </v-avatar>
                    </template>
                    <template v-slot:opposite>
                        <span>Sources d’inspiration</span>
                    </template>
                    <v-card class="elevation-2">
                        <v-card-text>Les éléments naturels, l’érosion du temps, un détail accrocheur</v-card-text>
                    </v-card>
                </v-timeline-item>
                <v-timeline-item>
                    <template v-slot:icon>
                        <v-avatar size="68">
                            <img src="/images/acier_et_bois.jpg" />
                        </v-avatar>
                    </template>
                    <template v-slot:opposite>
                        <span>Matériaux de prédilection</span>
                    </template>
                    <v-card class="elevation-2">
                        <v-card-text>L’acier et le bois</v-card-text>
                    </v-card>
                </v-timeline-item>
                <v-timeline-item>
                    <template v-slot:icon>
                        <v-avatar size="68">
                            <img src="/images/interieur.jpg" />
                        </v-avatar>
                    </template>
                    <template v-slot:opposite>
                        <span>Un projet</span>
                    </template>
                    <v-card class="elevation-2">
                        <v-card-text>Partager un local avec d’autres personnes, qui tienne lieu d’atelier et de salle d’exposition. <b>C’est fait!</b> Alors un autre projet? Allez plus loin…</v-card-text>
                    </v-card>
                </v-timeline-item>
            </v-timeline>
        </v-col>
    </v-row>
</template>

<script>
import Form from 'vform'
export default {
    data() {
        return {
            form: new Form({
                name: '',
                email: '',
                message: '',
            }),
            markers: [],
            images: ['/medias/images/creatrice_01.jpg', '/medias/images/creatrice_02.jpg', '/medias/images/creatrice_03.jpg'],
        }
    },
    methods: {
        sendContactForm() {
            console.log('sendContactForm')
        },
    },
}
</script>

<style scoped></style>
