<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12" md="11">
                <v-list dense>
                    <v-subheader class="text-center text-h5">Message ID {{ this.$route.params.id }}</v-subheader>
                    <v-list-item>
                        <v-list-item-icon> Nom </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2">{{ contact.name }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon> E-mail </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2">{{ contact.email }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon> Message </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2">{{ contact.message }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-icon> Envoyé le </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title class="text-subtitle-2">{{ contact.created_at | moment('ddd DD MMM YYYY HH:mm') }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminContactsShow',
    async created() {
        try {
            if (this.$store.getters['contacts/contacts'].length < 1) {
                await this.$store.dispatch('contacts/fetchContacts')
            }
            this.$store.dispatch('contacts/updateContacts', {
                id: this.$route.params.id
            })
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
                    disabled: false,
                    to: '/admin/contacts',
                    exact: true,
                },
                {
                    text: 'Montrer',
                    disabled: true,
                    to: '/admin/contacts',
                },
            ],
        }
    },
    computed: {
        contacts() {
            return this.$store.getters['contacts/contacts']
        },
        contact() {
            return this.contacts.find((contact) => contact.id == this.$route.params.id)
        },
    },
    methods: {},
}
</script>

<style scoped></style>
