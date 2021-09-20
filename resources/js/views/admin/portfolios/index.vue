<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center" class="my-2">
            <v-col cols="11">
                updatedOrder: {{ updatedOrder }}<br />

                <v-btn icon color="primary" class="mx-1" :disabled="displayImage" @click="displayImage = true"><v-icon>mdi-format-list-text</v-icon></v-btn>
                <v-btn icon color="primary" class="mx-1" :disabled="!displayImage" @click="displayImage = false"><v-icon>mdi-format-list-bulleted</v-icon></v-btn>
                <!-- <v-btn small color="success" class="mx-1" :disabled="!updatedOrder" @click="updateOrder">Enregistrer le nouvel ordre</v-btn> -->
            </v-col>
        </v-row>
        <v-row no-gutters justify="center">
            <v-col cols="11">
                <!-- portfolios: {{ portfolios }}<br /><br /> -->
                <v-expansion-panels>
                    <draggable v-model="portfolios" group="people" @start="drag = true" @end="drag = false" style="width: 100%">
                        <v-expansion-panel v-for="(portfolio, i) in portfolios" :key="i">
                            <v-expansion-panel-header>
                                <v-row no-gutters justify="start" align="center">
                                    <v-col class="d-flex justify-start align-center">
                                        <v-chip small class="mr-2">{{ i + 1 }}</v-chip>
                                        <v-img :src="`/medias/${frontImage(portfolio.images)['path']}`" max-width="80" aspect-ratio="1" class="mr-3" v-if="displayImage"></v-img>

                                        <p class="ml-2 my-0">{{ portfolio.title }}</p>
                                        <!-- index: {{ i }} id: {{ portfolio.id }} order: {{ portfolio.order }} -->
                                    </v-col>
                                    <!-- <v-spacer></v-spacer> -->
                                    <v-col class="d-flex justify-end">
                                        <v-btn small color="primary" class="mx-1" @click.native.stop="goToPage(portfolio.id)">Editer</v-btn>
                                        <v-btn small color="error" class="ml-1 mr-3" @click.native.stop="goToPage(portfolio.id)">Supprimer</v-btn>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-row no-gutters>
                                    <v-col cols="12" md="6" class="px-2">
                                        <!-- {{ frontImage(portfolio.images) }} -->
                                        <div v-html="portfolio.description"></div>
                                    </v-col>
                                    <v-col cols="12" md="6" class="px-2">
                                        <!-- {{ portfolio.images }} -->
                                        <v-row no-gutters>
                                            <v-col cols="12" md="4" lg="4" class="pa-2" v-for="(image, index) in backImages(portfolio.images)" :key="index">
                                                <v-img :src="`/medias/${image.path}`"></v-img>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                    <!-- <v-col cols="12" md="6" lg="4" class="px-2">
                                        <v-img :src="portfolio.front_image.path"></v-img>
                                    </v-col>
                                    <v-col cols="12" md="6" lg="8" class="px-2">
                                        <div v-html="portfolio.description"></div>
                                    </v-col> -->
                                </v-row>
                                <!-- <v-row no-gutters>
                                    <v-col cols="12" md="4" lg="3" v-for="image in portfolio.images" :key="image.id" class="pa-2">
                                        <v-img :src="image.path"></v-img>
                                    </v-col>
                                </v-row> -->
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </draggable>
                </v-expansion-panels>
            </v-col>
        </v-row>

        <v-snackbar color="success" v-model="showSnackbar">
            <v-btn small color="primary" @click="updateOrder">Enregistrer le nouvel ordre</v-btn>
            <template v-slot:action="{ attrs }">
                <v-btn icon color="red" v-bind="attrs" @click="showSnackbar = false"><v-icon>mdi-close</v-icon></v-btn>
            </template>
        </v-snackbar>
    </v-main>
</template>

<script>
import draggable from 'vuedraggable'
export default {
    name: 'AdminPortfoliosIndex',
    components: { draggable },
    async created() {
        if (this.$store.getters['portfolios/portfolios'].length < 1) {
            await this.$store.dispatch('portfolios/fetchPortfolios')
        }
        // console.log('portfolios.length: ', this.portfolios.length)
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
            showSnackbar: false,
            displayImage: true
        }
    },
    computed: {
        // portfolios() {
        //     return this.$store.getters['portfolios/portfolios']
        // },
        portfolios: {
            get() {
                // return this.$store.getters['portfolios/portfolios'].slice(0, 3)
                return this.$store.getters['portfolios/portfolios']
            },
            set(value) {
                console.log('set portfolio: ', value)
                this.$store.commit('portfolios/SET_PORTFOLIOS', value)
                // this.portfolios = value
            },
        },
        updatedOrder() {
            let updatedOrder = false
            for (let i = 0; i < this.portfolios.length; i++) {
                if (this.portfolios[i]['order'] != i + 1) {
                    // this.showSnackbar = true

                    // return true
                    updatedOrder = true
                }
            }
            if (updatedOrder) {
                this.showSnackbar = true

                // this.$store.commit('snackbars/SET_SNACKBAR', {
                //     show: true,
                //     content: '<v-btn>Enregistrer le nouvel ordre</v-btn>',
                //     content2: '<v-btn small color="success" class="mx-1" :disabled="!updatedOrder" @click="updateOrder">Enregistrer le nouvel ordre</v-btn>',
                //     color: 'success',
                // })
            }
            return updatedOrder
        },
    },
    methods: {
        frontImage(images) {
            return images.find((image) => image.is_front_image == true)
        },
        backImages(images) {
            return images.filter((image) => image.is_front_image == false)
        },
        goToPage(id) {
            this.$router.push(`/admin/portfolios/${id}/edit`)
        },
        updateOrder() {
            try {
                console.log('updateOrder')
                return
                this.$store.dispatch(
                    'portfolios/updateOrder',
                    this.portfolios.map((portfolio, index) => ({ id: portfolio.id, order: index + 1 }))
                )
            } catch (error) {
                console.log('error: ', error)
            }
        },
    },
}
</script>

<style scoped></style>
