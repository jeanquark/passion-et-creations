<template>
    <v-main>
        <v-container fill-height>
            <v-row align="center" justify="center">
                <v-col cols="12" sm="8" md="4">
                    form.errors: {{ form.errors }}<br /><br />
                    token: {{ token }}<br /><br />
                    email: {{ email }}<br /><br />
                    <v-card class="elevation-12">
                        <v-toolbar color="#c49a6c" class="">
                            <v-toolbar-title class="white--text">Réinitialiser mot de passe</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-form>
                                <input type="hidden" name="token" value="form.token" />
                                <v-text-field prepend-icon="mdi-account" name="email" label="Email" type="text" :error-messages="form.errors.get('email')" v-model="form.email" :disabled="true"></v-text-field>
                                <v-text-field prepend-icon="mdi-account" name="password" label="Mot de passe" type="password" :error-messages="form.errors.get('password')" v-model="form.password"></v-text-field>
                                <v-text-field prepend-icon="mdi-account" name="password_confirmation" label="Confirmation mot de passe" type="password" :error-messages="form.errors.get('password_confirmation')" v-model="form.password_confirmation"></v-text-field>
                            </v-form>
                        </v-card-text>
                        <v-card-actions class="">
                            <v-row no-gutters align="center">
                                <v-col cols="4">
                                    <v-btn small outlined color="#c49a6c" class="" href="/"> <v-icon>mdi-arrow-left</v-icon></v-btn>
                                </v-col>
                                <v-col cols="4" class="d-flex justify-center">
                                    <v-btn color="#c49a6c" class="white--text" :loading="form.busy" @click="reset">Réinitialiser</v-btn>
                                </v-col>
                                <v-col cols="4"></v-col>
                            </v-row>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
import Navbar from '../components/NavbarComponent'
import Form from 'vform'

export default {
    components: { Navbar },
    props: ['token', 'email'],
    async created() {
        this.$store.commit('snackbars/CLEAR_SNACKBAR')
    },
    async mounted () {
        // this.form.token = token
    },
    data() {
        return {
            form: new Form({
                token: this.token,
                email: this.email,
                password: '',
                password_confirmation: ''
            }),
        }
    },
    computed: {},
    methods: {
        async reset() {
            try {
                console.log('form: ', this.form)
                const data = await this.form.post('/reset-password')
                console.log('data: ', data)
                // this.form.reset()
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Mot de passe mis à jour avec succès.',
                    color: 'success',
                })
                // this.$route.push('/')
                location.href = '/'
            } catch (error) {
                console.log('error: ', error)
                console.log('error.response: ', error.response)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Une erreur est survenue et le mot de passe n\'a pas été pu être mis à jour.',
                    color: 'error',
                })
            }
        },
    },
}
</script>

<style scoped>
/* .background-image {
        background-image: url('/images/logo_toolbar.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: right;
    } */
.primary-color {
    background-color: #c49a6c;
}
</style>
