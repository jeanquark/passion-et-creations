<template>
    <div>
        <v-app-bar app flat class="hidden-sm-and-down" style="">
            <v-toolbar-title class="d-flex align-center">
                <v-img src="/images/logo_thumbnail.png" max-width="80"></v-img>
                <span class="ml-2"> | Sabine Pirat</span>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <scrollactive class="my-nav d-flex align-center" :offset="80" :duration="1000" active-class="active">
                <a href="#welcome" class="link mx-1 scrollactive-item">Accueil</a> <span style="font-size: 1.2em">|</span>
                <a href="#info" class="link mx-1 scrollactive-item">Info</a>
                <span style="font-size: 1.2em">|</span>
                <a href="#portfolio" class="link mx-1 scrollactive-item">Portfolio</a> <span style="font-size: 1.2em">|</span> <a href="#about" class="link mx-1 scrollactive-item">Portrait</a>
                <span style="font-size: 1.2em">|</span>
                <a href="#contact" class="link mx-1 scrollactive-item">Contact</a>
                <span style="font-size: 1.2em" v-if="authUser">|</span>
                <a href="/admin/index" class="link mx-1" v-if="authUser">Admin</a>
                <v-btn small color="#c49a6c" class="white--text" @click="logout" v-if="authUser">Logout</v-btn>
            </scrollactive>
        </v-app-bar>
        <v-app-bar app flat fixed class="hidden-md-and-up">
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"> </v-app-bar-nav-icon>
            <v-toolbar-title class="d-flex align-center">
                <v-img src="/images/logo_thumbnail.png" max-width="80"></v-img>
                <span class="ml-2"> | Sabine Pirat</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
        </v-app-bar>
        <v-navigation-drawer fixed temporary v-model="drawer">
            <v-list-item v-if="authUser">
                <v-list-item-avatar>
                    <v-img :src="`/images/${authUser.picture}`" v-if="authUser.picture"></v-img>
                    <v-img src="/images/logo.png" v-else></v-img>
                </v-list-item-avatar>
                <small>{{ authUser }}</small>
            </v-list-item>
            <v-list-item>
                <v-list-item-content>
                    <scrollactive class="" :offset="60" :duration="800" active-class="active">
                        <v-list-item-title class="my-3"><a href="#welcome" class="link mx-1 scrollactive-item">Accueil</a></v-list-item-title>
                        <v-list-item-title class="my-3"><a href="#info" class="link mx-1 scrollactive-item">Info</a> </v-list-item-title>
                        <v-list-item-title class="my-3"><a href="#portfolio" class="link mx-1 scrollactive-item">Portfolio</a></v-list-item-title>
                        <v-list-item-title class="my-3"><a href="#about" class="link mx-1 scrollactive-item">Portrait</a></v-list-item-title>
                        <v-list-item-title class="my-3"><a href="#contact" class="link mx-1 scrollactive-item">Contact</a></v-list-item-title>
                        <v-list-item-title class="my-3"><a href="/admin/index" class="link mx-1" v-if="authUser">Admin</a></v-list-item-title>
                        <v-list-item-title class="my-3"><v-btn small color="#c49a6c" class="white--text" @click="logout" v-if="authUser">Logout</v-btn></v-list-item-title>
                    </scrollactive>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
        </v-navigation-drawer>
    </div>
</template>

<script>
export default {
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
                // console.log('data: ', data)
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
