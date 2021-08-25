<template>
<!-- <div> -->
    <!-- <router-view><router-view> -->
    <v-app-bar app fixed class="">
        <v-app-bar-nav-icon></v-app-bar-nav-icon>

        <v-toolbar-title>Passion & Créations</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
            <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
        <router-link to="/portfolio">Portfolio</router-link> |
        <a href="/">Home</a> | 
        <a href="/portfolio">Portfolio</a> |
        <a href="/creatrice">Créatrice</a> |
        <a href="/admin">Admin</a>
    </v-app-bar>
    <!-- </div> -->
</template>

<script>
export default {
    data() {
        return {}
    },
}
</script>

<style scoped>
</style>