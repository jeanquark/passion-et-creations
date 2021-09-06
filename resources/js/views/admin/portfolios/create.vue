<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="start">
            <v-col cols="12">
                <v-form @submit.prevent="createPortfolio">
                    <v-text-field prepend-icon="mdi-lock" name="title" label="Titre" type="text" :error-messages="form.errors.get('title')" v-model="form.title"></v-text-field>
                    <v-text-field prepend-icon="mdi-lock" name="description" label="Description" type="text" :error-messages="form.errors.get('description')" v-model="form.description"></v-text-field>

                    <v-row no-gutters>
                        <!-- <v-col cols="12" md="4" style="border: 1px solid green;">
                            image titre
                        </v-col> -->
                        <v-tabs v-model="tab">
                            <v-tab key="tab-1">Image principale</v-tab>
                            <v-tab key="tab-2">Images annexes</v-tab>
                        </v-tabs>
                        <v-tabs-items v-model="tab">
                            <v-tab-item key="tab-1">
                                <medias-modal :showModal="'abc'"></medias-modal>
                                <v-btn small color="primary" @click="$emit('showModal')">Ajouter image</v-btn>
                            </v-tab-item>
                            <v-tab-item key="tab-2">
                                the rest
                            </v-tab-item>
                        </v-tabs-items>
                    </v-row>

                    <div class="text-center">
                        <v-btn type="submit" color="success" :loading="form.busy">Ajouter</v-btn>
                    </div>
                </v-form>
            </v-col>
            <v-col cols="12">
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
import MediasModal from '../../../components/MediasModal'
export default {
    name: 'AdminPortfoliosCreate',
    components: { MediasModal },
    data() {
        return {
            items: [
                {
                    text: 'Portfolios',
                    disabled: false,
                    to: '/admin/portfolios',
                    exact: true
                },
                {
                    text: 'Ajouter',
                    disabled: true,
                    to: '/admin/portfolio/create'
                }
            ],
            form: new Form({
                title: '',
                description: ''
            }),
            tab: null,
            showModal: false
        }
    },
    computed: {},
    methods: {
        abc () {
            this.$emit('showModal')
        },
        selectFile(e) {
            console.log('selectFile e: ', e)
            this.form.image = e.File
            // this.form.image = e.target.files[0]
            this.image = e.File
        },
        async createPortfolio() {
            try {
                console.log('createPortfolio form: ', this.form)
                await this.$store.dispatch('portfolios/createPortfolio', this.form)
            } catch (error) {
                console.log('error: ', error)
            }
        }
    }
}
</script>

<style scoped></style>
