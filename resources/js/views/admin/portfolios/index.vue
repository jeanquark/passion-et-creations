<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12">
                updatedOrder: {{ updatedOrder }}<br />
                <v-btn small color="success" :disabled="!updatedOrder" @click="updateOrder">Enregistrer le nouvel ordre</v-btn>
            </v-col>
            <v-col cols="11">
                <!-- portfolios: {{ portfolios }}<br /><br /> -->
                <v-expansion-panels>
                    <draggable v-model="portfolios" group="people" @start="drag = true" @end="drag = false" style="width: 100%">
                        <v-expansion-panel v-for="(portfolio, i) in portfolios" :key="i">
                            <v-expansion-panel-header>
                                <v-row no-gutters justify="start" align="center">
                                    <v-col class="d-flex align-center">
                                        index: {{ i }} id: {{ portfolio.id }} order: {{ portfolio.order }}
                                        
                                        <!-- <v-img :src="portfolio.front_image.path" max-width="80" aspect-ratio="1" class="mr-3"></v-img> -->
                                        <!-- {{ portfolio.front_image.name }} -->
                                    </v-col>
                                    <v-spacer></v-spacer>
                                    <v-col class="d-flex justify-end">
                                        {{ portfolio.title }}
                                        <v-btn small color="primary" class="mx-1" @click.native.stop="goToPage(portfolio.id)">Editer</v-btn>
                                        <v-btn small color="error" class="mx-1" @click.native.stop="goToPage(portfolio.id)">Supprimer</v-btn>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-row no-gutters>
                                    <v-col cols="12" md="6" lg="4" class="px-2">
                                        {{ frontImage(portfolio.images) }}
                                    </v-col>
                                    <v-col cols="12" md="6" lg="8" class="px-2">
                                        {{ portfolio.images }}
                                    </v-col>
                                    <!-- <v-col cols="12" md="6" lg="4" class="px-2">
                                        <v-img :src="portfolio.front_image.path"></v-img>
                                    </v-col>
                                    <v-col cols="12" md="6" lg="8" class="px-2">
                                        <div v-html="portfolio.description"></div>
                                    </v-col> -->
                                </v-row>
                                <v-row no-gutters>
                                    <v-col cols="12" md="4" lg="3" v-for="image in portfolio.images" :key="image.id" class="pa-2">
                                        <v-img :src="image.path"></v-img>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </draggable>
                </v-expansion-panels>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import draggable from 'vuedraggable'
export default {
    name: 'AdminPortfoliosIndex',
    components: { draggable },
    async created() {
        await this.$store.dispatch('portfolios/fetchPortfolios')
        console.log('portfolios.length: ', this.portfolios.length)
    },
    mounted() {},
    data() {
        return {
            items: [
                {
                    text: 'Portfolios',
                    disabled: true,
                    href: '/admin/portfolios',
                },
                {
                    text: 'Ajouter',
                    disabled: false,
                    to: '/admin/portfolios/create',
                },
            ],
        }
    },
    computed: {
        // portfolios() {
        //     return this.$store.getters['portfolios/portfolios']
        // },
        portfolios: {
            get() {
                return this.$store.getters['portfolios/portfolios'].slice(0, 3)
            },
            set(value) {
                console.log('set portfolio: ', value)
                this.$store.commit('portfolios/SET_PORTFOLIOS', value)
                // this.portfolios = value
            },
        },
        
        updatedOrder() {
            for (let i = 0; i < this.portfolios.length; i++) {
                if (this.portfolios[i]['order'] != i + 1) {
                    return true
                }
            }
            return false
        },
    },
    methods: {
        frontImage (images) {
            return images.filter(image => image.is_front_image == true)
        },
        goToPage(id) {
            this.$router.push(`/admin/portfolios/${id}/edit`)
        },
        updateOrder () {
            try {
                this.$store.dispatch('portfolios/updateOrder', this.portfolios.map((portfolio, index) => ({ id: portfolio.id, order: index + 1 })))
            } catch (error) {
                console.log('error: ', error)
            }
        }
    },
}
</script>

<style scoped></style>
