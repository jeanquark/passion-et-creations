<template>
    <v-row no-gutters justify="center" id="contact" class="ma-5 px-0">
        <v-col cols="12" md="4" class="pa-3">
            <GmapMap :center="{ lat: 46.4776, lng: 6.4272 }" :zoom="14" map-type-id="terrain" style="width: 100%; height: 300px">
                <GmapMarker :key="index" v-for="(m, index) in markers" :position="m.position" :clickable="true" :draggable="true" @click="center = m.position" />
            </GmapMap>
        </v-col>
        <v-col cols="12" md="3" class="pa-3">
            <v-list dense>
                <v-subheader class="text-center text-h5">Informations de contact</v-subheader>
                <v-list-item-group>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>mdi-phone</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2">079 124 64 71</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>mdi-email</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2">info@passionetcreations.ch</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>mdi-map-marker</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2" style="line-height: 1.5em;">
                                Passion & Créations<br />
                                Les Ateliers de la Côte<br />
                                Rte de Pallatex 5<br />
                                1163 Etoy
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-col>
        <v-col cols="12" md="4" class="pa-3">
            <v-form @submit.prevent="sendContactForm">
                <v-text-field prepend-icon="mdi-account" name="name" label="Nom" type="text" :error-messages="form.errors.get('name')" v-model="form.name"></v-text-field>
                <v-text-field prepend-icon="mdi-lock" name="email" label="E-mail" type="email" :error-messages="form.errors.get('email')" v-model="form.email"></v-text-field>
                <v-textarea prepend-icon="mdi-lock" name="message" label="Votre message" rows="4" counter hint="Max. 1000 caractères" v-model="form.message"></v-textarea>
                <div class="text-center">
                    <v-btn type="submit" color="success">Envoyer</v-btn>
                </div>
            </v-form>
        </v-col>
    </v-row>
</template>

<script>
import Form from 'vform'
export default {
    data() {
        return {
            form: new Form({
                name: '',
                email: '',
                message: '',
            }),
            markers: [],
        }
    },
    methods: {
        sendContactForm() {
            console.log('sendContactForm')
        },
    },
}
</script>

<style scoped></style>
