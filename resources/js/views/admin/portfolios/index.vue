<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="11">
                <!-- portfolios: {{ portfolios }}<br /><br /> -->
                <v-expansion-panels>
                    <v-expansion-panel v-for="(item, i) in portfolios" :key="i">
                        <v-expansion-panel-header> Item </v-expansion-panel-header>
                        <v-expansion-panel-content>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                    text: 'Portfolio',
                    disabled: true,
                    href: '/admin/portfolio',
                },
                {
                    text: 'Ajouter',
                    disabled: false,
                    to: '/admin/portfolio/create',
                },
            ],
        }
    },
    computed: {
        portfolios() {
            return this.$store.getters['portfolios/portfolios']
        },
    },
    methods: {},
}
</script>

<style scoped>
</style>