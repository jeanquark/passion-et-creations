<template>
    <!-- <div> -->
    <div>
        <!-- <router-view><router-view> -->
        <!-- <v-system-bar color="deep-purple darken-3"></v-system-bar> -->
        <v-app-bar app flat fixed class="hidden-sm-and-down">
            <!-- <v-toolbar-title><a href="/" class="link">Passion & Créations</a></v-toolbar-title> -->
            <v-toolbar-title>
                <v-img src="/images/logo.png" max-width="100"></v-img>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <!-- <v-toolbar-title class="nav-link mx-2"><a href="/login" class="link">Login</a></v-toolbar-title> -->

            <!-- <v-toolbar-title class="nav-link mx-2"><a href="/admin" class="link">Admin</a></v-toolbar-title> -->
            <v-toolbar-title class="link mx-2" @click="$vuetify.goTo('#welcome', options)">Bienvenue</v-toolbar-title>
            <v-toolbar-title class="link mx-2" @click="$vuetify.goTo('#portfolio', options)">Portfolio</v-toolbar-title>
            <v-toolbar-title class="link mx-2" @click="$vuetify.goTo('#about', options)">Portrait</v-toolbar-title>
            <v-toolbar-title class="link mx-2" @click="$vuetify.goTo('#contact', options)">Contact</v-toolbar-title>
            <v-toolbar-title class="link mx-2" @click="logout" v-if="authUser">Logout</v-toolbar-title>
            <!-- <span>auth: {{ auth }} | 
            authUser.name: {{ authUser ? authUser.name : ''  }} | 
            <v-btn small @click="logout">Logout</v-btn></span> -->
        </v-app-bar>

        <v-app-bar app flat fixed class="hidden-md-and-up">
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        </v-app-bar>
        <!-- </div> -->
        <v-navigation-drawer absolute bottom temporary class="" v-model="drawer">
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
            duration: 1200,
            offset: 0,
            easing: 'easeInOutCubic'
        }
    },
    computed: {
        auth(){
            return this.$store.getters['auth/auth']
        },
        authUser () {
            return this.$store.getters['auth/user']
        },
        target() {
            const value = this[this.type]
            if (!isNaN(value)) return Number(value)
            else return value
        },
        options() {
            return {
                duration: this.duration,
                offset: this.offset,
                easing: this.easing
            }
        }
    },
    methods: {
        async logout() {
            await this.$store.dispatch('auth/logout')
            location.href = '/'
        }
    }
}
</script>

<style scoped>
/* .nav-link :hover {
    color: yellow;
} */
.link {
    color: #000;
}
.link:hover {
    cursor: pointer;
    color: #c49a6c;
}
</style>
