<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <!-- users: {{ users }}<br /><br /> -->
        <!-- authUser: {{ authUser }}<br /><br /> -->
        <v-row no-gutters class="mx-6">
            <v-col cols="12">
                <v-data-table :headers="headers" :items="users" :items-per-page="5" :hide-default-header="true" class="elevation-1">
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
                                {{ item.name }}
                            </td>
                            <td>
                                {{ item.email }}
                            </td>
                            <td class="pa-2" v-if="item.picture">
                                <v-img :src="`/images/${item.picture}`" width="100"></v-img>
                            </td>
                            <td class="pa-2" v-else>
                                <span><i>Pas d'image</i></span>
                            </td>
                            <td>
                                {{ item.created_at | moment('DD MMM YYYY') }}
                            </td>
                            <td>
                                {{ item.updated_at | moment('from') }}
                            </td>
                            <td style="white-space: nowrap">
                                <v-btn small color="info" :to="`/admin/users/${item.id}/edit`">Editer</v-btn>
                                <v-btn small color="error" @click="deleteUser(item.id)" v-if="users.length > 1">Supprimer</v-btn>
                                <!-- <v-btn small color="warning" :to="`/admin/users/${item.id}/edit`" v-if="item.id == authUser.id">Changer mot de passe</v-btn> -->
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
    name: 'AdminUsersIndex',
    async created() {
        if (this.$store.getters['users/users'].length < 1) {
            await this.$store.dispatch('users/fetchUsers')
        }
    },
    data() {
        return {
            items: [
                {
                    text: 'Utilisateurs',
                    disabled: true,
                    href: '/admin/users',
                },
                {
                    text: 'Ajouter',
                    disabled: false,
                    to: '/admin/users/create',
                },
            ],
            headers: [
                {
                    text: 'Nom',
                    align: 'start',
                    sortable: false,
                    value: 'name',
                },
                { text: 'Email', value: 'email' },
                { text: 'Image' },
                { text: 'Créé le', value: 'created_at' },
                { text: 'Dernière modification', value: 'updated_at' },
            ],
        }
    },
    computed: {
        users() {
            return this.$store.getters['users/users']
        },
        authUser () {
            return this.$store.getters['auth/user']
        }
    },
    methods: {
        async deleteUser (id) {
            try {
                await this.$store.dispatch('users/deleteUser', {
                    id
                })
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Utilisateur supprimé avec succès.',
                    color: 'success'
                })
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Une erreur est survenue et l\'utilisateur n\'a pas pu être supprimé.',
                    color: 'error'
                })
            }
        }
    }
}
</script>

<style scoped></style>
