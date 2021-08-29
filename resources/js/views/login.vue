<template>
    <v-main>
        <navbar-component></navbar-component>
        <p>Login<br /><br /></p>
        <v-container>
            <v-row align="center" justify="center">
                <v-col cols="12" sm="8" md="4">
                    <v-card class="elevation-12">
                        <v-toolbar dark color="primary">
                            <v-toolbar-title>Login admin</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-form>
                                <v-text-field prepend-icon="mdi-account" name="email" label="Email" type="text" v-model="form.email"></v-text-field>
                                <v-text-field id="password" prepend-icon="mdi-lock" name="password" label="Password" type="password" v-model="form.password"></v-text-field>
                            </v-form>
                        </v-card-text>
                        <v-card-actions class="justify-center">
                            <!-- <v-spacer></v-spacer> -->
                            <!-- <div class="text-xs-center"> -->
                                <v-btn color="primary" class="" @click="login">Login</v-btn>
                            <!-- </div> -->
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
import Navbar from '../components/NavbarComponent'
import Form from 'vForm'

export default {
    components: { Navbar },
    async created() {},
    data() {
        return {
            form: new Form({
                email: '',
                password: ''
            })
        }
    },
    computed: {},
    methods: {
        async login() {
            try {
                const response = await axios.post("/login", {
                    email: "rodriguez.eleanora@example.com",
                    password: "password"
                });
                console.log('response: ', response)
                // Submit the form.
                // this.$store.commit('loading/SET_LOADING', true)
                // await this.$store.dispatch('auth/login', this.form)

                
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('loading/SET_LOADING', false)
            }
        }
    }
}
</script>

<style scoped></style>
