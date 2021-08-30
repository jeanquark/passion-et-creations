<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <h2>Admin Portfolios Edit {{ $route.params.id }}</h2>
        portfolio: {{ portfolio }}
        <v-card v-if="portfolio">
            <v-card-title>{{ portfolio.title }}</v-card-title>
            <v-card-text>
                <v-img :src="portfolio.front_image.path" max-width="200"></v-img>
                <!-- <div v-html="portfolio.description"></div> -->
                <text-editor @toggleShowHTML="toggleShowHTML" :formContent="portfolio.description" />
            </v-card-text>
        </v-card>
    </v-main>
</template>

<script>
import TextEditor from '../../../components/TextEditor'
export default {
    name: "AdminPortfoliosEdit",
    components: { TextEditor },
    async created () {
        if (this.portfolios.length < 1) {
            await this.$store.dispatch('portfolios/fetchPortfolios')
        }
    },
    data() {
        return {
            showHTML: false,
            items: [
                {
                    text: 'Portfolios',
                    disabled: false,
                    href: '/admin/portfolios',
                },
                // {
                //     text: 'Editer',
                //     disabled: true,
                //     to: `/admin/portfolios/${$route.params.id}/edit`,
                // },
            ],
        };
    },
    computed: {
        portfolios () {
            return this.$store.getters['portfolios/portfolios']
        },
        portfolio () {
            return this.portfolios.find(portfolio => portfolio.id == this.$route.params.id)
        }
    },
    methods: {
        toggleShowHTML(value) {
            console.log('toggleShowHTML2: ', value)
            this.showHTML = value
        },
    }
};
</script>

<style scoped></style>
