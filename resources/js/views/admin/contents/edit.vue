<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <h2>Editer contenu {{ $route.params.id }}</h2>
        <!-- <p>content: {{ content }}</p> -->
        <v-row no-gutters justify="center" v-if="content">
            <v-col cols="12" md="10">
                <v-form @submit.prevent="updateContent">
                    <TextEditorComponent :formContent="content.content" />
                    <br />
                    <div class="text-center">
                    <v-btn color="success" type="submit">Editer</v-btn>
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
            this.form.fill(this.content)
        } catch (error) {
            console.log('error: ', error)
        }
    },
    data() {
        return {
            showHTML: false,
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
                id: '',
                name: '',
                section: '',
                content: '',
                is_published: false
            }),
            showHTML: false
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
        toggleShowHTML(value) {
            console.log('toggleShowHTML2: ', value)
            this.showHTML = value
        },
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

                // await this.$store.dispatch('contents/updateContent', this.form)
                // // console.log('data: ', data)
                // this.$router.push('/admin/contents')
            } catch (error) {
                console.log('error: ', error)
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
