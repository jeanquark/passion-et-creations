require('./bootstrap')

import Vue from 'vue'

//Main pages
import App from './views/App'
import router from './router/index'
import store from './store/index'
import vuetify from './vuetify'
// import { mapState } from 'vuex'

// import axios from 'axios'
import './plugins'

Vue.component('example-component', require('./components/ExampleComponent.vue').default)
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default)
Vue.component('login-component', require('./components/LoginComponent.vue').default)
// Vue.component('slider-component', require('./components/SliderComponent.vue').default)
Vue.component('carousel-component', require('./components/CarouselComponent.vue').default)
Vue.component('info-component', require('./components/InfoComponent.vue').default)
Vue.component('footer-component', require('./components/FooterComponent.vue').default)
Vue.component('contact-component', require('./components/ContactComponent.vue').default)
Vue.component('about-component', require('./components/AboutComponent.vue').default)
Vue.component('portfolio-component', require('./components/PortfolioComponent.vue').default)
Vue.component('snackbar-component', require('./components/SnackbarComponent.vue').default)
Vue.component('forgot-password-component', require('./components/ForgotPasswordComponent.vue').default)
Vue.component('reset-password-component', require('./components/ResetPasswordComponent.vue').default)

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify,
    components: { App },
    async created() {
        try {
            if (this.$store.getters['contents/contents'].length < 1) {
                this.$store.dispatch('contents/fetchContents')
            }
        } catch (error) {
            console.log('error: ', error)
        }
    },
    mounted() {},
    data() {
        return {
        }
    },
    computed: {
    },
    methods: {
    }
})
