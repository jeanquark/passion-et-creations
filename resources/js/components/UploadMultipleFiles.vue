<template>
    <v-main>
        <v-row no-gutters class="my-4 mx-7" align="end">
            <v-col cols="12" class="mb-8">
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
            <v-col cols="12" class="mx-0">
                <v-form @submit.prevent="uploadMedias">
                    <!-- items: {{ items }}<br /><br /> -->
                    <!-- form.path: {{ form.path }}<br /><br /> -->
                    <!-- form.files: {{ form.files }}<br /><br /> -->
                    <!-- <span v-if="form.files"> form.files[0][size]: {{ form.files[0]['size'] }}<br /><br /></span> -->
                    <!-- formFiles.files.length(): {{ formFiles.file.length() }}<br /><br /> -->
                    <!-- formFilesError: {{ formFilesError }}<br /><br /> -->
                    <!-- formFiles.errors.get('files'): {{ formFiles.errors.get('files') }}<br /><br /> -->
                    <!-- formFiles.errors.errors: {{ formFiles.errors.errors }}<br /><br /> -->
                    <!-- formFiles.errors.get('files*'): {{ formFiles.errors.get('files.*') }}<br /><br /> -->
                    <!-- abc: {{ abc }}<br /><br /> -->

                    <small
                        >Vérifiez que l'image est bien minimisée <b>avant</b> l'upload. Utiliser un service de compression comme
                        <a href="https://compressjpeg.com/fr/" target="_blank">compressjpeg</a> pour obtenir des images de taille inférieur tout en maintenant la qualité (gain de 50% en moyenne et un
                        site se chargeant plus rapidement).</small
                    >
                    <v-file-input
                        label="Sélectionner un ou des fichiers"
                        name="Fichiers"
                        id="Fichiers"
                        filled
                        :multiple="true"
                        :clearable="false"
                        show-size
                        class="mt-3"
                        :error-messages="formFilesError.files"
                        @change="onFileChange"
                        v-model="formFiles.files"
                    ></v-file-input>
                    <div id="preview">
                        <!-- previewImages: {{ previewImages }}<br /> -->
                        <v-row no-gutters class="my-2">
                            <v-col cols="12" md="6" lg="4" class="pa-2" v-for="(previewImage, index) in previewImages" :key="index">
                                <v-img :src="previewImage"></v-img>
                            </v-col>
                        </v-row>
                    </div>
                    <div class="text-center">
                        <v-btn small color="success" type="submit" :loading="formFiles.busy">Uploader</v-btn>
                    </div>
                </v-form>
                <v-divider class="mt-10"></v-divider>
            </v-col>
        </v-row>
        <v-row no-gutters class="my-3 mx-7">
            <v-col cols="12" class="pa-2">
                <v-form @submit.prevent="createFolder">
                    <v-text-field label="Nom du dossier" v-model="formFolder.name"></v-text-field>
                    <div class="text-center">
                        <v-btn small color="success" type="submit" :loading="formFolder.busy">Créer dossier</v-btn>
                    </div>
                </v-form>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import Form from 'vform'
export default {
    props: ['items'],
    async created() {},
    async mounted() {},
    data() {
        return {
            formFiles: new Form({
                files: null,
                path: '',
            }),
            formFolder: new Form({
                name: null,
                path: '',
            }),
            url: null,
            previewImages: [],
            // formFilesError: null
        }
    },
    computed: {
        formFilesError() {
            const { errors } = this.formFiles.errors
            for (let key in errors) {
                // console.log('key: ', key)
                if (key.startsWith('files.')) {
                    return {'files': errors[key]}
                } else {
                    return {[key]: errors[key]}
                }
            }
            return {}
        },
    },
    methods: {
        onFileChange(files) {
            try {
                console.log('onFileChange: ', files)
                // console.log(files[0].mozFullPath);
                this.formFiles.path = this.items[this.items.length - 1]['path']
                this.previewImages = []
                for (let i = 0; i < files.length; i++) {
                    if (files[i]['type'].startsWith('image/')) {
                        this.previewImages.push(URL.createObjectURL(files[i]))
                    }
                }
                // const file = e.target;
                // console.log('file: ', file)
                // this.url = URL.createObjectURL(file);
                // const file = e.target.files[0]
                // this.url = URL.createObjectURL(e[0])
                // if (file) {
                //     blah.src = URL.createObjectURL(file)
                // }
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async createFolder() {
            try {
                this.formFolder.path = this.items[this.items.length - 1]['path']
                console.log('formFolder: ', this.formFolder)
                await this.$store.dispatch('medias/createFolder', this.formFolder)
                this.$emit('folderCreated')
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async uploadMedias() {
            try {
                await this.$store.dispatch('medias/uploadMedias', this.formFiles)
                this.$emit('fileUploaded')
            } catch (error) {
                console.log('error from uploadMultipleFiles: ', error)
                this.$emit('fileUploadError')
            }
        },
    },
}
</script>

<style scoped>
#breadcrumbs {
    background-color: #e9ecef;
    border-radius: 5px;
}
</style>
