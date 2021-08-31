<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <h2>Admin Portfolios Edit {{ $route.params.id }}</h2>
        portfolio: {{ portfolio }}
        <v-card class="mx-4 pa-2" v-if="portfolio">
            <v-form @submit.prevent="editPortfolio">
                <!-- <v-card-title>{{ portfolio.title }}</v-card-title> -->
                <v-card-text>
                    <v-text-field label="Titre" v-model="portfolio.title"></v-text-field>
                    <v-row no-gutters align="center" class="my-3">
                        <v-col>Image</v-col>
                        <v-col> <v-img :src="portfolio.front_image.path" max-width="200" class="image"></v-img></v-col>
                        <v-col> <v-btn small color="error">Supprimer</v-btn></v-col>
                    </v-row>

                    <v-row no-gutters justify="center" align="center">
                        <v-col cols="3" v-for="image in portfolio.images" :key="image.id">
                            <v-hover v-slot="{ hover }">
                                <v-img :src="image.path" class="">
                                    <v-expand-transition>
                                        <div v-if="hover" class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal text-h2 white--text" style="height: 100%">
                                            <v-btn small color="error" @click="deleteImage(image)">Supprimer</v-btn>
                                            <v-btn small color="success" @click="restoreImage(image)">Restaurer</v-btn>
                                        </div>
                                    </v-expand-transition>
                                </v-img>
                            </v-hover>
                        </v-col>
                        <v-col cols="3" class="text-center">
                            <v-btn elevation="2" fab color="pink" @click="addImage"><v-icon class="white--text">mdi-plus</v-icon></v-btn>
                            <!-- <v-icon large>mdi-plus</v-icon> -->
                        </v-col>
                    </v-row>

                    <v-row no-gutters class="my-3">
                        <text-editor @toggleShowHTML="toggleShowHTML" :formContent="portfolio.description" />
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn small color="success" type="submit">Editer</v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
        <medias-modal v-if="showMediasModal" />
    </v-main>
</template>

<script>
import TextEditor from '../../../components/TextEditor'
import MediasModal from '../../../components/MediasModal'
export default {
    name: 'AdminPortfoliosEdit',
    components: { TextEditor, MediasModal },
    async created() {
        if (this.portfolios.length < 1) {
            await this.$store.dispatch('portfolios/fetchPortfolios')
        }
    },
    data() {
        return {
            showHTML: false,
            showMediasModal: false,
            items: [
                {
                    text: 'Portfolios',
                    disabled: false,
                    href: '/admin/portfolios',
                },
                {
                    text: 'Editer',
                    disabled: true,
                    href: '/admin/portfolios',
                },
                // {
                //     text: 'Editer',
                //     disabled: true,
                //     href: `/admin/portfolios/${$route.params.id}/edit`,
                // },
            ],
        }
    },
    computed: {
        portfolios() {
            return this.$store.getters['portfolios/portfolios']
        },
        portfolio() {
            return this.portfolios.find((portfolio) => portfolio.id == this.$route.params.id)
        },
    },
    methods: {
        toggleShowHTML(value) {
            console.log('toggleShowHTML2: ', value)
            this.showHTML = value
        },
        deleteImage(image) {
            console.log('deleteImage image: ', image)
        },
        restoreImage(image) {
            console.log('restoreImage image: ', image)
        },
        addImage() {
            console.log('addImage')
            this.showMediasModal = true
        },
        editPortfolio() {
            console.log('editPortfolio')
            console.log('portfolio: ', this.portfolio)
        },
    },
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
