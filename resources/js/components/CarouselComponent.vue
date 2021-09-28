<template>
    <slider-component :slider="slider" :interval="4000" :showArrows="true" />
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
        return {

        }
    },
    computed: {
        sliders () {
            return this.$store.getters['sliders/sliders']
        },
        slider () {
            return this.$store.getters['sliders/sliders'].find(slider => slider.section === 'bienvenue')
        }
    },
    methods: {}
}
</script>

<style scoped></style>
