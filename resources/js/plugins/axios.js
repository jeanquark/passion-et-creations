import axios from 'axios'
import store from '../store'

// Request interceptor
axios.interceptors.request.use(request => {
    // console.log('[plugins] axios interceptor request: ', request)
    // const token = store.getters['auth/token']
    // if (token) {
    //     request.headers.common['Authorization'] = `Bearer ${token}`
    // }

    return request
})

// Response interceptor
axios.interceptors.response.use(
    response => {
        return response
    },
    error => {
        //Put your logic here to manage the error message coming from BE
        // console.log('[plugin] axios interceptor response error: ', error.response.status)
        if (error.response.status == 401) {
            store.commit('snackbars/SET_SNACKBAR', {
                show: true,
                type: 'session_expired',
                color: 'dark',
                content: 'Votre session a expiré. Veuillez vous reconnecter.',
            })
        }
        return Promise.reject(error)
    }
)
