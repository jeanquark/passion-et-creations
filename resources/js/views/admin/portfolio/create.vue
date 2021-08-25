<template>
    <v-row no-gutters justify="start">
        <v-col cols="6">
            <v-form @submit.prevent="uploadImage">
                <!-- image: {{ image }} -->
                <v-file-input accept="image/*" label="Selectionner image" show-size truncate-length="15" v-model="form.image"></v-file-input>
                <v-btn small color="primary" type="submit" :disabled="form.busy">Ajouter</v-btn>
            </v-form>
        </v-col>
    </v-row>
</template>

<script>
import Form from 'vform'
export default {
    name: 'AdminPortfolioCreate',
    data() {
        return {
            form: new Form({
                image: null,
            }),
            image: null
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