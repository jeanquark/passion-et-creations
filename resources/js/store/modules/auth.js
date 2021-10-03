import Vue from 'vue'
import Cookies from 'js-cookie'

export const state = () => ({
    auth: false,
    user: null,
})

export const mutations = {
    SET_AUTH(state, payload) {
        state.auth = payload
    },
    SET_USER(state, payload) {
        state.user = payload
    },
}

export const actions = {
	async login ({ dispatch }, form) {
		try {
			const data = await form.post('/login')
            // console.log('[VUEX] login: ', data)
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
			const { data } = await axios.get('/api/auth-user')
            // console.log('[VUEX] setAuthUser: ', data)
			commit('SET_AUTH', true)
			commit('SET_USER', data)
        } catch (error) {
            console.log('error: ', error)
			throw error
        }
    },
    async resetPassword({ commit }, form) {
        try {
            // console.log('[VUEX] resetPassword form: ', form)
            const data = await form.put(`/user/password`)
            // console.log('data: ', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    }
}

export const getters = {
    auth(state) {
        return state.auth
    },
    user(state) {
        return state.user
    },
}
