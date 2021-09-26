<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12" md="8">
                <v-form @submit.prevent="createPortfolio">
                    <v-text-field prepend-icon="mdi-lock" name="title" label="Titre" type="text" :error-messages="form.errors.get('title')" v-model="form.title"></v-text-field>
                    <!-- <v-text-field prepend-icon="mdi-lock" name="description" label="Description" type="text" :error-messages="form.errors.get('description')" v-model="form.description"></v-text-field> -->
                    <text-editor-component @toggleShowHTML="toggleShowHTML" :formContent="form.description" v-if="form.description" />

                    <v-row no-gutters class="px-6">
                        <v-col cols="12">
                            <span class="pl-2" style="color: grey; font-size: .9em">Images</span>
                        </v-col>
                        <v-col cols="12" md="6" lg="4" class="pa-2" style="border: 0px solid green" v-for="(image, index) in form.images" :key="index">
                            <v-hover v-slot="{ hover }">
                                <v-card height="200" :elevation="hover ? 12 : 2" :class="{ 'on-hover': hover }" class="d-flex justify-center align-center" style="border: 0px dashed #ccc">
                                    <v-card-text class="text-center">
                                        <v-img :src="`/medias/${image.path}`" width="100%"></v-img>
                                        {{ image.name }}
                                    </v-card-text>
                                </v-card>
                            </v-hover>
                        </v-col>
                        <v-col cols="12" md="4" lg="4" class="pa-2" style="">
                            <v-hover v-slot="{ hover }">
                                <v-card
                                    height="200"
                                    width="100%"
                                    :elevation="hover ? 12 : 2"
                                    :class="{ 'on-hover': hover }"
                                    class="d-flex justify-center align-center"
                                    style="border: 2px dashed #ccc"
                                    @click="dialog = !dialog"
                                >
                                    <v-card-text class="text-center" style="">
                                        <v-icon x-large>mdi-plus</v-icon>
                                    </v-card-text>
                                </v-card>
                            </v-hover>
                        </v-col>
                    </v-row>

                    <div class="text-center mt-5">
                        <v-btn type="submit" color="success" :loading="form.busy">Ajouter</v-btn>
                    </div>
                </v-form>
            </v-col>
            <v-col cols="12">
                <v-form @submit.prevent="uploadImage">
                    <!-- image: {{ image }} -->
                    form.busy: {{ form.busy }}<br />
                    form.errors: {{ form.errors }}<br />
                    form.images: {{ form.image }}<br />
                </v-form>
            </v-col>
        </v-row>
        <v-dialog v-model="dialog" width="800">
            <medias-component @addFile="onAddFile"></medias-component>
        </v-dialog>
    </v-main>
</template>

<script>
import Form from 'vform'
import MediasComponent from '../../../components/MediasComponent'
import TextEditorComponent from '../../../components/TextEditorComponent'
export default {
    name: 'AdminPortfoliosCreate',
    components: { MediasComponent, TextEditorComponent },
    data() {
        return {
            items: [
                {
                    text: 'Portfolios',
                    disabled: false,
                    to: '/admin/portfolios',
                    exact: true,
                },
                {
                    text: 'Ajouter',
                    disabled: true,
                    to: '/admin/portfolio/create',
                },
            ],
            form: new Form({
                title: 'New title',
                description: 'New description',
                // front_image_id: '',
                images: [],
            }),
            tab: null,
            showModal: false,
            dialog: false,
        }
    },
    computed: {},
    methods: {
        toggleShowHTML(value) {
            console.log('toggleShowHTML2: ', value)
            this.showHTML = value
        },
        selectFile(e) {
            console.log('selectFile e: ', e)
            this.form.image = e.File
            // this.form.image = e.target.files[0]
            this.image = e.File
        },
        onAddFile(file) {
            this.dialog = false
            console.log('onAddFile file: ', file)
            // this.form.front_image_id = file.id
            if (this.form.images.length < 1) {
                file['is_front_image'] = true
            } else {
                file['is_front_image'] = false
            }
            this.form.images.push(file)
        },
        async createPortfolio() {
            try {
                console.log('createPortfolio form: ', this.form)
                this.form.images.forEach((image, index) => {
                    image.order = index
                })
                await this.$store.dispatch('portfolios/createPortfolio', this.form)
                this.$router.push('/admin/portfolios')
            } catch (error) {
                console.log('error: ', error)
            }
        },
    },
}
</script>

<style scoped></style>
