<template>
    <!-- <div> -->
    <div>
        <!-- <router-view><router-view> -->
            <!-- <v-system-bar color="deep-purple darken-3"></v-system-bar> -->
        <v-app-bar app flat fixed class="">
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title><a href="/" class="link">Passion & Créations</a></v-toolbar-title>

            <v-spacer></v-spacer>

            <v-toolbar-title class="nav-link mx-2"><a href="/login" class="link">Login</a></v-toolbar-title>

            <v-toolbar-title class="nav-link mx-2"><a href="/admin" class="link">Admin</a></v-toolbar-title>

            <v-btn icon>
                <v-icon>mdi-heart</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>
            <router-link to="/portfolio">Portfolio</router-link> | <a href="/">Home</a> | <a href="/portfolio">Portfolio</a> | <a href="/creatrice">Créatrice</a> |
            <v-btn small>Logout</v-btn>
        </v-app-bar>
        <!-- </div> -->
        <v-navigation-drawer v-model="drawer" absolute bottom temporary>
            <v-list nav dense>
                <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4">
                    <v-list-item>
                        <v-list-item-title>Accueil</v-list-item-title>
                    </v-list-item>

                    <v-list-item>
                        <v-list-item-title>Login</v-list-item-title>
                    </v-list-item>

                    <v-list-item>
                        <v-list-item-title>Admin</v-list-item-title>
                    </v-list-item>

                    <v-list-item>
                        <v-list-item-title>Buzz</v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            drawer: false,
            group: null,
        }
    },
}
</script>

<style scoped>
    .nav-link :hover {
        color: yellow;
    }
    .link {
        text-decoration: none;
    }
</style>