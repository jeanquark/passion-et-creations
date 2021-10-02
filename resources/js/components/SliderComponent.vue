<template>
    <div v-if="slider" >
        <!-- slider: {{ slider }} -->
        <v-carousel cycle :hide-delimiters="true" :show-arrows="showArrows" :interval="interval">
            <v-carousel-item v-for="(image, i) in slider.slider_images" :key="i" :src="`/medias/${image.image_path}`"></v-carousel-item>
        </v-carousel>
        <!-- <v-carousel cycle :hide-delimiters="true" :show-arrows="false" :interval="interval">
            <v-carousel-item v-for="(image, i) in slider.slider_images" :key="i">
                <v-img :src="`/medias/${image.image_path}`" max-width="100%"></v-img>
            </v-carousel-item>
        </v-carousel> -->
        <!-- <v-carousel hide-delimiters cycle :interval="3000">
            <v-carousel-item v-for="(image, i) in images" :key="i" :src="`/medias/images/sliders/${image}`"></v-carousel-item>
        </v-carousel> -->
    </div>
</template>

<script>
export default {
    props: ['slider', 'interval', 'showArrows'],
    async created() {
        // if (this.$store.getters['sliders/sliders'].length < 1) {
        //     await this.$store.dispatch('sliders/fetchSliders')
        // }
    },
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
    computed: {
        sliders() {
            return this.$store.getters['sliders/sliders']
        }
    },
    methods: {}
}
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 2s ease;
}
.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateY(30px);
    opacity: 0;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 1.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
