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
                <v-row no-gutters align="center" justify="center" class="my-3" style="border: 0px solid blue">
                    <v-col cols="12" class="text-center mt-3">
                        <!-- <v-btn v-for="(link, index) in links" :key="index" :to="link.route" color="white" text rounded class="my-2 font-weight-medium">
                            {{ link.name }}
                        </v-btn> -->
                    </v-col>
                    <v-col cols="12" align-self="end" class="text-center">{{ new Date().getFullYear() }} — <strong>&copy;passionetcreations.ch</strong></v-col>
                </v-row>
            </v-container>
        </v-footer>
</template>

<script>
export default {
    data() {
        return {
            links: ['Home', 'About Us', 'Team', 'Services', 'Blog', 'Contact Us']
        }
    },
    methods: {}
}
</script>

<style scoped></style>
