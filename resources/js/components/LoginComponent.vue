<template>
    <v-main>
        <!-- <navbar-component></navbar-component> -->
        <!-- form.errors: {{ form.errors }}<br /><br /> -->

        <v-container fill-height>
            <v-row align="center" justify="center">
                <v-col cols="12" sm="8" md="5">
                    <v-card class="elevation-12">
                        <v-toolbar class="background-image">
                            <v-toolbar-title class="primary-color">Login</v-toolbar-title>
                        </v-toolbar>
                        <v-form @submit.prevent="login">
                            <v-card-text>
                                <v-text-field prepend-icon="mdi-account" name="email" label="Email" type="text" :error-messages="[]" v-model="form.email"></v-text-field>
                                <v-text-field
                                    id="password"
                                    prepend-icon="mdi-lock"
                                    name="password"
                                    label="Password"
                                    type="password"
                                    :error-messages="form.errors.get('email') || form.errors.get('error')"
                                    v-model="form.password"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-actions class="">
                                <v-row no-gutters align="center">
                                    <v-col cols="4">
                                        <v-btn small outlined color="#c49a6c" class="" href="/"> <v-icon>mdi-arrow-left</v-icon>Retour</v-btn>
                                    </v-col>
                                    <v-col cols="4" class="d-flex justify-center">
                                        <!-- <v-btn color="#c49a6c" class="white--text" :loading="form.busy" @click="login">Login</v-btn> -->
                                        <v-btn type="submit" color="#c49a6c" class="white--text" :loading="form.busy">Login</v-btn>
                                    </v-col>
                                    <v-col cols="4">
                                        <v-btn x-small class="" @click.stop="loginAlt()">Login alt</v-btn>
                                    </v-col>
                                    <v-col cols="12" class="d-flex justify-end mt-3">
                                        <small><a href="/forgot-password">Mot de passe oublié &rarr;</a></small>
                                    </v-col>
                                </v-row>
                            </v-card-actions>
                        </v-form>
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
    async created() {
        this.$store.commit('snackbars/CLEAR_SNACKBAR')
    },
    data() {
        return {
            form: new Form({
                email: '',
                password: '',
            }),
        }
    },
    computed: {},
    methods: {
        async loginAlt() {
            try {
                const response = await axios.get('/sanctum/csrf-cookie')
                console.log('response: ', response)
                const response2 = await axios.post('login', {
                    email: this.form.email,
                    password: this.form.password,
                })
                console.log('response2: ', response2)
                // this.$router.push('/admin/index')
                location.href = '/admin/index'
            } catch (error) {
                console.log('error: ', error.response)
                alert(`login error! ${error.response.data.message}`)
            }
        },
        async login() {
            try {
                const data = await this.$store.dispatch('auth/login', this.form)
                console.log('data: ', data)
                // console.log('data: ', data)
                // const response = await this.form.post("/login");
                // console.log('response: ', response)
                // this.$router.push('/admin/index')
                location.href = '/admin/index'
            } catch (error) {
                console.log('error: ', error)
                console.log('error.response: ', error.response)
                console.log('error.response.data: ', error.response.data)
            }
        },
    },
}
</script>

<style scoped>
.background-image {
    background-image: url('/images/logo_toolbar.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: right;
}
.primary-color {
    color: #c49a6c;
}
</style>
