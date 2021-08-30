<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters>
            <v-col cols="12">
                <!-- images: {{ images }} -->
                <v-data-table :headers="headers" :items="images" :items-per-page="5" class="elevation-1">
                    <!-- <template v-slot:item.created_at="{ item }">
                        {{ item.created_at.toUpperCase() }}
                    </template>
                    <template v-slot:item.actions="{ item }">
                        <v-btn small>Delete</v-btn>
                    </template> -->
                    <template v-slot:item.actions="{ item }">
                        <span>test1</span>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminImagesIndex',
    async created() {
        await this.$store.dispatch('images/fetchImages')
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
            headers: [
                {
                    text: 'ID',
                    align: 'start',
                    sortable: false,
                    value: 'id',
                },
                { text: 'Name', value: 'name' },
                { text: 'Width', value: 'width' },
                { text: 'Height', value: 'height' },
                { text: 'Created at', value: 'created_at' },
                { text: 'Updated at', value: 'updated_at' },
                { text: 'Actions', value: 'actions' },
            ],
        }
    },
    computed: {
        images() {
            return this.$store.getters['images/images']
        },
    },
    methods: {},
}
</script>

<style scoped>
</style>