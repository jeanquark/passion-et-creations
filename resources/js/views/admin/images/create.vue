<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="start">
            <v-col cols="6">
                <v-form @submit.prevent="uploadImage">
                    <!-- image: {{ image }} -->
                    form.busy: {{ form.busy }}<br />
                    form.errors: {{ form.errors }}<br />
                    <v-file-input
                        accept="image/*"
                        label="Selectionner image"
                        prepend-icon="mdi-camera"
                        show-size
                        truncate-length="15"
                        :error-messages="form.errors.get('image')"
                        v-model="form.image"
                    ></v-file-input>
                    <v-btn small color="primary" type="submit" :loading="form.busy">Ajouter</v-btn>
                </v-form>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import Form from 'vform'
export default {
    name: 'AdminImagesCreate',
    data() {
        return {
            items: [
                {
                    text: 'Portfolio',
                    disabled: true,
                    href: '/admin/portfolio',
                },
                {
                    text: 'Ajouter2',
                    disabled: false,
                    to: '/admin/portfolio/create',
                },
            ],
            form: new Form({
                image: null,
            }),
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
        async uploadImage() {
            try {
                console.log('uploadImage form: ', this.form)
                await this.$store.dispatch('images/uploadImage', this.form)
            } catch (error) {
                console.log('error: ', error)
            }
        },
    },
}
</script>

<style scoped>
</style>