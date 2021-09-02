<template>
    <v-main>
        <!-- <v-breadcrumbs large :items="items"></v-breadcrumbs> -->
        <v-row no-gutters>
            <v-col cols="12">
                medias.allDirectories: {{ medias.allDirectories }}<br /><br />
                medias.allFiles: {{ medias.allFiles }}<br /><br />
                folders: {{ folders }}<br /><br />
                files: {{ files }}<br /><br />
                path: {{ path }}<br /><br />
                items: {{ items }}<br /><br />
            </v-col>
            <!-- <v-col>
                <v-btn small color="primary" @click="goBack">Go back</v-btn><br />
                Folders:<br />
                <ul>
                    <li v-for="(folder, index) in folders" :key="index">
                        <div class="link" @click="goTo(folder.path, folder.name)">{{ folder }}</div>
                    </li>
                </ul>
                Files:<br />
                <ul>
                    <li v-for="(file, index) in files" :key="index">
                        <div class="link">{{ file }}</div>
                    </li>
                </ul>
            </v-col> -->
        </v-row>

        <v-row no-gutters>
            tab: {{ tab }}
            <v-navigation-drawer v-model="showSidebar" app bottom right temporary>
                <v-list nav dense>
                    <v-list-item-group active-class="deep-purple--text text--accent-4">
                        <v-list-item>
                            <v-list-item-title>Foo</v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title>Bar</v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title>Fizz</v-list-item-title>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-title>Buzz</v-list-item-title>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
            </v-navigation-drawer>
            <v-tabs v-model="tab" align-with-title>
                <v-tabs-slider color="yellow"></v-tabs-slider>
                <v-tab href="#tab-1"> Médiathèque </v-tab>
                <v-tab href="#tab-2"> Uploader un fichier </v-tab>
                <v-tabs-items v-model="tab">
                    <v-tab-item :value="'tab-1'">
                        <v-row no-gutters class="my-4 mx-7" align="end">
                            <v-col cols="12" class="ml-4 mb-3">
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
                        </v-row>
                        <v-row no-gutters align="end" class="mx-6" style="border: 2px solid green;" @click="handleClick">
                            <v-col cols="6" md="3" lg="2" class="pa-2" v-for="(folder, index) of folders" :key="`folder_${index}`" >
                                <v-img src="/images/icons/folder.png" class="link" id="clickableElement" :data-value='{"name": folder.name, "path": folder.path}' data-type="folder" :data-name="folder.name" :data-path="folder.path"></v-img>
                                <p class="text-center" style="word-break: break-word">{{ folder.name }}</p>
                            </v-col>
                            <v-col
                                cols="6"
                                md="3"
                                lg="2"
                                class="pa-2"
                                v-for="(file, index) of files"
                                :key="`file_${index}`"
                            >
                                <v-img :src="`/medias${file.path}`" class="link" id="clickableElement"></v-img>
                                <p class="text-center" style="word-break: break-word">{{ file.name }}</p>
                            </v-col>
                        </v-row>
                    </v-tab-item>
                    <v-tab-item :value="'tab-2'">
                        <v-row no-gutters class="ml-7">
                            <v-col cols="12" justify="center">
                                <upload-multiple-files :items="items"></upload-multiple-files>
                            </v-col>
                        </v-row>
                    </v-tab-item>
                </v-tabs-items>
            </v-tabs>
        </v-row>
    </v-main>
</template>

<script>
import UploadMultipleFiles from '../../../components/UploadMultipleFiles'
export default {
    name: 'AdminMediasIndex',
    components: { UploadMultipleFiles },
    async created() {
        // if (this.$store.getters['medias/medias'].length < 1) {
        const data = await this.$store.dispatch('medias/fetchMedias')
        console.log('data: ', data)
        // }

        this.goTo('/')
    },
    data() {
        return {
            showSidebar: false,
            tab: null,
            tabs: ['Médiathèque', 'Uploader un fichier'],
            files: [],
            folders: [],
            path: '/',
            items: [],
            clicksCount: 0,
            clicksTimer: null
        }
    },
    computed: {
        medias() {
            return this.$store.getters['medias/medias']
        }
    },
    methods: {
        goTo(folderPath, folderName) {
            console.log('goTo folderPath: ', folderPath)
            console.log('goTo folderName: ', folderName)
            this.items = []
            this.folders = []
            this.files = []

            if (folderPath === '/') {
                this.path = '/'
                this.items.push({
                    name: 'Dossier racine',
                    path: '/',
                    disabled: true
                })
                this.medias.allDirectories
                    .map(directory => directory.split('/'))
                    .filter(path => path.length === 1)
                    .map(folder => folder[0])
                    .forEach(folder =>
                        this.folders.push({
                            name: folder,
                            path: '/' + folder,
                            type: 'folder'
                        })
                    )
                this.medias.allFiles
                    .map(filePath => filePath.split('/'))
                    .filter(filePath => filePath.length === 1)
                    .map(file => file[0])
                    .forEach(file =>
                        this.files.push({
                            name: file,
                            path: '/' + file,
                            extension: file.substring(file.lastIndexOf('.') + 1)
                        })
                    )
            } else {
                this.path = folderPath
                this.items = []
                const paths = folderPath.split('/')
                console.log('paths: ', paths)
                let array = []
                paths.forEach((folderName, index, paths) => {
                    array.push(folderName)
                    this.items.push({
                        name: folderName ? folderName : 'Dossier Racine',
                        path: folderName ? array.join('/') : '/',
                        disabled: index === paths.length - 1 ? true : false
                    })
                })
                this.medias.allDirectories
                    .map(directory => directory.split('/'))
                    .filter(a => a[a.length - 2] === folderName)
                    .forEach(folder =>
                        this.folders.push({
                            name: folder[folder.length - 1],
                            path: '/' + folder.join('/'),
                            type: 'folder'
                        })
                    )
                this.medias.allFiles
                    .map(filePath => filePath.split('/'))
                    .filter(a => a[a.length - 2] === folderName)
                    .forEach(file =>
                        this.files.push({
                            name: file[file.length - 1],
                            path: '/' + file.join('/'),
                            extension: file.join('/').substring(file.join('/').lastIndexOf('.') + 1)
                        })
                    )
            }
        },
        goBack() {
            console.log('goBack')
            let path = this.path.substring(0, this.path.lastIndexOf('/'))
            if (path == '') {
                path = '/'
            }
            console.log('path: ', path)

            const name = path.substring(path.lastIndexOf('/') + 1, path.length)
            console.log('name: ', name)
            this.goTo(path, name)
        },
        handleClick(e) {
            console.log('handleClick e: ', e)
            console.log('e.target: ', e.target)
            console.log('e.target.parentNode: ', e.target.parentNode)
            console.log('e.target.parentNode.id: ', e.target.parentNode.id)
            console.log('e.target.parentNode[data-value]: ', e.target.parentNode.getAttribute('data-value'))
            // console.log('abc: ', abc)
            // console.log('def: ', def)
            // var target = e.target || e.srcElement
            // var text = target.textContent || target.innerText
            // console.log('target: ', target)
            // console.log('text: ', text)
            this.clicksCount++
            if (this.clicksCount === 1) {
                var self = this
                this.clicksTimer = setTimeout(() => {
                    console.log('Click!')
                    this.clicksCount = 0
                    // this.selectFolder(folder)
                    this.showSidebar = !this.showSidebar
                }, 200)
            } else {
                clearTimeout(this.clicksTimer)
                console.log('Double click!')
                this.clicksCount = 0
                // this.navigateToFolder(folder)
                if (e.target.parentNode.getAttribute('data-type') === 'folder') {
                    const folderName = e.target.parentNode.getAttribute('data-name')
                    const folderPath = e.target.parentNode.getAttribute('data-path')
                    this.goTo(folderPath, folderName)
                }
            }
        },
        formatFileName(file) {
            const index = file.lastIndexOf('/')
            return file.substring(index + 1)
        },
        formatRemoveFileExtension(file) {
            const index = file.lastIndexOf('.')
            return file.substring(0, index)
        }
    }
}
</script>

<style scoped>
.link:hover {
    cursor: pointer;
    background: #e9ecef;
}
.folder:hover {
    cursor: pointer;
    background: #e9ecef;
}
.image:hover {
    cursor: pointer;
    border: 4px solid #e9ecef;
}
#breadcrumbs {
    background-color: #e9ecef;
    border-radius: 5px;
}
</style>
