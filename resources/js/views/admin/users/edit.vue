<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <h2>Editer utilisateur {{ $route.params.id }}</h2>
        <!-- users: {{ users }}<br /><br /> -->
        <!-- user: {{ user }}<br /><br /> -->
        <v-row no-gutters>
            <v-col cols="12">
                <v-form @submit.prevent="resetPassword">
                    <v-text-field
                        prepend-icon="mdi-lock"
                        name="current_password"
                        label="Mot de passe actuel"
                        type="password"
                        :error-messages="form.errors.get('current_password')"
                        v-model="form.current_password"
                    ></v-text-field>
                    <v-text-field
                        prepend-icon="mdi-lock"
                        name="password"
                        label="Nouveau mot de passe"
                        type="password"
                        :error-messages="form.errors.get('password')"
                        v-model="form.password"
                    ></v-text-field>
                    <v-text-field prepend-icon="mdi-lock" name="password_confirmation" label="Confirmation nouveau mot de passe" type="password" v-model="form.password_confirmation"></v-text-field>
                    <div class="text-center">
                        <v-btn type="submit" color="success" :loading="form.busy">Changer mot de passe</v-btn>
                    </div>
                </v-form>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import Form from 'vform'
export default {
    name: 'AdminUsersEdit',
    data() {
        return {
            items: [
                {
                    text: 'Utilisateurs',
                    disabled: false,
                    to: '/admin/users',
                    exact: true
                },
                {
                    text: 'Editer',
                    disabled: true,
                    to: `/admin/users/${this.$route.params.id}/edit`
                }
            ],
            form: new Form({
                current_password: 'secret1',
                password: 'password',
                password_confirmation: 'password'
            })
        }
    },
    computed: {
        users() {
            return this.$store.getters['users/users']
        },
        user() {
            return this.users.find(user => user.id == this.$route.params.id)
        }
    },
    methods: {
        async resetPassword() {
            try {
                const data = await this.$store.dispatch('auth/resetPassword', this.form)
                // console.log('data: ', data)
            } catch (error) {
                console.log('error: ', error)
            }
        }
    }
}
</script>

<style scoped></style>
