<template>
    <v-app>
        <!-- <component :is="layout"> -->
            <router-view></router-view>
        <!-- </component> -->
    </v-app>
</template>

<script>
const default_layout = "default"
export default {
    mounted () {
    },
    computed: {
        layout () {
            console.log('abc')
            return (this.$route.meta.layout || default_layout) + '-layout'
        }
    }
};
</script>

<style scoped>
</style>
