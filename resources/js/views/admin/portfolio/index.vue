<template>
    <div>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
    </div>
</template>

<script>
export default {
    name: 'AdminPortfolioIndex',
    data() {
        return {
            items: [
                {
                    text: 'Portfolio',
                    disabled: true,
                    href: '/admin/porfolio',
                },
                {
                    text: 'Ajouter',
                    disabled: false,
                    to: '/admin/portfolio/create',
                }
            ],
        }
    },
}
</script>

<style scoped>
</style>