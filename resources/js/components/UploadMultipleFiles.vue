<template>
    <v-row no-gutters class="my-4 mx-7" align="end">
        <v-col cols="12" class="mb-8">
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
        <v-col cols="12" class="mx-0">
            <v-form @submit.prevent="uploadMedias">
                <!-- items: {{ items }}<br /><br /> -->
                <!-- form.path: {{ form.path }}<br /><br /> -->
                <!-- form.files: {{ form.files }}<br /><br /> -->
                <!-- <span v-if="form.files"> form.files[0][size]: {{ form.files[0]['size'] }}<br /><br /></span> -->
                <v-file-input label="Sélectionner un ou des fichiers" filled :multiple="true" :clearable="false" show-size @change="onFileChange" v-model="form.files"></v-file-input>
                <div id="preview">
                    <!-- previewImages: {{ previewImages }}<br /> -->
                    <v-row no-gutters class="my-2">
                        <v-col cols="12" md="6" lg="4" class="pa-2" v-for="(previewImage, index) in previewImages" :key="index">
                            <v-img :src="previewImage"></v-img>
                        </v-col>
                    </v-row>
                </div>
                <div class="text-center">
                    <v-btn color="success" type="submit" :loading="form.busy">Uploader</v-btn>
                </div>
            </v-form>
        </v-col>
    </v-row>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
export default {
    props: ['items'],
    async created() {},
    async mounted() {},
    data() {
        return {
            form: new Form({
                files: null,
                path: ''
            }),
            url: null,
            previewImages: []
        }
    },
    computed: {},
    methods: {
        onFileChange(files) {
            console.log('onFileChange: ', files)
            // console.log(files[0].mozFullPath);
            this.form.path = this.items[this.items.length - 1]['path']
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
        },
        async uploadMedias() {
            try {
                await this.$store.dispatch('medias/uploadMedias', this.form)
                this.$emit('fileUploaded')
            } catch (error) {
                console.log('error: ', error)
            }
        }
    }
}
</script>

<style scoped>
#breadcrumbs {
    background-color: #e9ecef;
    border-radius: 5px;
}
</style>
