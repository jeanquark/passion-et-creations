<template>
    <!-- <v-carousel v-model="model" class="my-0 py-0">
        <v-carousel-item v-for="(color, i) in colors" :key="color">
                <v-sheet :color="color" height="100%" tile>
                    <v-row class="fill-height" align="center" justify="center">
                        <div class="text-h2">Slide {{ i + 1 }}</div>
                    </v-row>
                </v-sheet>
            </v-carousel-item>
        <v-carousel-item v-for="(image, index) in images" :key="index">
            <v-sheet height="100%" tile>
                <v-img :src="`/images/portfolio/${image}`"></v-img>
            </v-sheet>
        </v-carousel-item>
    </v-carousel> -->
    <v-carousel hide-delimiters circle :interval="2000">
        <!-- <v-carousel-item v-for="(item, i) in items" :key="i" :src="item.src"></v-carousel-item> -->
        <v-carousel-item v-for="(image, i) in images" :key="i" :src="`/medias/images/sliders/${image}`"></v-carousel-item>
    </v-carousel>
</template>

<script>
export default {
    data() {
        return {
            model: 0,
            colors: ['primary', 'secondary', 'yellow darken-2', 'red', 'orange'],
            images: ['slider_01.jpg', 'slider_02.jpg', 'slider_03.jpg', 'slider_04.jpg'],
            items: [
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg'
                },
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg'
                },
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg'
                },
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg'
                }
            ]
        }
    },
    methods: {}
}
</script>

<style scoped></style>
