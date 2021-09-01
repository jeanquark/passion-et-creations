<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters>
            <v-col cols="12">
                medias.allDirectories: {{ medias.allDirectories }}<br />
                folders: {{ folders }}<br />
                files: {{ files }}<br />
                path: {{ path }}<br />
            </v-col>
            <v-col>
                <v-btn small color="primary" @click="goBack">Go back</v-btn>
                <ul>
                    <li v-for="(folder, index) in folders" :key="index">
                        <div class="link" @click="goTo(folder)">{{ folder }}</div>
                    </li>
                </ul>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminMediasIndex',
    async created() {
        // if (this.$store.getters['medias/medias'].length < 1) {
        const data = await this.$store.dispatch('medias/fetchMedias')
        console.log('data: ', data)

        this.goTo('/')
        // this.files = data.files
        // this.folders = data.rootDirectories
        // this.path = [{ name: 'Dossier Racine', folder: '/', active: true }]
        // const abc = data.allDirectories.map((directory) => directory.split('/'))
        // console.log('abc: ', abc)
        // const def = abc.filter((a) => a.length == 1)
        // console.log('def: ', def)
        // console.log('ghi: ', data.allDirectories[3].lastIndexOf('/'))
        // const rootDirectories = data.allDirectories
        //     .map((directory) => directory.split('/'))
        //     .filter((path) => path.length === 1)
        //     .map((folder) => folder[0])
        // console.log('rootDirectories: ', rootDirectories)
        // this.folders = rootDirectories
        // }
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
                },
            ],
        }
    },
    computed: {
        medias() {
            return this.$store.getters['medias/medias']
        },
    },
    methods: {
        goTo(path) {
            console.log('goTo path: ', path)
            this.folders = []
            if (path === '/') {
                this.medias.allDirectories
                    .map((directory) => directory.split('/'))
                    .filter((path) => path.length === 1)
                    .map((folder) => folder[0])
                    .forEach((folder) =>
                        this.folders.push({
                            name: folder,
                            path: '/' + folder,
                            type: 'folder',
                        })
                    )
                this.path = '/'
            } else {
                this.medias.allDirectories
                    .map((directory) => directory.split('/'))
                    .filter((a) => a[a.length - 2] === path.name)
                    .forEach((folder) =>
                        this.folders.push({
                            name: folder[folder.length - 1],
                            path: '/' + folder.join('/'),
                            type: 'folder',
                        })
                    )
                this.path = this.folders[0]['path'].substring(0, this.folders[0]['path'].lastIndexOf('/'))
            }
        },
        goTo2(folder) {
            console.log('goTo folder: ', folder)
            let path = this.medias.allDirectories.map((directory) => directory.split('/')).find((a) => a[a.length - 1] === folder)
            if (path != undefined) {
                console.log('join!')
                path = path.join('/')
            } else {
                path = ''
            }
            console.log('path: ', path)
            this.path = '/' + path
            const folders = this.medias.allDirectories
                .map((directory) => directory.split('/'))
                .filter((path) => path[path.length - 2] === folder)
                .map((path) => path[path.length - 1])
            // .filter(path => path.length == 2)
            // .map(path => path[path.length - 2])
            console.log('folders: ', folders)
            this.folders = folders
        },
        goBack() {
            console.log('goBack')
            const abc = this.path.substring(0, this.path.lastIndexOf('/'))
            console.log('abc: ', abc)
            // this.goTo(this.path.substring(0, this.path.lastIndexOf('/')))
            // this.goTo('images/Folder 1')
            // this.goTo(this.path)
            // this.goTo('/images')
            this.goTo({
                name: 'images',
                path: '/images',
                type: 'folder'
            })
        },
        goBack2() {
            console.log('goBack')
            // this.goTo('')
            const lastIndex = this.path.lastIndexOf('/')
            console.log('lastIndex: ', lastIndex)
            const newPath = this.path.substring(0, lastIndex)
            console.log('newPath: ', newPath)
            this.goTo('newPath')
        },
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
.link:hover {
    cursor: pointer;
}
</style>