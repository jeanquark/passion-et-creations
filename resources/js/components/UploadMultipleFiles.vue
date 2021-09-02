<template>
    <v-row no-gutters class="my-4 mx-7" align="end">
        <v-col cols="12" class="mb-4">
            <!-- <v-breadcrumbs large id="breadcrumbs">
                <v-breadcrumbs-item> Uploader une image </v-breadcrumbs-item>
            </v-breadcrumbs> -->
            <v-breadcrumbs large :items="items" id="breadcrumbs">
                <template v-slot:item="{ item }">
                    <v-breadcrumbs-item class="link" :disabled="item.disabled" @click="goTo(item.path, item.name)">
                        {{ item.name }}
                    </v-breadcrumbs-item>
                </template>
                <template v-slot:divider>
                    <v-icon>mdi-chevron-right</v-icon>
                </template>
            </v-breadcrumbs>
        </v-col>
        <v-col cols="12" md="8" lg="6" class="mx-4">
            <v-file-input label="Sélectionner un fichier" filled prepend-icon="mdi-camera"></v-file-input>
            <v-btn small color="success">Uploader</v-btn>
        </v-col>
    </v-row>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
export default {
    props: ['items'],
    async created() {
        this.$store.dispatch('medias/fetchMedias')
    },
    async mounted() {},
    data() {
        return {
            dialog: true,
        }
    },
    computed: {
        medias() {
            return this.$store.getters['medias/medias']
        },
    },
    methods: {},
}
</script>

<style scoped>
#breadcrumbs {
    background-color: #e9ecef;
    border-radius: 5px;
}
</style>
