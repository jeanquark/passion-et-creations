require('./bootstrap')

import Vue from 'vue'

//Main pages
import App from './views/App'
import router from './router/index'
import store from './store/index'
import vuetify from './vuetify'
import { mapState } from 'vuex'
import axios from 'axios'
import './plugins'

Vue.component('example-component', require('./components/ExampleComponent.vue').default)
// Vue.component('login-component', require('./components/LoginComponent.vue').default)
// Vue.component(
//     "permanences",
//     require("./components/PermanencesComponent.vue").default
// );
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default)
// Vue.component('slider-component', require('./components/SliderComponent.vue').default)
Vue.component('carousel-component', require('./components/CarouselComponent.vue').default)
Vue.component('info-component', require('./components/InfoComponent.vue').default)
Vue.component('footer-component', require('./components/FooterComponent.vue').default)
Vue.component('contact-component', require('./components/ContactComponent.vue').default)
Vue.component('about-component', require('./components/AboutComponent.vue').default)
Vue.component('portfolio-component', require('./components/PortfolioComponent.vue').default)
Vue.component('snackbar-component', require('./components/SnackbarComponent.vue').default)

// import Default from './layouts/Default.vue'
// import NoSidebar from './layouts/NoSidebar.vue'
// Vue.component('default-layout', Default)
// Vue.component('no-sidebar-layout', NoSidebar)

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify,
    components: { App },
    async created() {
        try {
            console.log("created() from app.js")
            // await this.$store.dispatch('auth/setAuthUser')
            // this.$store.commit("INCREMENT");
            // console.log("count: ", this.count);
            if (this.$store.getters['contents/contents'].length < 1) {
                this.$store.dispatch('contents/fetchContents')
            }
            // if (this.$store.getters['sliders/sliders'].length < 1) {
            //     this.$store.dispatch('sliders/fetchSliders')
            // }
        } catch (error) {
            console.log('error: ', error)
        }
    },
    mounted() {},
    data() {
        return {
            // count: 0
        }
    },
    computed: {
        // ...mapState({
        //     count: state => state.count
        // })
        // contents () {
        //     this.$store.getters['contents/contents']
        // }
    },
    methods: {
        async register() {
            try {
                console.log('register')
                const data = await axios.post('/register', {
                    name: 'John Doe',
                    email: 'john2.doe@example.com',
                    password: 'pingpong',
                    password_confirmation: 'pingpong'
                })
                console.log('data: ', data)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async login() {
            try {
                console.log('login')
                const response = await axios.get('/sanctum/csrf-cookie')
                console.log('response: ', response)
                // Login...
                const response2 = await axios.post('/login', {
                    email: 'admin@example.com',
                    password: 'secret'
                })
                console.log('response2: ', response2)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async logout() {
            try {
                console.log('logout')
                // const response = $user = request()->user()
                const response = await axios.post('/logout')
                console.log('response: ', response)
                location.href = '/'
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async forgotPassword() {
            try {
                console.log('forgotPassword')
                const data = await axios.post('/forgot-password', {
                    email: 'lawyer@example.com'
                })
                console.log('data: ', data)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async getUser() {
            try {
                const user = await axios.get('/api/user')
                console.log('user: ', user)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        incrementCounter() {
            console.log('incrementCounter')
            // this.$store.commit("INCREMENT");
        },
        
    }
})
