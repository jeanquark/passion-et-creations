import axios from 'axios'
import store from '../store'

// Request interceptor
axios.interceptors.request.use(request => {
    console.log('[plugins] axios interceptor request: ', request)
    // const token = store.getters['auth/token']
    // if (token) {
    //     request.headers.common['Authorization'] = `Bearer ${token}`
    // }

    return request
})
