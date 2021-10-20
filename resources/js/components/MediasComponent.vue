<template>
    <v-card>
        <v-card-title></v-card-title>
        <v-card-text>
            <v-row no-gutters>
                <v-col cols="12">
                    <!-- medias: {{ medias }}<br /><br /> -->
                    <!-- medias.allDirectories: {{ medias.allDirectories }}<br /><br /> -->
                    <!-- medias.allFiles: {{ medias.allFiles }}<br /><br /> -->
                    <!-- medias.files_with_size: {{ medias.files_with_size }}<br /><br /> -->
                    <!-- folders: {{ folders }}<br /><br /> -->
                    <!-- files: {{ files }}<br /><br /> -->
                    <!-- path: {{ path }}<br /><br /> -->
                    <!-- items: {{ items }}<br /><br /> -->
                    <!-- showUploadFile: {{ showUploadFile }}<br /><br /> -->
                    <!-- route: {{ this.$route.path }}<br /><br /> -->
                    <!-- order: {{ order }}<br /><br /> -->
                    <!-- abc: {{ abc }}<br /><br /> -->
                    <!-- filter: {{ filter }}<br /><br /> -->
                </v-col>
            </v-row>

            <v-row no-gutters>
                <v-navigation-drawer app bottom right temporary :width="showUploadFile ? 512 : 256" v-model="showSidebar">
                    <!-- selectedFile: {{ selectedFile }}<br /> -->
                    <!-- selectedFolder: {{ selectedFolder }}<br /> -->
                    <div v-if="selectedFile" class="ma-4">
                        <v-img :src="`/medias/${selectedFile.path}`"></v-img>
                        <p class="text-center" style="">{{ selectedFile.name }}</p>
                        <p class="text-left">
                            Size: {{ formatFileSize(selectedFile.size) }}<br />
                            Width: {{ selectedFile.width }}px<br />
                            Height: {{ selectedFile.height }}px<br />
                            Last updated: {{ selectedFile.last_updated | moment('ddd DD MMM YYYY HH:mm') }}<br />
                        </p>
                        <div class="text-center" v-if="$route.path != '/admin/medias'">
                            <v-btn small color="primary" @click="addFile(selectedFile)">Ajouter</v-btn>
                        </div>
                        <div class="text-center mt-2">
                            <v-btn small color="success" @click="downloadFile()">Télécharger</v-btn>
                        </div>
                        <div class="text-center mt-2">
                            <v-btn small color="error" :loading="loading" @click="deleteFile()">Supprimer</v-btn>
                        </div>
                    </div>
                    <div v-if="selectedFolder" class="mt-2">
                        <!-- selectedFolder: {{ selectedFolder }} -->
                        <v-img src="/images/icons/folder.svg"></v-img>
                        <p class="text-center" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{ selectedFolder.name }}</p>
                        <div class="text-center">
                            <v-btn small color="error" :loading="loading" @click="deleteFolder()">Supprimer</v-btn>
                        </div>
                    </div>
                    <div v-if="showUploadFile">
                        <upload-multiple-files :items="items" @folderCreated="onFolderCreated" @fileUploaded="onFileUploaded" @fileUploadError="onFileUploadError"></upload-multiple-files>
                    </div>
                </v-navigation-drawer>

                <v-col cols="12">
                    <v-row no-gutters class="mt-4 mx-0" align="end">
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
                </v-col>
                <v-col cols="12" class="d-inline-flex align-center">
                    <v-btn icon :color="order == 'date-asc' ? 'primary' : ''" class="my-2" :class="[order == 'date-asc' ? 'active' : '']" @click="sort('date-asc')"
                        ><v-icon>mdi-sort-calendar-ascending</v-icon></v-btn
                    >
                    <v-btn icon :color="order == 'date-desc' ? 'primary' : ''" class="my-2" :class="[order == 'date-desc' ? 'active' : '']" @click="sort('date-desc')"
                        ><v-icon>mdi-sort-calendar-descending</v-icon></v-btn
                    >
                    <v-btn icon :color="order == 'alpha-asc' ? 'primary' : ''" class="my-2" :class="[order == 'alpha-asc' ? 'active' : '']" @click="sort('alpha-asc')"
                        ><v-icon>mdi-sort-alphabetical-ascending</v-icon></v-btn
                    >
                    <v-btn icon :color="order == 'alpha-desc' ? 'primary' : ''" class="my-2" :class="[order == 'alpha-desc' ? 'active' : '']" @click="sort('alpha-desc')"
                        ><v-icon>mdi-sort-alphabetical-descending</v-icon></v-btn
                    >
                    <v-btn icon :color="order == 'num-asc' ? 'primary' : ''" class="my-2" :class="[order == 'num-asc' ? 'active' : '']" @click="sort('num-asc')"
                        ><v-icon>mdi-sort-numeric-ascending</v-icon></v-btn
                    >
                    <v-btn icon :color="order == 'num-desc' ? 'primary' : ''" class="my-2" :class="[order == 'num-desc' ? 'active' : '']" @click="sort('num-desc')"
                        ><v-icon>mdi-sort-numeric-descending</v-icon></v-btn
                    >

                    <v-text-field prepend-icon="mdi-magnify" label="Chercher" clearable class="ml-5" v-model="search"></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-row no-gutters align="end" class="mx-0" style="border: 2px solid #e9ecef; border-radius: 5px; min-height: 200px" @click="handleClick">
                        <v-col cols="12" md="3" lg="2" class="pa-3" v-for="(folder, index) of folders" :key="`folder_${index}`">
                            <v-hover v-slot="{ hover }">
                                <v-img
                                    :src="hover ? '/images/icons/folder_hover.svg' : '/images/icons/folder.svg'"
                                    class="folder"
                                    id="clickableElement"
                                    data-type="folder"
                                    :data-value="{ name: folder.name, path: folder.path }"
                                    :data-name="folder.name"
                                    :data-path="folder.path"
                                ></v-img>
                            </v-hover>
                            <p class="text-center" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{ folder.name }}</p>
                        </v-col>
                        <v-col cols="12" md="3" lg="2" class="pa-3" v-for="(file, index) of files" :key="`file_${index}`">
                            <div v-if="getFileType(file.name) === 'image'" @click.stop="clickOnFile(file)" class="image">
                                <v-img :src="`/medias${file.path}`" id="clickableElement" aspect-ratio="1" class="" data-type="file"></v-img>
                                <p class="text-center" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap">{{ file.name }}</p>
                            </div>
                            <div v-else>Not an image</div>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>

<script>
var fileDownload = require('js-file-download')
import UploadMultipleFiles from './UploadMultipleFiles'
export default {
    name: 'AdminMediasIndex',
    components: { UploadMultipleFiles },
    async created() {
        if (this.$store.getters['medias/medias'].length < 1) {
            const data = await this.$store.dispatch('medias/fetchMedias')
            console.log('data: ', data)
        }
        await this.goTo('/')
    },
    data() {
        return {
            showSidebar: false,
            showUploadFile: false,
            files: [],
            folders: [],
            selectedFile: null,
            selectedFolder: null,
            path: '/',
            items: [],
            clicksCount: 0,
            clicksTimer: null,
            loading: false,
            order: 'date-desc',
            search: '',
        }
    },
    computed: {
        medias() {
            return this.$store.getters['medias/medias']
        },
    },
    methods: {
        filter(file) {
            // console.log('filter: ', file.name)
            // return file.path.split('/').length > 1
            // console.log('filter', file.name.includes(this.search))
            return file.name.includes(this.search)
        },
        async goTo(folderPath, folderName, order = (a, b) => b.last_updated - a.last_updated) {
            try {
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
                        disabled: true,
                    })
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

                    this.medias.files_with_size
                        .filter((file) => file.path.split('/').length === 1)
                        .filter((file) => this.filter(file))
                        .sort(order)
                        .forEach((file) => {
                            const fileName = this.formatFileName(file.path)
                            this.files.push({
                                name: fileName,
                                path: '/' + file.path,
                                thumbnail_path: '/' + this.formatRemoveFileExtension(file.path) + '_thumbnail.' + this.formatFileExtension(fileName),
                                size: file.size,
                                width: file.width,
                                height: file.height,
                                last_updated: file.last_updated,
                                extension: fileName.substring(fileName.lastIndexOf('.') + 1),
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
                            disabled: index === paths.length - 1 ? true : false,
                        })
                    })
                    this.medias.allDirectories
                        .map((directory) => directory.split('/'))
                        .filter((a) => a[a.length - 2] === folderName)
                        .forEach((folder) =>
                            this.folders.push({
                                name: folder[folder.length - 1],
                                path: '/' + folder.join('/'),
                                type: 'folder',
                            })
                        )

                    this.medias.files_with_size
                        .filter((file) => file.path.split('/').length > 1)
                        .filter((file) => this.filter(file))
                        // .filter((file) => file)
                        .sort(order)
                        .forEach((file) => {
                            const pathArray = file.path.split('/')
                            if (pathArray[pathArray.length - 2] === folderName) {
                                const fileName = this.formatFileName(file.path)
                                this.files.push({
                                    name: fileName,
                                    path: '/' + file.path,
                                    thumbnail_path: '/' + this.formatRemoveFileExtension(file.path) + '_thumbnail.' + this.formatFileExtension(fileName),
                                    size: file.size,
                                    width: file.width,
                                    height: file.height,
                                    last_updated: file.last_updated,
                                    extension: fileName.substring(fileName.lastIndexOf('.') + 1),
                                })
                            }
                        })
                }
            } catch (error) {
                console.log('error: ', error)
            }
        },
        goBack() {
            try {
                console.log('goBack')
                let path = this.path.substring(0, this.path.lastIndexOf('/'))
                if (path == '') {
                    path = '/'
                }
                console.log('path: ', path)

                const name = path.substring(path.lastIndexOf('/') + 1, path.length)
                console.log('name: ', name)
                this.goTo(path, name)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        sort(order) {
            try {
                console.log('sort: ', order)
                this.order = order
                switch (this.order) {
                    case 'alpha-asc':
                        this.goTo(this.path, this.formatFileName(this.path), (a, b) => a.name.localeCompare(b.name))
                        break
                    case 'alpha-desc':
                        this.goTo(this.path, this.formatFileName(this.path), (a, b) => b.name.localeCompare(a.name))
                        break
                    case 'num-asc':
                        this.goTo(this.path, this.formatFileName(this.path), (a, b) => a.size - b.size)
                        break
                    case 'num-desc':
                        this.goTo(this.path, this.formatFileName(this.path), (a, b) => b.size - a.size)
                        break
                    case 'date-asc':
                        this.goTo(this.path, this.formatFileName(this.path), (a, b) => a.last_updated - b.last_updated)
                        break
                    case 'date-desc':
                        this.goTo(this.path, this.formatFileName(this.path), (a, b) => b.last_updated - a.last_updated)
                        break
                    default:
                        return (a, b) => a.name - b.name
                }
            } catch (error) {
                console.log('error: ', error)
            }
        },
        clickOnFile(file) {
            try {
                console.log('clickOnFile file: ', file)
                this.selectedFolder = null
                this.selectedFile = file
                this.showUploadFile = false
                this.showSidebar = true
            } catch (error) {
                console.log('error: ', error)
            }
        },
        handleClick(e) {
            try {
                console.log('handleClick e: ', e)
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
                            console.log(e.target.parentNode.getAttribute('data-path'))
                            const folderPath = e.target.parentNode.getAttribute('data-path')
                            this.selectedFolder = this.folders.find((folder) => folder.path === folderPath)
                        } else if (e.target.parentNode.getAttribute('data-type') === 'file') {
                            console.log('Clicked on file')
                            this.selectedFile = null
                            this.selectedFolder = null
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
            } catch (error) {
                console.log('error: ', error)
            }
        },
        addFile(file) {
            try {
                console.log('addFile')
                this.showSidebar = false
                this.$emit('addFile', file)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async downloadFile() {
            try {
                console.log('downloadFile: ', this.selectedFile.path)
                const data = await this.$store.dispatch('medias/downloadMedia', {
                    path: this.selectedFile.path,
                })
                fileDownload(data, this.selectedFile.name)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async onFolderCreated() {
            try {
                console.log('onFolderCreated')
                await this.$store.dispatch('medias/fetchMedias')
                this.showSidebar = false
                this.goTo(this.path, this.formatFileName(this.path))
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Dossier ajouté avec succès.',
                })
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le dossier n'a pas pu être créé.",
                })
            }
        },
        async onFileUploaded() {
            try {
                console.log('onFileUploaded')
                await this.$store.dispatch('medias/fetchMedias')
                this.showSidebar = false
                this.goTo(this.path, this.formatFileName(this.path))
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Fichier ajouté avec succès.',
                })
            } catch (error) {
                console.log('error from MediasComponent: ', error)
            }
        },
        async onFileUploadError() {
            try {
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le fichier n'a pas pu être téléversé.",
                })
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async deleteFolder() {
            try {
                this.loading = true
                await this.$store.dispatch('medias/deleteFolder', this.selectedFolder.path)
                this.showSidebar = false
                this.goTo(this.path, this.formatFileName(this.path))
                this.loading = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Dossier supprimé avec succès.',
                })
            } catch (error) {
                this.loading = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le dossier n'a pas été supprimé.",
                })
            }
        },
        async deleteFile() {
            try {
                this.loading = true
                await this.$store.dispatch('medias/deleteFile', this.selectedFile.path)
                this.loading = false
                this.showSidebar = false
                this.goTo(this.path, this.formatFileName(this.path))
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Fichier supprimé avec succès.',
                })
            } catch (error) {
                console.log('error: ', error)
                this.loading = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le fichier n'a pas été supprimé.",
                })
            }
        },
        getFileType(fileName) {
            try {
                const fileExtension = fileName.substring(fileName.lastIndexOf('.'))
                // console.log('fileExtension: ', fileExtension)
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
            } catch (error) {
                console.log('error: ', error)
            }
        },
        formatFileSize(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes'

            const k = 1024
            const dm = decimals < 0 ? 0 : decimals
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

            const i = Math.floor(Math.log(bytes) / Math.log(k))

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i]
        },
        formatFileExtension(fileName) {
            const index = fileName.lastIndexOf('.')
            return fileName.substring(index + 1)
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
    watch: {
        search() {
            // console.log('search: ', this.search)
            this.goTo(this.path, this.formatFileName(this.path))
        },
    },
}
</script>

<style scoped>
#breadcrumbs {
    background-color: #e9ecef;
    border-radius: 5px;
}
.link:hover {
    cursor: pointer;
}
.image:hover {
    cursor: pointer;
    /* border: 4px solid #e9ecef; */
    background: #e9ecef;
    /* -webkit-box-shadow:inset 0px 0px 0px 10px #f00; */
    /* -moz-box-shadow:inset 0px 0px 0px 10px #f00; */
    /* box-shadow:inset 10px 10px 10px 10px #f00; */
}
.folder:hover {
    cursor: pointer;
}
.active {
    background: #e9ecef;
}
.icon-active {
    color: yellowgreen;
}
</style>
