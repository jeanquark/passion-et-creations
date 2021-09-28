<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <v-row no-gutters justify="center">
            <v-col cols="12" md="10">
                <div v-html="content.content" style="border: 0px solid #ccc;"></div>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: 'AdminContentsShow',
    components: { },
    async created () {
        try {
            if (this.$store.getters['contents/contents'].length < 1) {
                await this.$store.dispatch('contents/fetchContents')
            }
        } catch (error) {
            console.log('error: ', error)
        }
    },
    data() {
        return {
            items: [
                {
                    text: 'Contenus',
                    disabled: false,
                    to: '/admin/contents',
                    exact: true,
                },
                {
                    text: 'Ajouter',
                    disabled: true,
                    to: '/admin/contents/create',
                },
            ],
        }
    },
    computed: {
        contents() {
            return this.$store.getters['contents/contents']
        },
        content () {
            return this.$store.getters['contents/contents'].find(content => content.id == this.$route.params.id)
        }
    },
    methods: {
    },
}
</script>

<style scoped></style>
