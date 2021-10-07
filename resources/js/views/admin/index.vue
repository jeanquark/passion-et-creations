<template>
    <v-main>
        <v-row no-gutters justify="center" class="my-2">
            <v-col cols="12" md="10">
                <h2 class="text-center">Console d'administration</h2>
            </v-col>
        </v-row>
        <v-row no-gutters class="my-2 mx-6">
            <v-col cols="12">
                <!-- statistics: {{ statistics }}<br /><br /> -->
                <!-- indexClicked: {{ indexClicked }}<br /><br /> -->
                <h3 class="text-center">Statistiques des visites</h3>
                <v-btn x-small color="warning" class="my-2" :loading="loading" @click="resetAll">Remettre les compteurs à 0</v-btn>
                <v-data-table :headers="headers" :items="statistics" :items-per-page="5" :hide-default-header="true" class="elevation-1">
                    <template v-slot:header="{ props }">
                        <thead>
                            <tr>
                                <th class="text-left" v-for="(head, index) in props.headers" :key="index">
                                    {{ head.text }}
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </template>

                    <template v-slot:[`item`]="{ item, index }">
                        <tr class="text-left" v-if="headers && headers.length">
                            <td>
                                {{ item.id }}
                            </td>
                            <td>
                                {{ item.section }}
                            </td>
                            <td>
                                {{ item.element_name }}
                            </td>
                            <td>
                                <v-img :src="`/medias${item.element_path}`" width="70"></v-img>
                            </td>
                            <td>
                                <v-chip>{{ item.clicks }}</v-chip>
                            </td>
                            <td>
                                {{ item.reset_at | moment('ddd DD MMM YYYY HH:mm') }}
                            </td>
                            <td>
                                {{ item.updated_at | moment('from') }}
                            </td>
                            <td style="white-space: nowrap">
                                <v-btn small color="warning" :loading="indexClicked == index" @click="resetOne(item, index)">Reset</v-btn>
                            </td>
                        </tr>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
        <v-row no-gutters class="my-3 mx-6">
            <v-col cols="12" class="">
                <p>
                    Les détails de fréquentation du site sont à consulter sur le portail de Google Analytics (<a
                        href="https://analytics.google.com/analytics/web/#/p288633030/reports/reportinghub"
                        target="_blank"
                        >lien</a
                    >). Pour obtenir l'accès, il faut se connecter avec son compte Gmail.
                </p>
            </v-col>
        </v-row>
        <v-row no-gutters class="my-3 mx-6">
            <v-col cols="12" class="d-flex justify-end">
                <small class=""
                    >
                    Dernière compilation: {{ lastBuildDate | moment('ddd DD MMM YYYY HH:mm') }}<br />
                    Webmaster: Jean-Marc Kleger<br />
                    jm.kleger@gmail.com
                </small>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import lastBuildDate from '/last_build_date.json'
export default {
    name: 'AdminIndex',
    async created() {
        try {
            console.log('Entered created lifecycle hook')
            await this.$store.dispatch('statistics/fetchStatistics')
        } catch (error) {
            console.log('error: ', error)
        }
    },
    async mounted() {},
    data() {
        return {
            headers: [
                {
                    text: 'ID',
                    align: 'start',
                    sortable: false,
                    value: 'id',
                },
                {
                    text: 'Section',
                    value: 'section',
                },
                { text: 'Nom', value: 'name' },
                { text: 'Image', value: 'element_path' },
                { text: 'Nb clicks', value: 'clicks', sortable: true },
                { text: 'Dernier reset', value: 'reset_at' },
                { text: 'Dernière modification', value: 'updated_at' },
            ],
            loading: null,
            indexClicked: null,
            lastBuildDate: lastBuildDate
        }
    },
    computed: {
        auth() {
            return this.$store.getters['auth/auth']
        },
        authUser() {
            return this.$store.getters['auth/user']
        },
        statistics() {
            return this.$store.getters['statistics/statistics']
        },
    },
    methods: {
        async resetOne(item, index) {
            try {
                console.log('resetOne ', item, index)
                this.indexClicked = index
                await this.$store.dispatch('statistics/resetOne', item.id)
                this.indexClicked = null
                console.log('loading: ', this.loading)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Compteur remis à zéro avec succès.',
                })
            } catch (error) {
                console.log('error: ', error)
                this.indexClicked = null
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et la remise à zéro n'a pas pu s'opérer.",
                })
            }
        },
        async resetAll() {
            try {
                console.log('resetAll')
                this.loading = true
                await this.$store.dispatch('statistics/resetAll')
                this.loading = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Remis à zéro avec succès.',
                })
            } catch (error) {
                console.log('error: ', error)
                this.loading = false
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et la remise à zéro n'a pas pu s'opérer.",
                })
            }
        },
    },
}
</script>

<style scoped>
.collapsed {
    margin-left: 50px;
}
.extended {
    margin-left: 350px;
}
</style>