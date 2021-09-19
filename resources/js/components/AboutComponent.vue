<template>
    <v-row no-gutters justify="center" id="about" class="my-10 px-0">
        <v-col cols="12" md="4" class="px-3">
            <!-- sliders: {{ sliders }} -->
            <!-- slider: {{ slider }} -->
            <!-- <v-carousel cycle hide-delimiters :show-arrows="false" :interval="2000">
                <v-carousel-item v-for="(image, i) in images" :key="i" :src="image"></v-carousel-item>
            </v-carousel> -->
            <!-- <v-carousel cycle hide-delimiters :show-arrows="false" :interval="2000">
                <v-carousel-item v-for="(image, i) in slider.slider_images" :key="i" :src="`/medias/${image.image_path}`"></v-carousel-item>
            </v-carousel> -->
            <slider-component :slider="slider" :interval="3000" :showArrows="false" />
        </v-col>
        <v-col cols="12" md="6" class="px-5" v-if="content">
            <div v-html="content.content"></div>
        </v-col>
    </v-row>
</template>

<script>
import SliderComponent from './SliderComponent'
export default {
    components: { SliderComponent },
    async created () {
        if (this.$store.getters['sliders/sliders'].length < 1) {
            // await this.$store.dispatch('sliders/fetchSliders')
        }
    },
    data() {
        return {
            images: ['/medias/images/creatrice_01.jpg', '/medias/images/creatrice_02.jpg', '/medias/images/creatrice_03.jpg'],
        }
    },
    computed: {
        contents () {
            return this.$store.getters['contents/contents']
        },
        content () {
            return this.$store.getters['contents/contents'].find(content => content.section === 'about')
        },
        sliders () {
            return this.$store.getters['sliders/sliders']
        },
        slider () {
            return this.$store.getters['sliders/sliders'].find(slider => slider.section === 'about')
        }
    },
    methods: {
    },
}
</script>

<style scoped></style>
