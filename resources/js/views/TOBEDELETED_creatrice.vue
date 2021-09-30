<template>
    <v-content>
        <navbar-component></navbar-component>
        <v-row no-gutters>
            <v-col cols="12" md="4" class="pa-0">
                <v-carousel v-model="model">
                    <v-carousel-item v-for="(image, index) in images" :key="index">
                        <v-img lazy-src="/images/400x400.jpg" :src="`/images/${image}`"></v-img>
                        <!-- <v-img lazy-src="/images/400x400.jpg" :src="`${image}`" class=""></v-img> -->
                    </v-carousel-item>
                </v-carousel>
            </v-col>
            <v-col cols="12" md="4" class="pa-3">
                <h4>Entre passion & créations elle aime</h4>
                <p>
                    L’odeur qui se dégage du métal coupé, Le voir rougeoyer sous la flamme du chalumeau jusqu’au bain de fusion, le tordre en un tour de main avant qu’il ne redevienne à l’état solide
                    et que l’on a de la peine à croire à sa fragilité de l’instant d’avant. S’imaginer avoir été ferrailleur en d’autre temps.
                </p>

                <p>
                    Aller en forêt, s’encoubler sur une branche et découvrir un bois, en détailler ses veines, ses courbes, observer les traces laissées par le temps, imaginer son passé et lui donner
                    une nouvelle vie.
                </p>

                <p>
                    Créer des lampes, associer ou mélanger les styles, recycler et transformer les objets. L’odeur de la cire à bois, jouer avec les différentes teintes de cire afin de rafraîchir,
                    styliser, vieillir ou personnaliser un meuble neuf ou ancien. Voir la métamorphose du bois au moment de la patine.
                </p>
            </v-col>
            <v-col cols="12" md="4" class="pa-3">
                <h3>SABINE PIRAT en bref</h3>
                <v-row no-gutters class="my-3">
                    <v-col cols="4">Naissance </v-col>
                    <v-col cols="8">05 juillet 1967</v-col>
                </v-row>
                <v-row no-gutters class="my-3">
                    <v-col cols="4">Renaissance </v-col>
                    <v-col cols="8">10 décembre 2010 Premiers pas actifs en création, d’abord en peinture puis le bois et la soudure</v-col>
                </v-row>
                <v-row no-gutters class="my-3">
                    <v-col cols="4">Cours </v-col>
                    <v-col cols="8">Divers techniques de peinture acrylique Soudure au chalumeau Patine sur bois Réfection d’assises de chaises</v-col>
                </v-row>
                <v-row no-gutters class="my-3">
                    <v-col cols="4">Sources d’inspiration </v-col>
                    <v-col cols="8">Les éléments naturels, l’érosion du temps, un détail accrocheur</v-col>
                </v-row>
                <v-row no-gutters class="my-3">
                    <v-col cols="4">Matériaux de prédilection </v-col>
                    <v-col cols="8">L’acier et le bois</v-col>
                </v-row>
                <v-row no-gutters class="my-3">
                    <v-col cols="4">Un projet </v-col>
                    <v-col cols="8">Partager un local avec d’autres personnes, qui tienne lieu d’atelier et de salle d’exposition. C’est fait! Alors un autre projet? Allez plus loin…</v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-content>
</template>

<script>
import Navbar from '../components/NavbarComponent'
export default {
    components: { Navbar },
    async created() {},
    data() {
        return {
            model: 0,
            colors: ['primary', 'secondary', 'yellow darken-2', 'red', 'orange'],
            images: ['creatrice_01.jpg', 'creatrice_02.jpg']
            // images: ['https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg', 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg']
        }
    },
}
</script>

<style scoped>
</style>