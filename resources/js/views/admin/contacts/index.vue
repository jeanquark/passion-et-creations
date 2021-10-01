<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12">
                <!-- contacts: {{ contacts }}<br /><br /> -->
            </v-col>
        </v-row>
        <v-row no-gutters class="mx-6">
            <v-col cols="12">
                <v-data-table :headers="headers" :items="contacts" :items-per-page="5" :hide-default-header="true" class="elevation-1">
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

                    <template v-slot:[`item`]="{ item }">
                        <tr style="" v-if="headers && headers.length">
                            <td>
                                {{ item.id }}
                            </td>
                            <td>
                                {{ item.name }}
                            </td>
                            <td class="" style="">
                                <span v-html="truncate(item.message, 12)"></span>
                            </td>
                            <td>
                                <v-icon color="success" v-if="item.is_read">mdi-check-circle</v-icon>
                                <v-icon color="error" v-else>mdi-close-circle</v-icon>
                            </td>
                            <td>
                                {{ item.created_at | moment('DD MMM YYYY') }}
                            </td>
                            <td>
                                {{ item.updated_at | moment('from') }}
                            </td>
                            <td style="white-space: nowrap">
                                <v-btn small color="success" :to="`/admin/contacts/${item.id}`">Montrer</v-btn>
                                <v-btn small color="error" @click="deleteContact(item.id)">Supprimer</v-btn>
                            </td>
                        </tr>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminContactsIndex',
    async created() {
        try {
            if (this.$store.getters['contacts/contacts'].length < 1) {
                this.$store.dispatch('contacts/fetchContacts')
            }
        } catch (error) {
            console.log('error: ', error)
        }
    },
    mounted() {},
    data() {
        return {
            items: [
                {
                    text: 'Formulaire de contact',
                    disabled: true,
                    href: '/admin/contacts',
                },
            ],
            headers: [
                {
                    text: 'ID',
                    align: 'start',
                    sortable: false,
                    value: 'id',
                },
                {
                    text: 'Nom',
                    value: 'name',
                },
                {
                    text: 'Message',
                    value: 'message',
                },
                {
                    text: 'Lu?',
                    value: 'is_read',
                },
                { text: 'Créé le', value: 'created_at' },
                { text: 'Dernière modification', value: 'updated_at' },
            ],
        }
    },
    computed: {
        contacts() {
            return this.$store.getters['contacts/contacts']
        },
    },
    methods: {
        truncate(str, n) {
            return str.length > n ? str.substr(0, n - 1) + '&hellip;' : str
        },
        async deleteContact(id) {
            try {
                await this.$store.dispatch('contacts/deleteContact', {
                    id
                })
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Message supprimé avec succès.',
                    color: 'success'
                })
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Une erreur est survenue et le message n\'a pas pu être supprimé.',
                    color: 'error'
                })
            }
        },
    },
}
</script>

<style scoped>
.ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 10px;
    /* display: inline-block; */
}
</style>
