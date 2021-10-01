<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <!-- content: {{ content }}<br /><br /> -->
        <!-- content.section: {{ content.section }} -->
        <v-row no-gutters justify="center" v-if="content">
            <v-col cols="12" md="10">
                <v-form @submit.prevent="updateContent" v-if="content && content.section">
                    <v-text-field label="Nom" :error-messages="form.errors.get('name')" v-model="form.name"></v-text-field>
                    <v-select :items="sections" item-text="name" item-value="slug" return-object label="Section (partie du site où le nouveau contenu sera affiché)" v-model="form.section"></v-select>
                    <TextEditorComponent :formContent="content.content" />
                    <small class="error--text" v-if="form.errors.get('content')">{{ form.errors.get('content') }}</small>
                    <v-checkbox v-model="form.is_published" label="Publié?"></v-checkbox>
                    <div class="text-center">
                    <v-btn color="success" type="submit" :loading="form.busy">Editer</v-btn>
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
    name: 'AdminContentsEdit',
    components: { TextEditorComponent, MediasComponent },
    async created() {
        try {
            if (this.$store.getters['contents/contents'].length < 1) {
                await this.$store.dispatch('contents/fetchContents')
            }
            console.log('content: ', this.content)
            this.form.fill(this.content)
        } catch (error) {
            console.log('error: ', error)
        }
    },
    data() {
        return {
            showMediasModal: false,
            items: [
                {
                    text: 'Contenus',
                    disabled: false,
                    to: '/admin/contents',
                    exact: true,
                    link: true
                },
                {
                    text: 'Editer',
                    disabled: true,
                    href: '/admin/contents'
                }
            ],
            form: new Form({
                id: this.$route.params.id,
                name: '',
                section: '',
                content: '',
                is_published: false
            }),
            sections: [
                { name: 'Accueil', slug: 'accueil' },
                { name: 'Info', slug: 'info' },
                { name: 'Portrait', slug: 'portrait' },
                { name: 'Contact', slug: 'contact' },
            ],
        }
    },
    computed: {
        contents() {
            return this.$store.getters['contents/contents']
        },
        content() {
            return this.$store.getters['contents/contents'].find(content => content.id == this.$route.params.id)
        }
    },
    methods: {
        async updateContent() {
            try {
                console.log('updateContent: ', this.form)

                let content
                if (!this.showHTML) {
                    content = document.getElementById('textBox').innerHTML
                } else {
                    content = document.getElementById('textBox').innerText
                }
                console.log('content: ', content)

                this.form['content'] = content
                console.log('this.form: ', this.form)

                await this.$store.dispatch('contents/updateContent', this.form)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Contenu modifié avec succès.'
                })
                this.$router.push('/admin/contents')
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: 'Une erreur est survenue et le contenu n\'a pas pu être modifié.'
                })
            }
        }
    }
}
</script>

<style scoped>
.image:hover {
    cursor: pointer;
}
.v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: 0.8;
    position: absolute;
    width: 100%;
}
</style>
