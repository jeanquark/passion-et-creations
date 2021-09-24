<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12">
                <h2>Contacts</h2>
                contacts: {{ contacts }}<br /><br />
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col cols="12" class="mx-3">
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

                    <template v-slot:[`item`]="{ item, index }">
                        <tr style="" v-if="headers && headers.length">
                            <td>
                                {{ item.id }}
                            </td>
                            <td>
                                {{ item.name }}
                            </td>
                            <td>
                                {{ item.message }}
                            </td>
                            <td>
                                {{ item.is_read }}
                            </td>
                            <td>
                                {{ item.created_at | moment('DD MMM YYYY') }}
                            </td>
                            <td>
                                {{ item.updated_at | moment('from') }}
                            </td>
                            <td style="white-space: nowrap">
                                <v-btn small color="success" :to="`/admin/contacts/${item.id}`">Montrer</v-btn>
                                <v-btn small color="error">Supprimer</v-btn>
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
                    text: 'Formulaires de contact',
                    disabled: true,
                    href: '/admin/contacts'
                }
            ],
            headers: [
                {
                    text: 'ID',
                    align: 'start',
                    sortable: false,
                    value: 'id'
                },
                {
                    text: 'Nom',
                    value: 'name'
                },
                {
                    text: 'Message',
                    value: 'message'
                },
                {
                    text: 'Lu?',
                    value: 'is_read'
                },
                { text: 'Créé le', value: 'created_at' },
                { text: 'Dernière modification', value: 'updated_at' }
            ]
        }
    },
    computed: {
        contacts() {
            return this.$store.getters['contacts/contacts']
        }
    },
    methods: {}
}
</script>

<style scoped></style>
