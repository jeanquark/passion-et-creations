<template>
    <v-snackbar :color="snackbar.color ? snackbar.color : 'dark'" :timeout="snackbar.timeout ? snackbar.timeout : 3000" v-model="snackbar.show">
        <span v-html="snackbar.content"></span>
        <v-btn small link outlined color="#c49a6c" to="/login" class="ml-2" v-if="snackbar.type === 'session_expired'">Login</v-btn>
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
