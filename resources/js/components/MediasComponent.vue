<template>
    <v-card>
        <v-card-title></v-card-title>
        <v-card-text>
            <v-row no-gutters>
                <v-col cols="12">
                    <!-- medias.allDirectories: {{ medias.allDirectories }}<br /><br /> -->
                    medias.allFiles: {{ medias.allFiles }}<br /><br />
                    medias.files_with_size: {{ medias.files_with_size }}<br /><br />
                    folders: {{ folders }}<br /><br />
                    files: {{ files }}<br /><br />
                    path: {{ path }}<br /><br />
                    items: {{ items }}<br /><br />
                    showUploadFile: {{ showUploadFile }}<br /><br />
                </v-col>
            </v-row>

            <v-row no-gutters>
                <v-navigation-drawer app bottom right temporary :width="showUploadFile ? 512 : 256" v-model="showSidebar">
                    <!-- selectedFile: {{ selectedFile }}<br /> -->
                    selectedFolder: {{ selectedFolder }}<br />
                    <div v-if="selectedFile" class="ma-4">
                        <v-img :src="`/medias/${selectedFile.path}`"></v-img>
                        <p class="text-center" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{ selectedFile.name }}</p>
                        <p class="text-left">
                            Size: {{ selectedFile.size }}KB<br />
                            Width: {{ selectedFile.width }}px<br />
                            Height: {{ selectedFile.height }}px<br />
                            Last updated: {{ selectedFile.last_updated | moment('DD-MM-YYYY HH:mm') }}<br />
                        </p>
                        <div class="text-center">
                            <v-btn small color="primary" @click="addFile(selectedFile)">Ajouter</v-btn>
                        </div>
                    </div>
                    <div v-if="showUploadFile">
                        <upload-multiple-files :items="items"></upload-multiple-files>
                    </div>
                </v-navigation-drawer>

                <v-row no-gutters class="my-4 mx-0" align="end">
                    <v-col cols="12" class="ml-0 mb-3">
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
                <v-row no-gutters align="end" class="mx-0" style="border: 2px solid green" @click="handleClick">
                    <v-col cols="6" md="3" lg="2" class="pa-3" v-for="(folder, index) of folders" :key="`folder_${index}`">
                        <v-img
                            src="/images/icons/folder.png"
                            class="link"
                            id="clickableElement"
                            :data-value="{ name: folder.name, path: folder.path }"
                            data-type="folder"
                            :data-name="folder.name"
                            :data-path="folder.path"
                        ></v-img>
                        <p class="text-center" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{ folder.name }}</p>
                    </v-col>
                    <v-col cols="6" md="3" lg="2" class="pa-3" v-for="(file, index) of files" :key="`file_${index}`">
                        <div v-if="getFileType(file.name) === 'image'" @click.stop="clickOnFile(file)">
                            <v-img :src="`/medias${file.path}`" id="clickableElement" aspect-ratio="1" class="link" data-type="file"></v-img>
                            <p class="text-center" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{ file.name }}</p>
                        </div>
                        <div v-else>Not an image</div>
                    </v-col>
                </v-row>
            </v-row>
        </v-card-text>
    </v-card>
</template>

<script>
import UploadMultipleFiles from './UploadMultipleFiles'
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
            showUploadFile: false,
            // tab: null,
            // tabs: ['Médiathèque', 'Uploader un fichier'],
            files: [],
            folders: [],
            selectedFile: null,
            selectedFolder: null,
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
                // this.medias.allFiles
                //     .map((filePath) => filePath.split('/'))
                //     .filter((filePath) => filePath.length === 1)
                //     .map((file) => file[0])
                //     .forEach((file) =>
                //         this.files.push({
                //             name: file,
                //             path: '/' + file,
                //             extension: file.substring(file.lastIndexOf('.') + 1),
                //         })
                //     )

                this.medias.files_with_size
                    .filter(file => file.path.split('/').length === 1)
                    .forEach(file => {
                        const fileName = file.path.substring(file.path.lastIndexOf('/') + 1)
                        this.files.push({
                            name: fileName,
                            path: '/' + file.path,
                            size: file.size,
                            width: file.width,
                            height: file.height,
                            last_updated: file.last_updated,
                            extension: fileName.substring(fileName.lastIndexOf('.') + 1)
                        })
                    })
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
                // this.medias.allFiles
                //     .map(filePath => filePath.split('/'))
                //     .filter(a => a[a.length - 2] === folderName)
                //     .forEach(file =>
                //         this.files.push({
                //             name: file[file.length - 1],
                //             path: '/' + file.join('/'),
                //             extension: file.join('/').substring(file.join('/').lastIndexOf('.') + 1)
                //         })
                //     )
                this.medias.files_with_size
                    .filter(file => file.path.split('/').length > 1)
                    .forEach(file => {
                        const pathArray = file.path.split('/')
                        if (pathArray[pathArray.length - 2] === folderName) {
                            const fileName = file.path.substring(file.path.lastIndexOf('/') + 1)
                            this.files.push({
                                name: fileName,
                                path: '/' + file.path,
                                size: file.size,
                                width: file.width,
                                height: file.height,
                                last_updated: file.last_updated,
                                extension: fileName.substring(fileName.lastIndexOf('.') + 1)
                            })
                        }
                    })
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
        clickOnFile(file) {
            console.log('clickOnFile file: ', file)
            this.selectedFile = file
            this.showUploadFile = false
            this.showSidebar = true
        },
        handleClick(e) {
            console.log('handleClick e: ', e)
            // console.log('e.target: ', e.target)
            // console.log('e.target.parentNode: ', e.target.parentNode)
            // console.log('e.target.parentNode.id: ', e.target.parentNode.id)
            // console.log('e.target.parentNode[data-value]: ', e.target.parentNode.getAttribute('data-value'))
            this.selectedFile = null
            this.selectedFolder = null
            this.showUploadFile = false
            this.clicksCount++
            if (this.clicksCount === 1) {
                this.clicksTimer = setTimeout(() => {
                    console.log('Single click!')
                    this.clicksCount = 0
                    this.showSidebar = !this.showSidebar
                    if (e.target.parentNode.getAttribute('data-type') === 'folder') {
                        console.log('Clicked on folder')
                    } else if (e.target.parentNode.getAttribute('data-type') === 'file') {
                        console.log('Clicked on file')
                        this.selectedFile = ''
                    } else {
                        console.log('Clicked on blank')
                        this.showUploadFile = true
                    }
                }, 350)
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
        addFile(file) {
            this.showSidebar = false
            this.$emit('addFile', file)
        },
        getFileType(fileName) {
            const fileExtension = fileName.substring(fileName.lastIndexOf('.'))
            console.log('fileExtension: ', fileExtension)
            switch (fileExtension) {
                case '.jpg':
                case '.JPG':
                case '.jpeg':
                case '.JPEG':
                case '.png':
                case '.PNG':
                    return 'image'
                case '.pdf':
                case '.PDF':
                    return 'file'
                default:
                    return null
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
    border: 2px solid #e9ecef;
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
