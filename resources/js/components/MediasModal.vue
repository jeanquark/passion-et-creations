<template>
    <v-dialog v-model="dialog" width="500">
        <v-card>
            <v-card-title></v-card-title>
            <v-card-text> medias: {{ medias }} </v-card-text>
            <v-card-actions></v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
export default {
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
</style>
