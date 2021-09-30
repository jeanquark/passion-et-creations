<template>
    <!-- <div> -->
    <div>
        <!-- <router-view><router-view> -->
        <!-- <v-system-bar color="deep-purple darken-3"></v-system-bar> -->
        <v-app-bar app flat fixed class="hidden-sm-and-down">
            <!-- <v-toolbar-title><a href="/" class="link">Passion & Créations</a></v-toolbar-title> -->
            <v-toolbar-title class="d-flex align-center">
                <v-img src="/images/logo_thumbnail.png" max-width="100"></v-img>
                <span class="ml-2"> | Sabine Pirat</span>
            </v-toolbar-title>

            <v-spacer></v-spacer>
            <!-- authUser: {{ authUser }} -->
            <!-- token: {{ authToken.substring(0, 4) }} -->
            <!-- <v-toolbar-title class="nav-link mx-2"><a href="/login" class="link">Login</a></v-toolbar-title> -->

            <!-- <v-toolbar-title class="nav-link mx-2"><a href="/admin" class="link">Admin</a></v-toolbar-title> -->
            <!-- <scrollactive class="my-nav" @itemchanged="onItemChanged">
                <v-toolbar-title class="link mx-2 active" @click="$vuetify.goTo('#welcome', options)">Accueil</v-toolbar-title> |
                <v-toolbar-title class="link mx-2" @click="$vuetify.goTo('#info', options)">Info</v-toolbar-title> |
                <v-toolbar-title class="link mx-2 scrollactive-item" @click="$vuetify.goTo('#portfolio', options)">Portfolio</v-toolbar-title> |
                <v-toolbar-title class="link mx-2 scrollactive-item" @click="$vuetify.goTo('#about', options)">Portrait</v-toolbar-title> |
                <v-toolbar-title class="link mx-2" @click="$vuetify.goTo('#contact', options)">Contact</v-toolbar-title> |
                <v-toolbar-title class="link mx-2" @click="navigateTo('/admin')">Admin</v-toolbar-title>
                <v-toolbar-title class="link mx-2" @click="logout" v-if="authUser"> | Logout</v-toolbar-title>
            </scrollactive> -->
            <!-- <span>auth: {{ auth }} | 
            authUser.name: {{ authUser ? authUser.name : ''  }} | 
            <v-btn small @click="logout">Logout</v-btn></span> -->
            <scrollactive class="my-nav d-flex align-center" :offset="80" active-class="active">
                <a href="#welcome" class="link mx-1 scrollactive-item">Accueil</a> <span style="font-size: 1.2em">|</span> <a href="#info" class="link mx-1 scrollactive-item">Info</a>
                <span style="font-size: 1.2em">|</span> <a href="#portfolio" class="link mx-1 scrollactive-item">Portfolio</a> <span style="font-size: 1.2em">|</span>
                <a href="#about" class="link mx-1 scrollactive-item">Portrait</a> <span style="font-size: 1.2em">|</span>
                <a href="#contact" class="link mx-1 scrollactive-item">Contact</a>
                <span style="font-size: 1.2em">|</span>
                <a href="/admin/index" class="link mx-1">Admin</a>
                <v-btn small color="#c49a6c" class="white--text" @click="logout" v-if="authUser">Logout</v-btn>
            </scrollactive>
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
// import VueScrollactive from 'vue-scrollactive'
export default {
    // component: { VueScrollactive },
    mounted() {
        this.checkAuth()
    },
    data() {
        return {
            drawer: false,
            group: null,
            duration: 1200,
            offset: 0,
            easing: 'easeInOutCubic',
            authUser: null,
        }
    },
    computed: {
        auth() {
            return this.$store.getters['auth/auth']
        },
        authToken() {
            return this.$store.getters['auth/token']
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
                easing: this.easing,
            }
        },
        intersect() {
            return this.$store.getters['intersect/intersect']
        },
    },
    methods: {
        async checkAuth() {
            try {
                const { data } = await axios.get('/api/auth-user')
                console.log('data: ', data)
                this.authUser = data.name
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async logout() {
            await this.$store.dispatch('auth/logout')
            location.href = '/'
        },
        navigateTo(path) {
            // this.$router.push(path)
            location.href = path
        },
        // onItemChanged(event, currentItem, lastActiveItem) {
        //     console.log('onItemChanged: ', currentItem)
        // }
    },
}
</script>

<style scoped>
/* .nav-link :hover {
    color: yellow;
} */
.link {
    color: rgba(0, 0, 0, 0.87);
    text-decoration: none;
    font-size: 1.3em;
}
.link:hover {
    cursor: pointer;
    color: #c49a6c;
}
.active {
    color: #c49a6c;
}
</style>
