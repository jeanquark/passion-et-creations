<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters>
            <v-col cols="12" class="mx-3">
                <v-data-table :headers="headers" :items="contents" :items-per-page="5" :hide-default-header="true" class="elevation-1">
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
                                {{ item.section }}
                            </td>
                            <td>
                                <div v-html="item.content.substring(0, 100)"></div>
                            </td>
                            <td>
                                {{ item.is_published ? 'Oui' : 'Non' }}
                            </td>
                            <td>
                                {{ item.created_at | moment('DD MMM YYYY') }}
                            </td>
                            <td>
                                {{ item.updated_at | moment('from') }}
                            </td>
                            <td style="white-space: nowrap">
                                <v-btn small color="success" :to="`/admin/contents/${item.id}`">Montrer</v-btn>
                                <v-btn small color="info" :to="`/admin/contents/${item.id}/edit`">Editer</v-btn>
                                <v-btn small color="error" @click="deleteContent(item.id)">Supprimer</v-btn>
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
    name: 'AdminContentsIndex',
    async created() {
        try {
            if (this.$store.getters['contents/contents'].length < 1) {
                this.$store.dispatch('contents/fetchContents')
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
                    text: 'Contenus',
                    disabled: true,
                    href: '/admin/contents',
                },
                {
                    text: 'Ajouter',
                    disabled: false,
                    to: '/admin/contents/create',
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
                { text: 'Section', value: 'section' },
                { text: 'Contenu', value: 'content' },
                { text: 'Publié?', value: 'is_published' },
                { text: 'Créé le', value: 'created_at' },
                { text: 'Dernière modification', value: 'updated_at' },
            ],
        }
    },
    computed: {
        contents() {
            return this.$store.getters['contents/contents'].sort((a, b) => b.id > a.id)
        },
    },
    methods: {
        async deleteContent(id) {
            try {
                console.log('deleteContent ', id)
                await this.$store.dispatch('contents/deleteContent', id)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Contenu supprimé avec succès.',
                })
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le contenu n'a pas pu être supprimé.",
                })
            }
        },
    },
}
</script>

<style scoped></style>
