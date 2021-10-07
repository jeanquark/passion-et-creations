<template>
    <v-main>
        <v-navigation-drawer
            fixed
            dark
            permanent
            clipped
            :mini-variant.sync="miniSidebar"
        >
            <v-list v-if="authUser">
                <v-list-item class="px-2">
                    <v-list-item-avatar>
                        <v-img
                            :src="`/images/${authUser.picture}`"
                            v-if="authUser.picture"
                        ></v-img>
                        <v-img
                            src="/images/logo.png"
                            v-else
                        ></v-img>
                    </v-list-item-avatar>
                </v-list-item>

                <!-- <v-list-item link to="/admin/profile"> -->
                <v-list-item link to="/admin/index">
                    <v-list-item-content>
                        <v-list-item-title class="title">
                            {{ authUser.name }}
                        </v-list-item-title>
                        <v-list-item-subtitle
                            >{{ authUser.email }}</v-list-item-subtitle
                        >
                    </v-list-item-content>
                </v-list-item>
            </v-list>

            <v-divider></v-divider>

            <v-list nav dense>
                <v-list-item to="/admin/medias">
                    <v-list-item-icon>
                        <v-icon>mdi-file-image</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Medias</v-list-item-title>
                </v-list-item>
                <!-- <v-list-item to="/admin/images">
                    <v-list-item-icon>
                        <v-icon>mdi-file-image</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Images</v-list-item-title>
                </v-list-item> -->
                <v-list-item to="/admin/portfolios">
                    <v-list-item-icon>
                        <v-icon>mdi-folder-multiple-image</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Portfolios</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/contents">
                    <v-list-item-icon>
                        <v-icon>mdi-text</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Contenus</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/sliders">
                    <v-list-item-icon>
                        <v-icon>mdi-view-carousel</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Carousels</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/contacts">
                    <v-list-item-icon>
                        <v-icon>mdi-message</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Formulaires
                        <v-badge :content="contacts.length" class="ml-2" v-if="contacts.length > 0"></v-badge>
                    </v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/users">
                    <v-list-item-icon>
                        <v-icon>mdi-account-group</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Utilisateurs</v-list-item-title>
                </v-list-item>
                <v-list-item @click="logout">
                    <v-list-item-icon>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Logout</v-list-item-title>
                </v-list-item>
                <v-list-item href="/">
                    <v-list-item-icon>
                        <v-icon>mdi-arrow-left-circle</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Retour au site</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-container
            fluid
            :class="[miniSidebar ? 'padding-left__small' : 'padding-left__big']"
        >
            <!-- auth: {{ auth }} -->
            <router-view></router-view>
            <confirm ref="confirm"></confirm>
        </v-container>
    </v-main>
</template>

<script>
import axios from 'axios'
import confirm from '../../components/DialogComponent.vue'
export default {
    name: "AdminIndex",
    components: { confirm },
    async created () {
        await this.$store.dispatch('auth/setAuthUser')
            await this.$store.dispatch('contacts/fetchContacts')
        if (!this.authUser) {
            this.$store.commit('snackbars/SET_SNACKBAR', {
                color: 'dark',
                content: 'Votre session a expiré. Veuillez vous reconnecter.',
                show: true,
                timeout: -1,
                type: 'session_expired'
            })
        }
    },
    mounted () {
        this.$root.$confirm = this.$refs.confirm.open
    },
    data() {
        return {
        };
    },
    computed: {
        miniSidebar() {
            switch (this.$vuetify.breakpoint.name) {
                case "xs":
                    return true;
                case "sm":
                    return true;
                case "md":
                    return false;
                case "lg":
                    return false;
                case "xl":
                    return false;
            }
        },
        auth(){
            return this.$store.getters['auth/auth']
        },
        authUser(){
            return this.$store.getters['auth/user']
        },
        contacts () {
            return this.$store.getters['contacts/contacts'].filter(contact => !contact.is_read)
        }
    },
    methods: {
        async logout () {
            console.log('logout')
            await axios.post('/logout')
            // this.$router.push('/')
            location.href = '/'
        }
    }
};
</script>

<style scoped>
.padding-left__small {
    padding-left: 56px;
}
.padding-left__big {
    padding-left: 256px;
}
</style>
