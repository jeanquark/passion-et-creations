<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters>
            <v-col cols="12">
                medias: {{ medias }}
                
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminMediasIndex',
    async created() {
        if (this.$store.getters['medias/medias'].length < 1) {
            const data = await this.$store.dispatch('medias/fetchMedias')
            console.log('data: ', data)
            this.files = data.files
            this.folders = data.rootDirectories
            this.path = [{ name: 'Dossier Racine', folder: '/', active: true }]
        }
    },
    data() {
        return {
            files: [],
            folders: [],
            path: [],
            items: [
                {
                    text: 'Medias',
                    disabled: true,
                    href: '/admin/medias',
                }
            ],
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