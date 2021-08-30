<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
    </v-main>
</template>

<script>
export default {
    name: "AdminUsersIndex",
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
        };
    }
};
</script>

<style scoped></style>
