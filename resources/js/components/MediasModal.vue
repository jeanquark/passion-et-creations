<template>
<!-- <div>
    showModal: {{ showModal }}
</div> -->
    <v-dialog v-model="dialog" width="500">
        <v-card>
            showModal: {{ showModal }}
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
    props: [ 'showModal' ],
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
    methods: {
        def () {
            console.log('def')
        }
        // showModal () {
        //     console.log('showModal')
        // }
    },
}
</script>

<style scoped>
</style>
