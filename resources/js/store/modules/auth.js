import Vue from 'vue'
import Cookies from 'js-cookie'

export const state = () => ({
    auth: false,
    user: null,
    // token: Cookies.get('XSRF-TOKEN')
    // token: document.cookie
    // token: Cookies.get()
})

export const mutations = {
    SET_AUTH(state, payload) {
        state.auth = payload
    },
    SET_USER(state, payload) {
        state.user = payload
    },
    // SAVE_TOKEN (state, { token, remember }) {
    //     state.token = token
    //     Cookies.set('token', token, { expires: remember ? 365 : null })
    // },
}

export const actions = {
	async login ({ dispatch }, form) {
		try {
			const data = await form.post('/login')
            console.log('[VUEX] login: ', data)
			await dispatch('setAuthUser')
            return data
		} catch (error) {
			console.log('error: ', error)
            throw error
		}
	},
	async logout ({ commit }) {
		try {
			await axios.post('/logout')
			commit('SET_AUTH', false)
			commit('SET_USER', null)
		} catch (error) {
			console.log('error: ', error)
		}
	},
    async setAuthUser({ commit }, form) {
        try {
			const { data } = await axios.get('/api/user')
            console.log('[VUEX] setAuthUser: ', data)
			commit('SET_AUTH', true)
			commit('SET_USER', data)
        } catch (error) {
            console.log('error: ', error)
			throw error
        }
    },
    async resetPassword({ commit }, form) {
        try {
            // const { data } = await form.put(`/api/v1/users/1`)
            console.log('[VUEX] resetPassword form: ', form)
            const data = await form.put(`/user/password`)
            console.log('data: ', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    }
    // async fetchUser({ commit }) {
    //     try {
    //         const { data } = await axios.get('/api/user')
    //         console.log('data from fetchUser: ', data)

    //         // commit(types.FETCH_USER_SUCCESS, { user: data })
    //         commit('SET_USER', { user: data })
    //     } catch (error) {
    //         // commit(types.FETCH_USER_FAILURE)
    //         console.log('error: ', error)
    //     }
    // }
}

export const getters = {
    auth(state) {
        return state.auth
    },
    user(state) {
        return state.user
    },
    // token(state) {
    //     return state.token
    // }
}
