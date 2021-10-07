<template>
    <v-row no-gutters justify="center" id="about" class="my-10">
        <v-col cols="12" sm="6" md="4" class="px-4" style="border: 0px dashed pink">
            <slider-component :slider="slider" :interval="3000" :showArrows="false" style="margin: 0em" />
        </v-col>
        <v-col cols="12" sm="6" md="6" class="px-4" :class="$vuetify.breakpoint.xsOnly ? 'mt-5' : 'mt-0'" v-if="content">
            <div v-html="content.content"></div>
        </v-col>
    </v-row>
</template>

<script>
import SliderComponent from './SliderComponent'
export default {
    components: { SliderComponent },
    async created() {
        if (this.$store.getters['sliders/sliders'].length < 1) {
            await this.$store.dispatch('sliders/fetchSliders')
        }
    },
    data() {
        return {}
    },
    computed: {
        contents() {
            return this.$store.getters['contents/contents']
        },
        content() {
            return this.$store.getters['contents/contents'].find((content) => content.section === 'portrait' && content.is_published == true)
        },
        sliders() {
            return this.$store.getters['sliders/sliders']
        },
        slider() {
            return this.$store.getters['sliders/sliders'].find((slider) => slider.section === 'portrait')
        },
    },
    methods: {},
}
</script>

<style scoped>
</style>
