<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters>
            <v-col cols="12">
                medias: {{ medias }}<br />
                folders: {{ folders }}<br />
                files: {{ files }}<br />
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
            // this.files = data.files
            // this.folders = data.rootDirectories
            // this.path = [{ name: 'Dossier Racine', folder: '/', active: true }]
            const abc = data.allDirectories.map(directory => directory.split('/'))
            console.log('abc: ', abc)
            const def = abc.filter(a => a.length == 1)
            console.log('def: ', def)
        }
    },
    data() {
        return {
            files: [],
            folders: [],
            path: '/',
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
    methods: {
        formatFileName(file) {
            const index = file.lastIndexOf('/')
            return file.substring(index + 1)
        },
        formatRemoveFileExtension(file) {
            const index = file.lastIndexOf('.')
            return file.substring(0, index)
        },
    },
}
</script>

<style scoped>
</style>