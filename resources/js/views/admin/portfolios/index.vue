<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="11">
                <!-- portfolios: {{ portfolios }}<br /><br /> -->
                <v-expansion-panels>
                    <v-expansion-panel v-for="(portfolio, i) in portfolios" :key="i">
                        <v-expansion-panel-header>
                            <v-row no-gutters justify="start" align="center">
                                <v-col>
                                    <v-img :src="portfolio.front_image.path" max-width="80" aspect-ratio="1" class="mr-3"></v-img>
                                </v-col>
                                <v-col> 
                                    {{ portfolio.front_image.name }}</v-col>
                                <v-spacer></v-spacer>
                                <v-col>
                                    <v-btn small color="primary" @click.native.stop="goToPage(portfolio.id)">Editer</v-btn>
                                    <v-btn small color="error" @click.native.stop="goToPage(portfolio.id)">Supprimer</v-btn>
                                </v-col>
                            </v-row>
                        </v-expansion-panel-header>
                        <v-expansion-panel-content>
                            <v-row no-gutters>
                                <v-col cols="12" md="6" lg="4" class="px-2">
                                    <v-img :src="portfolio.front_image.path"></v-img>
                                </v-col>
                                <v-col cols="12" md="6" lg="8" class="px-2">
                                    <div v-html="portfolio.description"></div>
                                </v-col>
                            </v-row>
                            <v-row no-gutters>
                                <v-col cols="12" md="4" lg="3" v-for="image in portfolio.images" :key="image.id" class="pa-2">
                                    <v-img :src="image.path"></v-img>
                                </v-col>
                            </v-row>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminPortfoliosIndex',
    async created() {
        await this.$store.dispatch('portfolios/fetchPortfolios')
    },
    data() {
        return {
            items: [
                {
                    text: 'Portfolios',
                    disabled: true,
                    href: '/admin/portfolios'
                },
                {
                    text: 'Ajouter',
                    disabled: false,
                    to: '/admin/portfolios/create'
                }
            ]
        }
    },
    computed: {
        portfolios() {
            return this.$store.getters['portfolios/portfolios']
        }
    },
    methods: {
        goToPage(id) {
            this.$router.push(`/admin/portfolios/${id}/edit`)
        }
    }
}
</script>

<style scoped></style>
