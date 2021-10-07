<template>
    <v-dialog v-model="dialog.show" width="500" ref="confirm">
        <v-card>
            <v-card-title class="text-h5 grey lighten-2">{{ dialog.title }}</v-card-title>

            <v-card-text>
                {{ dialog.content }}
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" text @click="close">Annuler </v-btn>
                <v-btn color="success" text @click="confirm">Oui, poursuivre</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    created() {},
    data() {
        return {
            // showDialog: true,
        }
    },
    computed: {
        dialog() {
            return this.$store.getters['dialogs/dialog']
        },
        
    },
    methods: {
        close () {
            this.$store.commit('dialogs/CLEAR_DIALOG')
        },
        confirm () {
            console.log('confirm')
            this.$emit('confirm', true)
            // this.resolve(true);
            // console.log(this.$refs.confirm)
            // return 'yes'
        },
        
    },
}
</script>

<style scoped></style>
