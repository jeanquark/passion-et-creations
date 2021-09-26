<template>
    <!-- <v-footer color="primary lighten-1" padless>
        <v-row justify="center" no-gutters>
            <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">
                {{ link }}
            </v-btn>
            <v-col class="primary lighten-2 py-4 text-center white--text" cols="12"> {{ new Date().getFullYear() }} — <strong>Vuetify</strong> </v-col>
        </v-row>
    </v-footer> -->

    <v-footer padless class="secondary--text hidden-sm-and-down" style="background: url('/images/footer-background.svg') no-repeat; background-size: cover; border: 0px dashed red">
        <v-container class="pa-0" style="">
            <v-row no-gutters align="center" justify="center" class="mt-15 mb-3" style="border: 0px solid blue">
                <v-col cols="12" class="mt-15 mb-5 d-flex justify-center">
                    <a href="https://www.facebook.com/passioncreationsch" target="_blank" class="link mx-2">
                        <v-hover v-slot="{ hover }">
                            <v-img :src="hover ? '/images/facebook_dark.png' : '/images/facebook.png'" max-width="30" class=""></v-img>
                        </v-hover>
                    </a>
                    <a href="https://www.pinterest.fr/passioncrea_ch/" target="_blank" class="link mx-2">
                        <v-hover v-slot="{ hover }">
                            <v-img :src="hover ? '/images/pinterest_dark.png' : '/images/pinterest.png'" max-width="30" class=""></v-img>
                        </v-hover>
                    </a>
                    <a href="https://www.instagram.com/passionetcreationsch/?hl=fr" target="_blank" class="link mx-2">
                        <v-hover v-slot="{ hover }">
                            <v-img :src="hover ? '/images/instagram_dark.png' : '/images/instagram.png'" max-width="30" class=""></v-img>
                        </v-hover>
                    </a>
                </v-col>
                <v-col cols="12" align-self="end" class="text-center white--text">
                    {{ new Date().getFullYear() }} — <strong>&copy;passionetcreations.ch</strong> |
                    <span class="text-right" v-if="!auth">
                        <a href="/login" style="text-decoration: none;">Login</a>
                    </span>
                    <br />
                </v-col>
            </v-row>
        </v-container>
    </v-footer>
</template>

<script>
export default {
    data() {
        return {}
    },
    methods: {},
    computed: {
        auth() {
            return this.$store.getters['auth/auth']
        }
    }
}
</script>

<style scoped>
.link:hover {
    /* background-color: red; */
}
</style>
