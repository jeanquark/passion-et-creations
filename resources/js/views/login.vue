<template>
    <v-main>
        <!-- <navbar-component></navbar-component> -->
        <!-- form.errors.has('email'): {{ form.errors }} -->
        <v-container fill-height>
            <v-row align="center" justify="center">
                <v-col cols="12" sm="8" md="4">
                    <v-card class="elevation-12">
                        <v-toolbar dark color="#c49a6c">
                            <v-toolbar-title>Login</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-form>
                                <v-text-field prepend-icon="mdi-account" name="email" label="Email" type="text" :error-messages="[]" v-model="form.email"></v-text-field>
                                <v-text-field id="password" prepend-icon="mdi-lock" name="password" label="Password" type="password" :error-messages="form.errors.get('email')" v-model="form.password"></v-text-field>
                            </v-form>
                        </v-card-text>
                        <v-card-actions class="justify-center">
                            <!-- <v-spacer></v-spacer> -->
                            <!-- <div class="text-xs-center"> -->
                                <v-btn color="#c49a6c" class="white--text" href="/">
                                <v-icon>mdi-arrow-left</v-icon>Retour</v-btn>
                                <v-btn color="#c49a6c" class="white--text" :loading="form.busy" @click="login">Login</v-btn>
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
import Form from 'vform'

export default {
    components: { Navbar },
    async created() {},
    data() {
        return {
            form: new Form({
                email: 'admin@example.com',
                password: 'secret1'
            })
        }
    },
    computed: {},
    methods: {
        async login() {
            try {
                const data = await this.$store.dispatch('auth/login', this.form)
                console.log('data2: ', data)
                // console.log('data: ', data)
                // const response = await this.form.post("/login");
                // console.log('response: ', response)
                this.$router.push('/admin/index')
                // location.href = '/admin'
            } catch (error) {
                console.log('error: ', error)
            }
        }
    }
}
</script>

<style scoped></style>
