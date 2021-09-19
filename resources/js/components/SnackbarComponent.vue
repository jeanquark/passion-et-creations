<template>
    <v-snackbar :color="snackbar.color ? snackbar.color : 'dark'" :timeout="snackbar.timeout ? snackbar.timeout : 1000" v-model="snackbar.show">
        {{ snackbar.text }}
        <template v-slot:action="{ attrs }">
            <v-btn icon color="red" text v-bind="attrs" @click="$store.commit('snackbars/SET_SNACKBAR', { color: snackbar.color ? snackbar.color : 'dark', show: false })">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </template>
    </v-snackbar>
</template>

<script>
export default {
    created () {
        // this.$store.dispatch('snackbars/fetchSnackbars')
    },
    data() {
        return {
            showSnackbar: true
        }
    },
    computed: {
        snackbar () {
            return this.$store.getters['snackbars/snackbar']
        }
    },
    methods: {}
}
</script>

<style scoped></style>
