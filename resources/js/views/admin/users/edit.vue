<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <!-- users: {{ users }}<br /><br /> -->
        <!-- user: {{ user }}<br /><br /> -->
        <!-- formUser: {{ formUser }}<br /><br /> -->
        <v-row no-gutters justify="center" class="mt-5 mb-10">
            <v-col cols="12" md="10">
                <h3 class="text-center">Editer utilisateur</h3>
                <v-form @submit.prevent="updateUser">
                    <v-text-field
                        prepend-icon="mdi-account"
                        name="name"
                        label="Nom"
                        :error-messages="formUser.errors.get('name')"
                        v-model="formUser.name"
                    ></v-text-field>
                    <v-file-input label="Image de l'utilisateur (optionel)" prepend-icon="mdi-camera" :multiple="false" :clearable="false" show-size @change="onFileChange" v-model="formUser.new_picture"></v-file-input>
                    <div id="preview" class="mb-4">
                        <!-- previewImage: {{ previewImage }}<br /> -->
                        <v-row no-gutters class="">
                            <v-col cols="12" md="6" lg="4" class="ml-6 pa-2" v-if="formUser.picture">
                                <p>Image actuelle:</p>
                                <v-img :src="`/images/${formUser.picture}`" width="100"></v-img>
                            </v-col>
                            <v-col cols="12" md="6" lg="4" class="ml-6 pa-2" v-if="previewImage">
                                <p>Nouvelle image:</p>
                                <v-img :src="previewImage" width="100"></v-img>
                            </v-col>
                        </v-row>
                    </div>

                    
                    <!-- <v-file-input prepend-icon="mdi-camera" label="Image de l'utilisateur (optionel)" :clearable="false" show-size class="my-0" @change="onFileChange"></v-file-input>
                    <div id="preview" class="mb-0" >
                        <v-row no-gutters class="">
                            <v-col cols="12" md="6" lg="4" class="ml-6 pa-2">
                                <p>Image actuelle:</p>
                                <v-img :src="`/images/${formUser.picture}`" width="100"></v-img>
                            </v-col>
                            <v-col cols="12" md="6" lg="4" class="ml-6 pa-2">
                                <p>Nouvelle image:</p>
                                <v-img :src="formUser.new_picture" width="100"></v-img>
                            </v-col>
                        </v-row>
                    </div> -->
                    <div class="text-center mt-3">
                        <v-btn type="submit" color="success" :loading="formUser.busy">Editer</v-btn>
                    </div>
                </v-form>
            </v-col>
        </v-row>
        <v-row no-gutters justify="center" class="my-10">
            <v-col cols="12" md="10" v-if="authUser && $route.params.id == authUser.id">
                <h3 class="text-center">Changer mot de passe</h3>
                <v-form @submit.prevent="resetPassword">
                    <v-text-field
                        prepend-icon="mdi-lock"
                        name="current_password"
                        label="Mot de passe actuel"
                        type="password"
                        :error-messages="formPassword.errors.get('current_password')"
                        v-model="formPassword.current_password"
                    ></v-text-field>
                    <v-text-field
                        prepend-icon="mdi-lock"
                        name="password"
                        label="Nouveau mot de passe"
                        type="password"
                        :error-messages="formPassword.errors.get('password')"
                        v-model="formPassword.password"
                    ></v-text-field>
                    <v-text-field prepend-icon="mdi-lock" name="password_confirmation" label="Confirmation nouveau mot de passe" type="password" v-model="formPassword.password_confirmation"></v-text-field>
                    <div class="text-center">
                        <v-btn type="submit" color="success" :loading="formPassword.busy">Changer mot de passe</v-btn>
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
    async created () {
        if (this.$store.getters['users/users'].length < 1) {
            await this.$store.dispatch('users/fetchUsers')
        }
        this.formUser.fill(this.user)
    },
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
            formUser: new Form({
                id: '',
                name: '',
                picture: null,
                new_picture: null
            }),
            formPassword: new Form({
                current_password: '',
                password: '',
                password_confirmation: ''
            }),
            previewImage: null
        }
    },
    computed: {
        authUser () {
            return this.$store.getters['auth/user']
        },
        users() {
            return this.$store.getters['users/users']
        },
        user() {
            return this.users.find(user => user.id == this.$route.params.id)
        }
    },
    methods: {
        onFileChange(file) {
            console.log('onFileChange: ', file)
            this.previewImage = URL.createObjectURL(file[0])
        },
        async updateUser () {
            try {
                const data = await this.$store.dispatch('users/updateUser',
                    this.formUser
                )
                console.log('data: ', data)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Utilisateur modifié avec succès.',
                    color: 'success'
                })
                this.$router.push('/admin/users')
            } catch (error) {
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Une erreur est survenue et l\'utilisateur n\'a pas pu être modifié.',
                    color: 'error'
                })
                console.log('error: ', error)
            }
        },
        async resetPassword() {
            try {
                const data = await this.$store.dispatch('auth/resetPassword', this.formPassword)
                console.log('data: ', data)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Mot de passe modifié avec succès.',
                    color: 'success'
                })
                this.$router.push('/admin/users')
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    content: 'Une erreur est survenue et le mot de passe n\'a pas pu être modifié.',
                    color: 'error'
                })
            }
        }
    }
}
</script>

<style scoped></style>
