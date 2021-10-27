<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12" md="10">
                <v-form @submit.prevent="createContent">
                    <v-text-field label="Nom" :error-messages="form.errors.get('name')" v-model="form.name"></v-text-field>
                    <v-select :items="sections" item-text="name" item-value="slug" label="Section (partie du site où le nouveau contenu sera affiché)" v-model="form.section"></v-select>
                    <TextEditorComponent />
                    <small class="error--text" v-if="form.errors.get('content')">{{ form.errors.get('content') }}</small>
                    <v-checkbox v-model="form.is_published" label="Publié?"></v-checkbox>

                    <div class="text-center">
                        <v-btn color="success" type="submit" :loading="form.busy">Créer</v-btn>
                    </div>
                </v-form>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import Form from 'vform'
import TextEditorComponent from '../../../components/TextEditorComponent'
import MediasComponent from '../../../components/MediasComponent'
export default {
    name: 'AdminContentsCreate',
    components: { TextEditorComponent, MediasComponent },
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
                name: '',
                content: '',
                section: 'info',
                is_published: false,
            }),
            sections: [
                { name: 'Accueil', slug: 'accueil' },
                { name: 'Info', slug: 'info' },
                { name: 'Portrait', slug: 'portrait' },
                { name: 'Contact', slug: 'contact' },
            ],
        }
    },
    computed: {},
    methods: {
        async createContent() {
            try {
                console.log('createContent form: ', this.form)
                let content
                if (!this.showHTML) {
                    content = document.getElementById('textBox').innerHTML
                } else {
                    content = document.getElementById('textBox').innerText
                }
                this.form['content'] = content
                console.log('form: ', this.form)
                
                await this.$store.dispatch('contents/createContent', this.form)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Contenu créé avec succès.',
                })
                this.$router.push('/admin/contents')
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le nouveau contenu n'a pas pu être créé.",
                })
            }
        },
    },
}
</script>

<style scoped></style>
