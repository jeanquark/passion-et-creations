<template>
    <v-app>
        <router-view></router-view>
    </v-app>
</template>

<script>
const default_layout = "default"
export default {
    mounted () {
    },
    computed: {
        layout () {
            return (this.$route.meta.layout || default_layout) + '-layout'
        }
    }
};
</script>

<style scoped>
</style>
