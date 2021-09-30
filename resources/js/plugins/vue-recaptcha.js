import Vue from 'vue'
import { VueReCaptcha } from 'vue-recaptcha-v3'

// For more options see below
// Vue.use(VueReCaptcha, { siteKey: '6Lenyp0cAAAAAEuSBeGcByC3FzincPZ5Mt_rZMr-'  })


Vue.use(VueReCaptcha, {
    siteKey: '6Lenyp0cAAAAAEuSBeGcByC3FzincPZ5Mt_rZMr-',
    loaderOptions: {
        badge: 'bottomleft',
        size: 'invisible'
    }
})