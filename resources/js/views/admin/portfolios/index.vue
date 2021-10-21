<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center" class="my-2">
            <v-col cols="11">
                <!-- updatedOrder: {{ updatedOrder }}<br /><br /> -->
                <!-- indexClicked: {{ indexClicked }}<br /><br /> -->
                <!-- portfolios: {{ portfolios }}<br /><br /> -->
                <!-- displayImage mini: -->
                <v-btn icon :color="displayImage ? 'primary' : ''" class="mx-1" @click="displayImage = true"><v-icon>mdi-format-list-text</v-icon></v-btn>
                <v-btn icon :color="displayImage ? '' : 'primary'" class="mx-1" @click="displayImage = false"><v-icon>mdi-format-list-bulleted</v-icon></v-btn>

                <v-btn small color="success" @click="updateOrder" v-if="updatedOrder">
                    Enregistrer le nouvel ordre
                </v-btn>
            </v-col>
        </v-row>
        <!-- <v-row no-gutters>
            <v-col cols="12" md="2" class="pa-2" v-for="(portfolio, index) in portfolios" :key="index">
                <v-card>
                    <v-card-text>
                        <h3 class="truncate">{{ portfolio.title }}</h3>
                        <v-img :src="frontImagePath(portfolio.portfolio_images)" min-width="60" max-width="80" aspect-ratio="1" class="mr-3" v-if="displayImage"></v-img>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row> -->
        <v-row no-gutters justify="center">
            <v-col cols="11">
                <v-expansion-panels>
                    <draggable v-model="portfolios" group="people" @start="drag = true" @end="drag = false" style="width: 100%">
                        <v-expansion-panel v-for="(portfolio, i) in portfolios" :key="i">
                            <v-expansion-panel-header>
                                <v-row no-gutters justify="start" align="center">
                                    <v-col class="d-flex justify-start align-center">
                                        <v-chip small class="mr-2">{{ i + 1 }}</v-chip>
                                        <v-img :src="frontImagePath(portfolio.portfolio_images)" min-width="60" max-width="80" aspect-ratio="1" class="mr-3" v-if="displayImage"></v-img>

                                        <p class="ml-2 my-0">{{ portfolio.title }}</p>
                                        <div>
                                            <v-chip small color="success" v-if="portfolio.is_active" class="ml-2">Publié</v-chip>
                                            <v-chip small color="warning" class="ml-2" v-else>Non publié</v-chip>
                                        </div>
                                        <!-- index: {{ i }} id: {{ portfolio.id }} order: {{ portfolio.order }} -->
                                    </v-col>
                                    <!-- <v-spacer></v-spacer> -->
                                    <v-col class="d-flex justify-end">
                                        <v-btn small color="primary" class="mx-1" @click.native.stop="goToPage(portfolio.id)">Editer</v-btn>
                                        <v-btn small color="error" class="ml-1 mr-3" :loading="form.busy && indexClicked == i" @click.native.stop="deletePortfolio(portfolio.id, i)">Supprimer</v-btn>
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
                                            <v-col cols="12" md="4" lg="4" class="pa-2" v-for="(image, index) in backImages(portfolio.portfolio_images)" :key="index">
                                                <v-img :src="`/medias/${image.path}`"></v-img>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </draggable>
                </v-expansion-panels>
            </v-col>
        </v-row>

        <!-- <v-snackbar color="dark" :timeout="5000" v-model="showSnackbar">
            <v-btn small color="success" @click="updateOrder">Enregistrer le nouvel ordre</v-btn>
            <template v-slot:action="{ attrs }">
                <v-btn icon color="red" v-bind="attrs" @click="showSnackbar = false"><v-icon>mdi-close</v-icon></v-btn>
            </template>
        </v-snackbar> -->
    </v-main>
</template>

<script>
import Form from 'vform'
import draggable from 'vuedraggable'
// import confirm from '../../../components/DialogComponent'
export default {
    name: 'AdminPortfoliosIndex',
    components: { draggable },
    async created() {
        if (this.$store.getters['portfolios/portfolios'].length < 1) {
            await this.$store.dispatch('portfolios/fetchPortfolios')
        }
    },
    mounted() {},
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
            ],
            showSnackbar: false,
            displayImage: true,
            indexClicked: null,
            form: new Form({
                id: null
            })
        }
    },
    computed: {
        portfolios: {
            get() {
                // return this.$store.getters['portfolios/portfolios']
                const cloneCopy = JSON.parse(JSON.stringify(this.$store.getters['portfolios/portfolios']))
                return cloneCopy
            },
            set(value) {
                console.log('set portfolio: ', value)
                this.$store.commit('portfolios/SET_PORTFOLIOS', value)
            }
        },
        // updatedOrder2() {
        //     return this.portfolios !== this.$store.getters['portfolios/portfolios']
        // },
        updatedOrder() {
            let updatedOrder = false
            for (let i = 0; i < this.portfolios.length; i++) {
                if (this.portfolios[i]['order'] != i + 1) {
                    updatedOrder = true
                }
            }
            if (updatedOrder) {
                this.showSnackbar = true
            }
            return updatedOrder
        }
    },
    methods: {
        frontImage(images) {
            return images.find(image => image.is_front_image == true)
        },
        backImages(images) {
            return images.filter(image => image.is_front_image == false)
        },
        frontImagePath(images) {
            if (images.length) {
                const frontImage = images.find(image => image.is_front_image == true)
                if (frontImage) {
                    return `/medias${frontImage.path}`
                }
            } else {
                return '/images/no-image.jpg'
            }
        },
        goToPage(id) {
            this.$router.push(`/admin/portfolios/${id}/edit`)
        },

        async updateOrder() {
            try {
                console.log('updateOrder')
                // return
                await this.$store.dispatch(
                    'portfolios/updateOrder',
                    this.portfolios.map((portfolio, index) => ({ id: portfolio.id, order: index + 1 }))
                )
                this.showSnackbar = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Nouvel ordre sauvegardé avec succès.'
                })
            } catch (error) {
                console.log('error: ', error)
                this.showSnackbar = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le nouvel ordre n'a pas pu être sauvegardé."
                })
            }
        },
        async deletePortfolio(id, index) {
            try {
                if (await this.$root.$confirm('Supprimer', 'Etes-vous sûr?', { color: 'error' })) {
                    console.log('deletePortfolio id: ', id)
                    this.indexClicked = index
                    this.form.id = id
                    await this.$store.dispatch('portfolios/deletePortfolio', this.form)
                    this.indexClicked = null
                    this.$store.commit('snackbars/SET_SNACKBAR', {
                        show: true,
                        color: 'success',
                        content: 'Portfolio supprimé avec succès.'
                    })
                } else {
                    console.log('cancel')
                }
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le portfolio n'a pas pu être effacé."
                })
            }
        }
    },
    watch: {
        updatedOrder() {
            console.log('updatedOrder!')
        }
    }
}
</script>

<style scoped>
.truncate {
    width: 100%;   
     white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
