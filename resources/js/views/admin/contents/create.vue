<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12" md="8">
                
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
    </v-main>
</template>

<script>
import Form from 'vform'
import MediasComponent from '../../../components/MediasComponent'
export default {
    name: 'AdminContentsCreate',
    components: { MediasComponent },
    data() {
        return {
            items: [
                {
                    text: 'Contenus',
                    disabled: false,
                    to: '/admin/contents',
                    exact: true,
                },
                {
                    text: 'Ajouter',
                    disabled: true,
                    to: '/admin/contents/create',
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
                await this.$store.dispatch('portfolios/createPortfolio', this.form)
            } catch (error) {
                console.log('error: ', error)
            }
        },
    },
}
</script>

<style scoped></style>
