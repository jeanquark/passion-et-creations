<template>
    <v-main>
        <v-navigation-drawer
            fixed
            dark
            permanent
            clipped
            :mini-variant.sync="miniSidebar"
        >
            <v-list>
                <v-list-item class="px-2">
                    <v-list-item-avatar>
                        <v-img
                            src="https://randomuser.me/api/portraits/women/85.jpg"
                        ></v-img>
                    </v-list-item-avatar>
                </v-list-item>

                <v-list-item link to="/admin/profile">
                    <v-list-item-content>
                        <v-list-item-title class="title">
                            Sandra Adams
                        </v-list-item-title>
                        <v-list-item-subtitle
                            >sandra_a88@gmail.com</v-list-item-subtitle
                        >
                    </v-list-item-content>
                </v-list-item>
            </v-list>

            <v-divider></v-divider>

            <v-list nav dense>
                <!-- <v-list-item to="/admin/avocats">
                    <v-list-item-icon>
                        <v-icon>mdi-account-tie</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Avocats</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/stagiaires">
                    <v-list-item-icon>
                        <v-icon>mdi-school</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Etudiants/Stagiaires</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/permanences">
                    <v-list-item-icon>
                        <v-icon>mdi-calendar-month</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Permanences</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/files">
                    <v-list-item-icon>
                        <v-icon>mdi-file</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Fichiers</v-list-item-title>
                </v-list-item> -->
                <v-list-item to="/admin/medias">
                    <v-list-item-icon>
                        <v-icon>mdi-file-image</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Medias</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/images">
                    <v-list-item-icon>
                        <v-icon>mdi-file-image</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Images</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/portfolios">
                    <v-list-item-icon>
                        <v-icon>mdi-folder-multiple-image</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Portfolios</v-list-item-title>
                </v-list-item>
                <v-list-item to="/admin/users">
                    <v-list-item-icon>
                        <v-icon>mdi-account-group</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Utilisateurs</v-list-item-title>
                </v-list-item>
                <v-list-item @click="logout">
                    <v-list-item-icon>
                        <v-icon>mdi-account-group</v-icon>
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
            <router-view></router-view>
        </v-container>
    </v-main>
</template>

<script>
import axios from 'axios'
export default {
    name: "AdminIndex",
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
