<template>
    <v-row no-gutters justify="center" id="about" class="ma-5 px-0">
        <v-col cols="12" md="4">
            <v-carousel cycle hide-delimiters :show-arrows="false" :interval="2000">
        <v-carousel-item v-for="(image, i) in images" :key="i" :src="`/images/portfolio/${image}`"></v-carousel-item>
    </v-carousel>
        </v-col>
        <v-col cols="12" md="4">
            Entre passion & créations elle aime L’odeur qui se dégage du métal coupé, Le voir rougeoyer sous la flamme du chalumeau jusqu’au bain de fusion, le tordre en un tour de main avant qu’il ne
            redevienne à l’état solide et que l’on a de la peine à croire à sa fragilité de l’instant d’avant. S’imaginer avoir été ferrailleur en d’autre temps. Aller en forêt, s’encoubler sur une
            branche et découvrir un bois, en détailler ses veines, ses courbes, observer les traces laissées par le temps, imaginer son passé et lui donner une nouvelle vie. Créer des lampes, associer
            ou mélanger les styles, recycler et transformer les objets. L’odeur de la cire à bois, jouer avec les différentes teintes de cire afin de rafraîchir, styliser, vieillir ou personnaliser un
            meuble neuf ou ancien. Voir la métamorphose du bois au moment de la patine. Beaucoup d’idées se bousculent dans son esprit, certai
        </v-col>
        <v-col cols="12" md="4">
            SABINE PIRAT en bref Naissance 05 juillet 1967 Renaissance 10 décembre 2010 Premiers pas actifs en création, d’abord en peinture puis le bois et la soudure Cours Divers techniques de
            peinture acrylique Soudure au chalumeau Patine sur bois Réfection d’assises de chaises Sources d’inspiration Les éléments naturels, l’érosion du temps, un détail accrocheur Matériaux de
            prédilection L’acier et le bois
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
                message: ''
            }),
            markers: [],
            images: ['1920x1200.jpg', '1920x1600.jpg'],
        }
    },
    methods: {
        sendContactForm() {
            console.log('sendContactForm')
        }
    }
}
</script>

<style scoped></style>
